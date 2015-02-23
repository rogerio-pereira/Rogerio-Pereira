<?php
	/*
	 *	Classe social
	 *	Exibe os links para redes sociais
	 */
	class social extends controladorSocial
	{
		/*
		 *	Variaveis
		 */
		private $collectionSocial;
		
		/*
		 *	Método construtor
		 */
		public function __construct()
		{
			$this->collectionSocial = $this->getSocial();
		}
		
		/*
		 *	Método show
		 *	Exibe as informações na tela
		 */
		public function show()
		{
			echo "<h1>Redes Sociais</h1>";
			echo "<div align='center'>";
			foreach($this->collectionSocial as $social)
			{
				echo
					"
						<div class='socialBox'>
							<a href='{$social->link}' target='_blank' class='socialBox' id='link'>
								<img
									src='app.view/img/social/{$social->codigo}.png'
									title='$social->nome'
									class='socialBox'
									id='imagem'
								>
							</a>
						</div>
					";
			}
			echo "</div>";
			
			echo "<script>refreshScroller();</script>";
		}
	}
?>