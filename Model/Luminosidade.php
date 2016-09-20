<?php

	class Luminosidade {
	
		private $idLuminosidade;
		private $nome;
		private $descricao;
		private $valor;
		
		public function __construct($nome, $descricao, $valor) {
			$this->nome = $nome;
			$this->descricao = $descricao;
			$this->valor = $valor;
		}
		
		public function getIdLuminosidade() {
			return $this->idLuminosidade;
		}
		
		public function getNome() {
			return $this->nome;		
		}
		
		public function getDescricao() {
			return $this->descricao;
		}
		
		public function getValor() {
			return $this->valor;
		}	
	
	}