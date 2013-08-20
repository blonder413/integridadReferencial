<?php
    require_once 'clases/personas.php';
    $persona = new Personas();
    $data = $persona->all();
?>
<!DOCTYPE html>
<html lang='es'>
    <head>
        <title>Integridad referencial con PHP y MySQL</title>
        <meta charset='UTF-8'>
    </head>
    <body>
        
        <?php
        if ( isset($_GET['m']) ) {
            switch ($_GET['m']){
                case 1:
                    echo 'Se ha borrado el registro';
                    break;
                case 2:
                    echo 'No se puede borrar el registro porque tiene datos asociados';
                    break;
            }
        }
        ?>
        
       <table border='1'>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th></th>
            </tr>

            <?php foreach($data as $row): ?>
            <tr>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['correo']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a></td>
            </tr>
            <?php endforeach; ?>
            
        </table> 
    </body>
</html>