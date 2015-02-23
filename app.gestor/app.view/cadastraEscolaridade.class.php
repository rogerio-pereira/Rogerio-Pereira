<?php

/*
 * Classe cadastraEscolaridade
 */
class cadastraEscolaridade
{
	/*
	 * Variaveis
	 */

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
	}
	/*
	 * M�todo show
	 * Exibe as informa��es na tela
	 */
	public function show()
	{
	?>
		<form class="formulario" name="cadastraEscolaridade" method="post" action="app.control/ajax.php" onsubmit="doPost('cadastraEscolaridade', 'cadastraEscolaridade');">
			<input type="hidden" id="action" name="action"/>
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
						<input name="txtCurso" type="text" id="campo"/>
					</td>
				</tr>
				<!--Institui��o-->
				<tr>
					<td style="width: 10%">
						Institui��o
					</td>
					<td>
						<input name="txtInstituicao" type="text" id="campo"/>
					</td>
				</tr>
				<!--Cidade-->
				<tr>
					<td style="width: 10%">
						Cidade
					</td>
					<td>
						<input name="txtCidade" type="text" id="campo"/>
					</td>
				</tr>
				<!--Estado-->
				<tr>
					<td style="width: 10%">
						Estado
					</td>
					<td>
						<input name="txtEstado" type="text" id="campo"/>
					</td>
				</tr>
				<!--Cursando-->
				<tr>
					<td style="width: 10%">
						Cursando
					</td>
					<td>
						<input type='checkbox' name='cursando' onclick='habiltaCampoCadastroEscolaridade()'>
					</td>
				</tr>
				<!--Periodo-->
				<tr>
					<td style="width: 10%">
						Periodo
					</td>
					<td>
						<input name="txtPeriodo" type="text" id="campo" disabled/>
					</td>
				</tr>
				<!--Concluido-->
				<tr>
					<td style="width: 10%">
						Concluido
					</td>
					<td>
						<input name="txtConcluido" type="text" id="campo" class='campoAno'/>
					</td>
				</tr>
				<!--Boto�es-->
				<tr>
					<td colspan=2 align=center style="width: 100%">
						<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Cadastrar" />
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