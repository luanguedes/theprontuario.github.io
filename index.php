<!doctype html>
<html lang="en">
  <head>
  <?php 
   define('ROOT_PATH', dirname(__FILE__));

   ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <title>The Prontuário</title>
      
  </head>
  <body>
    <center><h1>The Prontuário </h1></center>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">


  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
          
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="#">Agendamento<span class="sr-only">(current)</span></a>
      </li>

      </li>
       <li class="nav-item active">
        <a class="nav-link" href="#">Consulta<span class="sr-only">(current)</span></a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cadastros 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="cad_paciente.php">Paciente</a>
          <a class="dropdown-item" href="cad_profissional.php">Profissional</a>
          <a class="dropdown-item" href="cad_especialidade.php">Especialidade</a>
          <a class="dropdown-item" href="cad_cidade.php">Cidade</a>
          <a class="dropdown-item" href="cad_estado.php">Estado</a>
        </div>
      </li>
      
    </ul>
    
  </div>
</nav>
   

  </body>
</html>