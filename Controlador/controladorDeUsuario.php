<?php
require_once '../Modelo/db_abstract_class.php';
require_once ('../Modelo/clUsuario.php');

if(!empty($_GET['action'])){
	usuarios_controller::main($_GET['action']);
}

class usuarios_controller{
	
	static function main($action){
		if ($action == "crear"){
			usuarios_controller::crear();
		}else if ($action == "editar"){
			usuarios_controller::editar();
		}else if ($action == "buscarID"){
			usuarios_controller::buscarID(1);
		}else if($action == "buscar"){
                    usuarios_controller::buscar();
                }
	}
	
	static public function crear (){
		try {
			$arrayUser = array();
			$arrayUser['cedula'] = $_POST['cedula'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
                        $arrayUser['sexo'] = $_POST['sexo'];
			$arrayUser['fechaDeNacimiento'] = $_POST['fechaDeNacimiento'];
                        $arrayUser['telefono'] = $_POST['telefono'];
                        $arrayUser['email'] = $_POST['email'];
                        $arrayUser['direccion'] = $_POST['direccion'];
			
			$usuario = new usuarios ($arrayUser);
			$usuario->insertar();
			header("Location: ../frmNewUser.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../frmNewUser.php?respuesta=error");
		}
	}
	
	static public function editar (){
		try {
			
			$arrayUser = array();
			$arrayUser['cedula'] = $_POST['cedula'];
			$arrayUser['nombres'] = $_POST['nombres'];
			$arrayUser['apellidos'] = $_POST['apellidos'];
                        $arrayUser['sexo'] = $_POST['sexo'];
			$arrayUser['fechaDeNacimiento'] = $_POST['fechaDeNacimiento'];
                        $arrayUser['telefono'] = $_POST['telefono'];
                        $arrayUser['email'] = $_POST['email'];
                        $arrayUser['direccion'] = $_POST['direccion'];
			
			$usuario = new usuarios ($arrayUser);
			$usuario->editar();
			header("Location: ../frmNewUser.php?respuesta=correcto");
		} catch (Exception $e) {
			header("Location: ../frmNewUser.php?respuesta=error");
		}
	}
	
	static public function buscarID ($id){
		try { 
			return usuarios::buscarForId($id);
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}
	
	public static function buscarAll (){
		try {
			return usuarios::getAll();
		} catch (Exception $e) {
			header("Location: ../buscar.php?respuesta=error");
		}
	}

	public static function buscar (){
		try {
                   $arrayDeUsuario =array();
                   $arrayDeUsuario['username'] = $_POST['username'];
                   $arrayDeUsuario['password'] = $_POST['password'];
                     echo $arrayDeUsuario['username']." ".$arrayDeUsuario['password'];
                   
                   $usario = clUsuario::buscar("SELECT * FROM Usuarios where username=? and password=?", $arrayDeUsuario);
                   
                 
//                   header("Location: ../Vista/favoritos.php?respuesta=correcto");
               
                    
		} catch (Exception $e) {
                    echo 'error';
//			header("Location: ../Vista/favoritos.php?respuesta=error");
		}
	}
	
}
?>