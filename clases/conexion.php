<?php
    abstract class Conexion {
        protected $dbh;
        
        public function getConnect(){
            $connect = array(
                'driver'        => 'mysql',
                'server'        => 'localhost',
                'dbUser'        => 'root',
                'dbPassword'    => '',
                'dbName'        => 'codeigniter'
            );
            
            try{             
                $this->dbh = new PDO (
                    $connect['driver'] . ':host=' . $connect['server'] . ';dbname=' . $connect['dbName'],
                    $connect['dbUser'],
                    $connect['dbPassword'],
                    array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                    )
		);
                $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $this->dbh;
            }catch(PDOException $e){
                echo $e->getCode();
                echo 'Error al conectar: ' . $e->getMessage();exit;
            }
        }   

    }
?>
