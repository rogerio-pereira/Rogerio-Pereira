<?php

    /*
     *  Classe TTransaction
     *  Esta classe prove os m�todos necessarios para manipular transa��oes
     *  Atomicidade
     *  Consistencia
     *  Isolamento
     *  Durabilidade
     */
    final class TTransaction2
    {
        private static $conn;   //Conex�o Ativa
        private static $logger; //Objeto de LOG
        
        /*
         *  M�todo __construct
         *  Est� declarado como private para impedir que se crie instancias de TTransaction
         */
        private function __construct()
        {
            
        }
        
        /*
         *  M�todo open()
         *  Abre uma transa��o e uma conex�o ao Banco de Dados
         *  @param $database = nome do banco de dados
         */
        public static function open($database)
        {
            //Abre uma conex�o e armazena na propriedade estatica $conn
            if(empty(self::$conn))
            {
                self::$conn = TConnection2::open($database);
                //Inicia transa��o
                self::$conn->beginTransaction();
                //Desliga o log do SQL
                self::$logger = NULL;
            }
        }
        
        /*
         *  M�todo get()
         *  retorna a conex�o ativa da transa��o
         */
        public static function get()
        {
            //Retorna a conex�o ativa
            return self::$conn;
        }
        
        /*
         *  Metodo rollback()
         *  Desfaz todas opera��es realizadas na transa��o
         */
        public static function rollback()
        {
            if(self::$conn)
            {
                //Desfaz as opera��es realizadas durante a transa��o
                self::$conn->rollBack();
                self::$conn = NULL;
            }
        }
        
        /*
         *  M�todo close()
         *  Aplica todas as opera��es realizadas e fecha a transa��o
         */
        public static function close()
        {
            if(self::$conn)
            {
                //Aplica as opera��es realizadas durante a transa��o
                self::$conn->commit();
                self::$conn = NULL;
            }
        }
        
        /*
         *  M�todo setLogger()
         *  Armazena uma mensagem no arquivo de LOG
         *  Baseada a estrat�gia ($logger) atual
         */
        public static function setLogger(TLogger $logger)
        {
            self::$logger = $logger;
        }
        
        /*
         *  M�todo log()
         *  Armazena uma mensagem no arquivo de LOG
         *  Baseada na estrat�gia ($logger) atual
         */
        public static function log($message)
        {
            //Verifica se existe um logger
            if(self::$logger)
            {
                self::$logger->write($message);
            }
        }
    }
    
?>