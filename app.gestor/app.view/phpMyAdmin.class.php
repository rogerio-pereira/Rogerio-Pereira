<?php

/*
 * Classe phpMyAdmin
 */
class phpMyAdmin 
{
	/*
	*  M�todo Construtor
	*/
	public function __construct()
	{
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
			echo
			"
				<script>
					top.location='admin';
				</script>
			";
		}
	}
}
?>