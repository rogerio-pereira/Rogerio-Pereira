<?php

/*
 * Classe alteraCurriculum
 */
class alteraCurriculum
{
	/*
	 * Variaveis
	 */
	private $curriculum;
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
			$this->control		= new controladorCurriculumGestor();
			$this->curriculum	= $this->control->getCurriculum();
		}
	}

	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show() 
	{
	?>
		<form class="formulario" enctype="multipart/form-data" name="alteraCurriculum" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraCurriculum', 'alteraCurriculum');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 100%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="2" align="center">
						Curriculum
					</td>
				</tr>
				<!--Nome-->
				<tr>
					<td style="width: 10%">
						Nome
					</td>
					<td>
						<input name="txtNome" type="text" id="campo" value='<?php echo $this->curriculum->nome; ?>'/>
					</td>
				</tr>
				<!--Nascimento-->
				<tr>
					<td>
						Nascimento
					</td>
					<td>
						<input name="txtNascimento" type="text" id="campo" class='campoData' value='<?php echo $this->control->converteData($this->curriculum->nascimento); ?>'/>
					</td>
				</tr>
				<!--Estado Civil-->
				<tr>
					<td>
						Estado Cívil
					</td>
					<td>
						<input name="txtEstadoCivil" type="text" id="campo" value='<?php echo $this->curriculum->estadocivil; ?>'/>
					</td>
				</tr>
				<!--Fumante-->
				<tr>
					<td>
						Fumante
					</td>
					<td>
						<?php
							if($this->curriculum->fumante == 0)
								echo "<input type='checkbox' name='fumante'>";
							else
								echo "<input type='checkbox' name='fumante' checked>";
						?>
					</td>
				</tr>
				<!--Complemento Estado Civil-->
				<tr>
					<td>
						Complemento
					</td>
					<td>
						<input name="txtComplementoEstadoCivil" type="text" id="campo" value='<?php echo $this->curriculum->complementoEstadoCivil; ?>'/>
					</td>
				</tr>
				<tr id='titulo2'><td colspan='2'>Endereço</td></tr>
				<!--Endereço-->
				<tr>
					<td>
						Endereço
					</td>
					<td>
						<input name="txtEndereco" type="text" id="campo" value='<?php echo $this->curriculum->endereco; ?>'/>
					</td>
				</tr>
				<!--Numero-->
				<tr>
					<td>
						Numero
					</td>
					<td>
						<input name="txtEnderecoNumero" type="text" id="campo" value='<?php echo $this->curriculum->enderecoNumero; ?>'/>
					</td>
				</tr>
				<!--Bairro-->
				<tr>
					<td>
						Bairro
					</td>
					<td>
						<input name="txtBairro" type="text" id="campo" value='<?php echo $this->curriculum->bairro; ?>'/>
					</td>
				</tr>
				<!--Cidade-->
				<tr>
					<td>
						Cidade
					</td>
					<td>
						<input name="txtCidade" type="text" id="campo" value='<?php echo $this->curriculum->cidade; ?>'/>
					</td>
				</tr>
				<!--Estado-->
				<tr>
					<td>
						Estado
					</td>
					<td>
						<input name="txtEstado" type="text" id="campo" value='<?php echo $this->curriculum->estado; ?>'/>
					</td>
				</tr>
				<!--CEP-->
				<tr>
					<td>
						CEP
					</td>
					<td>
						<input name="txtCep" type="text" id="campo" class='campoCEP' value='<?php echo $this->curriculum->cep; ?>'/>
					</td>
				</tr>
				<!--Pula Linha-->
				<tr id='titulo2'><td colspan='2'>Contato</td></tr>
				<!--Telefone-->
				<tr>
					<td>
						Telefone
					</td>
					<td>
						<input name="txtTelefone" type="text" id="campo" class='campoTelefone' value='<?php echo $this->curriculum->telefone; ?>'/>
					</td>
				</tr>
				<!--Operadora-->
				<tr>
					<td>
						Operadora
					</td>
					<td>
						<input name="txtOperadora" type="text" id="campo" value='<?php echo $this->curriculum->operadora; ?>'/>
					</td>
				</tr>
				<!--Recado-->
				<tr>
					<td>
						Recado
					</td>
					<td>
						<?php
							if($this->curriculum->recado == 0)
								echo "<input type='checkbox' name='recado'>";
							else
								echo "<input type='checkbox' name='recado' checked>";
						?>
					</td>
				</tr>
				<!--Pula Linha-->
				<tr><td colspan='2'><br></td></tr>
				<!--Telefone 2-->
				<tr>
					<td>
						Telefone 2
					</td>
					<td>
						<input name="txtTelefone2" type="text" id="campo" class='campoTelefone'  value='<?php echo $this->curriculum->telefone2; ?>'/>
					</td>
				</tr>
				<!--Operadora 2-->
				<tr>
					<td>
						Operadora 2
					</td>
					<td>
						<input name="txtOperadora2" type="text" id="campo" value='<?php echo $this->curriculum->operadora2; ?>'/>
					</td>
				</tr>
				<!--Recado 2-->
				<tr>
					<td>
						Recado 2
					</td>
					<td>
						<?php
							if($this->curriculum->recado2 == 0)
								echo "<input type='checkbox' name='recado2'>";
							else
								echo "<input type='checkbox' name='recado2' checked>";
						?>
					</td>
				</tr>
				<!--Pula Linha-->
				<tr><td colspan='2'><br></td></tr>
				<!--E-mail-->
				<tr>
					<td>
						E-mail
					</td>
					<td>
						<input name="txtEmail" type="text" id="campo" value='<?php echo $this->curriculum->email; ?>'/>
					</td>
				</tr>
				<!--Pula Linha-->
				<tr id='titulo2'><td colspan='2'>Profissional</td></tr>
				<!--Objetivo Profissional-->
				<tr>
					<td colspan='2'>
						Objetivo Profissional
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<textarea name='txtObjetivo' id='campo' style='height: 250px'><?php echo $this->curriculum->objetivoProfissional; ?></textarea>
					</td>
				</tr>
				<!--Conhecimentos Especificos-->
				<tr>
					<td colspan='2'>
						Conhecimentos Especificos
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<textarea name='txtConhecimento'  class='nano' id='campo' style='height: 250px'><?php echo $this->curriculum->conhecimentosEspecificos; ?></textarea>
					</td>
				</tr>
				<!--Perfil Profissional-->
				<tr>
					<td colspan='2'>
						Perfil Profissional
					</td>
				</tr>
				<tr>
					<td colspan='2'>
						<textarea name='txtPerfil' id='campo' style='height: 250px'><?php echo $this->curriculum->perfilProfissional; ?></textarea>
					</td>
				</tr>
				<!--Imagens-->
				<tr>
					<td>
						Imagem:
					</td>
					<td>
						<input type='file' name='txtImagem' id='file' accept='.jpg'>
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
?>