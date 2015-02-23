<?php

/*
 * Classe cadastraExperiencia
 */
class cadastraExperiencia
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
		<form class="formulario" name="cadastraExperiencia" method="post" action="app.control/ajax.php" onsubmit="doPost('cadastraExperiencia', 'cadastraExperiencia');">
			<input type="hidden" id="action" name="action"/>
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
						<input name="txtCargo" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Descrição-->
				<tr>
					<td>
						Empresa
					</td>
					<td>
						<input name="txtEmpresa" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Cidade-->
				<tr>
					<td >
						Cidade
					</td>
					<td>
						<input name="txtCidade" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Estado-->
				<tr>
					<td>
						Estado
					</td>
					<td>
						<input name="txtEstado" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Telefone-->
				<tr>
					<td>
						Telefone
					</td>
					<td>
						<input name="txtTelefone" type="text" id="campo" class='campoTelefone' style="width: 100%"/>
					</td>
				</tr>
				<!--Entrada-->
				<tr>
					<td>
						Entrada
					</td>
					<td>
						<input name="txtEntrada" type="text" id="campo" class='campoData' style="width: 100%"/>
					</td>
				</tr>
				<!--Emprego Atual-->
				<tr>
					<td>
						Emprego Atual
					</td>
					<td>
						<input type='checkbox' name='empregoAtual' onclick='habiltaCampoCadastroExperiencia()'>
					</td>
				</tr>
				<!--Saida-->
				<tr>
					<td>
						Saida
					</td>
					<td>
						<input name="txtSaida" type="text" id="campo" class='campoData' style="width: 100%"/>
					</td>
				</tr>
				<!--Botoões-->
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