<?php

/*
 * Classe controladorSocial
 */
class controladorSocialGestor extends controladorUpload
{
	/*
	 * Variaveis
	 */
	private $nome;
	private $link;
	private $results;
	private $social;
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function setLink($link)
	{
		$this->link = $link;
	}
	
	/*
	 * Método construtor
	 */
	public function __construct()
	{
		$this->nome			= NULL;
		$this->link			= NULL;
		$this->results			= NULL;
		$this->social			= NULL;
	}
	
	/*
	 * Método cadastraSocial
	 * Inicia Processo de cadastro de rede social
	 */
	public function cadastraSocial()
	{
		if($this->insertSocial())
		{
			$this->setSubdiretorio('social');
			$this->setCodigo($this->getLastID());
			
			if($this->uploadImagem())
			{
				if($this->redimensionaImagem(350))
				{
					echo
					"
						<script>
							alert('Cadastro de Rede Social concluido com êxito!');
						</script>
					";
					return true;
				}
				else
				{
					echo
					"
						<script>
							alert('Erro ao redimensionar imagem!');
							top.location='../?class=home';
						</script>
					";
					return false;
				}
			}
			else
			{
				echo
				"
					<script>
						alert('Erro ao fazer upload da imagem!');
						top.location='../?class=home';
					</script>
				";
				return false;
			}
		}
		else
		{
			echo
			"
				<script>
					alert('Erro ao cadastrar Rede Social');
					top.location='../?class=home';
				</script>
			";
			return false;
		}
	}
	
	/*
	 * Método insertSocial
	 * Cadastra rede Social
	 */
	private function insertSocial()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('social');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',	NULL);
			$sql->setRowData('nome',	$this->nome);
			$sql->setRowData('link',		$this->link);

			//Obtem a conexão ativa
			$conn   = TTransaction2::get();
			//Executa Instrução SQL
			$result = $conn->Query($sql->getInstruction());
			TTransaction2::close();

