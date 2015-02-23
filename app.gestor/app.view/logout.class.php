<?php
    session_start();
    
    /*
     *  Classe logout
     */
    class logout
    {
        /*
         *  Método Construtor
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