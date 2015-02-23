 //Cria mascaras
function adicionaMascaraTelefone()
{
	$.mask.definitions['~'] = '([0-9] )?';
	$("input.campoTelefone").mask("(99) ~9999 - 9999");
};

function validacaoEmailContato(field)
{
	usuario = field.value.substring(0, field.value.indexOf("@"));
	dominio = field.value.substring(field.value.indexOf("@")+ 1, field.value.length);
	if ( (usuario.length >=1) &&
			(dominio.length >=3) &&
			(usuario.search("@")==-1) &&
			(dominio.search("@")==-1) &&
			(usuario.search(" ")==-1) &&
			(dominio.search(" ")==-1) &&
			(dominio.search(".")!=-1) &&
			(dominio.indexOf(".") >=1)&&
			(dominio.lastIndexOf(".") < dominio.length - 1) )
		return true;
	else
		return false
}

function validaCamposContato()
{
	//Campo Nome
	if (document.contato.txtNome.value=='')
	{
		alert( "Preencha campo Nome corretamente!" );
		document.contato.txtNome.focus();
		return false;
	}
	//Email
	if (!validacaoEmailContato(document.contato.txtEmail))
	{
		alert( "Preencha campo E-mail corretamente!" );
		document.contato.txtEmail.focus();
		return false;
	}
	//Telefone
	if (document.contato.txtTelefone.value=='')
	{
		alert( "Preencha campo Telefone corretamente!" );
		document.contato.txtTelefone.focus();
		return false;
	}
	//Cidade
	if (document.contato.txtCidade.value=='')
	{
		alert( "Preencha campo Cidade corretamente!" );
		document.contato.txtCidade.focus();
		return false;
	}
	//Assunto
	if (document.contato.txtAssunto.value=='')
	{
		alert( "Preencha campo Assunto corretamente!" );
		document.contato.txtAssunto.focus();
		return false;
	}
	//Mensagem
	if (document.contato.txtMensagem.value=='')
	{
		alert( "Preencha campo Mensagem corretamente!" );
		document.contato.txtMensagem.focus();
		return false;
	}
	
	return true;
}