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
			foreach($this->collectionPortifolio as $portifolio)
			{
				echo
					"
						<div class='portifolioBox'>
							<h2>{$portifolio->nome}</h2><br>
							<a href='{$portifolio->link}' target='_blank'>
								<img src='app.view/img/portifolio/{$portifolio->codigo}.jpg' title='{$portifolio->nome}'>
							</a><br>
							{$portifolio->descricao}
						</div>
					";
			}
		}
	}
?>