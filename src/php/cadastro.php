<?php
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    $mysqli = new mysqli ("localhost", "root", "", "clientes");

    if($mysqli->connect_error){
        die('A conexao falhou : ' .$mysqli->connect_error);
    }else{
        $stmt = $mysqli->prepare("Insert into usuarios(nome, login, senha) values(?, ?, ?)");
        $stmt->bind_param("sss", $nome, $login, $senha);
        $stmt->execute();
        echo "Registro completo";
        $stmt->close();
        $mysqli->close();
    }
?>
