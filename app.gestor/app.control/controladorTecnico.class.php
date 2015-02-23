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
	 * Mщtodo contrutor
	 */
	public function __construct()
	{
		$this->results		= NULL;
		$this->conteudo	= NULL;
	}

	/*
	 * Mщtodo getConteudo
	 * Obtem o conteudo cadastrado no site
	 */
	public function getConteudo() 
	{
		//RECUPERA CONEXAO BANCO DE DADOS
		TTransaction::open('my_bd_site');

		//TABELA exposition_gallery
		$criteria	= new TCriteria;
		//$criteria->setProperty('order', 'nome ASC');

		// instancia a instruчуo de SELECT
		$sql = new TSqlSelect;
		$sql->addColumn('conteudo');

		$sql->setEntity('tecnicoinformatica');

		//  atribui o critщrio passado como parтmetro
		$sql->setCriteria($criteria);

		// obtщm transaчуo ativa
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
	 * Mщtodo updateConteudo
	 * Inicia procedimento de alteraчуo do conteudo
	 */
	public function updateConteudo()
	{
		if($this->update())
			return true;
		else
			return false;
	}
	
	/*
	 *Mщtodo Update
	 * Atualiza o banco de dados 
	 */
	private function update()
	{
		try
		{
			//Inicia Transaчуo com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instruчуo INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('tecnicoinformatica');

			//Cria um critщrio de seleчуo pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', 1));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('conteudo',  $this->conteudo);

			//Obtem a conexуo ativa
			$conn   = TTransaction2::get();
			//Executa Instruчуo SQL
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