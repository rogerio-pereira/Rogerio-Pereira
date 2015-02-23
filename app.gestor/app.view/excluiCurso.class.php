<?php

/*
 * Classe excluiCurso
 */
class excluiCurso
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionCurso;

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
			$this->control			= new controladorCurriculumGestor;
			
			$this->collectionCurso	= $this->control->getCursos();
		}
	}
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	?>
		<form class="formulario" name="excluiCurso" method="post" action="app.control/ajax.php" onsubmit="doPost('excluiCurso', 'excluiCurso');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 100%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="4" align="center">
						Curso
					</td>
				</tr>
				<?php
					foreach ($this->collectionCurso as $curso)
					{
						echo
							"
							<!--{$escolaridade->curso}-->
							<tr>
								<td>
									<input type='checkbox' name='codigo[]' value='{$curso->codigo}'>
								</td>
								<td>
									{$curso->nome}
								</td>
								<td>
									{$curso->instituicao}
								</td>
								<td>
									{$curso->cidade} - {$curso->estado} 
								</td>
							</tr>
							";
					}
				?>
				<!--Botoões-->
				<tr>
					<td colspan='4' align='center' style="width: 100%">
						<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Selecionar" />
					</td>
				</tr>
			</table>
		</form>
	<?php
	}
}
?>