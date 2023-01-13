<?php

require_once "models/empresa.php";

@session_start();
class empresaController
{


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