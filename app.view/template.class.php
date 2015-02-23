<?php

/*
 * Classe template
 */
class template
{
	/*
	 * Variaveis
	 */
	private $classe;

	/*
	 * M�todo construtor
	 */
	public function __construct()
	{
		$this->classe = $_GET['class'];
	}
	/*
	 * M�todo show
	 * Exibe as informa��es na tela
	 */
	public function show()
	{
	?>
		<!DOCTYPE HTML>
		<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">
			<head>
				<title>
				<?php
					if($this->classe == 'curriculum')
						echo "Rog�rio Eduardo Pereira - T�cnico de Inform�tica, WebDeveloper, Desenvolvedor Java";
					else
						echo "Rog�rio Eduardo Pereira - T�cnico de Inform�tica, WebDeveloper, Desenvolvedor Java";
				?>
				</title>
			
				<!--Meta Tags-->
				��<meta name="description" content="Curriculum, Portif�lio de Rog�rio Eduardo Pereir">
				��<meta name="keywords" content="T�cnico, Inform�tica, WebDeveloper, Desenvolvedor, Java, Po�os de Caldas, Rog�rio, Eduardo, Pereira, WebDesign, PHP, Curriculum, Portif�lio">
				��<meta name="author" content="Rog�rio Pereira">
				��<meta name="copyright" content="Rog�rio Pereira">
				��<meta name="email" content="rogerio@rogerio.info">
				��<meta http-equiv="Content-Language" content="pt-br">
				��<meta name="Charset" content="UTF-8">
				��<meta name="Rating" content="General">
				��<meta name="Distribution" content="Global">

				
				<!--FavIcon-->
				<link rel="shortcut icon" type="image/x-icon" href="app.view/img/favicon.ico"/>
				
				<!--Acentos-->
				<meta http-equiv="content-type" content="text/html; charset=utf-8" />
				<link rel="alternate" href="http://www.rogeriopereira.info" hreflang="pt-br" />

				
				<!--Fontes-->
				<link href='http://fonts.googleapis.com/css?family=Handlee'						rel='stylesheet'	type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Oswald'						rel='stylesheet'	type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Coming+Soon'				rel='stylesheet'	type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300'	rel='stylesheet'	type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Ubuntu'						rel='stylesheet'	type='text/css'>
				<link href='http://fonts.googleapis.com/css?family=Pontano+Sans'				rel='stylesheet'	type='text/css'>
				
				<!--CSS-->
				<link rel="stylesheet" href="app.view/css/bootstrap.css">
				<link rel="stylesheet" href="app.view/css/template.css">
				<link rel="stylesheet" href="app.view/css/social.css">
				<link rel="stylesheet" href="app.view/css/portifolio.css">
				<link rel="stylesheet" href="app.view/css/curriculum.css">
				<link rel="stylesheet" href="app.view/css/colorbox.css">
				<link rel="stylesheet" href="app.view/css/contato.css">
				<link rel="stylesheet" href="app.view/css/rhinoslider.css">
				
				<!--JQuery-->
				<script type="text/javascript" src="app.view/js/jquery.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.maskedinput.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.colorbox.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.rhinoslider.js"></script>
				<script type="text/javascript" src="app.view/js/jquery.rhinoslider.easing.js"></script>
				<script type="text/javascript" src="app.view/js/bootstrap.js"></script>
				
				<!--JavaScript-->
				<script type="text/javascript" src="app.view/js/template.js"></script>
				<script type="text/javascript" src="app.view/js/popup.js"></script>
				<script type="text/javascript" src="app.view/js/contato.js"></script>
			</head>
			<body>				
				<!--Pagina-->
				<div class='page'>
					
					<!--Cabe�alho-->
					<div class='header'>						
						<div id='foto'>
							<img src='app.view/img/curriculum/1.jpg'>
						</div>
						
						<div id='nome'>
							Rog�rio Eduardo Pereira
						</div>
						
						<div id='telefone'>
							<ul>
								<li>		(35) 9109 - 0906				</li>
								<li>		rogerio@rogeriopereira.info		</li>
							</ul>
						</div>
					</div>
					
					<!--Menu-->
					<div class='menu'>
						<ul>
							<li>
								<a href='?class=curriculum'>									Curriculum	</a>
							</li>
							<li>
								<a href='?class=portifolio'>									Portif�lio		</a>
							</li>
							<li>
								<a href='?class=social'>										Redes Sociais	</a>
							</li>
							<li>
								<a href='app.view/contato.class.php' class='ajax' title="Contato">	Contato		</a>
							</li>
						</ul>
					</div>
					
					<!--Slider-->
					<div class='sliderBox'>
						<div id='banner'>
							<ul id="slider">
								<!--T�cnico de Inform�tica-->
								<li id='sliderTecnico'>
									<h1>T�cnico de Inform�tica</h1>
									<ul id='listaBanner'>
										<li>		Assistencia T�cnica em Micros e Notebooks				</li>
										<li>		Backup e Formata��o								</li>
										<li>		Remo��o de v�rus e Malwares							</li>
										<li>		Limpeza Interna									</li>
										<li>		Montagem e configura��o de Redes cabeadas e wireless	</li>
										<li>		Vendas											</li>
										<li>		Consultorias										</li>
										<li>		Contratos Mensal									</li>
									</ul>
								</li>
								<!--Desenvolvedor Java-->
								<li id='listaSlider'>
									<h1>Desenvolvedor Java</h1>
									<ul id='listaBanner'>
										<li>		Desenvolvimento de sistemas		</li>
										<li>		Banco de Dados Mysql			</li>
										<li>		Open Source GPL-3.0			</li>
									</ul>
								</li>
								<!--WebDeveloper-->
								<li id='listaSlider'>
									<h1>Web Developer</h1>
									<ul id='listaBanner'>
										<li>		Desenvolvimento de P�ginas com conteudo din�mico	</li>
										<li>		Registro de Dom�nio								</li>
										<li>		Hospedagem de Sites							</li>
										<li>		Atualiza��o de conte�do online					</li>
										<li>		Reformula��o de Sites							</li>
										<li>		Desenvolvimento de Sistemas Web					</li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
					
					<!--Content-->
					<div class="content">
						#CONTENT#
					</div>
				</div>
				
				
				<!--GoogleAnalytics-->
				<?php include_once("app.seo/analyticstracking.php") ?>
			</body>
		</html>
	<?php
	}
}
?>