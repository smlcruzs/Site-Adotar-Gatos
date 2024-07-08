<?php
class Usuario
{
    private $pdo;
    public $msgErro = "";

    public function conectar($nome,$host,$usuario,$senha)
    { 
        global $pdo;
        global $msgErro;
        try {
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host,$usuario,$senha);
        }   catch (PDOException $e){
            $msgErro = $e ->getMessage();
        } 
        
    }
    public function cadastrar($nome,$email,$senha)
    {
        global $pdo;
//verificar se ja esta cadastrado₢
$sql = $pdo->prepare("SELECT id_usuario FROM usuarios WHERE email =:e");
$sql ->bindValue(":e",$email);
$sql ->execute();
if($sql->rowCount() > 0)
{
    return false;//ja esta cadstrada
}
else{
//caso não cadastra
$sql = $pdo->prepare("INSERT INTO usuarios(nome,email,senha) VALUES (:n, :e , :s)");
$sql ->bindValue(":n",$nome);
$sql ->bindValue(":e",$email);
$sql ->bindValue(":s",md5($senha));
$sql ->execute();
return true;
}
    }
    public function logar($email,$senha)
    {
        global $pdo;
        //verificar se o email e senha estão cadastrados, se sim

        $sql =$pdo->prepare("SELECT id_usuario FROM usuarios WHERE email=:t AND senha =:s");
        $sql ->bindValue(":t",$email);
$sql ->bindValue(":s",md5($senha));
$sql ->execute();
if($sql->rowCount() > 0)
{
 //entrar no sistema (sessão)
 $dado = $sql->fetch();
 session_start();
 $_SESSION['id_usuario']=$dado['id_usuario'];
 return true;//cadastrado
}
else
    {
return false;// não cadastro
    }
    }
    }



?>