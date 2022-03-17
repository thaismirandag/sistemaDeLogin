<?php

include('config.php');


 if(isset($_POST['email']) || isset($_POST['senha'])) {

    if(strlen($_POST['email']) == 0) {
        echo "Preencha o campo E-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_consulta = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
        $sql_exec = $mysqli->query($sql_consulta) or die($mysql->error);

            // fetch_assoc retorna em matriz a linha do email 
        
        $usuario = $sql_exec->fetch_assoc();


            // faz a comparação da senha digitada pelo usuário com a hash no banco de dados
        if(password_verify($senha, $usuario['senha'])) {
            
            // verifica se a sessão já não está aberta 
            if(!isset($_SESSION)){
                
                session_start();
            }
            
            // variáveis de sessão são declaradas 
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];
            
            header('location:logado.php');


        } else {
            echo "Falha ao logar! Senha ou e-mail incorretos";
            }
    
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina de Acesso</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(45deg,white,Blue);
        }
        div{
            background-color: rgba(0, 0, 0, 0.9);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: white;
        }
        input{
            padding: 15px;
            width: 86%;
            border: none;
            outline: none;
        }
        button{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            cursor: pointer;
        }
        button:hover{
            background: deepskyblue;
        }
    </style>
</head>
<body>
    <div>
    
        <h2>Login</h2>

    <form action="" method="POST">
        <p>
        
            <input type="text" placeholder = E-mail , name="email">
        </p>
        <p>
            
            <input type= "password" placeholder = Senha , name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
    </div>
</body>
</html>