<?php

 /* Verifica se existe um post email e post senha 
 depois insere os dados no banco */

 if(isset($_POST['email']) || isset($_POST['senha'])) {

// Verifica se o tamanho do email e da senha é zero
    if(strlen($_POST['email']) == 0) {
        echo "Preencha o campo E-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } 

    
    include('config.php');
    
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    $mysqli->query("INSERT INTO usuarios (email, senha) VALUES ('$email', '$senha')");


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
    
        <br><br>
        <h2>Cadastro</h2>

    <form action="" method="POST">
        <p>
        
            <input type="text" placeholder = E-mail , name="email">
        </p>
        <p>
            
            <input type= "password" placeholder = Senha , name="senha">
        </p>
        <p>
            <button type="submit">Cadastrar</button>
        </p>
    </form>
    </div>
</body>
</html>