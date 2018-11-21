<?php
require 'conexao.php';
 

$id_profissional = (isset($_GET['id'])) ? $_GET['id'] : '';

 if (!empty($id_profissional) && is_numeric($id_profissional)):

	$conexao = Conexao::getInstance();
	$sql = 'SELECT id, nome, sexo, data_nascimento, cns, telefone, especialidade, profissional.status FROM profissional INNER JOIN especialidade on idesp = idespecialidade WHERE id = :id';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':id', $id_profissional);
	$stm->execute();
	$profissional = $stm->fetch(PDO::FETCH_OBJ);

 
  if(!empty($profissional)):
 
 endif;

endif;

 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
  <title>Cadastro de Profissionais</title>
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
      <legend><h1>Cadastro de Profissionais</h1></legend>
          <form action="action/action_profissional.php" method="post" id='cadastro' enctype='multipart/form-data'>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" value="<?=$profissional->nome?>" placeholder="Informe o Nome">
            <span class='msg-erro msg-nome'></span>
          </div>
           <div class="row">
              <div class="col">
              <label></label>
                  <label for="sexo">Sexo</label>
                      <select class="form-control" name="sexo" id="sexo">
                      <option value="<?=$profissional->sexo?>"><?=$profissional->sexo?></option>
                      <option value="Masculino">Masculino</option>
                      <option value="Feminino">Feminino</option>
                      <option value="Outro">Outro</option>
                      </select>
                      <span class='msg-erro msg-sexo'></span>
              </div>
              <div class="form-group">
                  <label for="data_nascimento">Data de Nascimento</label>
                  <input type="date" class="form-control" id="data_nascimento" value="<?=$profissional->data_nascimento?>" maxlength="10" name="data_nascimento">
                  <span class='msg-erro msg-data'></span>
              </div>
        </div>

          <div class="form-group">
            <label for="cns">CNS</label>
            <input type="cns" class="form-control" id="cns" maxlength="19" name="cns" value="<?=$profissional->cns?>" placeholder="Informe o CNS">
            <span class='msg-erro msg-cns'></span>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="telefone" class="form-control" id="telefone" maxlength="12" value="<?=$profissional->telefone?>" name="telefone" placeholder="Informe o Telefone">
            <span class='msg-erro msg-telefone'></span>
          </div>
          <div class="row">
            <div class="col">
            <label for="especialidade">Especialidade</label>
            <select class="form-control" name="especialidade" id="especialidade">
            <option value="<?=$profissional->idespecialidade?>"><?=$profissional->especialidade?></option>
            <option value="1">Clinico Geral</option>
            <option value="2">Geriatra</option>
            <option value="3">Pediatra</option>
            <option value="4">Ortopedista</option>
            <option value="5">Oncologista</option>
            <option value="6">Cirurgião Geral</option>
            <option value="7">Gastrologista</option>
          </select>
          <span class='msg-erro msg-status'></span>
          </div>
               <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" name="status" id="status">
            <option value="<?=$profissional->status?>"><?=$profissional->status?></option>
            <option value="Ativo">Ativo</option>
            <option value="Inativo">Inativo</option>
          </select>
          <span class='msg-erro msg-status'></span>
          </div>
        </div>
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?=$profissional->id?>">
           
          <button type="submit" class="btn btn-outline-success btn-lg" id='botao'> 
            Gravar
          </button>
           <a href='cad_profissional.php' class="btn btn-danger btn-lg">Cancelar</a>
           <button type="button" class="btn btn-primary btn-lg" id='botao'> 
            <a class= "link" href="consulta_profissional.php">Consultar</a> 
          </button>
      </form>
    </fieldset>
  </div>
  </div>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>