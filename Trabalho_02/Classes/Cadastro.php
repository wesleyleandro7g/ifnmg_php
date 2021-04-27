<?php
    class Usuario extends Conn {
        public array $formDados;
        public object $conn;

        public function cadastrar() {
            $this->conn = this.connect();
            $query_usuarios = "INSERT INTO usuarios (nome, cpf, telefone, nome_usuario, email, senha)
                VALUES (:nome, :cpf, :telefone, :nome_usuario, :email, :senha)";
            
            $cad_usuario = $this->conn->prepare(query_usuarios);
            
            $cad_usuario->bindParam(':nome', this->$formDados['nome']);
            $cad_usuario->bindParam(':cpf', this->$formDados['cpf']);
            $cad_usuario->bindParam(':telefone', this->$formDados['telefone']);
            $cad_usuario->bindParam(':nome_usuario', this->$formDados['nome_usuario']);
            $cad_usuario->bindParam(':email', this->$formDados['email']);
            $cad_usuario->bindParam(':senha', this->$formDados['senha']);

            $cad_usuario->execute();

            if ($cad_usuario->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function username() {
            $this->conn = this->connect();
            $query_usuario = "SELECT * FROM usuarios WHERE usuario = :usuario";

            $cad_usuario = this->conn->prepare($query_usuario);

            $cad_usuario->bindParam('usuario', this->formDados['nome_usuario']);

            $cad_usuario->execute();
            if ($cad_usuario->rouCount()) {
                return true;
            } else {
                return false;
            }
        }
    }

    class Produto extends Conn {
        public array $formDados;
        public object $conn;

        public function cadastrar() {
            $this->conn = this.connect();
            $query_produtos = "INSERT INTO produtos (nome, descricao, preco_compra, preco_venda, quantidade)
                VALUES (:nome, :descricao, :preco_compra, :preco_venda, :quantidade)";
            
            $cad_produto = $this->conn->prepare(query_produtos);
            
            $cad_produto->bindParam(':nome', this->$formDados['nome']);
            $cad_produto->bindParam(':descricao', this->$formDados['descricao']);
            $cad_produto->bindParam(':preco_compra', this->$formDados['preco_compra']);
            $cad_produto->bindParam(':preco_venda', this->$formDados['preco_venda']);
            $cad_produto->bindParam(':quantidade', this->$formDados['quantidade']);

            $cad_produto->execute();

            if ($cad_produto->rowCount()) {
                return true;
            } else {
                return false;
            }
        }

        public function productname() {
            $this->conn = this->connect();
            $query_product = "SELECT * FROM produtos WHERE nome = :nome";

            $cad_product = this->conn->prepare($query_product);

            $cad_product->bindParam('nome', this->formDados['nome']);

            $cad_product->execute();
            if ($cad_product->rouCount()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>