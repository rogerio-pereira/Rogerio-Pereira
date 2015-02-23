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
	 * M�todo construtor
	 */
	public function __construct()
	{
		$this->nome			= NULL;
		$this->link			= NULL;
		$this->results			= NULL;
		$this->social			= NULL;
	}
	
	/*
	 * M�todo cadastraSocial
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
							alert('Cadastro de Rede Social concluido com �xito!');
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
	 * M�todo insertSocial
	 * Cadastra rede Social
	 */
	private function insertSocial()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('social');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',	NULL);
			$sql->setRowData('nome',	$this->nome);
			$sql->setRowData('link',		$this->link);

			//Obtem a conex�o ativa
			$conn   = TTransaction2::get();
			//Executa Instru��o SQL
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
	 * M�todo getLastID
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

		// instancia a instru��o de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn("codigo");

		$sql->setEntity('social');
		//  atribui o crit�rio passado como par�metro
		$sql->setCriteria($criteria);

		// obt�m transa��o ativa
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
	 *	M�todo getSocial
	 *	Recupera todas as redes sociais cadastradas
	 */
	public function getSocial()
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->setProperty('order', 'nome ASC');

		// instancia a instru��o de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('*');

		$sql->setEntity('social');

		//  atribui o crit�rio passado como par�metro
		$sql->setCriteria($criteria);

		// obt�m transa��o ativa
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
	 *	M�todo getSocial
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

		   // instancia a instru��o de SELECT
		   $sql = new TSqlSelect;
		   $sql->addColumn('*');

		   $sql->setEntity('social');

		   //  atribui o crit�rio passado como par�metro
		   $sql->setCriteria($criteria);

		   // obt�m transa��o ativa
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
	 * M�todo alteraSocial
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
							alert('Altera��o de Rede Social concluido com �xito!');
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
	 * M�todo updateSocial
	 * Atualiza Rede Social
	 */
	private function updateSocial()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('social');

			//Cria um crit�rio de sele��o pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',	$this->nome);
			$sql->setRowData('link',		$this->link);

			//Obtem a conex�o ativa
			$conn   = TTransaction2::get();
			//Executa Instru��o SQL
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
	 * M�todo excluiSocial
	 * Inicia Processo de exclus�o de Redes Sociais
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
						alert('Exclus�o de Rede Social concluida com sucesso!');
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
	 * M�todo deleteSocial
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

				// instancia a instru��o de SELECT
				$sql = new TSqlDelete;
				$sql->setEntity('social');

				//Define criterio de Exclusao
				$sql->setCriteria($criteria);

				//Obtem transa��o ativa
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