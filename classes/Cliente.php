<?php 

	class Cliente {

		private $cpf;
		private $nome;
		private $senha;
		private $uf;
        private $dtCadastro;

        //GET AND SET PARA CPF DO CLIENTE
        public function getCpf() {
            return $this->cpf;
        }
         
        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }        
        
        //GET AND SET PARA NOME
        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
            return $this;
        }

        //GET AND SET PARA SENHA
        public function getSenha() {
            return $this->senha;
        }

        public function setSenha($senha) {
            $this->senha = sha1(sha1($senha));
            return $this;
        }

        //GET AND SET PARA UF
        public function getUf() {
            return $this->uf;
        }

        public function setUf($uf) {
            $this->uf = $uf;
            return $this;
        }

        //GET AND SET PARA DATA CADASTRO
        public function getDtCadastro() {
            return $this->dtCadastro;
        }

        public function setDtCadastro($dtCadastro) {
            $this->dtCadastro = $dtCadastro;
            return $this;
        }

        //MÉTODO PARA EFETUAR O LOGIN DO LIENTE
        public function loginCliente() {
        	$sql = MySql::conectar()->prepare("SELECT * FROM `tb_clientes` WHERE cpf_cliente  = ? AND senha = ?");
            $sql->execute(array($this->getCpf(),$this->getSenha()));
            
            if($sql->rowCount() == 1) {
                return $sql->fetch();
            }else {
                return false;
            }
        }

        //VALIDA SE O USUÁRIO ESTÁ O LOGADO
        public static function logado() {
		  return isset($_SESSION['login']) ? true : false;
        }

        //EFETUA O LOGGOUT DO USUÁRIO
        public static function loggout() {
            session_destroy();
            header('Location: '.INCLUDE_PATH_PORTAL);
        }
    }
?>