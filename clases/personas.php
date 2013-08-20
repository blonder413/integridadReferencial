<?php
    require_once 'conexion.php';
    
    class Personas extends Conexion{
        
        private $connect;
        
        function __construct() {
            $this->connect = parent::getConnect();
        }
        
        //obtengo el listado de todas las personas
        public function all(){
            $query = 'SELECT `id`, `nombre`, `correo`, `telefono` FROM `personas`;';
            $stm = $this->connect->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function delete($id){
            try{
                $query = 'DELETE FROM `personas` WHERE id = ?;';
                $stm = $this->connect->prepare($query);
                $stm->bindParam('1',$id,PDO::PARAM_INT);
                //echo $query;exit;
                $stm->execute();
                header('Location: index.php?m=1');
            }catch(PDOException $e){
                // el error 23000 está relacionado con violación a la integridad referencial
                if($e->getCode() == 23000)
                    header('Location: index.php?m=2');
                elseif($e->getCode() == '42S02')
                    echo 'La tabla es incorrecta';
            }
        }
    }
?>
