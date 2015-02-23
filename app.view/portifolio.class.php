<?php

	class portifolio extends controladorPortifolio
	{
		/*
		 *	Variaveis
		 */
		private $collectionPortifolio;
		
		/*
		 *	M�todo Construtor
		 *	Recupera o portifolio
		 */
		public function __construct()
		{
			$this->collectionPortifolio = $this->getPortifolio();
		}
		
		/*
		 *	M�todo show
		 *	Exibe as informa��es na tela
		 */
		public function show()
		{	
			echo 
				"
					<h1>Portif�lio</h1>

					<ul id='portifolio'>
				";
			foreach($this->collectionPortifolio as $portifolio)
			{
				echo
					"
						<li>
							<a href='{$portifolio->link}' target='_blank'>
								<figure class='protifolio-imagem'>
									<img src='app.view/img/portifolio/{$portifolio->codigo}.jpg'>
									<figcaption>
										<div class='portifolio-legenda'>
											<h1>{$portifolio->nome}</h1>
											<p>
												{$portifolio->descricao}
											</p>
											<p>
												Utilizado: {$portifolio->utilizado}
											</p>
										</div>
									</figcaption>
								</figure>
							</a>
						</li>
					";
			}	
			
			echo '</ul>';
		}
	}
?>