<?php
    require_once 'clases/personas.php';
    $persona = new Personas();
    $persona->delete($_GET['id']);
?>