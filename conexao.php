<?php
    //Conexão com bando de dados
    function connection(){
       // $servername = "sql107.epizy.com";
       // $username   = "epiz_25649959";
       // $password   = "yVu5xbKsLmA243L";
       // $db         = "epiz_25649959_loja";

        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $db         = "lojaweb";

        try {
        $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo "Conexão realizada com sucesso!";
        return $conn;

        } catch(PDOException $e) {
        echo "Conexão falhou! Erro: " . $e->getMessage();
        }
    }
?> 