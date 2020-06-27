<?php
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

    // prepare sql and bind parameters
    $stmt = $conn->prepare("UPDATE usuario SET nome=:nome, cpf=:cpf, 
    celular=:celular, cep=:cep WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':cpf', $cpf);
    $stmt->bindParam(':celular', $celular);
    $stmt->bindParam(':cep', $cep);

    $id             = $_POST['id'];
    $nome           = $_POST['nome'];
    $cpf           = $_POST['cpf'];
    $celular        = $_POST['celular'];
    $cep        = $_POST['cep'];

    $stmt->execute();


    echo "InfoGames atualizada com sucesso!<br>";
    echo $id;
    } catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
    }
    $conn = null;

    //header('Location: index_dist.php');
?> 