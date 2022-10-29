<?php
define("HOST","localhost");
define("USER","root");
define("PASS","");
define("PORT","3306");
define("DBNAME","db_proyectofinal");

class DB extends mysqli{
	protected static $instance;

	public function __constructor($host,$user,$pass,$dbname,$port){
		@parent::__constructor($host,$user,$pass,$dbname,$port);
		if(mysqli_connect_errno()){
			throw new Exception("error de conexion", 1);
		}
	}

	public static function getDBConnection(){
		if(!self::$instance){
			self::$instance = new self(HOST,USER,PASS,DBNAME,PORT);
			$consulta = "SET CHARACTER SET UTF8";
			self::$instance->query($consulta);
		}
		return self::$instance;
	}
	//**************************** Usuarisos   ******************/
	public function GetUser($username, $password){
		$consulta = "SELECT * FROM usuarios WHERE username='".$username."' AND password='".$password."'";
		return $this->query($consulta);
	}
	public function Setuser($username, $password,$name,$rol){
		$consulta = "INSERT INTO usuarios (id, username, password, name,rol) VALUES 
		(Null, '".$username."', '".$password."', '".$name."',$rol)";
		return $this->query($consulta);
	}
	public function UpdateUser($id,$username, $password,$name,$rol){
		$consulta = "UPDATE usuarios SET 
		username = '$username',password = '$password',name = '$name',rol = $rol
		WHERE usuarios.id = $id";
		return $this->query($consulta);
	}
	public function DeleteUser($username){
		$consulta = "DELETE FROM usuarios WHERE usuarios.username = '$username'";
		return $this->query($consulta);
	}

	//**************************** Productos  ********************/
	public function GetProducto($nombre){
		$consulta = "SELECT * FROM productos WHERE nombre='".$nombre."'";
		return $this->query($consulta);
	}
	public function SetProducto($nombre,$valor,$foto,$descripcion,$disponibilidad){
		$consulta = "INSERT INTO productos (id, nombre,valor,foto,descripcion,disponibilidad) VALUES 
		(Null,'".$nombre."', $valor,'".$foto."','".$descripcion."', $disponibilidad)";
		return $this->query($consulta);
	}
	public function UpdateProducto($id,$nombre,$valor,$foto,$descripcion,$disponibilidad){
		$consulta = "UPDATE productos SET 
		nombre = '$nombre',valor = $valor,foto = '$foto',descripcion = '$descripcion',disponibilidad = $disponibilidad 
		WHERE productos.id = $id";
		return $this->query($consulta);
	}
	public function DeleteProducto($nombre){
		$consulta = "DELETE FROM productos WHERE productos.nombre = '$nombre'";
		return $this->query($consulta);
	}
	//*********************************** Mesas *********************************************//
	public function GetMesa($nombre){
		$consulta = "SELECT * FROM 	mesas WHERE nombre = '".$nombre."'";
		return $this->query($consulta);
	}
	public function SetMesa($nombre,$disponibilidad,$descripcion){
		$consulta = "INSERT INTO mesas (id, nombre,disponibilidad,descripcion) VALUES 
		(Null,'".$nombre."', $disponibilidad,'".$descripcion."')";
		return $this->query($consulta);		
	}
	public function UpdateMesa($id,$nombre,$disponibilidad,$descripcion){
		$consulta = "UPDATE mesas SET
		nombre = '$nombre',disponibilidad = $disponibilidad ,descripcion = '$descripcion' 
		WHERE mesas.id = $id";
		return $this->query($consulta);		
	}
	public function DeleteMesa($nombre){
		$consulta = "DELETE FROM mesas WHERE mesas.nombre = '$nombre'";
		return $this->query($consulta);
	}

	//*********************************** Pedidos *********************************************//
	public function GetPedido($id_mesa){
		$consulta = "SELECT * FROM 	pedidos WHERE id_mesa = '".$id_mesa."'";
		return $this->query($consulta);
	}
	public function SetPedido($id_usuario,$id_mesa,$estado,$valor){
		$consulta = "INSERT INTO pedidos (id, id_usuario,id_mesa,estado,valor) VALUES 
		(Null,$id_usuario, $id_mesa,$estado,$valor)";
		return $this->query($consulta);		
	}
	public function UpdatePedido($id,$id_usuario,$id_mesa,$estado,$valor){
		$consulta = "UPDATE pedidos SET
		id_usuario = $id_usuario,id_mesa = $id_mesa,estado = $estado,valor = $valor 
		WHERE pedidos.id = $id";
		return $this->query($consulta);		
	}
	public function DeletePedido($id_mesa){
		$consulta = "DELETE FROM pedidos WHERE pedidos.id_mesa = $id_mesa";
		return $this->query($consulta);
	}
	//*********************************** Items *********************************************//
	public function GetItem($id){
		$consulta = "SELECT * FROM 	items WHERE id = '".$id."'";
		return $this->query($consulta);
	}
	public function SetItem($id_producto,$id_pedido,$estado,$comentario){
		$consulta = "INSERT INTO items (id, id_producto,id_pedido,estado,comentario) VALUES 
		(Null,$id_producto, $id_pedido,$estado,'".$comentario."')";
		return $this->query($consulta);		
	}
	public function UpdateItem($id,$id_producto,$id_pedido,$comentario){
		$consulta = "UPDATE items SET
		id_producto = $id_producto,id_pedido = $id_pedido,comentario = '$comentario'
		WHERE items.id = $id";
		return $this->query($consulta);		
	}
	public function DeleteItem($id){
		$consulta = "DELETE FROM items WHERE items.id = $id";
		return $this->query($consulta);
	}

}

?>

