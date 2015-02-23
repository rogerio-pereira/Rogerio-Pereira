<?php

/*
 * Classe excluiPortifolio
 */
class excluiPortifolio
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionPortifolio;
	
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
			$this->control				= new controladorPortifolioGestor;
			
			$this->collectionPortifolio	= $this->control->getPortifolio();
		}
	}
	
	/*
	 * M�todo show
	 * Exibe as informa��es na tela
	 */
	public function show()
	{
	?>
		<form class="formulario" name="excluiPortifolio" method="post" action="app.control/ajax.php" onsubmit="doPost('excluiPortifolio', 'excluiPortifolio');">
			<input type="hidden" id="action" name="action"/>
			<table class="contatoTable" style='width: 100%'>
				<!--Titulo-->
				<tr id="titulo">
					<td colspan="4" align="center">
						Portif�lio
					</td>
				</tr>
				<?php
					foreach ($this->collectionPortifolio as $portifolio)
					{
						echo
							"
							<!--{$portifolio->nome}-->
							<tr>
								<td style='width: 1%;'>
									<input type='checkbox' name='codigo[]' value='{$portifolio->codigo}'>
								</td>
								<td style='width: 18%;'>
									{$portifolio->nome}
								</td>
								<td>
									{$portifolio->link}
								</td>
							</tr>
							";
					}
				?>
				<!--Boto�es-->
				<tr>
					<td colspan='4' align='center' style="width: 100%">
						<input name="botaoEnviar" type="submit" id="botaoEnviar" value="Selecionar" />
					</td>
				</tr>
			</table>
		</form>
	<?php
	}
}
?>