<?php

/*
 * Classe controladorUsuario
 */

class controladorUsuario {
	/*
	 * Variaveis
	 */
	private $nome;
	private $usuario;
	private $senha;
	private $novaSenha;
	private $results;
	
	public function setNome($nome) 
	{
		$this->nome = $nome;
	}

	public function setUsuario($usuario) 
	{
		$this->usuario = $usuario;
	}

	public function setSenha($senha) 
	{
		$this->senha = md5('F4r0f4'.$senha.'P3r3!r4');
	}
	
	public function setNovaSenha($novaSenha) {
		$this->novaSenha = md5('F4r0f4'.$novaSenha.'P3r3!r4');
	}

	
	
	/*
	 * M�todo construtor
	 */
	public function __construct() 
	{
		$this->nome		= NULL;
		$this->usuario		= NULL;
		$this->senha		= NULL;
		$this->novaSenha	= NULL;
		$this->results		= NULL;
	}
	
	/*
	 * M�todo insertUsuario
	 * Inicia o processo de Inser��o de Novo Usuario
	 */
	public function insertUsuario()
	{
		
		if($this->insert())
			return true;
		else
			return false;
	}
	
	private function insert()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');
                
			//Cria instru��o INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('usuario');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',     NULL);
			$sql->setRowData('nome',      $this->nome );
			$sql->setRowData('usuario',   $this->usuario );
			$sql->setRowData('senha',     $this->senha );

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
	 * M�todo comparaSenha
	 * Compara a senha atual e a senha informada
	 */
	public function comparaSenha()
	{
		try
		{
			//RECUPERA CONEXAO BANCO DE DADOS
			TTransaction2::open('my_bd_site');

			//TABELA exposition_gallery
			$criteria	= new TCriteria;
			$criteria->add(new TFilter(' usuario ',' = ', $_SESSION['usuario']));

			// instancia a instru��o de SELECT
			$sql = new TSqlSelect;
			$sql->addColumn("senha");

			$sql->setEntity('usuario');
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
			
			if($this->results[0]->senha == $this->senha)
				return true;
			else 
				return false;
		}
		catch (Exception $e)
		{
			return false;
		}
	}
	
	/*
	 * M�todo alteraSenha
	 * Inicia Processo de altera��o de senha
	 */
	public function alteraSenha()
	{
		if($this->updateSenha())
			return true;
		else
			return false;
	}
	
	/*
	 * M�todo Update Senha
	 * Atualiza a senha no banco de dados
	 */
	private function updateSenha()
	{
		try
		{
			//Inicia Transa��o com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instru��o INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('usuario');

			//Cria um crit�rio de sele��o pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter(' usuario ',' = ', $_SESSION['usuario']));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('senha',    $this->novaSenha);

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