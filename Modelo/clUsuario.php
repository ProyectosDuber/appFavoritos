<?php

require_once './db_abstract_class.php';
class clUsuario extends db_abstract_class {
    
    private $idUsuario;
    private $username;
    private $password;
    
    
    function __construct($datos = array()) {
        parent::__construct();
        
            if(count($datos) >1){
                foreach ( $datos as $columna =>$dato ){
                    $this->$columna = $dato;
                }
                
            }else{
                $this->username="";
                $this->password="";
            }
        
    }
    
    function __destruct() {
        $this->Disconnect();
        
    }   

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

        
    
    protected function editar() {
        $query = "UPDATE Usuarios SET username=?,password=? where idUsuario=?";
       $params = array(
       $this->username,
       $this->password,
       $this->idUsuario    
       );
        
        parent::updateRow($query, $params);
            $this->Disconnect();
    }

    protected function eliminar() {
        
    }

    protected function insertar() {
             $query = "INSERT INTO Usuarios VALUES('NULL',?,?)";
       $params = array(
       $this->username,
       $this->password
      
       );
        
        parent::insertRow($query, $params);
        $this->Disconnect();
    }

    public static function buscar($query,$parametros = array()) {
        
    $array =   parent::getRow($query, $parametros);
    $usuario = new clUsuario();
    foreach ($array as $column=>$valor){
        $usuario->$column = $valor;
    }
    return $usuario ;
    }

    public static function buscarForId($id) {
   
        
    }

    public static function getAll() {
        
    }

}
