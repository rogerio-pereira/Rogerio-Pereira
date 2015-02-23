<?php

/*
 * Classe controladorTecnico
 */
class controladorTecnico
{
	/*
	 * Variaveis
	 */
	private $results;
	private $conteudo;
	
	public function setConteudo($conteudo)
	{
		$this->conteudo = $conteudo;
	}
	
	/*
	 * M�todo contrutor
	 */
	public function __construct()
	{
		$this->results		= NULL;
		$this->conteudo	= NULL;
	}

	/*
	 * M�todo getConteudo
	 * Obtem o conteudo cadastrado no site
	 */
	public function getConteudo() 
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->setProperty('order', 'nome ASC');

		// instancia a instru��o de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('conteudo');

		$sql->setEntity('tecnicoinformatica');

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

		$this->conteudo = $this->results[0]->conteudo;
		return $this->conteudo;
	}
	
	/*
	 * M�todo updateConteudo
	 * Inicia procedimento de altera��o do conteudo
	 */
	public function updateConteudo()
	{
		if($this->update())
			return true;
		else
			return false;
	}
	
	/*
	 *M�todo Update
	 * Atualiza o banco de dados 
	 */
	private function update()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('tecnicoinformatica');

			//Cria um crit�rio de sele��o pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', 1));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('conteudo',  $this->conteudo);

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
}
?>