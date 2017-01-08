<?php
    class UserDAO{
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }
             
        public function create($user) {
            $sql = $this->con->prepare("INSERT INTO userS (nome, login, senha) VALUES (?, ?, ?)");
            $sql->bindParam(1, $user->getNome());
            $sql->bindParam(2, $user->getLogin());
            $sql->bindParam(3, $user->getSenha());
            $sql->execute();			
        }

        public function update($user) {
            $sql = $this->con->prepare("UPDATE userS SET nome = ?, login = ?, senha = ? WHERE idUserS = ?");
            $sql->bindParam(1, $user->getNome());
            $sql->bindParam(2, $user->getLogin());
            $sql->bindParam(3, $user->getSenha());
            $sql->bindParam(4, $user->getIdUser());
            $sql->execute();             
        }

        public function delete($user) {
            $sql = $this->con->prepare("DELETE FROM userS WHERE idUserS = ?");
            $sql->bindParam(1, $user->getIdUser());
            $sql->execute();
        }

        public function getUser($id) {
            $sql = $this->con->prepare("SELECT * FROM userS WHERE idUserS = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $user = new User();
            $user->setIdUser((int)$row['idUserS']);
            $user->setNome($row['nome']);
            $user->setLogin($row['login']);
            $user->setSenha($row['senha']);
            
            return $user;
        }

        public function getAll(){
            $users = array();

            $sql = "SELECT * FROM userS";

            foreach ($this->con->query($sql) as $row) {
                $user = new User();
                $user->setIdUser((int)$row['idUserS']);
                $user->setNome($row['nome']);
                $user->setLogin($row['login']);
                $user->setSenha($row['senha']);

                $users[] = $user;
            }

            return $users;
        }
        
        public function getUserLogin($login, $senha) {
            $sql = $this->con->prepare("SELECT senha FROM userS WHERE login = ?");
            $sql->bindParam(1, $login);        
            if($sql->execute() && $sql->rowCount() == 1) {
                $row = $sql->fetch();
            
                $password = $row['senha'];
                
                if(crypt($senha, $password) == $password) {
                    return true;
                } else {
                    return false;
                }
                
            } else {
                return false;
            }                  
            
        }
		
		public function getUserID($login, $senha) {
			$sql = $this->con->prepare("SELECT senha FROM userS WHERE login = ?");
            $sql->bindParam(1, $login);        
            if($sql->execute() && $sql->rowCount() == 1) {
                $row = $sql->fetch();
            
                $password = $row['senha'];
                
				$senhaC = crypt($senha, $password);					
			} 
			
            $sql = $this->con->prepare("SELECT idUserS FROM userS WHERE login = ? AND senha = ?");
            $sql->bindParam(1, $login);        
			$sql->bindParam(2, $senhaC);
			if($sql->execute() && $sql->rowCount() == 1) {
				$row = $sql->fetch();
				return $row['idUserS'];
			}	            
        }
		
		public function getDuplicateLogin($login) {
		
		$sql = $this->con->prepare("SELECT count(*) FROM users where login = ?");
            $sql->bindParam(1, $login);        
			$sql->execute();
			
			$result = $sql->fetchColumn();			
			
            if($result >= 1) {
                return true;					
			} else {
				return false;
			}	
		
		}
        
    }