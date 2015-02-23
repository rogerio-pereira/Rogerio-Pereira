<?php

/*
 * Classe controladorUpload
 */
class controladorUpload
{
	/*
	 * Variaveis
	 */
	//private		$diretorio = '/dominios/SITE.com.br/www/app.view/img/';
	private		$diretorio = 'D:/wamp/www/RogerioPereira/app.view/img/';
	private		$subdiretorio;
	private		$extensao;
	private		$foto_temp;
        private		$foto_name;
        private		$foto_size;
        private		$foto_type;
	protected		$collectionCodigo;
	protected		$codigo;
		
	public function setFoto_temp($foto_temp)
	{
		$this->foto_temp = $foto_temp;
	}
	public function setFoto_name($foto_name)
	{
		$this->foto_name = $foto_name;
	}
	public function setFoto_size($foto_size)
	{
		$this->foto_size = $foto_size;
	}
	public function setFoto_type($foto_type)
	{
		$this->foto_type = $foto_type;
	}
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setSubdiretorio($subdiretorio)
	{
		$this->subdiretorio = $subdiretorio.'/';
	}
	public function setExtensao($extensao)
	{
		$this->extensao = '.'.$extensao;
	}
	public function setCollectionCodigo($collectionCodigo)
	{
		$this->collectionCodigo = $collectionCodigo;
	}
	
	
	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->foto_temp		= NULL;
		$this->foto_name		= NULL;
		$this->foto_size		= NULL;
		$this->foto_type		= NULL;
		$this->codigo			= NULL;
		$this->collectionCodigo	= NULL;
		$this->subdiretorio		= NULL;
		$this->extensao		= NULL;
	}
	
	/*
	 * Método Upload
	 * Faz o upload da imagem
	 */
	protected function uploadImagem()
	{
		if(($this->foto_temp != NULL) || ($this->foto_temp != ''))
		{
			try
			{
				//Alterando nome da imagem
				$array = explode('.', $this->foto_name);
				$array[0] = $this->codigo;
				$this->foto_name = implode('.', $array);

				//ENVIA O ARQUIVO PARA A PASTA
				if(move_uploaded_file($this->foto_temp,	$this->diretorio.$this->subdiretorio.$this->foto_name))
					return true;
				else
					return false;

				return true;
			}
			catch(Exception $e)
			{
				return false;   
			}
		}
		else
			return true;
	}
	
	/*
	 *  Método redimensionaImagem
	 *  Redimensiona imagem
	 */
	protected function redimensionaImagem($larguraNova)
	{
		if(($this->foto_temp != NULL) || ($this->foto_temp != ''))
		{
			try
			{
				$this->foto_name = $this->diretorio.$this->subdiretorio.$this->foto_name;					//Seta o diretorio completo

				//Imagem PNG
				if(strpos($this->foto_name, '.png') !== FALSE)
				{
					$original		= imagecreatefrompng($this->foto_name);								//Carrega PNG
				}
				else if(strpos($this->foto_name, '.jpg') !== FALSE)
					$original		= imagecreatefromjpeg($this->foto_name);								//Carrega PNG

				$largOriginal	= imagesx($original);													//Carrega Largura
				$altOriginal	= imagesy($original);													//Carrega Altura

				$fator		= $altOriginal / $largOriginal;												//Calcula Fator de redimensionamento
				$alturaNova	= $larguraNova * $fator;													//Calcula Altura Nova

				$saida		= imagecreatetruecolor($larguraNova,$alturaNova);							//Cria imagem nova

				//Transparencia PNG
				if(strpos($this->foto_name, '.png') !== FALSE)
				{
					imagealphablending($saida,	false);
					imagesavealpha($saida,		true);
					$transparent = imagecolorallocatealpha($saida, 255, 255, 255, 127);
					imagefilledrectangle($saida, 0, 0, $larguraNova, $alturaNova, $transparent);
				}

				imagecopyresized($saida,$original, 0, 0, 0, 0,$larguraNova,$alturaNova,$largOriginal,$altOriginal);	//Cria copia da imagem redimentionada

				if(strpos($this->foto_name, '.png') !== FALSE)
				{
					imagepng($saida, $this->foto_name);												//Grava imagem PNG nova, com qualidade 100%
				}
				else if(strpos($this->foto_name, '.jpg') !== FALSE)
					imagejpeg($saida, $this->foto_name);												//Grava imagem JPG nova, com qualidade 100%

				imagedestroy($saida);
				imagedestroy($original);

				return true;
			}
			catch (Exception $e)
			{
				return false;
			}
		}
		else
			return true;
	}
	
	/*
	 * Método apaga
	 */
	protected function apagaImagem()
	{
		try
		{
			foreach($this->collectionCodigo as $codigo)
			{
				unlink($this->diretorio.$this->subdiretorio.$codigo.$this->extensao);
			}
			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
}
?>