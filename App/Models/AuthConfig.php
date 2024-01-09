<?php
    namespace App\Models;

    use MF\Model\Model;

    class AuthConfig extends Model {
        private $id;
        private $nome;
        private $email;
        private $senha;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function verificarEmail() {
            $query = 'select email from tb_usuarios where email = :email';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->execute();

            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }

        public function cadastrar() {
            $query = 'insert into tb_usuarios(nome, email, senha) values(:nome, :email, :senha)';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nome', $this->__get('nome'));
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', $this->__get('senha'));
            $stmt->execute();

            return $this;
        }

        public function entrar() {
            $query = 'select nome, email from tb_usuarios where email = :email and senha = :senha';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':email', $this->__get('email'));
            $stmt->bindValue(':senha', $this->__get('senha'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } 

    }

?>