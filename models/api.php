<?php

require_once 'conexion/conexion.php';

class api {

    public static function getAll(){
        $db = new conexion();
        $query = "SELECT * FROM empresa";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [

                    'id' => $row['Id_Empresa'],
                    'nombre' => $row['EMPRESAS'],
                    'descripcion' => $row['DESCRIPCION'],
                    'direccion' => $row['DIRECCION'],
                    'ruc' => $row['RUC'],
                    'fUENTE' => $row['FUENTE'],
                ];
            }
        }
        return $datos;

    }


    public static function getWhere($id_empresa){
        $db = new conexion();
        $query = "SELECT * FROM empresa where Id_Empresa = $id_empresa";
        $resultado = $db->query($query);
        $datos = [];
        if($resultado->num_rows){
            while($row = $resultado->fetch_assoc()){
                $datos[] = [

                    'id' => $row['Id_Empresa'],
                    'nombre' => $row['EMPRESAS'],
                    'descripcion' => $row['DESCRIPCION'],
                    'direccion' => $row['DIRECCION'],
                    'ruc' => $row['RUC'],
                    'fUENTE' => $row['FUENTE'],
                ];
            }
        }
        return $datos;

    }


    public static function insert($nombre,$descripcion,$direccion,$ruc,$fuente){
        $db = new conexion();
        $query = "INSERT INTO empresa (EMPRESAS,DESCRIPCION,DIRECCION,RUC,FUENTE) VALUES ('$nombre','$descripcion','$direccion','$ruc','$fuente')";
        $resultado = $db->query($query);
        if($db->affected_rows){
            return true;

        } 
        return false;   

    }

        public static function update($id,$nombre,$descripcion,$direccion,$ruc,$fuente){
        $db = new conexion();
        $query = "UPDATE empresa SET EMPRESAS = '$nombre', DESCRIPCION = '$descripcion', DIRECCION = '$direccion', RUC = '$ruc', FUENTE = '$fuente' WHERE Id_Empresa = $id";
        $resultado = $db->query($query);
        if($db->affected_rows){
            return true;

        } 
        return false;   

    }
        public static function delete($id){

        $db = new conexion();
        $query = "DELETE FROM empresa WHERE Id_Empresa = $id";
        $resultado = $db->query($query);
        if($db->affected_rows){
            return true;   
        }
        return false;


        }
}