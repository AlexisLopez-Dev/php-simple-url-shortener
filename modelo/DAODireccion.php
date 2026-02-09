<?php
require_once __DIR__ . "/../database/Database.php";
require_once __DIR__ . "/../database/config.inc.php";
require_once 'Direccion.php';

class DAODireccion {
    private $db;
    public function __construct(){
        $this->db = new Database(DNS, USER, PASSWORD);
    }

    public function insert($urlCorta, $urlLarga){
        $sql = "INSERT INTO direcciones (urlCorta, urlLarga) VALUES (:v1, :v2)";
        $params = [
            ':v1'=>$urlCorta,
            ':v2'=>$urlLarga
        ];
        return $this->db->executeUpdate($sql, $params);
    }

    public function buscarPorUrlCorta($urlCorta){
        $sql = "SELECT * FROM `direcciones` WHERE urlCorta LIKE :v1";
        $params = [
            ':v1'=>$urlCorta,
        ];
        return $this->db->executeQuery($sql, $params);
    }

    public function getAll(){
        $sql = "SELECT * FROM direcciones";
        $filas = $this->db->executeQuery($sql);
        $lista = [];
        foreach ($filas as $f){
            $direccion = new Direccion($f['id'], $f['urlCorta'], $f['urlLarga'], $f['clicks']);
            $lista[] = $direccion;
        }
        return $lista;
    }

    public function delete($id){
        $sql = "DELETE FROM direcciones WHERE id = :id";
        $params = [':id' => $id];
        return $this->db->executeUpdate($sql, $params);
    }

    public function obtenerPorId($id){
        $sql = "SELECT * FROM direcciones WHERE id =  :id";
        $params = [':id' => $id];
        $filas = $this->db->executeQuery($sql, $params);
        if (!empty($filas)){
            $f = $filas[0];
            return new Direccion($f['id'], $f['urlCorta'], $f['urlLarga'], $f['clicks']);
        }
        return null;
    }

    public function obtenerPorUrlCorta($urlCorta){
        $sql = "SELECT * FROM direcciones WHERE urlCorta =  :urlCorta";
        $params = [':urlCorta' => $urlCorta];
        $filas = $this->db->executeQuery($sql, $params);
        if (!empty($filas)){
            $f = $filas[0];
            return new Direccion($f['id'], $f['urlCorta'], $f['urlLarga'], $f['clicks']);
        }
        return null;
    }

    public function updateClicks ($id, $nuevoValor){
        $sql = "UPDATE direcciones SET clicks=:v1 WHERE id=:id";
        $params = [
            ':v1' => $nuevoValor,
            ':id' => $id
        ];
        return $this->db->executeUpdate($sql, $params);
    }

    public function updateUrlLarga ($id, $urlLarga){
        $sql = "UPDATE direcciones SET urlLarga=:v1 WHERE id=:id";
        $params = [
            ':v1' => $urlLarga,
            ':id' => $id
        ];
        return $this->db->executeUpdate($sql, $params);
    }


}