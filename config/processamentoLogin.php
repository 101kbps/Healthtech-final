<?php
include_once("url.php");
include_once("conexao.php");

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        // Trate o caso em que o email não foi fornecido
    } else if (strlen($_POST['senha']) == 0) {
        // Trate o caso em que a senha não foi fornecida
    } else {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try {
            $sql = "SELECT * FROM tb_funcionario WHERE email = :email AND senha = :senha";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $quantidade = $stmt->rowCount();

            if ($quantidade == 1) {
                $funcionarios = $stmt->fetch(PDO::FETCH_ASSOC);
                echo "Quantidade de resultados: " . $quantidade;
            
                // Inicie a sessão
                if (!isset($_SESSION)) {
                    session_start();
                }
                
                // Atribua o valor do cargo e nome à sessão
                $_SESSION['cargo'] = $funcionarios['cargo'];
                $_SESSION['id'] = $funcionarios['id'];
                var_dump($funcionarios);


                
                // Redirecione o usuário

                header("Location:".$BASE_URL."/../template/menu.php");
            } else {
                echo "<div class='alert alert-danger alert-dismissible fade show text-center' role='alert'>
                <strong>Falha ao logar! E-mail ou senha incorretos</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
            }
        } catch (PDOException $e) {
            echo "Erro na execução do código SQL: " . $e->getMessage();
        }
    }
}
?>
