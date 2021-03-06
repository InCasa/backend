<?php

    class AplicativoDAO {
        private $con;
        
        public function __construct(){
            $this->con = Database::getInstancia();
        }

        public function create($aplicativo) {
            $sql = $this->con->prepare("INSERT INTO aplicativo(mac, nome) VALUES (?, ?)");
            $sql->bindParam(1, $aplicativo->getMAC());
            $sql->bindParam(2, $aplicativo->getNome());
            $sql->execute();            
        }

        public function update($aplicativo) {
            $sql = $this->con->prepare("UPDATE aplicativo SET nome = ?, mac = ? WHERE idAplicativo = ?");
			$sql->bindParam(1, $aplicativo->getNome());
            $sql->bindParam(2, $aplicativo->getMAC());
            $sql->bindParam(3, $aplicativo->getIdAplicativo());
            $sql->execute();             
        }

        public function delete($aplicativo) {
            $sql = $this->con->prepare("DELETE FROM aplicativo WHERE idAplicativo = ?");
            $sql->bindParam(1, $aplicativo->getIdAplicativo());
            $sql->execute();
        }

        public function getAplicativo($id) {            
            $sql = $this->con->prepare("SELECT * FROM aplicativo WHERE idAplicativo = ?");
            $sql->bindParam(1, $id);
            $sql->execute();
            $row = $sql->fetch();
            
            $aplicativo = new Aplicativo();
            $aplicativo->setIdAplicativo((int)$row['idAplicativo']);
            $aplicativo->setNome($row['nome']);            
			$aplicativo->setMAC($row['mac']);            
            
            return $aplicativo;
        }
        
        public function getAll(){
            $aplicativos = array();

            $sql = "SELECT * FROM aplicativo";

            foreach ($this->con->query($sql) as $row) {
                $aplicativo = new Aplicativo();
                $aplicativo->setIdAplicativo((int)$row['idAplicativo']);
                $aplicativo->setMAC($row['mac']);
                $aplicativo->setNome($row['nome']);  

                $aplicativos[] = $aplicativo;
            }

            return $aplicativos;
        }

        public function getLast(){            
            $sql = $this->con->prepare("SELECT * FROM aplicativo ORDER BY idAplicativo DESC");
            $sql->execute();
            $row = $sql->fetch();
            
                $aplicativo = new Aplicativo();
                $aplicativo->setIdAplicativo((int)$row['idAplicativo']);
                $aplicativo->setMAC($row['mac']);
                $aplicativo->setNome($row['nome']); 

            return $aplicativo;
        }

}
    