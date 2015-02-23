<?php

/*
 * Classe excluiEscolaridade
 */
class excluiEscolaridade
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionEscolaridade;

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
			$this->control				= new controladorCurriculumGestor;
			
			$this->collectionEscolaridade	= $this->control->getEscolaridade();
		}
	}
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	?>
		<form class="formulario" name="excluiEscolaridade" method="post" action="app.control/ajax.php" onsubmit="doPost('excluiEscolaridade', 'excluiEscolaridade');">
		<input type="hidden" id="action" name="action"/>
		<table class="contatoTable" style='width: 100%'>
			<!--Titulo-->
			<tr id="titulo">
				<td colspan="4" align="center">
					Escolaridade
				</td>
			</tr>
			<?php
				foreach ($this->collectionEscolaridade as $escolaridade)
				{
					echo
						"
						<!--{$escolaridade->curso}-->
						<tr>
							<td>
								<input type='checkbox' name='codigo[]' value='{$escolaridade->codigo}'>
							</td>
							<td>
								{$escolaridade->curso}
							</td>
							<td>
								{$escolaridade->instituicao}
							</td>
							<td>
								{$escolaridade->cidade} - {$escolaridade->estado} 
							</td>
						</tr>
						";
				}
			?>
			<!--Botoões-->
			<tr>
				<td colspan='4' align='center' style="width: 100%">
					<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Excluir" />
				</td>
			</tr>
		</table>
	</form>
	<?php
	}
}
?>