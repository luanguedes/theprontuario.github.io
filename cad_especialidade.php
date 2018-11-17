<!DOCTYPE html>
<html>
<head>
 <?php 
  require_once 'conexao.php';
 ?>
    <meta charset="utf-8">
  <title>Cadastro de Especialidades</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script>
         $(function () {
            $("#header").load("index.php");
         });
      </script>
</head>
<body>
      
      <div id="header"></div>
  <div class='container'>
    <fieldset>
      <legend><h1>Cadastro de Especialidades</h1></legend>
          <form action="action/action_especialidade.php" method="post" id='cadastro' enctype='multipart/form-data'>

           <div class="row">
           <div class="col">
            <label for="especialidade">Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" placeholder="Informe a Especialidade">
            <span class='msg-erro msg-especialidade'></span>
          </div>

               <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
            <option value="">Selecione o Status</option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
          </select>
          <span class='msg-erro msg-status'></span>
          </div>
        </div>
          
         
 
          <input type="hidden" name="acao" value="incluir">
          <button type="submit" class="btn btn-outline-success btn-lg" id='botao'> 
            Cadastrar
          </button>
           <button type="button" class="btn btn-primary btn-lg" id='botao'> 
            <a class = "link" href="consulta_especialidade.php">Consultar</a> 
          </button>
      </form>
    </fieldset>
  </div>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>