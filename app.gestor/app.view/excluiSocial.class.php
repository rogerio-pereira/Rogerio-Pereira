<?php

/*
 * Classe excluiSocial
 */
class excluiSocial
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionSocial;
	
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
		else
		{
			$this->control				= new controladorSocialGestor;
			
			$this->collectionSocial	= $this->control->getSocial();
		}
	}
	
	/*
	 * M�todo show
	 * Exibe as informa��es na tela
	 */
	public function show()
	{
	?>
		<form class="formulario" name="excluiSocial" method="post" action="app.control/ajax.php" onsubmit="doPost('excluiSocial', 'excluiSocial');">
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
										<input type='checkbox' name='codigo[]' value='{$social->codigo}'>
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
					<!--Boto�es-->
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