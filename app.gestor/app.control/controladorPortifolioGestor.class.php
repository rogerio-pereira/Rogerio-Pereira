<?php

/*
 * Classe controladorPortifolioGestor
 */
class controladorPortifolioGestor extends controladorUpload
{
	/*
	 * Variaveis
	 */
	private $nome;
	private $link;
	private $descricao;
	private $utilizado;
	private $results;
	private $portifolio;
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function setLink($link)
	{
		$this->link = $link;
	}
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	public function setUtilizado($utilizado)
	{
		$this->utilizado = $utilizado;
	}
	

	/*
	 * M�todo construtor
	 */
	public function __construct()
	{
		$this->nome		= NULL;
		$this->link		= NULL;
		$this->descricao	= NULL;
		$this->results		= NULL;
		$this->portifolio	= NULL;
	}
	
	/*
	 * M�todo cadastraPortifolio
	 * Inicia processo de cadastro de Portif�lio
	 */
	public function cadastraPortifolio()
	{
		if($this->insertPortifolio())
		{
			$this->setSubdiretorio('portifolio');
			$this->setCodigo($this->getLastID());
			
			if($this->uploadImagem())
			{
				if($this->redimensionaImagem(450))
				{
					echo
					"
						<script>
							alert('Cadastro de Portif�lio concluido com �xito!');
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
					alert('Erro ao cadastrar Portif�lio');
					top.location='../?class=home';
				</script>
			";
			return false;
		}
	}
	
	/*
	 * M�todo insertPortifolio
	 * Cadastra Portifolio
	 */
	private function insertPortifolio()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('portifolio');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',		NULL);
			$sql->setRowData('nome',		$this->nome);
			$sql->setRowData('link',			$this->link);
			$sql->setRowData('descricao',	$this->descricao);
			$sql->setRowData('utilizado',		$this->utilizado);

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

		$sql->setEntity('portifolio');
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
	 *	M�todo getPortifolio
	 *	Recupera o portifolio cadastrado no banco
	 */
	public function getPortifolio()
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->setProperty('order', 'nome ASC');

		// instancia a instru��o de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('*');

		$sql->setEntity('portifolio');

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
	 *	M�todo getPortifolioID
	 *	Recupera o portifolio de acordo com o id
	 */
	public function getPortifolioID($id)
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

		   $sql->setEntity('portifolio');

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

		   $this->portifolio	= $this->results[0];
		   return $this->portifolio;
	}
	
	/*
	 * M�todo alteraPortifolios
	 * Inicia Processo de cadastro de rede social
	 */
	public function alteraPortifolio()
	{
		if($this->updatePortifolio())
		{
			$this->setSubdiretorio('portifolio');
			
			if($this->uploadImagem())
			{
				if($this->redimensionaImagem(450))
				{
					echo
					"
						<script>
							alert('Altera��o de Portif�lio concluido com �xito!');
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
					alert('Erro ao alterar Portif�lio!');
				</script>
			";
			return false;
		}
	}
	
	/*
	 * M�todo updatePortifolio
	 * Atualizad Portifolio
	 */
	private function updatePortifolio()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('portifolio');

			//Cria um crit�rio de sele��o pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',		$this->nome);
			$sql->setRowData('link',			$this->link);
			$sql->setRowData('descricao',	$this->descricao);
			$sql->setRowData('utilizado',		$this->utilizado);

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
	 * M�todo excluiPortifolio
	 * Inicia Processo de exclus�o de Portif�lio
	 */
	public function excluiPortifolio()
	{
		if($this->deletePortifolio())
		{
			$this->setSubdiretorio('portifolio');
			$this->setExtensao('jpg');
			if($this->apagaImagem())
			{
				echo
				"
					<script>
						alert('Exclus�o de Portif�lio concluida com sucesso!');
					</script>
				";
				return true;
			}
			else
			{
				echo
				"
					<script>
						alert('Erro ao apagar imagens dos Portif�lios!');
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
						alert('Erro ao apagar Portif�lio!');
					</script>
				";
			return false;
		}
	}
	
	/*
	 * M�todo deletePortifolio
	 * Exclui os portifolios selecionadas
	 */
	private function deletePortifolio()
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
				$sql->setEntity('portifolio');

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