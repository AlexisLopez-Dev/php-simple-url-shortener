<?php
const OPC_DEFECTO = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

class Database{
    private $connection;
    public function __construct(string $dns, string $usuario='root', string $password = '', array $opciones = OPC_DEFECTO){
            try{
                $this->connection = new PDO ($dns, $usuario, $password, $opciones);
            } catch (PDOException $e){
                die ('Falló la conexión: ' . $e->getMessage());
            }
    }

    public function executeQuery($sql, $params=[]){
        $sentence = $this->connection->prepare($sql);
        $sentence->execute($params);
        return $sentence->fetchAll();
    }

    public function executeUpdate($sql, $params=[]){
        $sentence = $this->connection->prepare($sql);
        if ($sentence->execute($params)){
            return $sentence->rowCount();
        }
        return -1;
    }

}