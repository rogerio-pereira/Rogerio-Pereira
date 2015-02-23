<?php

/*
 * Classe alteraTecnico
 */
class alteraTecnico
{
	/*
	 * Variaveis
	 */
	private $conteudo;
	private $control;

	/*
	 * M�todo construtor
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
			$this->control		= new controladorTecnico();
			$this->conteudo	= $this->control->getConteudo();
		}
	}

	/*
	 * M�todo show
	 * Exibe as informa��es na tela
	 */
	public function show() 
	{
	?>
		<div >
			<form class="formulario" name="alteraTecnico" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraTecnico', 'alteraTecnico');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="2" align="center">
							T�cnico de Inform�tica
						</td>
					</tr>
					<tr>
						<td>
							Conteudo
						</td>
					</tr>
					<tr>
						<td colspan='2'>
							<textarea name='txtConteudo' id='campo' style='height: 350px'><?php echo $this->conteudo; ?></textarea>
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