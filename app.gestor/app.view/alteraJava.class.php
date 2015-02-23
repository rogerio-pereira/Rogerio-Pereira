<?php

/*
 * Classe alteraJava
 */
class alteraJava
{
	/*
	 * Variaveis
	 */
	private $conteudo;
	private $control;

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
		else
		{
			$this->control		= new controladorJava();
			$this->conteudo	= $this->control->getConteudo();
		}
	}

	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show() 
	{
	?>
		<div >
			<form class="formulario" name="alteraJava" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraJava', 'alteraJava');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="2" align="center">
							Desenvolvedor Java
						</td>
					</tr>
					<tr>
						<td>
							Conteudo
						</td>
					</tr>
					<tr>
						<td colspan='2'>
							<textarea name='txtConteudo' id='campo' style='height: 300px'><?php echo $this->conteudo; ?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan=2 align=center style="width: 100%">
							<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Alterar" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	<?php
	}
}
?>