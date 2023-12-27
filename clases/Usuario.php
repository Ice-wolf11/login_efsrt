<?php
    class Usuario{
        private $idUsuario;
        private $nombre;
		private $telefono;
		private $user;
		private $password;
		private $con;
        

        public function conectar_db($cn){
            $this->con =$cn;
        }

        public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}

        public function lista_usuario(){
			$sql = "SELECT * FROM usuario";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM usuario where idUsuario=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}

        public function agrega_usuario($nom,$tel,$user,$pass){
			
			$usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);
			
			$sql = "insert into usuario(nombre,telefono,Usuario,Contraseña) values ('$nom','$tel','$user','$usu_pass_hash')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	

        public function modifica_usuario($id,$nom,$tel,$user,$pass){
			
			$usu_pass_hash = password_hash($pass, PASSWORD_DEFAULT);

			$sql = "UPDATE usuario SET
        				nombre = '$nom',
						telefono = '$tel',
						Usuario = '$user',
						Contraseña = '$usu_pass_hash'
        				WHERE idUsuario = '$id'";
						
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	

        public function borrar($id){
			$sql = "DELETE FROM usuario WHERE idUsuario=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}

		public function lee_datos($usu){
			$sql = "SELECT * FROM usuario where Usuario='$usu'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}


    }
?>