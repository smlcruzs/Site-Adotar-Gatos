<?php
require_once 'C:\xampp\htdocs\hehe\codigos\php base/conexao.php';
require_once 'C:\xampp\htdocs\hehe\codigos\php base/validaçao.php';

?> 
<?php
 
$email = (isset($_COOKIE['CookieEmail'])) ? base64_decode($_COOKIE['CookieEmail']) : '';
$senha = (isset($_COOKIE['CookieSenha'])) ? base64_decode($_COOKIE['CookieSenha']) : '';
$lembrete = (isset($_COOKIE['CookieLembrete'])) ? base64_decode($_COOKIE['CookieLembrete']) : '';
$checked = ($lembrete == 'SIM') ? 'checked' : '';
 
?> 
<!DOCTYPE html>
<html lang="pt-br">

  <head>
      <meta charset="utf-8">
        

     <title>Login</title>

        
      <link rel="stylesheet" href="visao2.css">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
  </head>

  <body class="text-center">
      <form method="post">
      <div class="imgcontainer">
      <img src="C:\xampp\htdocs\he/200.webp" width=”360” height=200  50 alt="">
      </div>

      <div class="container">
        <label for="uname"><b>Catemail</b></label>
        <input type="text" value="<?=$email?>" placeholder="Email de Gato?" name="email" required>
    <br>

        <label for="ui"><b>Catsenha</b></label>
        <input type="password"value="<?=$senha?>" placeholder="Senha de gato?" name="senha" required>
      <br>
        <label for="ps"><b>Confirma a Catsenha</b></label>
        <input type="password" placeholder="Confirme Senha de gato" name="confsenha" required>
    <br>
        <button type="submit">Catlogin</button>
        <label>
            <br>
          <input type="checkbox" checked="checked" name="lembrete"value="Sim"<?=$lembrete?>> Lembrar do gato?
        </label>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <button type="button" class="cancelbtn">Cancel</button>
        <span class="ert">Ainda não tem uma <a href="face5.php">conta?</a></span>
      </div>
    </form>
    <?php
    if (isset($_POST['email']))
    {
    $email = addslashes ($_POST['email']);
    $senha = addslashes ($_POST['senha']);
    $confsenha = addslashes ($_POST['confsenha']);
    //verificar se esta preenchida
    if(!empty($email) && !empty($senha) && !empty($confsenha))
    {
        $u->conectar("login","localhost","root","");
        if($u->msgErro == "")
        {
            if($u->logar($email,$senha,$confsenha))
            {
            hearder("location: hehe.php");
            }
            else
            {
              echo "email e/ou senha estão incorretos!";
            }
        }
        else
        {
      
        echo "Erro: ".$u->msgErro;
        }
    }else
    {

      
      echo" Preencha tosdos os campos!";
    }
  }
    ?>
    
   
    
    
  </body>
  
</html> 
