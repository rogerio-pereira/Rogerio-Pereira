<?php

/*
 * Classe cadastraEscolaridade
 */
class alteraEscolaridade
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionEscolaridade;
	private $escolaridade;
	private $codigo;

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
			$this->control = new controladorCurriculumGestor;
			
			//Se tem id na URL
			if(isset($_GET['id']))
			{
				$this->codigo		= $_GET['id'];
				$this->escolaridade = $this->control->getEscolaridadeId($this->codigo);
			}
			else
				$this->collectionEscolaridade = $this->control->getEscolaridade();
		}
	}
	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show()
	{
	
		if(!isset($this->codigo))
		{
		?>
			<form class="formulario" name="alteraEscolaridade1" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraEscolaridade1', 'alteraEscolaridade1');">
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
										<input type='radio' name='codigo' value='{$escolaridade->codigo}'>
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
							<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Selecionar" />
						</td>
					</tr>
				</table>
			</form>
		<?php
		}
		else
		{
		?>
		<form class="formulario" name="alteraEscolaridade2" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraEscolaridade2', 'alteraEscolaridade2');">
			<input type="hidden" id="action" name="action"/>
			<input type="hidden" id="action" name="codigo" value='<?php echo $this->codigo; ?>'/>
			<table class="contatoTable" style='width: 100%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="2" align="center">
						Escolaridade
					</td>
				</tr>
				<!--Curso-->
				<tr>
					<td style="width: 10%">
						Curso
					</td>
					<td>
						<input name="txtCurso" type="text" id="campo" value='<?php echo $this->escolaridade->curso; ?>'/>
					</td>
				</tr>
				<!--Instituição-->
				<tr>
					<td style="width: 10%">
						Instituição
					</td>
					<td>
						<input name="txtInstituicao" type="text" id="campo" value='<?php echo $this->escolaridade->instituicao; ?>'/>
					</td>
				</tr>
				<!--Cidade-->
				<tr>
					<td style="width: 10%">
						Cidade
					</td>
					<td>
						<input name="txtCidade" type="text" id="campo" value='<?php echo $this->escolaridade->cidade; ?>'/>
					</td>
				</tr>
				<!--Estado-->
				<tr>
					<td style="width: 10%">
						Estado
					</td>
					<td>
						<input name="txtEstado" type="text" id="campo" value='<?php echo $this->escolaridade->estado; ?>'/>
					</td>
				</tr>
				<!--Cursando-->
				<tr>
					<td style="width: 10%">
						Cursando
					</td>
					<td>
						<?php
							if($this->escolaridade->cursando == 0)
								echo "<input type='checkbox' name='cursando' onclick='habiltaCampoAlteraEscolaridade()'/>";
							else
								echo "<input type='checkbox' name='cursando' onclick='habiltaCampoAlteraEscolaridade()' checked/>";
						?>
					</td>
				</tr>
				<!--Periodo-->
				<tr>
					<td style="width: 10%">
						Periodo
					</td>
					<td>
						<?php
							if($this->escolaridade->cursando == 1)
								echo "<input name='txtPeriodo' type='text' id='campo'  value='{$this->escolaridade->cursandoPeriodo}' />";
							else
								echo "<input name='txtPeriodo' type='text' id='campo'  disabled />";
						?>
					</td>
				</tr>
				<!--Concluido-->
				<tr>
					<td style="width: 10%">
						Concluido
					</td>
					<td>
						<?php
							if($this->escolaridade->cursando == 1)
								echo "<input name='txtConcluido' type='text' id='campo' class='campoAno' disabled/>";
							else
								echo "<input name='txtConcluido' type='text' id='campo'  class='campoAno' value='{$this->escolaridade->concluido}' />";
						?>
					</td>
				</tr>
				<!--Botoões-->
				<tr>
					<td colspan=2 align=center style="width: 100%">
						<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Alterar" />
					</td>
				</tr>
			</table>
		</form>
		<script>
			adicionaMascaras();
		</script>
	<?php
	}
	}
}
?>