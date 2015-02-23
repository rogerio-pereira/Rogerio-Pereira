<?php

/*
 * Classe controladorLogin
 */
class controladorLogin {
	/*
	 * Variaveis
	 */
	private $usuario;
	private $usuarioBD;
	private $senha;
	private $senhaBD;
	private $nome;
	private $results;

	/*
	 * Método construtor
	 */

	public function __construct() 
	{
		$this->usuario		= NULL;
		$this->usuarioBD	= NULL;
		$this->senha		= NULL;
		$this->senhaBD	= NULL;
		$this->nome		= NULL;
		$this->result		= NULL;
	}
	
	/*
	 * Método login
	 * Realiza o login e retorna o nome de usuario
	 */
	public function login($usuario, $senha)
	{
		$this->usuario = $usuario;
		$this->senha	= md5('F4r0f4'.$senha.'P3r3!r4');
		
		$this->getUsuario();
		
		if($this->results[0])
		{
			$this->usuarioBD	= $this->results[0]->usuario;
			$this->senhaBD	= $this->results[0]->senha;
			$this->nome		= $this->results[0]->nome;

			if($this->compara())
			{
				$_SESSION['nome']		= $this->results[0]->nome;
				$_SESSION['usuario']	= $this->results[0]->usuario;
				
				return true;
			}
			else 
				return false;
		
		}
		else
			return false;
	}
	
	/*
	 * Método getUsuario
	 * Obtem o usuario do banco de dados
	 */
	private function getUsuario()
	{
		try
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->add(new TFilter(' usuario ',' = ', "{$this->usuario}"));

			// instancia a instrução de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn("usuario");
			$sql->addColumn("senha");
			$sql->addColumn("nome");

			$sql->setEntity('usuario');
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
		}
		catch (Exception $e)
		{
			$this->results = NULL;
		}
	}
	
	 /*
         *  Método compara
         *  Compara usuario e senha com usuario e senha do Banco de Dados
         */
        private function compara()
        {	
            if  (
                    ($this->usuario == $this->usuarioBD) &&
                    ($this->senha   == $this->senhaBD)
                )
                return true;
            else
                return false;
        }
}

?>