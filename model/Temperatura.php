 <?php
    require "require.php";

    class Temperatura {
        private $idTemperatura;
        private $nome;
        private $descricao;               
        
        public function __construct(){
                        
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }                

        public function getIdTemperatura(){
            return $this->idTemperatura;
        }
        
        public function setIdTemperatura($idTemperatura) {
            $this->idTemperatura = $idTemperatura;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function setDescricao($descricao) {
            $this->descricao = $descricao;
        }        

    }
