<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "funildevendas";
	//Criar a conexao
	$pdo = mysqli_connect($servidor, $usuario, $senha, $dbname);
	
	$pesquisar = $_POST['pesquisar'];
	$result_cursos = "SELECT * FROM gato WHERE raca LIKE '%$pesquisar%' LIMIT 5";
	$resultado_cursos = mysqli_query($pdo, $result_cursos);
	
	while($rows_cursos = mysqli_fetch_array($resultado_cursos)){
		echo "Nome do gato: ".$rows_cursos['nome']."<br>";
	}
?>