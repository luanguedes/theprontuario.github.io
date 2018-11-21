<?php 
  
  define('HOST', 'sql100.epizy.com');  
  define('DBNAME', 'epiz_23011478_thebanco');  
  define('CHARSET', 'utf8');  
  define('USER', 'epiz_23011478');  
  define('PASSWORD', '123');  

  class Conexao {  
  
      private static $pdo;
 
   
      private function __construct() {  
         try { 
            
            self::$pdo = new PDO("mysql:host=" . HOST . "; charset=" . CHARSET . ";", USER, PASSWORD); self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        self::$pdo->query("CREATE DATABASE IF NOT EXISTS epiz_23011478_thebanco");
        self::$pdo = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD); 
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       

        
        self::$pdo->query("CREATE TABLE IF NOT EXISTS especialidade(
            idesp int(11) NOT NULL,
            especialidade varchar(100) DEFAULT NULL,
            status varchar(10) DEFAULT NULL,
            data_cadastro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            data_alteracao timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
      )");
       
        self::$pdo->query("CREATE TABLE IF NOT EXISTS paciente(
            id int(11) NOT NULL ,
            nome varchar(100) DEFAULT NULL,
            sexo varchar(20) DEFAULT NULL,
            data_nascimento date DEFAULT NULL,
            cns varchar(20) DEFAULT NULL,
            nome_mae varchar(100) DEFAULT NULL,
            endereco varchar(20) DEFAULT NULL,
            telefone varchar(20) DEFAULT NULL,
            status varchar(10) DEFAULT NULL,
            data_cadastro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            data_alteracao timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
      )");

        self::$pdo->query("CREATE TABLE IF NOT EXISTS profissional(
            id int(11) NOT NULL ,
            nome varchar(100) DEFAULT NULL,
            sexo varchar(20) DEFAULT NULL,
            data_nascimento date DEFAULT NULL,
            cns varchar(50) DEFAULT NULL,
            telefone varchar(20) DEFAULT NULL,
            idespecialidade int(11) DEFAULT NULL,
            status varchar(10) DEFAULT NULL,
            data_cadastro timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            data_alteracao timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
      )");


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