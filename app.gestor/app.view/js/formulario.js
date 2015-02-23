//Função para requisição ajax
function doPost(formName, actionName)
{
	var hiddenControl = document.getElementById('action');
	var theForm = document.getElementById(formName);

	hiddenControl.value = actionName;
}

//Valida os campos do Login
function validaCamposLogin()
{
	//Usuario
	if (document.login.txtLogin.value=='')
	{
		alert( "Preencha campo Usuario" );
		document.login.txtLogin.focus();
		return false;
	}
	//Senha
	if (document.login.txtSenha.value=='')
	{
		alert( "Preencha a Senha" );
		document.login.txtSenha.focus();
		return false;
	}

	doPost('login', 'login');

	return true;
}


//Valida os campos para Alterar a senha
function validaCamposAlteraSenha()
{
	//Senha
	if (document.alteraSenha.txtSenha.value=='')
	{
		alert( "Preencha a senha" );
		document.cadastroUsuario.txtSenha.focus();
		return false;
	}
	//Nova Senha
	if (document.alteraSenha.txtNova.value=='')
	{
		alert( "Preencha a senha nova" );
		document.cadastroUsuario.txtNova.focus();
		return false;
	}
	//Confirmacao
	if (document.alteraSenha.txtConfirmacao.value=='')
	{
		alert( "Preencha a confirmação da senha" );
		document.cadastroUsuario.txtConfirmacao.focus();
		return false;
	}
	//Senhas Nao batem
	if (document.alteraSenha.txtNova.value != document.alteraSenha.txtConfirmacao.value)
	{
		alert( "A senha e a confirmação nao batem" );
		document.cadastroUsuario.txtSenha.value = '';
		document.cadastroUsuario.txtConfirmacao.value = '';
		document.cadastroUsuario.txtSenha.focus();
		return false;
	}

	doPost('alteraSenha', 'alteraSenha');

	return true;
}

//Valida os campos para Cadastrar Usuario
function validaCamposCadastroUsuario()
{
	//Nome
	if (document.cadastroUsuario.txtNome.value=='')
	{
		alert( "Preencha o nome do  usuário" );
		document.cadastroUsuario.txtNome.focus();
		return false;
	}
	//Usuario
	if (document.cadastroUsuario.txtUsuario.value=='')
	{
		alert( "Preencha o usuário" );
		document.cadastroUsuario.txtUsuario.focus();
		return false;
	}
	//Senha
	if (document.cadastroUsuario.txtSenha.value=='')
	{
		alert( "Preencha a senha" );
		document.cadastroUsuario.txtSenha.focus();
		return false;
	}
	//Confirmacao
	if (document.cadastroUsuario.txtConfirmacao.value=='')
	{
		alert( "Preencha a confirmação da senha" );
		document.cadastroUsuario.txtConfirmacao.focus();
		return false;
	}
	//Senhas Nao batem
	if (document.cadastroUsuario.txtSenha.value != document.cadastroUsuario.txtConfirmacao.value)
	{
		alert( "A senha e a confirmação nao batem" );
		document.cadastroUsuario.txtSenha.value = '';
		document.cadastroUsuario.txtConfirmacao.value = '';
		document.cadastroUsuario.txtSenha.focus();
		return false;
	}

	doPost('cadastroUsuario', 'cadastroUsuario');

	return true;
}

//Adiciona Mascaras
function adicionaMascaras()
{
	$.mask.definitions['~'] = '([0-9] )?';
	$("input.campoTelefone").mask("(99) ~9999 - 9999");
	$("input.campoData").mask("99/99/9999");
	$("input.campoCEP").mask("99999-999");
	$("input.campoAno").mask("9999");
}

function habiltaCampoCadastroEscolaridade()
{
	if(document.cadastraEscolaridade.cursando.checked == true)
	{
		document.cadastraEscolaridade.txtPeriodo.value		= '';
		document.cadastraEscolaridade.txtConcluido.value	= '';
		
		document.cadastraEscolaridade.txtPeriodo.disabled	= false;
		document.cadastraEscolaridade.txtConcluido.disabled	= true;
		
		document.cadastraEscolaridade.txtPeriodo.focus();
	}
	else
	{
		document.cadastraEscolaridade.txtPeriodo.value		= '';
		document.cadastraEscolaridade.txtConcluido.value	= '';
		
		document.cadastraEscolaridade.txtPeriodo.disabled	= true;
		document.cadastraEscolaridade.txtConcluido.disabled	= false;
		
		document.cadastraEscolaridade.txtConcluido.focus();
	}
}

function habiltaCampoAlteraEscolaridade()
{
	if(document.alteraEscolaridade2.cursando.checked == true)
	{
		document.alteraEscolaridade2.txtPeriodo.value		= '';
		document.alteraEscolaridade2.txtConcluido.value		= '';
		
		document.alteraEscolaridade2.txtPeriodo.disabled		= false;
		document.alteraEscolaridade2.txtConcluido.disabled	= true;
		
		document.alteraEscolaridade2.txtPeriodo.focus();
	}
	else
	{
		document.alteraEscolaridade2.txtPeriodo.value		= '';
		document.alteraEscolaridade2.txtConcluido.value		= '';
		
		document.alteraEscolaridade2.txtPeriodo.disabled		= true;
		document.alteraEscolaridade2.txtConcluido.disabled	= false;
		
		document.alteraEscolaridade2.txtConcluido.focus();
	}
}

function habiltaCampoCadastroExperiencia()
{
	if(document.cadastraExperiencia.empregoAtual.checked == true)
	{
		document.cadastraExperiencia.txtSaida.value		= '';
		
		document.cadastraExperiencia.txtSaida.disabled		= true;
	}
	else
	{
		document.cadastraExperiencia.txtSaida.value		= '';
		
		document.cadastraExperiencia.txtSaida.disabled		= false;
		
		document.cadastraExperiencia.txtSaida.focus();
	}
}

function habiltaCampoAlteraExperiencia()
{
	if(document.alteraExperiencia2.empregoAtual.checked == true)
	{
		document.alteraExperiencia2.txtSaida.value		= '';
		
		document.alteraExperiencia2.txtSaida.disabled		= true;
	}
	else
	{
		document.alteraExperiencia2.txtSaida.value		= '';
		
		document.alteraExperiencia2.txtSaida.disabled		= false;
		
		document.alteraExperiencia2.txtSaida.focus();
	}
}