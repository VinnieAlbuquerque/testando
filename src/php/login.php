<?php
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $mysqli = new mysqli ("localhost", "root", "", "clientes");

    if($mysqli->connect_error){
        die('A conexao falhou : ' .$mysqli->connect_error);
    }else{
        $stmt = $mysqli->prepare("select * from usuarios where login = ?");
        $stmt->bind_param("s", $login);
        $stmt->execute();
        $stmt_result = $stmt->get_result();

        if($stmt_result->num_rows > 0){
            $data = $stmt_result->fetch_assoc();
            if($data['senha'] === $senha){
                echo "<h2>Login bem sucedido</h2>";
            }else{
                echo "<h2>E-mail ou Senha inválida</h2>";
            }
        }else{
            echo "<h2>E-mail ou Senha inválida</h2>";
        }
    }
?>
