<?php

/*
 * Classe alteraSenha
 */

class alteraSenha {
	/*
	 * Variaveis
	 */

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
	}

	/*
	 * Método show
	 * Exibe as informações na tela
	 */
	public function show() 
	{
	?>
		<div >
                    <form class="formulario" name="alteraSenha" method="post" action="app.control/ajax.php" onsubmit="return validaCamposAlteraSenha();">
			<input type="hidden" id="action" name="action"/>
                        <table class="contatoTable" style='width: 30%'>
                            <!--Titulo-->
                            <tr id="titulo">
                                <td colspan="2" align="center">
                                    Alteração de Senha
                                </td>
                            </tr>
                            <!--Senha-->
                            <tr>
                                <td>
                                    Senha
                                </td>
                                <td>
                                    <input name="txtSenha" type="password" id="campo" />
                                </td>
                            </tr>
			   <!--Nova Senha-->
                            <tr>
                                <td>
                                    Nova Senha
                                </td>
                                <td>
                                    <input name="txtNova" type="password" id="campo" />
                                </td>
                            </tr>				
			    <!--Confirmação Senha-->
                            <tr>
                                <td>
                                    Confirmação
                                </td>
                                <td>
                                    <input name="txtConfirmacao" type="password" id="campo" />
                                </td>
                            </tr>		
                            <!--Botões-->
                            <tr>
                                <td colspan=2 align=center style="width: 100%">
                                    <input name="botaoEnviar" type="submit" id="botaoEnviar" value="Alterar" />
                                    <input name="botaoLimpar" type="reset" id="botaoLimpar" value="Limpar" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
	<?php
	}

}

?>