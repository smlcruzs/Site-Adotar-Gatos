<?php
    require_once 'C:\xampp\htdocs\hehe\codigos\php base/conexao.php';
    $u = new Usuario;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    

    <title>Login</title>

    
    <link rel="stylesheet" href="visao4.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
  </head>

  <body class="text-center">
  
  <form method="post">
  <div class="imgcontainer">
  <img src="C:\xampp\htdocs\he/200.webp" width=”360” height=200  50 alt="">
  </div>

  <div class="container">
    <label for="uname"><b>Nome</b></label>
    <input type="text"  placeholder="Seu nome?" name="nome" maxlenght="30" required>
<br>

    <label for="psw"><b>email</b></label>
    <input type="email" placeholder="Seu email?" name="email" maxlenght="40" required>
   <br>
    <label for="psw"><b>Senha</b></label>
    <input type="password" placeholder="Crie uma senha" name="senha" maxlenght="15" required>
<br>
    <label for="psw"><b>Confirma a senha</b></label>
    <input type="password" placeholder="Confirme a senha" name="confsenha" required>
<br>
  <input type ="submit" value="criar">
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
    
    <span class="psa"><a href="face3.php">voltar</a></span>
  </div>
</form>
<?php
//verificar se clicou no botão
if (isset($_POST['nome']))
{
$nome = addslashes ($_POST['nome']);
$email = addslashes ($_POST['email']);
$senha = addslashes ($_POST['senha']);
$confsenha = addslashes ($_POST['confsenha']);
//verificar se esta preenchida
if(!empty($nome) && !empty($email) && !empty($senha) && !empty($confsenha))
{
    $u->conectar("login","localhost","root","");

    if($u->msgErro == "")
    {
        if($senha == $confsenha)
         {
            if ($u->cadastrar($nome,$email,$senha))
            {
              ?>
              <div id="msg-sucesso">
            Cadastrado com sucesso so entrar agora!
            <?php
             }   
            }
             else
            {
              ?>
              <div class="msg-erro">
                senhas não correspondem!
                 <?php
            }
        }   
        else
        {
          ?>
          <div class="msg-erro">
          <?php echo "Erro: ".$u->msgErro; ?>
                 <?php
        
            echo "Erro: ".$u->msgErro;
        }
    }else 
    {
      ?>
              <div class="msg-erro">
              preencha todos os campos!
                 <?php
        
    }
}
    

  


?>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>