<?php

    /*
     *  Classe Contato
     *  Formulario de Contato
     */
    class contato
    {
        /*
         *  Método construtor
         *  Inicia a classe e exibe o formulario
         */
        //public function __construct($codigo)
        public function __construct()
        {
            $this->show();
        }
        
        /*
         *  Método show
         *  Exibe a pagina
         */
        public function show()
        {
            ?>
                <div class='contatoContent'>
                    <form class="contatoForm" name="contato" method="post" action="app.control/enviaEmail.class.php" onsubmit="return validaCamposContato();">
                        <table class="contatoTable">
                            <!--Titulo-->
                            <tr id="titulo">
                                <td colspan="2" align="center" style="width: 100%">
                                    Contato
                                </td>
                            </tr>
                            <!--Nome-->
                            <tr>
                                <td style="width: 30%">
                                    Nome:
                                </td>
                                <td style="width: 70%">
                                    <input name="txtNome" type="text" id="campo" width="150px"/>
                                </td>
                            </tr>
                            <!--Email-->
                            <tr>
                                <td style="width: 30%">
                                    E-mail
                                </td>
                                <td style="width: 70%">
                                    <input name="txtEmail" type="text" id="campo" />
                                </td>
                            </tr>
                            <!--Telefone-->
                            <tr>
                                <td style="width: 30%">
                                    Telefone
                                </td>
                                <td style="width: 70%">
                                    <input name="txtTelefone" class='campoTelefone' type="text" id="campo" />
                                </td>
                            </tr>
                            <!--Cidade-->
                            <tr>
                                <td style="width: 30%">
                                    Cidade
                                </td>
                                <td style="width: 70%">
                                    <input name="txtCidade" type="text" id="campo" />
                                </td>
                            </tr>
                            <!--Assunto-->
                            <tr>
                                <td style="width: 30%">
                                    Assunto
                                </td>
                                <td style="width: 70%">
                                    <input name="txtAssunto" type="text" id="campo" />
                                </td>
                            </tr>
                            <!--Label Mensagem-->
                            <tr>
                                <td colspan="2" style="width: 100%">
                                    Mensagem
                                </td>
                            </tr>
                            <!--Mensagem-->
                            <tr>
                                <td colspan="2" style="width: 100%">
                                    <textarea name="txtMensagem" id="campo" style="height: 100px; width: 98%;"></textarea>
                                </td>
                            </tr>
                            <!--Botões-->
                            <tr>
                                <td colspan=2 align=center style="width: 100%">
                                    <input name="botaoEnviar" type="submit" id="botaoEnviar" value="Enviar" />
                                    <input name="botaoLimpar" type="reset" id="botaoLimpar" value="Limpar" />
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <script>
                    adicionaMascaraTelefone();
                </script>
            <?php
        }
    }
    new contato;
?>