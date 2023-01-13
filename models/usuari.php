<?php
@session_start();
class usuari
{

    public $nom_usuari;

    public function regisUsr()
    {
        $mysql = new mysqli("localhost", "root", "", "examen_php");
        if ($mysql->connect_error) {
            die('Problemas con la conexion a la base de datos');
        }
        $sql = "SELECT `idtema`, `tema` FROM `tema` WHERE 1;";

        $r = $mysql->query($sql);

        require_once 'views/game/triar_tema.php';
        return $r;
    }


    /**
     * Get the value of nom_usuari
     */
    public function getNom_usuari()
    {
        return $this->nom_usuari;
    }

    /**
     * Set the value of nom_usuari
     *
     * @return  self
     */
    public function setNom_usuari($nom_usuari)
    {
        $this->nom_usuari = $nom_usuari;

        return $this;
    }
}

?>