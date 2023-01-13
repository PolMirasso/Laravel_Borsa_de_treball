<?php

require_once "models/visitant.php";

@session_start();
class visitantController
{


    public function obtindreTaula()
    {
        $visitant = new visitant();
        $visitant = $visitant->listar();

        require_once 'views/visitant/borsa_treball.php';
    }

    public function logout()
    {
        session_destroy();
        header("Location:index.php");
    }

}
?>