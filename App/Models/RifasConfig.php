<?php
    namespace App\Models;

    use MF\Model\Model;

    class RifasConfig extends Model {
        private $id;
        private $nome;
        private $descricao;
        private $imagem;
        private $preco;
        private $qtd_rifas;

        public function __get($attr) {
            return $this->$attr;
        }

        public function __set($attr, $value) {
            $this->$attr = $value;
        }

        public function getRifas($coluna, $limit) {
            $query = "select id, nome, descricao, imagem, preco, qtd_rifas from tb_rifas where ativado = true order by $coluna desc limit $limit offset 0";
            $stmt = $this->db->prepare($query);
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

        public function getRifaById() {
            $query = "select id, nome, descricao, imagem, preco, qtd_rifas from tb_rifas where id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id', $this->__get('id'));
            $stmt->execute();

            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        }

    }

?>