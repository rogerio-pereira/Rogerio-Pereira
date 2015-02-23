<?php

	/*
	 *	Classe curriculum
	 *	Curriculum Pessoal
	 */
	class curriculum extends controladorCurriculum
	{
		/*
		 *	Variaveis
		 */
		private $curriculum;
		private $collectionEscolaridade;
		private $collectionExperiencia;
		private $collectionCursos;
		
		/*
		 *	Mï¿½todo Construtor
		 */
		public function __construct()
		{
			$this->curriculum			= $this->getCurriculum();
			$this->collectionExperiencia	= $this->getExperiencia();
			$this->collectionCursos		= $this->getCursos();	
			$this->collectionEscolaridade	= $this->getEscolaridade();
		}
		
		/*
		 *	Mï¿½todo show
		 *	Exibe as informaï¿½ï¿½es na tela
		 */
		public function show()
		{
		?>
			<table style="width: 100%">
				<!--Data de Nascimento-->
				<tr>
					<tr>
						<td colspan='2'>
							<h1>Curriculum Vitae</h1>
						</td>
					</tr>
					<tr>
						<td>
							<h3>Nome:</h3>
						</td>
						<td>
							<?php 
								echo $this->curriculum->nome;
							?>
						</td>
					</tr>
					<td style="width: 11%">
						<h3>Nascimento:</h3>
					</td>
					<td>
						<?php 
							echo ' '.$this->converteData($this->curriculum->nascimento).' ('.$this->calculaIdade($this->curriculum->nascimento).' anos)';
						?>
					</td>
				</tr>
				<!--Estado Civil-->
				<tr>
					<td>
						<h3>Estado Civil:</h3>
					</td>
					<td>
						<?php 
							echo $this->curriculum->estadocivil;	

							if($this->curriculum->fumante)
								echo ', Fumante';
							else
								echo ', Não Fumante';

							echo ', '.$this->curriculum->complementoEstadoCivil;
						?>
					</td>
				</tr>
				<!--EstadoCivil-->
				<tr>
					<td>
						<h3>Endereço:</h3>
					</td>
					<td>
						<?php 
									echo 
										' '.$this->curriculum->endereco.
										' '.$this->curriculum->enderecoNumero.
										', '.$this->curriculum->bairro.
										'. '.$this->curriculum->cidade.
										' - '.$this->curriculum->estado;
								?>
					</td>
				</tr>
				<!--Telefone-->
				<tr>
					<td>
						<h3>Telefone:</h3>
					</td>
					<td>
						<?php
							echo ' '.$this->curriculum->telefone.' ('.$this->curriculum->operadora.')';

							if($this->curriculum->recado)
								echo ', Telefone para recados';
						?>
					</td>
				</tr>
				<!--Telefone2-->
				<?php
					if($this->curriculum->telefone2 != '')
							{
								echo "<tr>
										<td>
											<h3>Telefone 2:</h3> 
										</td>
										<td>".$this->curriculum->telefone2.' ('.$this->curriculum->operadora2.')';

											if($this->curriculum->recado2)
												echo ', Telefone para recado';
								echo '	</td>
									</tr>';

							}
				?>
				<!--Email-->
				<tr>
					<td>
						<h3>E-mail</h3>
					</td>
					<td>
						<?php echo $this->curriculum->email; ?>
					</td>
				</tr>
				<!--Objetivo-->
				<tr>
					<td colspan='2'>
						<h1>Objetivo</h1>
						<?php echo $this->curriculum->objetivoProfissional; ?>
					</td>
				</tr>
				<!--Escolaridade-->
				<tr>
					<td colspan='2'>
						<h1>Escolaridade</h1>
					</td>
				</tr>
				<?php
					foreach ($this->collectionEscolaridade as $escolariade)
					{
						echo "
							<tr>
								<td colspan='2'>
									<h2>{$escolariade->curso}</h2>
								</td>
							</tr>
							<tr>
								<td>
									<h3>Instituição:</h3>
								</td>
								<td>
									{$escolariade->instituicao}
								</td>
							</tr>
							<tr>
								<td>
									<h3>Cidade:</h3>
								</td>
								<td>
									{$escolariade->cidade} - {$escolariade->estado}
								</td>
							</tr>";

							if($escolariade->cursando)
								echo "
									<tr>
										<td>
											<h3>Cursando:</h3>
										</td>
										<td>
											{$escolariade->cursandoPeriodo}
										</td>
									</tr>";
							else
								echo "
									<tr>
										<td align='left'>
											<h3>Concluido em:</h3>
										</td>
										<td>
											{$escolariade->concluido}
										</td>
									</tr>";
							echo "<tr><td colspan='2'><br></td></tr>";
					}
				?>
				<!--Cursos-->
				<tr>
					<td colspan='2'>
						<h1>Cursos Extra-Curriculares</h1>
					</td>
				</tr>
				<?php
					foreach ($this->collectionCursos as $curso)
					{
						echo"
							<tr>
								<td colspan='2'>
									<h2>{$curso->nome}</h2>
								<td>
							</tr>";

						if($curso->descricao != '')
							echo "
								<tr>
									<td>
										<h3>Sobre o curso:</h3>
									</td>
									<td>
										{$curso->descricao}
									</td>
								</tr>";

						echo " 
							<tr>
								<td>
									<h3>Instituição:</h3>
								</td>
								<td>
									{$curso->instituicao}
								</td>
							</tr>
							<tr>
								<td>
									<h3>Cidade</h3>
								</td>
								<td>
									{$curso->cidade} - {$curso->estado}
								</td>
							</tr>
							<tr>
								<td>
									<h3>Carga Horária:</h3>
								</td>
								<td>
									{$curso->duracao}
								</td>
							</tr>
							<tr><td colspan='2'><br></td></tr>";
					}
				?>
				<!--Conhecimentos Especificos-->
				<tr>
					<td colspan='2'>
						<h1>Conhecimentos Específicos</h1>
						<?php echo $this->curriculum->conhecimentosEspecificos; ?>
					</td>
				</tr>
				<!--Experiencia Profissional-->
				<tr>
					<td colspan='2'>
						<h1>Experiencia Profissional</h1>
					</td>
				</tr>
				<?php
					foreach ($this->collectionExperiencia as $experiencia)
					{
						echo"
							<tr>
								<td colspan='2'>
									<h2>{$experiencia->cargo}</h2>
								<td>
							</tr>
							<tr>
								<td>
									<h3>Empresa</h3>
								</td>
								<td>
									{$experiencia->empresa}
								</td>
							</tr>
							<tr>
								<td>
									<h3>Cidade</h3>
								</td>
								<td>
									{$experiencia->cidade} - {$experiencia->estado}
								</td>
							</tr>";
						if($experiencia->empregoAtual)
						{
							echo "
								<tr>
									<td>
										<h3>Período</h3>
									</td>
									<td>
										{$this->converteData($experiencia->entrada)} até Atualmente
									</td>
								</tr>";
						}
						else
						{
							$periodo = $this->calculaPeriodo($experiencia->entrada, $experiencia->saida);
							echo "
								<tr>
									<td>
										<h3>Período</h3>
									</td>
									<td>
										{$this->converteData($experiencia->entrada)} até {$this->converteData($experiencia->saida)} ($periodo)
									</td>
								</tr>";
						}

						echo "<tr><td colspan='2'><br></td></tr>";
					}
				?>
				<tr>
					<td colspan='2'>
						<h1>Perfil Profissional</h1>
						<?php echo $this->curriculum->perfilProfissional; ?>
					</td>
				</tr>
			</table>
		<?php		
			echo "<script>refreshScroller();</script>";
		}
	}
?>