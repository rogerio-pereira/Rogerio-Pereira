<?php

/*
 * Classe alteraPortifolio
 */
class alteraPortifolio
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionPortifolio;
	private $portifolio;
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
			$this->control = new controladorPortifolioGestor;
			
			//Se tem id na URL
			if(isset($_GET['id']))
			{
				$this->codigo		= $_GET['id'];
				$this->portifolio	= $this->control->getPortifolioID($this->codigo);
			}
			else
				$this->collectionPortifolio = $this->control->getPortifolio();
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
			<form class="formulario" name="alteraPortifolio1" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraPortifolio1', 'alteraPortifolio1');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="4" align="center">
							Portifólio
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
										<input type='radio' name='codigo' value='{$portifolio->codigo}'>
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
			<form class="formulario" enctype="multipart/form-data" name="alteraPortifolio2" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraPortifolio2', 'alteraPortifolio2');">
			<input type="hidden" id="action" name="action"/>
			<input type="hidden" id="action" name="codigo" value='<?php echo $this->codigo; ?>'/>
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
						<input name="txtNome" type="text" id="campo" style="width: 100%" value='<?php echo $this->portifolio->nome; ?>'/>
					</td>
				</tr>
				<!--Link-->
				<tr>
					<td>
						Link
					</td>
					<td>
						<input name="txtLink" type="text" id="campo" style="width: 100%" value='<?php echo $this->portifolio->link; ?>'/>
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
}
?>