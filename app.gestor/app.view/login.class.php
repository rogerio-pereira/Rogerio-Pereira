<?php

	/*
	 * Classe login
	 */
	class login 
	{
		/*
		 * Variaveis
		 */
		
		/*
		 * Método construtor
		 */
		public function __construct() 
		{
			
		}
		
		public function show()
		{
		?>
		<!DOCTYPE HTML>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
			<head>
				<title>
					Admin - Login
				</title>
			
				<!--FavIcon-->
				<link rel="shortcut icon" type="image/x-icon" href="app.view/img/favicon.ico"/>
				
				<!--Acentos-->
				<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				
				<!--Fontes-->
				<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Chewy' rel='stylesheet' type='text/css'>
				
				<!--CSS-->
				<link rel="stylesheet" href="app.view/css/login.css">
					
				<!--JQuery-->
				
				<!--JavaScript-->
				<script type="text/javascript" src="app.view/js/formulario.js"></script>
			</head>
			<body>
				<div class='contentLogin'>
					<form 
							class="loginForm"
							name="login"
							id="login"
							method="post"
							action="app.control/ajax.php"
							onsubmit="return validaCamposLogin();"
					  >
						<span>Login</span><br>
						<input name='txtLogin' type='text' id='campo' /><br>
						<input type='password' name='txtSenha' type='text' id='campo'/><br>
						<input type="hidden" id="action" name="action"/>
						<input name='botaoLogin' type='submit' id='botaoLogin' value='Login'/>
					  </form>
				</div>
			</body>
		</html>
		<?php
		}
	}
?>