<?php
    require("conexao.php");

    if(isset($_POST["email"])&& isset($_POST["senha"]) && $conexao != null){
        $query = $conexao->prepare("SELECT  * FROM usuarios WHERE email = ? AND senha =?");
        $query->execute(array($_POST["email"], $_POST["senha"]));
        if($query-> rowCount()){
            $user = $query->fetchAll(PDO::FETCH_ASSOC)[0];

            session_start();
            $_SESSION["usuario" ]= array($user["nome"], $user["adm"]);
            header('Location: paginaInicial.php');
            
        }else{
            header('Location: index.php');
        }
    }else{
        header('Location: index.php');
    }
?>