			return true;
		}
		catch(Exception $e)
		{
			return false;
		}
	}
	
	/*
	 * Método getLastID
	 * Obtem o ultimo codigo cadastrado
	 */
	private function getLastID()
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction2::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->add(new TFilter(' codigo ',' = ', " {$codigo} "));
		$criteria->setProperty('order', 'codigo DESC');
		$criteria->setProperty('limit', 1);

		// instancia a instrução de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn("codigo");

		$sql->setEntity('social');
		//  atribui o critério passado como parâmetro
		$sql->setCriteria($criteria);

		// obtém transação ativa
		if ($conn = TTransaction2::get())
		{	
			// registra mensagem de log
			TTransaction2::log($sql->getInstruction());
			// executa a consulta no banco de dados
			$result = $conn->Query($sql->getInstruction());
			$this->results = array();

			if ($result)
			{ 	
				// percorre os resultados da consulta, retornando um objeto
				while ($row = $result->fetchObject())
				{
					// armazena no array $this->results;
					$this->results[] = $row;
				}
			}
		}

		TTransaction2::close();

		return $this->results[0]->codigo;
	}
	
	/*
	 *	Método getSocial
	 *	Recupera todas as redes sociais cadastradas
	 */
	public function getSocial()
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->setProperty('order', 'nome ASC');

		// instancia a instrução de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('*');

		$sql->setEntity('social');

		//  atribui o critério passado como parâmetro
		$sql->setCriteria($criteria);

		// obtém transação ativa
		if ($conn = TTransaction::get())
		{	
			// registra mensagem de log
			TTransaction::log($sql->getInstruction());

			// executa a consulta no banco de dados
			$result = $conn->Query($sql->getInstruction());
			$this->results = array();

			if ($result)
			{ 	
				// percorre os resultados da consulta, retornando um objeto
				while ($row = $result->fetchObject())
				{
					// armazena no array $this->results;
					$this->results[] = $row;
				}
			}
		}

		TTransaction::close();

		return $this->results;
	}
	
	/*
	 *	Método getSocial
	 *	Recupera todas as redes sociais cadastradas
	 */
	public function getSocialID($id)
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		   TTransaction::open('my_bd_site');

		   //TABELA exposition_gallery
		   $criteria	= new TCriteria;
		   $criteria->add(new TFilter('codigo', '=', $id));
		   //$criteria->setProperty('order', 'codigo DESC');

		   // instancia a instrução de SELECT
		   $sql = new TSqlSelect;
		   $sql->addColumn('*');

		   $sql->setEntity('social');

		   //  atribui o critério passado como parâmetro
		   $sql->setCriteria($criteria);

		   // obtém transação ativa
		   if ($conn = TTransaction::get())
		   {	
			   // registra mensagem de log
			   TTransaction::log($sql->getInstruction());

			   // executa a consulta no banco de dados
			   $result = $conn->Query($sql->getInstruction());
			   $this->results = array();

			   if ($result)
			   { 	
				   // percorre os resultados da consulta, retornando um objeto
				   while ($row = $result->fetchObject())
				   {
					   // armazena no array $this->results;
					   $this->results[] = $row;
				   }
			   }
		   }

		   TTransaction::close();

		   $this->social	= $this->results[0];
		   return $this->social;
	}
	
	/*
	 * Método alteraSocial
	 * Inicia Processo de cadastro de rede social
	 */
	public function alteraSocial()
	{
		if($this->updateSocial())
		{
			$this->setSubdiretorio('social');
			
			if($this->uploadImagem())
			{
				if($this->redimensionaImagem(350))
				{
					echo
					"
						<script>
							alert('Alteração de Rede Social concluido com êxito!');
						</script>
					";
					return true;
				}
				else
				{
					echo
					"
						<script>
							alert('Erro ao redimensionar imagem!');
						</script>
					";
					return false;
				}
			}
			else
			{
				echo
				"
					<script>
						alert('Erro ao fazer upload da imagem!');
					</script>
				";
				return false;
			}
		}
		else
		{
			echo
			"
				<script>
					alert('Erro ao alterar Rede Social');
				</script>
			";
			return false;
		}
	}
	
	/*
	 * Método updateSocial
	 * Atualiza Rede Social
	 */
	private function updateSocial()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('social');

			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',	$this->nome);
			$sql->setRowData('link',		$this->link);

			//Obtem a conexão ativa
			$conn   = TTransaction2::get();
			//Executa Instrução SQL
			$result = $conn->Query($sql->getInstruction());

			TTransaction2::close();

			return true;
		}
		catch (Exception $e)
		{
			return false;
		}
	}
	
	/*
	 * Método excluiSocial
	 * Inicia Processo de exclusão de Redes Sociais
	 */
	public function excluiSocial()
	{
		if($this->deleteSocial())
		{
			$this->setSubdiretorio('social');
			$this->setExtensao('png');
			if($this->apagaImagem())
			{
				echo
				"
					<script>
						alert('Exclusão de Rede Social concluida com sucesso!');
					</script>
				";
				return true;
			}
			else
			{
				echo
				"
					<script>
						alert('Erro ao apagar imagens das Redes Sociais!');
					</script>
				";
				return false;
			}
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao apagar Rede Social!');
					</script>
				";
			return false;
		}
	}
	
	/*
	 * Método deleteSocial
	 * Exclui as redes sociais selecionadas
	 */
	private function deleteSocial()
	{
		 try
		{
			foreach($this->collectionCodigo as $codigo)
			{
				//RECUPERA CONEXAO BANCO DE DADOS
				TTransaction2::open('my_bd_site');

				//TABELA exposition_gallery
				$criteria	= new TCriteria;
				$criteria->add(new TFilter(' codigo ',' = ', "{$codigo}"));

				// instancia a instrução de SELECT
				$sql = new TSqlDelete;
				$sql->setEntity('social');

				//Define criterio de Exclusao
				$sql->setCriteria($criteria);

				//Obtem transação ativa
				if($conn = TTransaction2::get())
				{
					//Faz o log e executa o SQL
					TTransaction2::log($sql->getInstruction());

					$result = $conn->exec($sql->getInstruction());
				}

				TTransaction2::close();
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