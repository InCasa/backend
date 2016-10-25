<?php

	class Presenca {
	
		private $idPresenca;
		private $nome;
		private $descricao;		
		
		public function __construct() {
			
		}
		
		public function getIdPresenca() {
			return $this->idPresenca;
		}
		
		public function getNome() {
			return $this->nome;		
		}
		
		public function getDescricao() {
			return $this->descricao;
		}
							
		function setIdPresenca($idPresenca) {
			$this->idPresenca = $idPresenca;
		}

		function setNome($nome) {
			$this->nome = $nome;
		}

		function setDescricao($descricao) {
			$this->descricao = $descricao;
		}		
	
	}