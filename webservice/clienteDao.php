<?php

include_once "conexao.php";
include_once "cliente.php";

class ClienteDao {
    public $conn;

    // Abre conexão com BD
    function __construct() {
        $conexao = new Conexao();
        $this->conn - $conexao->getConn();
    }

    // Fecha conexão com BD
    function __destruct() {
        $this->conn->close();
    }

    // Lista todos os registros da tabela 'cliente' do BD
    function listarTodosClientes() {
        $sql = "SELECT * FROM cliente";
        $result = $this->conn->query($sql);

        if($result->num_rows > 0) {
            $clientes = [];
            while($row = $result->fetch_assoc()) {
                $cliente = ["id"=>$row["id"], "tipoUsuario"=>$row["tipoUsuario"], "nome"=>$row["nome"], "cpf"=>$row["cpf"], "nascimento"=>$row["nascimento"], "telefone"=>$row["telefone"], "email"=>$row["email"], "senha"=>$row["senha"], "fkEnderecoId"=>$row["fkEnderecoId"]];
                array_push($clientes, $cliente);
            }
            echo json_encode($clientes);
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista um registro, localizado pelo ID, da tabela 'cliente' do BD
    function listarCliente($id) {
        $sql = "SELECT * FROM cliente WHERE id=$id";
        $result = $this->conn->query($ql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Insere novo registro na tabela 'cliente' do BD
    function inserirCliente($Cliente) {
        $sql = "INSERT INTO cliente (tipo_usuario, nome, cpf, nascimento, telefone, email, senha, fk_endereco_id)
            VALUES ('".$Cliente->getTipoUsuario()."', '".$Cliente->getNome()."', '".$Cliente->getCpf()."',
            '".$Cliente->getNascimento()."', '".$Cliente->getTelefone()."', '".$Cliente->getEmail()."',
            '".$Cliente->getSenha()."', '".$Cliente->getFkEnderecoId()."')";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->erro];
        }
        return json_encode($status);
    }

    // Deleta registro correspondente ao ID informado, da tabela 'cliente' do BD
    function deletarCliente($Cliente) {
        $sql = "DELETE FROM cliente WHERE id = '".$Cliente->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Atualiza registro correspondente ao ID informado, da tabela 'cliente' do BD
    function atualizarCliente($Cliente) {
        $sql = "UPDATE cliente 
                SET tipo_usuario='".$Cliente->getTipoUsuario()."', nome='".$Cliente->getNome()."',  cpf='".$Cliente->getCpf()."',
                nascimento='".$Cliente->getNascimento()."', telefone='".$Cliente->getTelefone()."', email='".$Cliente->getEmail()."',
                senha='".$Cliente->getSenha()."', fk_endereco_id='".$Cliente->getFkEnderecoId()."' 
                WHERE id='".$Cliente->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }
}

?>