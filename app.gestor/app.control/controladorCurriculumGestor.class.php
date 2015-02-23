<?php

/*
 * Classe controladorCurriculumGestor
 */
class controladorCurriculumGestor extends controladorUpload
{
	/*
	 *	Variaveis
	 */
	private $curriculum;
	private $collectionExperiencia;
	private $collectionCursos;
	private $collectionEscolariade;
	private $escolaridade;
	private $curso;
	private $experiencia;

	private $nome;
	private $nascimento;
	private $estadoCivil;
	private $fumante;
	private $complementoEstadoCivil;
	private $endereco;
	private $numero;
	private $bairro;
	private $cidade;
	private $estado;
	private $cep;		
	private $telefone;	
	private $operadora;	
	private $recado;	
	private $telefone2;	
	private $operadora2;	
	private $recado2;
	private $email;
	private $objetivo;
	private $conhecimentos;
	private $perfil;
	
	private $escolaridadeCurso;
	private $escolaridadeInstituicao;
	private $escolaridadeCidade;
	private $escolaridadeEstado;	
	private $escolaridadeCursando;
	private $escolaridadePeriodo;
	private $escolaridadeConcluido;
	
	private $cursoNome;
	private $cursoDescricao;
	private $cursoCategoria;
	private $cursoInstituicao;
	private $cursoCidade;
	private $cursoEstado;
	private $cursoDuracao;
	
