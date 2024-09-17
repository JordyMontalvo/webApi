<?php

class conexion extends mysqli{
    public function __construct(){
        parent::__construct('localhost','root','','empresagm');
        $this->query("SET NAMES 'utf8';");
        $this->connect_errno ? die('Error en la conexion') : $x = 'Conectado';
        echo $x;
        unset($x);
    }
}