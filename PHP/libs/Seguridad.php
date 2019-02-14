<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 14/02/2019
 * Time: 01:49 PM
 * Description: file to protect the system when there isn't a session started.
 */

class Seguridad{

    private $usuario = null;

    function __construct(){
        session_start();
        if(isset($_SESSION["usuario"])){
            $this->usuario =  $_SESSION["usuario"];
        }
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function addUsuario($usuario){
        $_SESSION["usuario"]=$usuario;
        $this->usuario=$usuario;
    }
}
