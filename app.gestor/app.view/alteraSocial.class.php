<?php

/*
 * Classe alteraSocial
 */
class alteraSocial
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionSocial;
	private $social;
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
			$this->control = new controladorSocialGestor;
			
			//Se tem id na URL
			if(isset($_GET['id']))
			{
				$this->codigo		= $_GET['id'];
				$this->social		= $this->control->getSocialID($this->codigo);
			}
			else
				$this->collectionSocial = $this->control->getSocial();
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
			<form class="formulario" name="alteraSocial1" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraSocial1', 'alteraSocial1');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 50%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="4" align="center">
							Redes Sociais
						</td>
					</tr>
					<?php
						foreach ($this->collectionSocial as $social)
						{
							echo
								"
								<!--{$social->nome}-->
								<tr>
									<td>
										<input type='radio' name='codigo' value='{$social->codigo}'>
									</td>
									<td>
										{$social->nome}
									</td>
									<td>
										{$social->link}
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
			<form class="formulario" enctype="multipart/form-data" name="alteraSocial2" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraSocial2', 'alteraSocial2');">
			<input type="hidden" id="action" name="action"/>
			<input type="hidden" id="action" name="codigo" value='<?php echo $this->codigo; ?>'/>
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
						<input name="txtNome" type="text" id="campo" style="width: 100%" value='<?php echo $this->social->nome; ?>'/>
					</td>
				</tr>
				<!--Link-->
				<tr>
					<td>
						Link
					</td>
					<td>
						<input name="txtLink" type="text" id="campo" style="width: 100%" value='<?php echo $this->social->link; ?>'/>
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
						<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Alterar" />
					</td>
				</tr>
			</table>
		</form>
		<?php
		}
	}
}
?>