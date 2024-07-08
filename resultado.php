<?php

require_once 'C:\xampp\htdocs\hehe\codigos\php base/pesquisar.php';

    session_start();
    setcookie("ck_authorized", "true", 0, "/");
    
    if(!isset($_SESSION['id_usuario'])){
      ?>
      <script>
          alert("Faça login para acessar a página inicial.");
      </script>
      <?php
      header("location: face3.php");
      exit;
    }
?>


<!doctype html>
<html lang="pt-br">

  <head>
    <title>GM &mdash;Pesquisa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,500,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="shortcut icon" href="icon.ico" type="image/x-icon">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/style.css">

  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    
    <div class="site-wrap" id="home-section">

      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>



      <header class="site-navbar site-navbar-target" role="banner">

        <div class="container">
          <div class="row align-items-center position-relative">

            <div class="col-3 ">
              <div class="site-logo">
                <a href="site.php"><strong>Gatmer</strong> <span class="text-primary"></span> </a>
              </div>
            </div>

            <div class="col-9  text-right">
              

              <span class="d-inline-block d-lg-none"><a href="#" class="text-white site-menu-toggle js-menu-toggle py-5 text-white"><span class="icon-menu h3 text-white"></span></a></span>

              
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Alterna navegação">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mr-auto"></div>
                  <ul class="navbar-nav">
                    <li class="nav-item active">
                      <a class="nav-link" href="hehe.php">Home <span class="sr-only">(Página atual)</span></a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="face3.php">Registro</a>
                      <li class="nav-item">
                        <a class="nav-link" href="face2.php">Gatos</a>
                        </li>
                        </li>
                    <li class="nav-item">
                      <a class="nav-link" href="face4.php">Adoção</a>
                     
                    </li>
                  </ul>
                </div>
              </nav>
              
                 


                </ul>
              </nav>
            </div>

            
          </div>
        </div>

      </header>


      <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('design/back.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
            <form class="caixa2"  name="pesquisa" method="POST" action="pesquisa.php" class="form-group">
                  <?php
                  if($search_result->num_rows > 0){
                    while($rows = mysqli_fetch_array($search_result)){
                    
                        echo "<font color='#ffffff'>Nome do gato: ".$rows['nome']."</font>"."<br>";
                        echo "<font color='#ffffff'>Idade: ".$rows['cor']." anos</font>"."<br>";
                        echo "<font color='#ffffff'>Altura: ".$rows['raca']." m</font>"."<br>";
                        echo "<font color='#ffffff'>Descrição: ".$rows['sexo']." </font>"."<br>"."<br>";

                    }
                  }else{
                    echo "<font color='#ffffff'> Não foi possível encontrar o Gato, pesquise novamente!</font>"."<br>"."<br>";
                  }
                  
                  ?>
                  <input type="submit" value="Voltar">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="site-footer">
            <div class="container">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4">Aviso</h2>
                      <p>MIAU!!!</p>
                </div>
          </footer>
    
    
   
    

  </body>

</html>