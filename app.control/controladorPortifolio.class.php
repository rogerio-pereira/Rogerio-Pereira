<?php

	/*
	 *	Classe controladorPortifolio
	 *	Controla a classe portifolio
	 */
	class controladorPortifolio
	{
		/*
		 *	Variaveis
		 */
		private $results;
		
		/*
		 *	M�todo contrudor
		 *	Zera a variavel results
		 */
		public function __construct()
		{
			$this->results = NULL;
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
	}
?>