<?php 
  
  define('HOST', 'localhost');  
  define('DBNAME', 'thebanco');  
  define('CHARSET', 'utf8');  
  define('USER', 'root');  
  define('PASSWORD', '');  

  class Conexao {  
  
      private static $pdo;
 
   
      private function __construct() {  
         try { 
            
            self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD);  

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            
         } catch (PDOException $e) {  
          print "Erro: " . $e->getMessage();  
       }  
      }

    public static function getInstance() {  
       if (empty(self::$instance)) {  
          new self; 
       }  
    
       return self::$pdo;  
     }   
  } 
?>