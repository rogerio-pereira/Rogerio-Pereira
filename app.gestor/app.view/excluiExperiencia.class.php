<?php

/*
 * Classe excluiExperiencia
 */
class excluiExperiencia
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionExperiencia;
	
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
			
			$this->collectionExperiencia	= $this->control->getExperiencia();
		}
	}
	
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
		?>
			<form class="formulario" name="excluiExperiencia" method="post" action="app.control/ajax.php" onsubmit="doPost('excluiExperiencia', 'excluiExperiencia');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="4" align="center">
							Experiencia
						</td>
					</tr>
					<?php
						foreach ($this->collectionExperiencia as $experiencia)
						{
							echo
								"
								<!--{$experiencia->curso}-->
								<tr>
									<td>
										<input type='checkbox' name='codigo[]' value='{$experiencia->codigo}'>
									</td>
									<td>
										{$experiencia->cargo}
									</td>
									<td>
										{$experiencia->empresa}
									</td>
									<td>
										{$experiencia->cidade} - {$experiencia->estado} 
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