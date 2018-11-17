<?php
require 'conexao.php';
 
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
 
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
 
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, sexo, data_nascimento, cns, nome_mae, endereco, telefone, status FROM paciente';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$pacientes = $stm->fetchAll(PDO::FETCH_OBJ);
 
else:
 
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, sexo, data_nascimento, cns, nome_mae, endereco, telefone, status FROM paciente WHERE nome LIKE :nome OR cns LIKE :cns';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':cns', $termo.'%');
	$stm->execute();
	$pacientes = $stm->fetchAll(PDO::FETCH_OBJ);
 
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Consulta de Pacientes</title>
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
 
			<legend><h1>Consulta de Pacientes</h1></legend>
 
			<form action="consulta_paciente.php" method="get" id='form-contato' class="form-horizontal col-md-10">
				<div class='form-group'>
				<br>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o Nome ou CNS do Paciente:"><br>
			    	 <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
				</div>
			   
			</form>
 
			
 
			<?php if(!empty($pacientes)):?>
 
				<table class="table table-striped">
					<tr class='active'>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Data de Nascimento</th>
						<th>CNS</th>
						<th>Nome da Mãe</th>
						<th>Endereço</th>
						<th>Telefone</th>
						<th>Status</th>
					</tr>
					<?php foreach($pacientes as $paciente):?>
						<tr>
							<td><?=$paciente->nome?></td>
							<td><?=$paciente->sexo?></td>
							<td><?=$paciente->data_nascimento?></td>
							<td><?=$paciente->cns?></td>
							<td><?=$paciente->nome_mae?></td>
							<td><?=$paciente->endereco?></td>
							<td><?=$paciente->telefone?></td>
							<td><?=$paciente->status?></td>
							<td>
								<a href='editar.php?id=<?=$paciente->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$paciente->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>
				<a href='cad_paciente.php' class="btn btn-success pull-right">Cadastrar outro Paciente</a>
 
			<?php else: ?>
 
				<h3 class="text-center text-danger">Não existem pacientes cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>