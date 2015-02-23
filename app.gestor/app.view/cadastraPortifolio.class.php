<?php

/*
 * Classe cadastraPortifolio
 */
class cadastraPortifolio
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
		<form class="formulario" enctype="multipart/form-data" name="cadastraPortifolio" method="post" action="app.control/ajax.php" onsubmit="doPost('cadastraPortifolio', 'cadastraPortifolio');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 100%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="2" align="center">
						Portifólio
					</td>
				</tr>
				<!--Nome-->
				<tr>
					<td style="width: 8%;">
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
				<!--Descrição-->
				<tr>
					<td style='vertical-align: top;'>
						Descrição
					</td>
					<td>
						<textarea name='txtDescricao' id='campo' style='height: 120px; width: 99.8%'><?php echo $this->portifolio->descricao; ?></textarea>
					</td>
				</tr>
				<!--Utilizado-->
				<tr>
					<td style='vertical-align: top;'>
						Utilizado
					</td>
					<td>
						<textarea name='txtUtilizado' id='campo' style='height: 120px; width: 99.8%'><?php echo $this->portifolio->utilizado; ?></textarea>
					</td>
				</tr>
				<!--Imagens-->
				<tr>
					<td style='width: 10%;'>
						Imagem:
					</td>
					<td>
						<input type='file' name='txtImagem' id='file' accept='.jpg'>
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