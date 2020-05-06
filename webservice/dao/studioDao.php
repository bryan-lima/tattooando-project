<?php

include_once "./model/conexao.php";
include_once "./model/studio.php";

class StudioDao {
    public $conn;

    // Abre conexão com BD
    function __construct() {
        $conexao = new Conexao();
        $this->conn = $conexao->getConn();
    }

    // Fecha conexão com BD
    function __destruct() {
        $this->conn->close();
    }

    // Lista todos os registros da tabela 'studio' do BD
    function listarTodosStudios() {
        $sql = "SELECT * FROM studio";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            $studios = [];
            while($row = $result->fetch_assoc()) {
                $studio = ["id"=>$row["id"], "tipoUsuario"=>$row["tipo_usuario"], "nome"=>$row["nome"], "cnpj"=>$row["cnpj"], "nascimento"=>$row["nascimento"], "telefone"=>$row["telefone"], "email"=>$row["email"], "senha"=>$row["senha"], "fkEnderecoId"=>$row["fk_endereco_id"]];
                array_push($studios, $studio);
            }
            echo json_encode($studios);
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Lista registro correspondente ao ID informado, da tabela 'studio' do BD
    function listarStudio($id) {
        $sql = "SELECT * FROM studio WHERE id=$id";
        $result = $this->conn->query($sql);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $value = json_encode($row);
                echo($value);
            }
        } else {
            echo "0 resultados encontrados";
        }
    }

    // Insere novo registro na tabela 'studio' do BD
    function inserirStudio($Studio) {
        $sql = "INSERT INTO studio (tipo_usuario, nome, cnpj, telefone, email, senha, fk_endereco_id)
            VALUES ('".$Studio->getTipoUsuario()."', '".$Studio->getNome()."', '".$Studio->getCnpj()."',
            '".$Studio->getTelefone()."', '".$Studio->getEmail()."', '".$Studio->getSenha()."', '".$Studio->getFkEnderecoId()."')";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Deleta registro correspondente ao ID informado, da tabela 'studio' do BD
    function deletarStudio($Studio) {
        $sql = "DELETE FROM studio WHERE id = '".$Studio->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }

    // Atualiza registro correspondente ao ID informado, da tabela 'studio' do BD
    function atualizarStudio($Studio) {
        $sql = "UPDATE studio 
                SET tipo_usuario='".$Studio->getTipoUsuario()."', nome='".$Studio->getNome()."',  cnpj='".$Studio->getCnpj()."',
                telefone='".$Studio->getTelefone()."', email='".$Studio->getEmail()."', senha='".$Studio->getSenha()."', fk_endereco_id='".$Studio->getFkEnderecoId()."' 
                WHERE id='".$Studio->getId()."'";
        if($this->conn->query($sql) === TRUE) {
            $status = ["status"=>"sucesso"];
        } else {
            $status = ["status"=>"erro: " . $this->conn->error];
        }
        return json_encode($status);
    }
}

?>