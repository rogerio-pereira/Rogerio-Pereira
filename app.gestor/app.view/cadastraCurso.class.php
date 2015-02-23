<?php

/*
 * Classe cadastraCurso
 */
class cadastraCurso
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
		<form class="formulario" name="cadastraCurso" method="post" action="app.control/ajax.php" onsubmit="doPost('cadastraCurso', 'cadastraCurso');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 50%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="2" align="center">
						Curso
					</td>
				</tr>
				<!--Curso-->
				<tr>
					<td style="width: 15%">
						Curso
					</td>
					<td>
						<input name="txtCurso" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Descrição-->
				<tr>
					<td style='vertical-align:top;'>
						Descrição
					</td>
					<td>
						<textarea name='txtDescricao' id='campo' style='height: 170px; width: 99.6%'></textarea>
					</td>
				</tr>
				<!--Categoria-->
				<tr>
					<td>
						Categoria
					</td>
					<td>
						<select name='comboCategoria' style="width: 101%">
							<option value="1">	Computação	</option>
							<option value="2">	Linguas		</option>
							<option value="3">	Outros		</option>
						  </select>
					</td>
				</tr>
				<!--Instituição-->
				<tr>
					<td >
						Instituição
					</td>
					<td>
						<input name="txtInstituicao" type="text" id="campo" style="width: 100%"/>
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
				<!--Duração-->
				<tr>
					<td>
						Duracao
					</td>
					<td>
						<input name="txtDuracao" type="text" id="campo" style="width: 100%"/>
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
	<?php
	}
}
?>