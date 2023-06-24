<?php
include_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se a requisição é do tipo POST, ou seja, se o formulário foi submetido

    if (isset($_POST["email"]) && isset($_POST["resposta"])) {
        $email = $_POST["email"];
        $resposta = $_POST["resposta"];

        // Verifica se o email e a resposta estão corretos na tabela "funcionarios"
        $stmt = $conn->prepare("SELECT * FROM funcionarios WHERE email = :email AND resposta = :resposta");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':resposta', $resposta);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Se o email e a resposta estiverem corretos

            // Busca o token na tabela "token"
            $stmt_token = $conn->prepare("SELECT token FROM token WHERE id = 1");
            $stmt_token->execute();
            $token_row = $stmt_token->fetch(PDO::FETCH_ASSOC);
            $token = $token_row['token'];

            // Atualiza o campo "senha" na tabela "funcionarios" com o valor do token
            $stmt_update_senha = $conn->prepare("UPDATE funcionarios SET senha = :senha WHERE email = :email");
            $stmt_update_senha->bindParam(':senha', $token);
            $stmt_update_senha->bindParam(':email', $email);
            $stmt_update_senha->execute();

            // Redireciona para a página de login com a senha escrita no campo de senha
            header("Location: ../template/login.php?senha=" . $token);
            exit();
        } else {
            echo "Email ou resposta incorretos.";
        }
    } else {
        echo "Os campos de email e resposta são obrigatórios.";
    }
}
?>
