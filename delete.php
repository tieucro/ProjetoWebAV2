<?php
    session_start();
    include "conexao.php";
    $conn = connection();

    try {
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("DELETE FROM usuario WHERE id=:id");
    $stmt->bindParam(':id', $id);
    $id           = $_GET['id'];

    $stmt->execute();

    $_SESSION['msg_del'] = "Usuario excluída com sucesso!";
    } catch(PDOException $e) {
        $_SESSION['msg_del'] = "Error: " . $e->getMessage();
    }
    $conn = null;

    header('Location: index_dist.php');
?> 