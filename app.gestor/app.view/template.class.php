<?php

	/*
	 * Classe template
	 */
	class template 
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
		
		/*
		 * Método show
		 * Exibe as informações na tela
		 */
		public function show()
		{
		?>
		<!DOCTYPE HTML>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
			<head>
				<title>
					Admin
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
				<link rel="stylesheet" href="app.view/css/template.css">
				<link rel="stylesheet" href="app.view/css/nanoscroller.css">
				<link rel="stylesheet" href="app.view/css/home.css">
				<link rel="stylesheet" href="app.view/css/formulario.css">
					
				<!--JQuery-->
				<script type="text/javascript" src="app.view/js/jquery.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.nanoscroller.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.maskedinput.js"></script>
				
				<!--JavaScript-->
				<script type="text/javascript" src="app.view/js/nanoscroller.js"></script>
				<script type="text/javascript" src="app.view/js/home.js"></script>
				<script type="text/javascript" src="app.view/js/formulario.js"></script>
			</head>
			<body>
				<div class='topo'>
					<a href="./" id='bemVindo'>Bem Vindo:</a> <span><?php echo $_SESSION['nome']; ?></span>
				</div>
				
				<div class='contentHolder'>
					<div id='contentText'>
						<div class="nano">
							<div class="nano-content">
								#CONTENT#
							</div>
						</div>
					</div>
				</div>
			</body>
		</html>
		<?php
		}
	}
	new template;
?>