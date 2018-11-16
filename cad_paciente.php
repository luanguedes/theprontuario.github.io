<!DOCTYPE html>
<html>
<head>
 <?php 
  require_once 'conexao.php';
 ?>
    <meta charset="utf-8">
  <title>Cadastro de Pacientes</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
  <div class='container'>
    <fieldset>
      <legend><h1>Cadastro de Pacientes</h1></legend>
          <form action="action_paciente.php" method="post" id='cadastro' enctype='multipart/form-data'>
          <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" id="nome" name="nome" placeholder="Infome o Nome">
            <span class='msg-erro msg-nome'></span>
          </div>
          
          <div class="form-group">
            <label for="sexo">Sexo</label>
            <select class="form-control" name="sexo" id="sexo">
            <option value="">Selecione o Sexo</option>
            <option value="Masculino">Masculino</option>
            <option value="Feminino">Feminino</option>
            <option value="Outro">Outro</option>
          </select>
          <span class='msg-erro msg-sexo'></span>
          </div>
  

          <div class="form-group">
            <label for="data_nascimento">Data de Nascimento</label>
            <input type="data_nascimento" class="form-control" id="data_nascimento" maxlength="10" name="data_nascimento">
            <span class='msg-erro msg-data'></span>
          </div>

          <div class="form-group">
            <label for="cns">CNS</label>
            <input type="cns" class="form-control" id="cns" maxlength="19" name="cns" placeholder="Informe o CNS">
            <span class='msg-erro msg-cns'></span>
          </div>
          <div class="form-group">
            <label for="nome_mae">Nome da Mãe</label>
            <input type="nome_mae" class="form-control" id="nome_mae" name="nome_mae" placeholder="Informe o Nome da Mãe">
            <span class='msg-erro msg-nome_mae'></span>
          </div>
            <div class="form-group">
            <label for="endereco">Endereço</label>
            <input type="endereco" class="form-control" id="endereco" maxlength="25" name="endereco" placeholder="Informe o Endereço">
            <span class='msg-erro msg-endereco'></span>
          </div>
          <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="telefone" class="form-control" id="telefone" maxlength="12" name="telefone" placeholder="Informe o Telefone">
            <span class='msg-erro msg-telefone'></span>
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
 
          <input type="hidden" name="acao" value="incluir">
          <button type="submit" class="btn btn-primary" id='botao'> 
            Gravar
          </button>
      </form>
    </fieldset>
  </div>
  <script type="text/javascript" src="js/custom.js"></script>
</body>
</html>