<?php
@session_start();
class visitant
{
    public function listar()
    {
        $mysql = new mysqli("hl1162.dinaserver.com", "lasalleborsa", "LaSalle_db23", "examen_php");

        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }

        $sql = "SELECT * FROM ofertes_empreses";
        $resultado = $mysql->query($sql);
        $mysql->close();
        return $resultado;
    }

}