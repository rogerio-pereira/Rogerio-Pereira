<?php

	/*
	 * Classe home
	 */
	class home 
	{
		/*
		 * Variaveis
		 */

		/*
		 * Método construtor
		 */

		public function __construct() 
		{
			new session();
			
			if($_SESSION['nome'] == '')
			{
				echo
				"
					<script>
						top.location='?class=login';
					</script>
				";
			}
		}

		/*
		 * Método show
		 * Exibe as informações na tela
		 */
		public function show()
		{
		?>		
			<div class='homeContent'>
				
				<!--Box Usuario-->
				<div class='homeBox'>
					<div class='homeBoxContent usuarioBox' id='normal'>
							<h1>Usuario</h1>
						<div class='usuarioShow' align='left'>
							<a href='?class=cadastraUsuario'>Cadastrar Usuario</a><br>
							<a href='?class=alteraSenha'>Alterar Senha</a><br>
						</div>
					</div>
				</div>
				
				<!--Box Social-->
				<div class='homeBox'>
					<div class='homeBoxContent socialBox' id='normal'>
							<h1>Redes Sociais</h1>
						<div class='socialShow' align='left'>
							<a href='?class=cadastraSocial'>		Cadastra Rede Social	</a><br>
							<a href='?class=alteraSocial'>		Altera Rede Social		</a><br>
							<a href='?class=excluiSocial'>			Exclui Rede Social		</a><br>
						</div>
					</div>
				</div>
				
				<!--PHP My Admin-->
				<div class='homeBox'>
					<div class='homeBoxContent phpMyAdminBox' id='sistema'>
							<h1>PHP My Admin</h1>
						<div class='phpMyAdminShow' align='left'>
							<a href='?class=phpMyAdmin' target='_blank'>	Acessar	</a><br>
						</div>
					</div>
				</div>
				
				<!--Logout-->
				<div class='homeBox'>
					<div class='homeBoxContent logoutBox' id='sistema'>
							<h1>Logout</h1>
						<div class='logoutShow' align='left'>
							<a href='?class=logout'>	Logout	</a><br>
						</div>
					</div>
				</div>
				
				<br><br><br><br><br><br>
				
				<!--Box Web-->
				<div class='homeBox'>
					<div class='homeBoxContent webBox'  id='conteudo'>
							<h1>WebDesigner</h1>
						<div class='webShow' align='left'>
							<a href='?class=alteraWeb'>Alterar Texto</a><br>
						</div>
					</div>
				</div>
				
				<!--Técnico de Informática-->
				<div class='homeBox'>
					<div class='homeBoxContent tecnicoBox'  id='conteudo'>
							<h1>Técnico Info</h1>
						<div class='tecnicoShow' align='left'>
							<a href='?class=alteraTecnico'>Alterar Texto</a><br>
						</div>
					</div>
				</div>
				
				<!--Java-->
				<div class='homeBox'>
					<div class='homeBoxContent javaBox'  id='conteudo'>
							<h1>Java</h1>
						<div class='javaShow' align='left'>
							<a href='?class=alteraJava'>Alterar Texto</a><br>
						</div>
					</div>
				</div>
				
				<!--Portifolio-->
				<div class='homeBox'>
					<div class='homeBoxContent portifolioBox'  id='conteudo'>
							<h1>Portifólio</h1>
						<div class='portifolioShow' align='left'>
							<a href='?class=cadastraPortifolio'>		Cadastra Portifólio	</a><br>
							<a href='?class=alteraPortifolio'>		Altera Portifólio		</a><br>
							<a href='?class=excluiPortifolio'>		Exclui Portifólio		</a><br>
						</div>
					</div>
				</div>
				
				<br><br><br><br><br><br>
				
				<!--Curriculum-->
				<div class='homeBox'>
					<div class='homeBoxContent curriculumBox' id='curriculum'>
							<h1>Curriculum</h1>
						<div class='curriculumShow' align='left'>
							<a href='?class=alteraCurriculum'>Alterar Curriculum</a><br>
						</div>
					</div>
				</div>
				
				<!--Escolaridade-->
				<div class='homeBox'>
					<div class='homeBoxContent escolaridadeBox' id='curriculum'>
							<h1>Escolaridade</h1>
						<div class='escolaridadeShow' align='left'>
							<a href='?class=cadastraEscolaridade'>		Cadastra Escolaridade	</a><br>
							<a href='?class=alteraEscolaridade'>		Altera Escolaridade		</a><br>
							<a href='?class=excluiEscolaridade'>		Exclui Escolaridade		</a><br>
						</div>
					</div>
				</div>
				
				<!--Cursos-->
				<div class='homeBox'>
					<div class='homeBoxContent cursosBox' id='curriculum'>
							<h1>Cursos</h1>
						<div class='cursosShow' align='left'>
							<a href='?class=cadastraCurso'>		Cadastra Cursos	</a><br>
							<a href='?class=alteraCurso'>		Altera Cursos		</a><br>
							<a href='?class=excluiCurso'>			Exclui Cursos		</a><br>
						</div>
					</div>
				</div>
				
				<!--Experiencia-->
				<div class='homeBox'>
					<div class='homeBoxContent experienciaBox' id='curriculum'>
							<h1>Experiencia</h1>
						<div class='experienciaShow' align='left'>
							<a href='?class=cadastraExperiencia'>		Cadastra Experiencia	</a><br>
							<a href='?class=alteraExperiencia'>		Altera Experiencia		</a><br>
							<a href='?class=excluiExperiencia'>		Exclui Experiencia		</a><br>
						</div>
					</div>
				</div>
				
			</div>	
			<script>
				startBoxToggle();
			</script>
		<?php
		}
	}
?>