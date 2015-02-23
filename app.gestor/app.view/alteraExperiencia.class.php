<?php

/*
 * Classe alteraExperiencia
 */
class alteraExperiencia
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionExperiencia;
	private $experiencia;
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
				$this->experiencia	= $this->control->getExperienciaId($this->codigo);
			}
			else
				$this->collectionExperiencia = $this->control->getExperiencia();
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
			<form class="formulario" name="alteraExperiencia1" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraExperiencia1', 'alteraExperiencia1');">
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
										<input type='radio' name='codigo' value='{$experiencia->codigo}'>
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
			<form class="formulario" name="alteraExperiencia2" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraExperiencia2', 'alteraExperiencia2');">
				<input type="hidden" id="action" name="action"/>
				<input type="hidden" id="action" name="codigo" value='<?php echo $this->codigo; ?>'/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="2" align="center">
							Experiencia
						</td>
					</tr>
					<!--Curso-->
					<tr>
						<td style="width: 10%">
							Cargo
						</td>
						<td>
							<input name="txtCargo" type="text" id="campo" style="width: 100%" value='<?php echo $this->experiencia->cargo; ?>'/>
						</td>
					</tr>
					<!--Descrição-->
					<tr>
						<td>
							Empresa
						</td>
						<td>
							<input name="txtEmpresa" type="text" id="campo" style="width: 100%" value='<?php echo $this->experiencia->empresa; ?>'/>
						</td>
					</tr>
					<!--Cidade-->
					<tr>
						<td >
							Cidade
						</td>
						<td>
							<input name="txtCidade" type="text" id="campo" style="width: 100%" value='<?php echo $this->experiencia->cidade; ?>'/>
						</td>
					</tr>
					<!--Estado-->
					<tr>
						<td>
							Estado
						</td>
						<td>
							<input name="txtEstado" type="text" id="campo" style="width: 100%" value='<?php echo $this->experiencia->estado; ?>'/>
						</td>
					</tr>
					<!--Telefone-->
					<tr>
						<td>
							Telefone
						</td>
						<td>
							<input name="txtTelefone" type="text" id="campo" class='campoTelefone' style="width: 100%" value='<?php echo $this->experiencia->telefone; ?>'/>
						</td>
					</tr>
					<!--Entrada-->
					<tr>
						<td>
							Entrada
						</td>
						<td>
							<input name="txtEntrada" type="text" id="campo" class='campoData' style="width: 100%" value='<?php echo $this->experiencia->entrada; ?>'/>
						</td>
					</tr>
					<!--Emprego Atual-->
					<tr>
						<td>
							Emprego Atual
						</td>
						<td>
							<?php
								if($this->experiencia->empregoAtual)
									echo "<input type='checkbox' name='empregoAtual' onclick='habiltaCampoAlteraExperiencia()' checked>";
								else
									echo "<input type='checkbox' name='empregoAtual' onclick='habiltaCampoAlteraExperiencia()'>";
							?>
						</td>
					</tr>
					<!--Saida-->
					<tr>
						<td>
							Saida
						</td>
						<td>
							<?php
								if($this->experiencia->empregoAtual)
									echo "<input name='txtSaida' type='text' id='campo' class='campoData' style='width: 100%' disabled/>";
								else
									echo "<input name='txtSaida' type='text' id='campo' class='campoData' style='width: 100%' value='{$this->experiencia->saida}'/>";
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