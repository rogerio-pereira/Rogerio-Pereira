<?php

/*
 * Classe alteraCurso
 */
class alteraCurso
{
	/*
	 * Variaveis
	 */
	private $control;
	private $collectionCurso;
	private $curso;
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
			$this->control = new controladorCurriculumGestor;
			
			//Se tem id na URL
			if(isset($_GET['id']))
			{
				$this->codigo		= $_GET['id'];
				$this->curso		= $this->control->getCursoId($this->codigo);
			}
			else
				$this->collectionCurso = $this->control->getCursos();
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
			<form class="formulario" name="alteraCurso1" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraCurso1', 'alteraCurso1');">
				<input type="hidden" id="action" name="action"/>
				<table class="contatoTable" style='width: 100%'>
					<!--Titulo-->
					<tr id="titulo">
						<td colspan="4" align="center">
							Curso
						</td>
					</tr>
					<?php
						foreach ($this->collectionCurso as $curso)
						{
							echo
								"
								<!--{$curso->curso}-->
								<tr>
									<td>
										<input type='radio' name='codigo' value='{$curso->codigo}'>
									</td>
									<td>
										{$curso->nome}
									</td>
									<td>
										{$curso->instituicao}
									</td>
									<td>
										{$curso->cidade} - {$curso->estado} 
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
		<form class="formulario" name="cadastraCurso" method="post" action="app.control/ajax.php" onsubmit="doPost('alteraCurso2', 'alteraCurso2');">
			<input type="hidden" id="action" name="action"/>
			<input type="hidden" id="action" name="codigo" value='<?php echo $this->codigo; ?>'/>
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
						<input name="txtCurso" type="text" id="campo" style="width: 100%" value='<?php echo $this->curso->nome; ?>'/>
					</td>
				</tr>
				<!--Descrição-->
				<tr>
					<td style='vertical-align:top;'>
						Descrição
					</td>
					<td>
						<textarea name='txtDescricao' id='campo' style='height: 170px; width: 99.6%'><?php echo $this->curso->descricao; ?></textarea>
					</td>
				</tr>
				<!--Categoria-->
				<tr>
					<td>
						Categoria
					</td>
					<td>
					<?php
						if($this->curso->categoria == 1)
							echo 
							"
								<select name='comboCategoria' style='width: 101%'>
									<option value='1' selected>	Computação	</option>
									<option value='2'>			Linguas		</option>
									<option value='3'>			Outros		</option>
								  </select>
							";
						else if($this->curso->categoria == 2)
							echo 
							"
								<select name='comboCategoria' style='width: 101%'>
									<option value='1'>			Computação	</option>
									<option value='2' selected>	Linguas		</option>
									<option value='3'>			Outros		</option>
								  </select>
							";
						else if($this->curso->categoria == 3)
							echo 
							"
								<select name='comboCategoria' style='width: 101%'>
									<option value='1'>			Computação	</option>
									<option value='2'>			Linguas		</option>
									<option value='3' selected>	Outros		</option>
								  </select>
							";
					?>
					</td>
				</tr>
				<!--Instituição-->
				<tr>
					<td >
						Instituição
					</td>
					<td>
						<input name="txtInstituicao" type="text" id="campo" style="width: 100%" value='<?php echo $this->curso->instituicao; ?>'/>
					</td>
				</tr>
				<!--Cidade-->
				<tr>
					<td >
						Cidade
					</td>
					<td>
						<input name="txtCidade" type="text" id="campo" style="width: 100%" value='<?php echo $this->curso->cidade; ?>'/>
					</td>
				</tr>
				<!--Estado-->
				<tr>
					<td>
						Estado
					</td>
					<td>
						<input name="txtEstado" type="text" id="campo" style="width: 100%" value='<?php echo $this->curso->estado; ?>'/>
					</td>
				</tr>
				<!--Duração-->
				<tr>
					<td>
						Duracao
					</td>
					<td>
						<input name="txtDuracao" type="text" id="campo" style="width: 100%" value='<?php echo $this->curso->duracao; ?>'/>
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