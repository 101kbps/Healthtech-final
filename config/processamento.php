<?php
include_once("../config/url.php");
include_once("../config/conexao.php");

$id;

if (!empty($_GET)) {
    $id = $_GET["id"];
}

if (!empty($id)) {
    $query = "SELECT * FROM tb_funcionario WHERE id= :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $onlyfuncionarios = $stmt->fetch();
} else {
    $query = "SELECT * FROM tb_funcionario";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $Allfuncionarios = [];
    $Allfuncionarios = $stmt->fetchAll();
}

$data = $_POST;

if (!empty($data)) {
    if ($data["type"] === "create") {
        try {
            $nome = $data["nome"];
            $cpf = $data["cpf"];
            $data_nascimento = $data["data_nascimento"];
            $telefone = $data["fone"];
            $email = $data["email"];
            $admissao = $data["admissao"];
            $contrato = $data["contrato"];
            $salario = $data["salario"];
            $cargo = $data["cargo"];
            $senha = $data["senha"];
            $modalidade = $data["modalidade"];
            $endereco = $data["endereco"];
            $cep = $data["cep"];

            $query = "INSERT INTO tb_funcionario (nome, cpf, data_nascimento, telefone, email, admissao, contrato, salario, cargo, senha, modalidade, endereco, cep) VALUES (:nome, :cpf, :data_nascimento, :telefone, :email, :admissao, :contrato, :salario, :cargo, :senha, :modalidade, :endereco, :cep)";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":admissao", $admissao);
            $stmt->bindParam(":contrato", $contrato);
            $stmt->bindParam(":salario", $salario);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":modalidade", $modalidade);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../template/table.php");
    } else if ($data["type"] === "edit") {
        try {
            $nome = $data["nome"];
            $cpf = $data["cpf"];
            $data_nascimento = $data["data_nascimento"];
            $telefone = $data["fone"];
            $email = $data["email"];
            $admissao = $data["admissao"];
            $demissao = $data["demissao"];
            $contrato = $data["contrato"];
            $salario = $data["salario"];
            $cargo = $data["cargo"];
            $senha = $data["senha"];
            $modalidade = $data["modalidade"];
            $endereco = $data["endereco"];
            $cep = $data["cep"];
            $id_admin = $data["id_admin"];
            $idPost = $data["id"];

            $query = "UPDATE tb_funcionario SET
                nome=:nome,
                cpf=:cpf,
                data_nascimento=:data_nascimento,
                telefone=:telefone,
                email=:email,
                admissao=:admissao,
                demissao=:demissao,
                contrato=:contrato,
                cargo=:cargo,
                senha=:senha,
                modalidade=:modalidade,
                endereco=:endereco,
                cep=:cep,
                id_admin=:id_admin
                WHERE id=:idPost";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":cpf", $cpf);
            $stmt->bindParam(":data_nascimento", $data_nascimento);
            $stmt->bindParam(":telefone", $telefone);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":admissao", $admissao);
            $stmt->bindParam(":demissao", $demissao);
            $stmt->bindParam(":contrato", $contrato);
            $stmt->bindParam(":salario", $salario);
            $stmt->bindParam(":cargo", $cargo);
            $stmt->bindParam(":senha", $senha);
            $stmt->bindParam(":modalidade", $modalidade);
            $stmt->bindParam(":endereco", $endereco);
            $stmt->bindParam(":cep", $cep);
            $stmt->bindParam(":id_admin", $id_admin);
            $stmt->bindParam(":idPost", $idPost);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }

        header("Location:" . $BASE_URL . "/../template/table.php");
    } else if ($data["type"] === "delete") {
        try {
            $idDelete = $data["id"];

            $query = "DELETE FROM tb_funcionario WHERE id=:idDelete";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":idDelete", $idDelete);
            $stmt->execute();
        } catch (PDOException $e) {
            $erro = $e->getMessage();
            echo $erro;
        }
        header("Location:" . $BASE_URL . "/../template/table.php");
    }
}
?>
