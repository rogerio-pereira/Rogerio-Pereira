<?php
    session_start();
    
    /*
     *  Classe logout
     */
    class logout
    {
        /*
         *  M�todo Construtor
         */
        public function __construct()
        {
            session_destroy();
            echo
                "
                    <script>
                        top.location='?class=login';
                    </script>
                ";
        }
    }
    
?>