	private $experienciaCargo;
	private $experienciaEmpresa;
	private $experienciaCidade;
	private $experienciaEstado;
	private $experienciaTelefone;
	private $experienciaEntrada;
	private $experienciaAtual;
	private $experienciaSaida;
	
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}
	
	public function setCollectionCodigo($collectionCodigo)
	{
		$this->collectionCodigo = $collectionCodigo;
	}
	
	
	public function setNome($nome)
	{
		$this->nome = $nome;
	}
	public function setNascimento($nascimento)
	{
		$this->nascimento = $this->converteData($nascimento);
	}
	public function setEstadoCivil($estadoCivil)
	{
		$this->estadoCivil = $estadoCivil;
	}
	public function setFumante($fumante)
	{
		$this->fumante = $fumante;
	}
	public function setComplementoEstadoCivil($complementoEstadoCivil)
	{
		$this->complementoEstadoCivil = $complementoEstadoCivil;
	}
	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}
	public function setNumero($numero)
	{
		$this->numero = $numero;
	}
	public function setBairro($bairro)
	{
		$this->bairro = $bairro;
	}
	public function setCidade($cidade)
	{
		$this->cidade = $cidade;
	}
	public function setEstado($estado)
	{
		$this->estado = $estado;
	}
	public function setCep($cep)
	{
		$this->cep = $cep;
	}
	public function setTelefone($telefone)
	{
		$this->telefone = $telefone;
	}
	public function setOperadora($operadora)
	{
		$this->operadora = $operadora;
	}
	public function setRecado($recado)
	{
		$this->recado = $recado;
	}
	public function setTelefone2($telefone2)
	{
		$this->telefone2 = $telefone2;
	}
	public function setOperadora2($operadora2)
	{
		$this->operadora2 = $operadora2;
	}
	public function setRecado2($recado2)
	{
		$this->recado2 = $recado2;
	}
	public function setEmail($email)
	{
		$this->email = $email;
	}
	public function setObjetivo($objetivo)
	{
		$this->objetivo = $objetivo;
	}
	public function setConhecimentos($conhecimentos)
	{
		$this->conhecimentos = $conhecimentos;
	}
	public function setPerfil($perfil)
	{
		$this->perfil = $perfil;
	}
	
	public function setEscolaridadeCurso($escolaridadeCurso)
	{
		$this->escolaridadeCurso = $escolaridadeCurso;
	}
	public function setEscolaridadeInstituicao($escolaridadeInstituicao)
	{
		$this->escolaridadeInstituicao = $escolaridadeInstituicao;
	}
	public function setEscolaridadeCidade($escolaridadeCidade)
	{
		$this->escolaridadeCidade = $escolaridadeCidade;
	}
	public function setEscolaridadeEstado($escolaridadeEstado)
	{
		$this->escolaridadeEstado = $escolaridadeEstado;
	}
	public function setEscolaridadeCursando($escolaridadeCursando)
	{
		$this->escolaridadeCursando = $escolaridadeCursando;
	}
	public function setEscolaridadePeriodo($escolaridadePeriodo)
	{
		$this->escolaridadePeriodo = $escolaridadePeriodo;
	}
	public function setEscolaridadeConcluido($escolaridadeConcluido)
	{
		$this->escolaridadeConcluido = $escolaridadeConcluido;
	}
	
	public function setCursoNome($cursoNome)
	{
		$this->cursoNome = $cursoNome;
	}
	public function setCursoDescricao($cursoDescricao)
	{
		$this->cursoDescricao = $cursoDescricao;
	}
	public function setCursoCategoria($cursoCategoria)
	{
		$this->cursoCategoria = $cursoCategoria;
	}
	public function setCursoInstituicao($cursoInstituicao)
	{
		$this->cursoInstituicao = $cursoInstituicao;
	}
	public function setCursoCidade($cursoCidade)
	{
		$this->cursoCidade = $cursoCidade;
	}
	public function setCursoEstado($cursoEstado)
	{
		$this->cursoEstado = $cursoEstado;
	}
	public function setCursoDuracao($cursoDuracao)
	{
		$this->cursoDuracao = $cursoDuracao;
	}
	
	public function setExperienciaCargo($experienciaCargo)
	{
		$this->experienciaCargo = $experienciaCargo;
	}
	public function setExperienciaEmpresa($experienciaEmpresa)
	{
		$this->experienciaEmpresa = $experienciaEmpresa;
	}
	public function setExperienciaCidade($experienciaCidade)
	{
		$this->experienciaCidade = $experienciaCidade;
	}
	public function setExperienciaEstado($experienciaEstado)
	{
		$this->experienciaEstado = $experienciaEstado;
	}
	public function setExperienciaTelefone($experienciaTelefone)
	{
		$this->experienciaTelefone = $experienciaTelefone;
	}
	public function setExperienciaEntrada($experienciaEntrada)
	{
		$this->experienciaEntrada = $this->converteData($experienciaEntrada);
	}
	public function setExperienciaAtual($experienciaAtual)
	{
		$this->experienciaAtual = $experienciaAtual;
	}
	public function setExperienciaSaida($experienciaSaida)
	{
		$this->experienciaSaida = $this->converteData($experienciaSaida);
	}
	
		

	   /*
		*	Método construtor
		*/
	   public function __construct()
	   {
			$this->curriculum				= NULL;
			$this->collectionExperiencia		= NULL;
			$this->conllectionCursos			= NULL;
			$this->collectionEscolariade		= NULL;
			$this->escolaridade				= NULL;
			$this->curso					= NULL;
			$this->experiencia				= NULL;
			$this->codigo					= NULL;
			$this->collectionCodigo			= NULL;
			
			$this->nome					= NULL;
			$this->nascimento				= NULL;
			$this->estadoCivil				= NULL;
			$this->fumante				= NULL;
			$this->complementoEstadoCivil	= NULL;
			$this->endereco				= NULL;
			$this->numero					= NULL;
			$this->bairro					= NULL;
			$this->cidade					= NULL;
			$this->estado					= NULL;
			$this->cep					= NULL;
			$this->telefone				= NULL;
			$this->operadora				= NULL;
			$this->recado					= NULL;
			$this->telefone2				= NULL;
			$this->operadora2				= NULL;	
			$this->recado2				= NULL;
			$this->email					= NULL;
			$this->objetivo				= NULL;
			$this->conhecimentos			= NULL;
			$this->perfil					= NULL;
		   
			$this->escolaridadeCurso		= NULL;
			$this->escolaridadeInstituicao		= NULL;
			$this->escolaridadeCidade		= NULL;
			$this->escolaridadeEstado		= NULL;	
			$this->escolaridadeCursando		= NULL;
			$this->escolaridadePeriodo		= NULL;
			$this->escolaridadeConcluido		= NULL;
			
			$this->cursoNome				= NULL;
			$this->cursoDescricao			= NULL;
			$this->cursoCategoria			= NULL;
			$this->cursoInstituicao			= NULL;
			$this->cursoCidade				= NULL;
			$this->cursoEstado				= NULL;
			$this->cursoEstado				= NULL;
			
			$this->experienciaCargo			= NULL;
			$this->experienciaEmpresa		= NULL;
			$this->experienciaCidade		= NULL;
			$this->experienciaEstado		= NULL;
			$this->experienciaTelefone		= NULL;
			$this->experienciaEntrada		= NULL;
			$this->experienciaAtual			= NULL;
			$this->experienciaSaida			= NULL;
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
	    * Método getEscolaridade
	    * Obtem a escolaridade
	    */
	   public function getExperienciaId($id)
	   {
		   //RECUPERA CONEXAO BANCO DE DADOS
		   TTransaction::open('my_bd_site');

		   //TABELA exposition_gallery
		   $criteria	= new TCriteria;
		   $criteria->add(new TFilter('codigo', '=', $id));
		   $criteria->setProperty('order', 'codigo DESC');

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

		   $this->experiencia	= $this->results[0];
		   return $this->experiencia;
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
	   public function getCursoId($id)
	   {
		   //RECUPERA CONEXAO BANCO DE DADOS
		   TTransaction::open('my_bd_site');

		   //TABELA exposition_gallery
		   $criteria	= new TCriteria;
		   $criteria->add(new TFilter('codigo', '=', $id));
		   $criteria->setProperty('order', 'codigo DESC');

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

		   $this->curso	= $this->results[0];
		   return $this->curso;
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
		* Método getEscolaridade
		* Obtem a escolaridade
		*/
	   public function getEscolaridadeId($id)
	   {
		   //RECUPERA CONEXAO BANCO DE DADOS
		   TTransaction::open('my_bd_site');

		   //TABELA exposition_gallery
		   $criteria	= new TCriteria;
		   $criteria->add(new TFilter('codigo', '=', $id));
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

		   $this->escolaridade	= $this->results[0];
		   return $this->escolaridade;
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
	 * Método updateCurriculum
	 * Incia Procedimento de atualização do Curriculum
	 */
	public function updateCurriculum()
	{
		if($this->atualizaCurriculum())
		{
			$this->setSubdiretorio('curriculum');
			$this->setCodigo(1);
			if($this->uploadImagem())
			{
				if($this->redimensionaImagem(568))
				{
					echo
					"
						<script>
							alert('Curriculum alterado com sucesso!');
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
					alert('Erro ao fazer upload da imagem!');
				</script>
			";
			return false;
		}
	}

	/*
	 * Método atualizaCurriculum
	 * Atualiza o curriculum no banco de dados
	 */
	private function atualizaCurriculum()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('curriculum');

			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', 1));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',					$this->nome);
			$sql->setRowData('nascimento',				$this->nascimento);
			$sql->setRowData('estadocivil',				$this->estadoCivil);
			$sql->setRowData('fumante',					$this->fumante);
			$sql->setRowData('complementoEstadoCivil',	$this->complementoEstadoCivil);
			$sql->setRowData('endereco',				$this->endereco);
			$sql->setRowData('enderecoNumero',			$this->numero);
			$sql->setRowData('bairro',					$this->bairro);
			$sql->setRowData('cidade',					$this->cidade);
			$sql->setRowData('estado',					$this->estado);
			$sql->setRowData('cep',						$this->cep);
			$sql->setRowData('telefone',					$this->telefone);
			$sql->setRowData('operadora',				$this->operadora);
			$sql->setRowData('recado',					$this->recado);
			$sql->setRowData('telefone2',				$this->telefone2);
			$sql->setRowData('operadora2',				$this->operadora2);
			$sql->setRowData('recado2',					$this->recado2);
			$sql->setRowData('email',					$this->email);
			$sql->setRowData('objetivoProfissional',		$this->objetivo);
			$sql->setRowData('conhecimentosEspecificos',	$this->conhecimentos);
			$sql->setRowData('perfilProfissional',			$this->perfil);

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
	 * Método cadastraEscolaridade
	 * Inicia procedimento de cadastro de escolaridade
	 */
	public function cadastraEscolaridade()
	{
		if($this->insertEscolaridade())
			return true;
		else
			return false;
	}
	
	/*
	 * Método cadastraEscolaridade
	 * Cadastra Escolaridade
	 */
	private function insertEscolaridade()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('curriculumescolaridade');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',			NULL);
			$sql->setRowData('curso',			$this->escolaridadeCurso );
			$sql->setRowData('instituicao',		$this->escolaridadeInstituicao);
			$sql->setRowData('cidade',			$this->escolaridadeCidade);
			$sql->setRowData('estado',			$this->escolaridadeEstado);
			$sql->setRowData('cursando',		$this->escolaridadeCursando);
			$sql->setRowData('cursandoPeriodo',	$this->escolaridadePeriodo);
			$sql->setRowData('concluido',		$this->escolaridadeConcluido);

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
	 * Método alteraEscolaridade
	 * Inicia procedimento de cadastro de escolaridade
	 */
	public function alteraEscolaridade()
	{
		if($this->udapteEscolaridade())
			return true;
		else
			return false;
	}
	
	/*
	 * Método udapteEscolaridade
	 * Cadastra Escolaridade
	 */
	private function udapteEscolaridade()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('curriculumescolaridade');

			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('curso',			$this->escolaridadeCurso );
			$sql->setRowData('instituicao',		$this->escolaridadeInstituicao);
			$sql->setRowData('cidade',			$this->escolaridadeCidade);
			$sql->setRowData('estado',			$this->escolaridadeEstado);
			$sql->setRowData('cursando',		$this->escolaridadeCursando);
			$sql->setRowData('cursandoPeriodo',	$this->escolaridadePeriodo);
			$sql->setRowData('concluido',		$this->escolaridadeConcluido);

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
	 * Método excluiEscolaridade
	 * Inicia Processo de exclusão de Escolaridade
	 */
	public function excluiEscolaridade()
	{
		if($this->deleteEscolaridade())
			return true;
		else
			return false;
	}
	
	/*
	 * Método deleteEscolaridade
	 * Exclui as escolaridades selecionadas
	 */
	private function deleteEscolaridade()
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
				$sql->setEntity('curriculumescolaridade');

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
	
	/*
	 * Método cadastraCurso
	 * Inicia procedimento de cadastro de escolaridade
	 */
	public function cadastraCurso()
	{
		if($this->insertCurso())
			return true;
		else
			return false;
	}
	
	/*
	 * Método insertCurso
	 * Cadastra Curso
	 */
	private function insertCurso()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('currriculumcursos');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',		NULL);
			$sql->setRowData('nome',		$this->cursoNome );
			$sql->setRowData('descricao',	$this->cursoDescricao);
			$sql->setRowData('categoria',	$this->cursoCategoria);
			$sql->setRowData('instituicao',	$this->cursoInstituicao);
			$sql->setRowData('cidade',		$this->cursoCidade);
			$sql->setRowData('estado',		$this->cursoEstado);
			$sql->setRowData('duracao',		$this->cursoDuracao);

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
	 * Método alteraCurso
	 * Inicia procedimento de alteração de curso
	 */
	public function alteraCurso()
	{
		if($this->udapteCurso())
			return true;
		else
			return false;
	}
	
	/*
	 * Método udapteCurso
	 * Altera Curso
	 */
	private function udapteCurso()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('currriculumcursos');
			
			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('nome',		$this->cursoNome );
			$sql->setRowData('descricao',	$this->cursoDescricao);
			$sql->setRowData('categoria',	$this->cursoCategoria);
			$sql->setRowData('instituicao',	$this->cursoInstituicao);
			$sql->setRowData('cidade',		$this->cursoCidade);
			$sql->setRowData('estado',		$this->cursoEstado);
			$sql->setRowData('duracao',		$this->cursoDuracao);

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
	 * Método excluiCursos
	 * Inicia Processo de exclusão de Cursos
	 */
	public function excluiCursos()
	{
		if($this->deleteCurso())
			return true;
		else
			return false;
	}
	
	/*
	 * Método deleteCurso
	 * Exclui os cursos selecionadas
	 */
	private function deleteCurso()
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
				$sql->setEntity('currriculumcursos');

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
	
	/*
	 * Método cadastraExperiencia
	 * Inicia procedimento de cadastro de experiencia
	 */
	public function cadastraExperiencia()
	{
		if($this->insertExperiencia())
			return true;
		else
			return false;
	}
	
	/*
	 * Método insertExperiencia
	 * Cadastra experiencia
	 */
	private function insertExperiencia()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlInsert;
			//Define entidade
			$sql->setEntity('curriculumexperiencia');
			//Atribui o valor a cada coluna
			$sql->setRowData('codigo',			NULL);
			$sql->setRowData('cargo',			$this->experienciaCargo );
			$sql->setRowData('empresa',			$this->experienciaEmpresa );
			$sql->setRowData('cidade',			$this->experienciaCidade );
			$sql->setRowData('estado',			$this->experienciaEstado );
			$sql->setRowData('telefone',			$this->experienciaTelefone );
			$sql->setRowData('entrada',			$this->experienciaEntrada );
			$sql->setRowData('saida',			$this->experienciaSaida );
			$sql->setRowData('empregoAtual',		$this->experienciaAtual );

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
	 * Método alteraExperiencia
	 * Inicia procedimento de alteração de experiencia
	 */
	public function alteraExperiencia()
	{
		if($this->udapteExperiencia())
			return true;
		else
			return false;
	}
	
	/*
	 * Método udapteExperiencia
	 * Altera Experiencia
	 */
	private function udapteExperiencia()
	{
		try
		{
			//Inicia Transação com banco de dados
			TTransaction2::open('my_bd_site');

			//Cria instrução INSERT
			$sql = new TSqlUpdate;
			//Define entidade
			$sql->setEntity('curriculumexperiencia');
			
			//Cria um critério de seleção pelo ID
			$criteria = new TCriteria;
			$criteria->add(new TFilter('codigo', '=', $this->codigo));
			$sql->setCriteria($criteria);

			//Atribui o valor a cada coluna
			$sql->setRowData('cargo',			$this->experienciaCargo );
			$sql->setRowData('empresa',			$this->experienciaEmpresa );
			$sql->setRowData('cidade',			$this->experienciaCidade );
			$sql->setRowData('estado',			$this->experienciaEstado );
			$sql->setRowData('telefone',			$this->experienciaTelefone );
			$sql->setRowData('entrada',			$this->experienciaEntrada );
			$sql->setRowData('saida',			$this->experienciaSaida );
			$sql->setRowData('empregoAtual',		$this->experienciaAtual );

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
	 * Método excluiExperiencia
	 * Inicia Processo de exclusão de Experiencia
	 */
	public function excluiExperiencia()
	{
		if($this->deleteExperiencia())
			return true;
		else
			return false;
	}
	
	/*
	 * Método deleteExperiencia
	 * Exclui as experiencias selecionadas
	 */
	private function deleteExperiencia()
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
				$sql->setEntity('curriculumexperiencia');

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