<?php
require 'conexao.php';
 
// Recebe o termo de pesquisa se existir
$termo = (isset($_GET['termo'])) ? $_GET['termo'] : '';
 
// Verifica se o termo de pesquisa está vazio, se estiver executa uma consulta completa
if (empty($termo)):
 
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, especialidade, status FROM especialidade';
	$stm = $conexao->prepare($sql);
	$stm->execute();
	$especialidades = $stm->fetchAll(PDO::FETCH_OBJ);
 
else:
 
	// Executa uma consulta baseada no termo de pesquisa passado como parâmetro
	$conexao = conexao::getInstance();
	$sql = 'SELECT id, especialidade, status FROM especialidade WHERE nome LIKE :nome';
	$stm = $conexao->prepare($sql);
	$stm->bindValue(':nome', $termo.'%');
	$stm->execute();
	$especialidades = $stm->fetchAll(PDO::FETCH_OBJ);
 
endif;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Consulta de Especialidades</title>
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
 
			<legend><h1>Consulta de Especialidades</h1></legend>
 
			<form action="consulta_especialidade.php" method="get" id='form-contato' class="form-horizontal col-md-10">
				<div class='form-group'>
				<br>
			    	<input type="text" class="form-control" id="termo" name="termo" placeholder="Informe o Nome da especialidade:"><br>
			    	 <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
				</div>
			   
			</form>
 
			
 
			<?php if(!empty($especialidades)):?>
 
				<table class="table table-striped">
					<tr class='active'>
						<th>Especialidade</th>
						<th>Status</th>
					</tr>
					<?php foreach($especialidades as $especialidade):?>
						<tr>
							<td><?=$especialidade->especialidade?></td>
							<td><?=$especialidade->status?></td>
							<td>
								<a href='editar.php?id=<?=$especialidade->id?>' class="btn btn-primary">Editar</a>
								<a href='javascript:void(0)' class="btn btn-danger link_exclusao" rel="<?=$especialidade->id?>">Excluir</a>
							</td>
						</tr>	
					<?php endforeach;?>
				</table>
				<a href='cad_especialidade.php' class="btn btn-success pull-right">Cadastrar outra Especialidade</a>
 
			<?php else: ?>
 
				<h3 class="text-center text-danger">Não existem especialidades cadastradas!</h3>
			<?php endif; ?>
		</fieldset>
	</div>
	<script type="text/javascript" src="js/custom.js"></script>
</body>
</html>