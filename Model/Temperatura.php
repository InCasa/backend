 <?php
    require "require.php";

    class Temperatura {
        private $idTemperatura;
        private $nome;
        private $descricao;
        private $valor;        
        
        public function __construct(){
                        
        }
        
        public function getNome(){
            return $this->nome;
        }
        
        public function getDescricao(){
            return $this->descricao;
        }
        
        public function getValor(){
            return $this->valor;
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

        public function setValor($valor) {
            $this->valor = $valor;
        }

    }
