<!DOCTYPE html>
<html>
<head>
    <title> Cadastro de Pacientes</title>
    <meta charset="utf-8">
    <?php include('mysql.php') ?>
</head>
<body>
    <h1>Cadastro de Pacientes</h1>
    <form method="post" action="<?php echo insert()?>">
      Nome:  <input type="text" name="nome"/> <br>
      Sexo: <input type="text" name="sexo"/> <br>
      Data de Nascimento: <input type="text" name="data"/> <br>
      CNS:  <input type="text" name="cns"/> <br>
      Nome da Mãe: <input type="text" name="nomedamae"/> <br>
      Nome do Pai: <input type="text" name="nomedapai"/> <br>
      Endereco: <input type="text" name="endereco"/> <br>
      Cidade: <input type="text" name="cidade"/> <br>

      <input type="submit" class="botao" value="Gravar">
    </form>
</body>
</html>