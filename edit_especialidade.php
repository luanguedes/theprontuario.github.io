<?php
require 'conexao.php';
 

$id_especialidade = (isset($_GET['id'])) ? $_GET['id'] : '';
 
if (!empty($id_especialidade) && is_numeric($id_especialidade)):
 
  
  $conexao = conexao::getInstance();
  $sql = 'SELECT idesp, especialidade, status FROM especialidade WHERE idesp = :id';
  $stm = $conexao->prepare($sql);
  $stm->bindValue(':id', $id_especialidade);
  $stm->execute();
  $especialidade = $stm->fetch(PDO::FETCH_OBJ);
 
  if(!empty($especialidade)):
 
  endif;
 
endif;
 
?>

<!DOCTYPE html>
<html>
<head>
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
  <div  class="shadow-lg p-3 mb-5 bg-white rounded">
    <fieldset>
      <legend><h1>Cadastro de Especialidades</h1></legend>
          <form action="action/action_especialidade.php" method="post" id='cadastro' enctype='multipart/form-data'>
     <div class="row">
           <div class="col">
            <label for="especialidade">Especialidade</label>
            <input type="text" class="form-control" id="especialidade" name="especialidade" value="<?=$especialidade->especialidade?>" placeholder="Informe a Especialidade">
            <span class='msg-erro msg-especialidade'></span>
          </div>

               <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
            <option value="<?=$especialidade->status?>"><?=$especialidade->status?></option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
          </select>
          <span class='msg-erro msg-status'></span>
          </div>
        </div>
          
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?=$especialidade->idesp?>">
          <button type="submit" class="btn btn-outline-success btn-lg" id='botao'> 
            Gravar
          </button>
           <a href='cad_especialidade.php' class="btn btn-danger btn-lg">Cancelar</a>
           <button type="button" class="btn btn-primary btn-lg" id='botao'> 
            <a class = "link" href="consulta_especialidade.php">Consultar</a> 
          </button>
      </form>
    </fieldset>
  </div>
  </div>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>