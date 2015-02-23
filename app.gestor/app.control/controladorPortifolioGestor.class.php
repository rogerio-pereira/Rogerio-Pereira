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
	 * Método construtor
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
	 * Método cadastraPortifolio
	 * Inicia processo de cadastro de Portifólio
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
							alert('Cadastro de Portifólio concluido com êxito!');
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
					alert('Erro ao cadastrar Portifólio');
					top.location='../?class=home';
				</script>
			";
			return false;
		}
	}
	
	/*
	 * Método insertPortifolio
	 * Cadastra Portifolio
	 */
	private function insertPortifolio()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('portifolio');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',		NULL);
			$sql->setRowData('nome',		$this->nome);
			$sql->setRowData('link',			$this->link);
			$sql->setRowData('descricao',	$this->descricao);
			$sql->setRowData('utilizado',		$this->utilizado);

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

		$sql->setEntity('portifolio');
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
	 *	Método getPortifolio
	 *	Recupera o portifolio cadastrado no banco
	 */
	public function getPortifolio()
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		$criteria->setProperty('order', 'nome ASC');

		// instancia a instrução de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('*');

		$sql->setEntity('portifolio');

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
	 *	Método getPortifolioID
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

		   // instancia a instrução de SELECT
		   $sql = new TSqlSelect;
		   $sql->addColumn('*');

		   $sql->setEntity('portifolio');

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

		   $this->portifolio	= $this->results[0];
		   return $this->portifolio;
	}
	
	/*
	 * Método alteraPortifolios
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
							alert('Alteração de Portifólio concluido com êxito!');
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
					alert('Erro ao alterar Portifólio!');
				</script>
			";
			return false;
		}
	}
	
	/*
	 * Método updatePortifolio
	 * Atualizad Portifolio
	 */
	private function updatePortifolio()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('portifolio');

			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',		$this->nome);
			$sql->setRowData('link',			$this->link);
			$sql->setRowData('descricao',	$this->descricao);
			$sql->setRowData('utilizado',		$this->utilizado);

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
	 * Método excluiPortifolio
	 * Inicia Processo de exclusão de Portifólio
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
						alert('Exclusão de Portifólio concluida com sucesso!');
					</script>
				";
				return true;
			}
			else
			{
				echo
				"
					<script>
						alert('Erro ao apagar imagens dos Portifólios!');
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
						alert('Erro ao apagar Portifólio!');
					</script>
				";
			return false;
		}
	}
	
	/*
	 * Método deletePortifolio
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

				// instancia a instrução de SELECT
				$sql = new TSqlDelete;
				$sql->setEntity('portifolio');

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