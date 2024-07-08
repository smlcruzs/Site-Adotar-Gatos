
<?php 
session_start();

$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$senha = (isset($_POST['senha'])) ? $_POST['senha'] : '';
$lembrete = (isset($_POST['lembrete'])) ? $_POST['lembrete'] : '';

if 
	(!empty($email) && !empty($senha)):

	$conexao = new PDO('mysql:host=localhost;dbname=db_blog', 'root', '123456');
	$sql = 'SELECT id, nome, email FROM nome WHERE email = ? AND senha = ?';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(1, $email);
	$stm->bindValue(2, md5($senha));
	$stm->execute();
	$dados = $stm->fetch(PDO::FETCH_OBJ);

	if(!empty($dados)):

		$_SESSION['id'] = $dados->id;
		$_SESSION['nome'] = $dados->nome;
		$_SESSION['email'] = $dados->email;
		$_SESSION['logado'] = TRUE;

		if($lembrete == 'SIM'):

		   $expira = time() + 60*60*24*30; 
		   setCookie('CookieLembrete', base64_encode('SIM'), $expira);
		   setCookie('CookieEmail', base64_encode($email), $expira);
		   setCookie('CookieSenha', base64_encode($senha), $expira);

		else:

		   setCookie('CookieLembrete');
		   setCookie('CookieEmail');
		   setCookie('CookieSenha');

		endif;

		echo "<script>window.location = 'hehe.php'</script>";
	else:

		$_SESSION['logado'] = FALSE;
	    echo "<script>window.location = 'face3.php'</script>";

	endif;

endif;

?>