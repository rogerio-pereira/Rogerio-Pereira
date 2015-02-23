<?php

/*
 * Classe cadastraSocial
 */
class cadastraSocial
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
		<form class="formulario" enctype="multipart/form-data" name="cadastraSocial" method="post" action="app.control/ajax.php" onsubmit="doPost('cadastraSocial', 'cadastraSocial');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 30%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="2" align="center">
						Redes Sociais
					</td>
				</tr>
				<!--Nome-->
				<tr>
					<td style="width: 18%">
						Nome
					</td>
					<td>
						<input name="txtNome" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Link-->
				<tr>
					<td>
						Link
					</td>
					<td>
						<input name="txtLink" type="text" id="campo" style="width: 100%"/>
					</td>
				</tr>
				<!--Imagens-->
				<tr>
					<td style='width: 10%;'>
						Imagem:
					</td>
					<td>
						<input type='file' name='txtImagem' id='file' accept='.png'>
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