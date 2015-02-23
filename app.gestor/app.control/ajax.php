<?php 
    session_start();
    header("Content-Type:text/html; charset=ISO-8859-1",true)
?>

<?php
    //Autoload
    function __autoload($classe)
    {
        $pastas = array('../app.widgets', '../app.ado', '../app.config', '../app.model', '../app.control','../app.view');
        foreach ($pastas as $pasta)
        {
            if (file_exists("{$pasta}/{$classe}.class.php"))
            {
                include_once "{$pasta}/{$classe}.class.php";
            }
        }
    }
	
	//Obtem informação do que sera feito através do campo hiddens
	$request = $_POST['action'];
	
	
	/*
	 *  Login
	 */
	if($request == 'login')
	{
		$usuario            = $_POST['txtLogin'];
		$senha              = $_POST['txtSenha'];

		$control            = new controladorLogin;
		
		if($control->login($usuario, $senha))
		{
			if($_SESSION['nome'] != '')
				echo
					"
						<script>
							top.location='../?class=home';
						</script>
					";
		}
		else
		{
			session_destroy();
			echo
				"
					<script>
						alert('Usuario ou senha inválidos!');
						history.go(-1); 
					</script>
				";
		}
	}
	
	
	/*
	 * Cadastro de Usuário
	 */
	if($request == 'cadastroUsuario')
	{
		$nome		= $_POST['txtNome'];
		$usuario          = $_POST['txtUsuario'];
		$senha		= $_POST['txtSenha'];
		
		$control            = new controladorUsuario;
		$control->setNome($nome);
		$control->setUsuario($usuario);
		$control->setSenha($senha);
		
		if($control->insertUsuario())
		{
			echo
				"
					<script>
						alert('Usuario cadastrado com sucesso!');
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao cadastrar usuário');
						history.go(-1); 
					</script>
				";
		}
	}
		
	/*
	 * Alteração de Senha
	 */
	if($request == 'alteraSenha')
	{
		$senha		= $_POST['txtSenha'];
		$novaSenha	= $_POST['txtNova'];
		
		$control            = new controladorUsuario;
		$control->setSenha($senha);
		$control->setNovaSenha($novaSenha);
		
		if($control->comparaSenha())
		{
			if($control->alteraSenha())
			{
				echo
					"
						<script>
							alert('Senha alterada com sucesso!');
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao alterar a Senha');
							history.go(-1); 
						</script>
					";
			}
		}
		else
		{
			echo
				"
					<script>
						alert('Senha inválida');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Alteração Web Developer
	 */
	if($request == 'alteraWeb')
	{
		$conteudo		= $_POST['txtConteudo'];
		
		$control            = new controladorWeb;
		$control->setConteudo($conteudo);
		
		if($control->updateConteudo())
		{
			echo
					"
						<script>
							alert('Conteúdo WebDeveloper Alterado com Sucesso!');
							top.location='../?class=home';
						</script>
					";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao alterar conteúdo WebDeveloper');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Alteração Técnico de Informática
	 */
	if($request == 'alteraTecnico')
	{
		$conteudo		= $_POST['txtConteudo'];
		
		$control            = new controladorTecnico;
		$control->setConteudo($conteudo);
		
		if($control->updateConteudo())
		{
			echo
					"
						<script>
							alert('Conteúdo Técnico de Informática alterado com sucesso!');
							top.location='../?class=home';
						</script>
					";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao alterar conteúdo Técnico de Informática');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Alteração Desenvolvedor Java
	 */
	if($request == 'alteraJava')
	{
		$conteudo		= $_POST['txtConteudo'];
		
		$control            = new controladorJava;
		$control->setConteudo($conteudo);
		
		if($control->updateConteudo())
		{
			echo
					"
						<script>
							alert('Conteúdo Desenvolvedor Java alterado com sucesso!');
							top.location='../?class=home';
						</script>
					";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao alterar conteúdo Desenvolvedor Java');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Alteração Curriculum
	 */
	if($request == 'alteraCurriculum')
	{
		$nome					= $_POST['txtNome'];
		$nascimento				= $_POST['txtNascimento'];
		$estadoCivil				= $_POST['txtEstadoCivil'];
		if (isset($_POST['fumante']))
			$fumante				= true;
		else
			$fumante				= false;
		$complementoEstadoCivil	= $_POST['txtComplementoEstadoCivil'];
		$endereco				= $_POST['txtEndereco'];
		$numero					= $_POST['txtEnderecoNumero'];
		$bairro					= $_POST['txtBairro'];
		$cidade					= $_POST['txtCidade'];
		$estado					= $_POST['txtEstado'];
		$cep						= $_POST['txtCep'];		
		$telefone					= $_POST['txtTelefone'];	
		$operadora				= $_POST['txtOperadora'];	
		if (isset($_POST['recado']))
			$recado				= true;
		else
			$recado				= false;
		$telefone2				= $_POST['txtTelefone2'];	
		$operadora2				= $_POST['txtOperadora2'];	
		if (isset($_POST['recado2']))
			$recado2				= true;
		else
			$recado2				= false;
		$email					= $_POST['txtEmail'];
		$objetivo					= $_POST['txtObjetivo'];
		$conhecimentos			= $_POST['txtConhecimento'];
		$perfil					= $_POST['txtPerfil'];
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$foto_temp	= $_FILES["txtImagem"]["tmp_name"];
			$foto_name	= $_FILES["txtImagem"]["name"];
			$foto_size	= $_FILES["txtImagem"]["size"];
			$foto_type	= $_FILES["txtImagem"]["type"];
		}
		
		
		$control					= new controladorCurriculumGestor;
		
		$control->setNome($nome);
		$control->setNascimento($nascimento);
		$control->setEstadoCivil($estadoCivil);
		$control->setFumante($fumante);
		$control->setComplementoEstadoCivil($complementoEstadoCivil);
		$control->setEndereco($endereco);
		$control->setNumero($numero);
		$control->setBairro($bairro);
		$control->setCidade($cidade);
		$control->setEstado($estado);
		$control->setCep($cep);
		$control->setTelefone($telefone);
		$control->setOperadora($operadora);
		$control->setRecado($recado);
		$control->setTelefone2($telefone2);
		$control->setOperadora2($operadora2);
		$control->setRecado2($recado2);
		$control->setEmail($email);
		$control->setObjetivo($objetivo);
		$control->setConhecimentos($conhecimentos);
		$control->setPerfil($perfil);
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$control->setFoto_temp($foto_temp);
			$control->setFoto_name($foto_name);
			$control->setFoto_size($foto_size);
			$control->setFoto_type($foto_type);
		}
		
		if($control->updateCurriculum())
		{
			echo
				"
					<script>
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Cadastro/Alteração Escolaridade
	 */
	if(($request == 'cadastraEscolaridade') || ($request == 'alteraEscolaridade2'))
	{
		if($request == 'alteraEscolaridade2')
			$codigo		= $_POST['codigo'];
		
		$curso			= $_POST['txtCurso'];
		$instituicao		= $_POST['txtInstituicao'];
		$cidade			= $_POST['txtCidade'];
		$estado			= $_POST['txtEstado'];
		
		if(isset($_POST['cursando']))
			$cursando	= true;
		else
			$cursando	= false;
		
		
		if(isset($_POST['txtPeriodo']))
			$periodo		= $_POST['txtPeriodo'];
		else
			$periodo		= '';
		
		
		if(isset($_POST['txtConcluido']))
			$concluido		= $_POST['txtConcluido'];
		else
			$concluido		= '';
		
		
		$control            = new controladorCurriculumGestor;
		
		if($request == 'alteraEscolaridade2')
			$control->setCodigo($codigo);
		
		$control->setEscolaridadeCurso($curso);
		$control->setEscolaridadeInstituicao($instituicao);
		$control->setEscolaridadeCidade($cidade);
		$control->setEscolaridadeEstado($estado);
		$control->setEscolaridadeCursando($cursando);
		if(isset($periodo))
			$control->setEscolaridadePeriodo($periodo);
		if(isset($concluido))
			$control->setEscolaridadeConcluido($concluido);
		
		if($request == 'cadastraEscolaridade')
		{
			if($control->cadastraEscolaridade())
			{
				echo
						"
							<script>
								alert('Cadastro de Escolariade concluido com êxito');
								top.location='../?class=home';
							</script>
						";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao cadastrar Escolaridade');
							history.go(-1); 
						</script>
					";
			}
		}
		else if($request == 'alteraEscolaridade2')
		{
			if($control->alteraEscolaridade())
			{
				echo
						"
							<script>
								alert('Escolariade alterada com êxito');
								top.location='../?class=home';
							</script>
						";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao alterar Escolaridade');
							history.go(-1); 
						</script>
					";
			}
		}
	}
	
	/*
	 * Seleciona Escolaridade
	 */
	if($request == 'alteraEscolaridade1')
	{
		$codigo		= $_POST['codigo'];
		
		echo
		"
			<script>
				top.location='../?class=alteraEscolaridade&id={$codigo}';
			</script>
		";
	}
	
	/*
	 * Exclui Escolaridade
	 */
	if($request == 'excluiEscolaridade')
	{
		$codigo		= $_POST['codigo'];
		
		$control            = new controladorCurriculumGestor;
		$control->setCollectionCodigo($codigo);
		
		if($control->excluiEscolaridade())
		{
			echo
					"
						<script>
							alert('Exclusão de escolaridade concluido com êxito');
							top.location='../?class=home';
						</script>
					";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao excluir Escolaridade');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Cadastra/Altera Curso
	 */
	if(($request == 'cadastraCurso') || ($request == 'alteraCurso2'))
	{
		if($request == 'alteraCurso2')
			$codigo		= $_POST['codigo'];
		
		$curso			= $_POST['txtCurso'];
		if(isset($_POST['txtDescricao']))
			$descricao	= $_POST['txtDescricao'];
		else
			$descricao	= '';
		$categoria		= $_POST['comboCategoria'];
		$instituicao		= $_POST['txtInstituicao'];
		$cidade			= $_POST['txtCidade'];
		$estado			= $_POST['txtEstado'];
		$duracao			= $_POST['txtDuracao'];
		
		$control			= new controladorCurriculumGestor;
		
		$control->setCodigo($codigo);
		$control->setCursoNome($curso);
		$control->setCursoDescricao($descricao);
		$control->setCursoCategoria($categoria);
		$control->setCursoInstituicao($instituicao);
		$control->setCursoCidade($cidade);
		$control->setCursoEstado($estado);
		$control->setCursoDuracao($duracao);
		
		if($request == 'cadastraCurso')
		{
			if($control->cadastraCurso())
			{
				echo
					"
						<script>
							alert('Cadastro de Curso concluido com êxito');
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao cadastrar Curso');
							history.go(-1); 
						</script>
					";
			}
		}
		else if($request == 'alteraCurso2')
		{
			if($control->alteraCurso())
			{
				echo
					"
						<script>
							alert('Alteração de Curso concluido com êxito');
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao alterar Curso');
							history.go(-1); 
						</script>
					";
			}
		}
	}
	
	/*
	 * Seleciona Curso
	 */
	if($request == 'alteraCurso1')
	{
		$codigo		= $_POST['codigo'];
		
		echo
		"
			<script>
				top.location='../?class=alteraCurso&id={$codigo}';
			</script>
		";
	}
	
	/*
	 * Exclui Curso
	 */
	if($request == 'excluiCurso')
	{
		$codigo		= $_POST['codigo'];
		
		$control            = new controladorCurriculumGestor;
		$control->setCollectionCodigo($codigo);
		
		if($control->excluiCursos())
		{
			echo
				"
					<script>
						alert('Exclusão de Cursos concluido com êxito');
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao excluir Cursos');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Cadastra/Altera Experiencia
	 */
	if(($request == 'cadastraExperiencia') || ($request == 'alteraExperiencia2'))
	{
		if($request == 'alteraExperiencia2')
			$codigo	= $_POST['codigo'];
		
		$cargo		= $_POST['txtCargo'];
		$empresa		= $_POST['txtEmpresa'];
		$cidade		= $_POST['txtCidade'];
		$estado		= $_POST['txtEstado'];
		$telefone		= $_POST['txtTelefone'];
		$entrada		= $_POST['txtEntrada'];
		if(isset($_POST['txtSaida']))
		{
			$saida	= $_POST['txtSaida'];
			$atual	= false;
		}
		else
		{
			$saida	= '';
			$atual	= true;
		}
		
		$control			= new controladorCurriculumGestor;
		
		if($request == 'alteraExperiencia2')
			$control->setCodigo ($codigo);
		
		$control->setExperienciaCargo($cargo);
		$control->setExperienciaEmpresa($empresa);
		$control->setExperienciaCidade($cidade);
		$control->setExperienciaEstado($estado);
		$control->setExperienciaTelefone($telefone);
		$control->setExperienciaEntrada($entrada);
		$control->setExperienciaAtual($atual);
		$control->setExperienciaSaida($saida);
		
		if($request == 'cadastraExperiencia')
		{
			if($control->cadastraExperiencia())
			{
				echo
					"
						<script>
							alert('Cadastro de Experiencia concluido com êxito');
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao cadastrar Experiencia');
							history.go(-1); 
						</script>
					";
			}
		}
		else if($request == 'alteraExperiencia2')
		{
			if($control->alteraExperiencia())
			{
				echo
					"
						<script>
							alert('Alteração de Experiencia concluido com êxito');
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							alert('Erro ao alterar Experiencia');
							history.go(-1); 
						</script>
					";
			}
		}
	}
	
	/*
	 * Seleciona Experiencia
	 */
	if($request == 'alteraExperiencia1')
	{
		$codigo		= $_POST['codigo'];
		
		echo
		"
			<script>
				top.location='../?class=alteraExperiencia&id={$codigo}';
			</script>
		";
	}
	
	/*
	 * Exclui Experiencia
	 */
	if($request == 'excluiExperiencia')
	{
		$codigo		= $_POST['codigo'];
		
		$control            = new controladorCurriculumGestor;
		$control->setCollectionCodigo($codigo);
		
		if($control->excluiExperiencia())
		{
			echo
				"
					<script>
						alert('Exclusão de Experiencia concluido com êxito');
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						alert('Erro ao excluir Experiencia');
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Cadastra/Altera Redes Sociais
	 */
	if(($request == 'cadastraSocial') || ($request == 'alteraSocial2'))
	{
		if($request == 'alteraSocial2')
			$codigo	= $_POST['codigo'];
		
		$nome 		= $_POST['txtNome'];
		$link			= $_POST['txtLink'];
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$foto_temp	= $_FILES["txtImagem"]["tmp_name"];
			$foto_name	= $_FILES["txtImagem"]["name"];
			$foto_size	= $_FILES["txtImagem"]["size"];
			$foto_type	= $_FILES["txtImagem"]["type"];
		}
		
		$control			= new controladorSocialGestor;
		
		if($request == 'alteraSocial2')
			$control->setCodigo ($codigo);
		
		$control->setNome($nome);
		$control->setLink($link);
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$control->setFoto_temp($foto_temp);
			$control->setFoto_name($foto_name);
			$control->setFoto_size($foto_size);
			$control->setFoto_type($foto_type);
		}
		
		if($request == 'cadastraSocial')
		{
			if($control->cadastraSocial())
			{
				echo
					"
						<script>
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							history.go(-1); 
						</script>
					";
			}
		}
		else if($request == 'alteraSocial2')
		{
			if($control->alteraSocial())
			{
				echo
					"
						<script>
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							history.go(-1); 
						</script>
					";
			}
		}
	}
	
	/*
	 * Seleciona Experiencia
	 */
	if($request == 'alteraSocial1')
	{
		$codigo		= $_POST['codigo'];
		
		echo
		"
			<script>
				top.location='../?class=alteraSocial&id={$codigo}';
			</script>
		";
	}
	
	/*
	 * Exclui Social
	 */
	if($request == 'excluiSocial')
	{
		$codigo		= $_POST['codigo'];
		
		$control            = new controladorSocialGestor;
		$control->setCollectionCodigo($codigo);
		
		if($control->excluiSocial())
		{
			echo
				"
					<script>
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						history.go(-1); 
					</script>
				";
		}
	}
	
	/*
	 * Cadastra/Altera Portifólio
	 */
	if(($request == 'cadastraPortifolio') || ($request == 'alteraPortifolio2'))
	{
		if($request == 'alteraPortifolio2')
			$codigo	= $_POST['codigo'];
		
		$nome 		= $_POST['txtNome'];
		$link			= $_POST['txtLink'];
		$descricao	= $_POST['txtDescricao'];
		$utilizado		= $_POST['txtUtilizado'];
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$foto_temp	= $_FILES["txtImagem"]["tmp_name"];
			$foto_name	= $_FILES["txtImagem"]["name"];
			$foto_size	= $_FILES["txtImagem"]["size"];
			$foto_type	= $_FILES["txtImagem"]["type"];
		}
		
		$control			= new controladorPortifolioGestor;
		
		if($request == 'alteraPortifolio2')
			$control->setCodigo ($codigo);
		
		$control->setNome($nome);
		$control->setLink($link);
		$control->setDescricao($descricao);
		$control->setUtilizado($utilizado);
		
		if(isset($_FILES["txtImagem"]["tmp_name"]))
		{
			$control->setFoto_temp($foto_temp);
			$control->setFoto_name($foto_name);
			$control->setFoto_size($foto_size);
			$control->setFoto_type($foto_type);
		}
		
		if($request == 'cadastraPortifolio')
		{
			if($control->cadastraPortifolio())
			{
				echo
					"
						<script>
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							history.go(-1); 
						</script>
					";
			}
		}
		else if($request == 'alteraPortifolio2')
		{
			if($control->alteraPortifolio())
			{
				echo
					"
						<script>
							top.location='../?class=home';
						</script>
					";
			}
			else
			{
				echo
					"
						<script>
							history.go(-1); 
						</script>
					";
			}
		}
	}
	
	/*
	 * Seleciona Postifolio
	 */
	if($request == 'alteraPortifolio1')
	{
		$codigo		= $_POST['codigo'];
		
		echo
		"
			<script>
				top.location='../?class=alteraPortifolio&id={$codigo}';
			</script>
		";
	}
	
	/*
	 * Exclui Portifólio
	 */
	if($request == 'excluiPortifolio')
	{
		$codigo		= $_POST['codigo'];
		
		$control            = new controladorPortifolioGestor;
		$control->setCollectionCodigo($codigo);
		
		if($control->excluiPortifolio())
		{
			echo
				"
					<script>
						top.location='../?class=home';
					</script>
				";
		}
		else
		{
			echo
				"
					<script>
						history.go(-1); 
					</script>
				";
		}
	}
?>