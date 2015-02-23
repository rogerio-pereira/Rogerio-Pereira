<?php

	/*
	 *	Classe controladorCurriculum
	 *	Controla os curriculumns
	 */
	class controladorCurriculum
	{
		/*
		 *	Variaveis
		 */
		private $curriculum;
		private $collectionExperiencia;
		private $collectionCursos;
		private $collectionEscolariade;
		
		/*
		 *	Método construtor
		 */
		public function __construct()
		{
			$this->curriculum 			= NULL;
			$this->collectionExperiencia 	= NULL;
			$this->conllectionCursos		= NULL;
			$this->collectionEscolariade	= NULL;
		}
		
		/*
		 *	Método getCurriculum
		 *	Obtem o curriculum no banco de dados
		 */
		public function getCurriculum()
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');
            
			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			//$criteria->setProperty('order', 'nome ASC');

			// instancia a instrução de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn('*');

			$sql->setEntity('curriculum');

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

			$this->curriculum	= $this->results[0];
			return $this->curriculum;
		}
		
		/*
		 *	Método getExperiencia
		 *	Obtem a experiência do curriculum
		 */
		public function getExperiencia()
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');
            
			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->setProperty('order', 'entrada DESC');

			// instancia a instrução de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn('*');

			$sql->setEntity('curriculumexperiencia');

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

			$this->collectionExperiencia	= $this->results;
			return $this->collectionExperiencia;
		}
		
		/*
		 *	Método getCursos
		 *	Obtem os cursos do curriculum
		 */
		public function getCursos()
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');
            
			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->setProperty('order', 'categoria ASC');

			// instancia a instrução de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn('*');

			$sql->setEntity('currriculumcursos');

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

			$this->collectionCursos	= $this->results;
			return $this->collectionCursos;
		}
		
		/*
		 * Método getEscolaridade
		 * Obtem a escolaridade
		 */
		public function getEscolaridade()
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction::open('my_bd_site');
            
			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->setProperty('order', 'codigo DESC');

			// instancia a instrução de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn('*');

			$sql->setEntity('curriculumescolaridade');

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

			$this->collectionEscolariade	= $this->results;
			return $this->collectionEscolariade;
		}
		
		
		/*
		 * Método converteData
		 * Converte uma data Sql par Brasileiro
		 * Converte data Brasileiro para sql
		 * @param $data = Data a ser convertida
		 */
		public function converteData($data)
		{
			$array		= array();
			$convertido	= NULL;

			//Data no formato Brasileiro
			if(strstr($data, '/'))
			{
				$array      = explode('/', $data);
				$convertido    = $array[2] . '-' . $array[1] . '-' . $array[0];
			}
			//Data SQL
			if(strstr($data, '-'))
			{
				$array      = explode('-', $data);
				$convertido    = $array[2] . '/' . $array[1] . '/' . $array[0];
			}
			return $convertido;
		}
		
		/*
		 * Método calculaIdade
		 * Calcula quantos anos a pessoa tem
		 * @param $data = Data a ser convertida
		 */
		public function calculaIdade($data)
		{
			$dataAtual = date('d/m/Y');
			
			//Se a data for em SQL, converte
			if(strstr($data, '-'))
				$data = $this->converteData($data);
			
			//Explode as datas
			$data		= explode('/', $data);
			$dataAtual 	= explode('/', $dataAtual);
			
			//Calcula Idade
			$idade		= $dataAtual[2] - $data[2];
			
			//Confere meses
			if(($dataAtual[1] - $data[1]) < 0)
				$idade--;
				
			return $idade;
		}
		
		/*
		 * Método calculaPeriodo
		 * Calcula o periodo de acordo com duas datas
		 * @param dataInicial	= Data Inicial do periodo
		 * @param dataFinal	= Data Final do periodo
		 */
		public function calculaPeriodo($dataInicial, $dataFinal)
		{
			$anos;
			$meses;
			$dias;
			$retorno;
			
			//Se a data for em SQL, converte
			if(strstr($dataInicial, '-'))
				$dataInicial = $this->converteData($dataInicial);
			//Se a data for em SQL, converte
			if(strstr($dataFinal, '-'))
				$dataFinal = $this->converteData($dataFinal);
			
			//Explode datas
			$dataInicial	= explode('/', $dataInicial);
			$dataFinal 	= explode('/', $dataFinal);
			
			//Calcula diferença
			$anos	= $dataFinal[2] - $dataInicial[2];
			$meses	= $dataFinal[1] - $dataInicial[1];
			$dias	= $dataFinal[0] - $dataInicial[0];
			
			if($anos > 0)
				$retorno .= $anos.' Anos';
			if($meses > 0)
			{
				if(($anos > 0) && ($meses > 0))
					$retorno .= ', '.$meses.' Meses';
				else if(($anos > 0) && ($meses <= 0))
					$retorno .= ' e '.$meses.' Meses';
				else
					$retorno .= ' '.$meses.' Meses';
			}
			if($dias > 0)
			{
				if(($anos > 0) || ($meses > 0))
					$retorno .= ' e '.$dias.' Dias';
				else
					$retorno .= ' '.$dias.' Dias';
			}
			
			return $retorno;
		}
	}
?>