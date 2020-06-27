<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO usuario (nome, cpf, celular)
    VALUES (:nome, :cpf, :celular)");
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':cep', $cep);

    $nome           = $_POST['nome'];
    $cnpj           = $_POST['cpf'];
    $celular        = $_POST['celular'];
    $cep       = $_POST['cep'];

    $stmt->execute();


    echo "Usuário cadastrado com sucesso!";
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_dist.php');
?> 