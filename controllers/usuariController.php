<?php

require_once "models/usuari.php";

@session_start();
class usuariController
{
    public function hola()
    {
        echo "hola php";
    }

    public function registrar_usuari()
    {
        $nom_usr = $_POST["usuari"];
        $usuari = new usuari();
        $usuari->setNom_usuari($nom_usr);
        $_SESSION["nom_usuari"] = $nom_usr;
        $usuari->regisUsr();
    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php");
    }

}
?>