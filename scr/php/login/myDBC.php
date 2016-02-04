<?php
ini_set('display_errors', 0);
session_start();
// My database Class called myDBC
class myDBC {
	// our mysqli object instance
	public $mysqli = null;
 	
 	// Class constructor override
	public function __construct() {
  
		include_once "dbconfig.php";        
    	$this->mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
 
		if ($this->mysqli->connect_errno) {
			echo "Error MySQLi: ("&nbsp. $this->mysqli->connect_errno.") " . $this->mysqli->connect_error;
			exit();
		}
		$this->mysqli->set_charset("utf8"); 
	}
 
	// Class deconstructor override
	public function __destruct() {
		$this->CloseDB();
	}
 
	// runs a sql query
    public function runQuery($qry) {
        $result = $this->mysqli->query($qry);
        return $result;
    }
  
	// Close database connection
    public function CloseDB() {
        $this->mysqli->close();
    }
 
	// Escape the string get ready to insert or update
    public function clearText($text) {
        $text = trim($text);
        return $this->mysqli->real_escape_string($text);
    } 
	
	public function logueo($usuario, $contrasenia){
		//El password obtenido se le aplica el crypt
		//Posteriormente se compara en el query
		$pass_c = crypt($contrasenia,"$1$rasmusle$");
		$q = "select * from usuarios where correo='$usuario' and password='$pass_c'";
		
		$result = $this->mysqli->query($q);
		//Si el resultado obtenido no tiene nada 
		//Muestra el error y redirige al index
		if( $result->num_rows == 0)
		{
			echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<script type="text/javascript">
				alert("Usuario o Contraseña Incorrecta");
				window.location="../../../registro"
				</script>';
		}
		
		//En otro caso
		//En $reg se guarda el resultado de la consulta
		//Al segundo posición de SESION se le asigna el id del usuario
		//Redirige a página logueada 
		else{
			$reg = mysqli_fetch_assoc($result);
			if($reg["sup"] == 1 ){
				echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<script type="text/javascript">
				alert("Tu cuenta ha sido deshabilitada");
				window.location="../../../index"
				</script>';
			}else{
				$_SESSION["session"][] = $reg["id"];
				$_SESSION["id"] = $reg["id"];
				$_SESSION["username"] = $reg["nombre"].' '.$reg["apellidos"];
				$_SESSION["mail"] = $reg["correo"];
				$_SESSION["pass"] = $reg["password"];
				$_SESSION["user"] = $reg["tipo"];
			}
			header("location:../../../index");
		}
		
	}
	
	public function agregaUsuario($nombre, $apellidos, $mail, $contras){
		
		//Selecciona el correo ingresado para validarlo, en la variable valida
		//está el resultado de la consulta
		
		$nuevo_correo = "select correo from usuarios where correo='$mail'";
		$valida = $this->mysqli->query($nuevo_correo);
		
		//Como correo es UNIQUE si valida tiene más de un resultado,
		//el correo ya estaba en la base de datos
		if($valida->num_rows > 0)
		{
			  echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
				<script type="text/javascript">
				alert("Error al registrar! - Correo Duplicado");
				window.location=""
				</script>';
		}
		
		else
		{
			//Inserta en la BD 
			$sup=0;
			$user="user";
			$q = "INSERT INTO usuarios (nombre, apellidos, correo, password, sup, tipo) VALUES ('$nombre','$apellidos', '$mail', '$contras', '$sup', '$user' ); ";
		
			$result = $this->mysqli->query($q);
			if($result){ //Si resultado es true, se agregó correctamente
					echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<script type="text/javascript">
						alert("Agregado Exitosamente");
						window.location="../../../index"
						</script>';
						 
			}
			else{ //Si hubo error al insertar, se avisa
				echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<script type="text/javascript">
					 alert("Algo fallo");
					 window.location="../../../registro"
					 </script>';
				
			}
		}
	}
	
	public function actualizarUsuario($nombre, $apellidos, $mail, $contras){
		
		
			//Inserta en la BD 
			$sup=0;
			$q = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', password = '$contras', sup = '$sup' WHERE correo = '$mail'; ";
			$_SESSION["pass"] = $contras;
			$result = $this->mysqli->query($q);
			if($result){ //Si resultado es true, se agregó correctamente
					echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<script type="text/javascript">
						alert("Agregado Exitosamente");
						window.location="../../../index"
						</script>';
						 

			}
			else{ //Si hubo error al insertar, se avisa
				echo'<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<script type="text/javascript">
					 alert("Algo fallo");
					 window.location="../../../registro"
					 </script>';
				
			}
		
	}
}
	
?>
