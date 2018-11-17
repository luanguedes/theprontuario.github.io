<?php
require 'conexao.php';
 
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
 
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
 
	$conexao = Conexao::getInstance();
	$sql = 'SELECT id, nome, sexo, data_nascimento, cns, telefone, especialidade, profissional.status FROM profissional INNER JOIN especialidade on idesp = idespecialidade ';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$profissionais = $stm->fetchAll(PDO::FETCH_OBJ);
 
else:
 
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, nome, sexo, data_nascimento, cns, telefone, especialidade, profissional.status FROM profissional INNER JOIN especialidade on idesp = idespecialidade  
	WHERE nome LIKE :nome OR especialidade LIKE :especialidade OR cns LIKE :cns ';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->bindValue(':especialidade', $termo.'%');
	$stm->bindValue(':cns', $termo.'%');
	
	$stm->execute();
	$profissionais = $stm->fetchAll(PDO::FETCH_OBJ);
 
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Consulta de Profissionais</title>
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
 
			<legend><h1>Consulta de Profissionais</h1></legend>
 
			<form action="consulta_profissional.php" method="get" id='form-contato' class="form-horizontal col-md-10">
				<div class='form-group'>
				<br>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o Nome, Especialidade ou CNS do profissional:"><br>
			    	 <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
				</div>
			   
			</form>
 
			
 
			<?php if(!empty($profissionais)):?>
 
				<table class="table table-striped">
					<tr class='active'>
						<th>Nome</th>
						<th>Sexo</th>
						<th>Data de Nascimento</th>
						<th>CNS</th>
						<th>Telefone</th>
						<th>Especialidade</th>
						<th>Status</th>
					</tr>
					<?php foreach($profissionais as $profissional):?>
						<tr>
							<td><?=$profissional->nome?></td>
							<td><?=$profissional->sexo?></td>
							<td><?=$profissional->data_nascimento?></td>
							<td><?=$profissional->cns?></td>
							<td><?=$profissional->telefone?></td>
							<td><?=$profissional->especialidade?></td>
							<td><?=$profissional->status?></td>
							<td>
								<a href='editar.php?id=<?=$profissional->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$profissional->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>
				<a href='cad_profissional.php' class="btn btn-success pull-right">Cadastrar outro Profissional</a>
 
			<?php else: ?>
 
				<h3 class="text-center text-danger">Não existem profissionais cadastrados!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>