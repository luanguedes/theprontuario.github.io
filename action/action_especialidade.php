<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastros</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		
		require_once '../conexao.php';
 	
		// Atribui uma conexão PDO
		$conexao = Conexao::getInstance();
 		
		// Recebe os dados enviados pela submissão
		$acao             = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$id               = (isset($_POST['id'])) ? $_POST['id'] : '';
		$especialidade    = (isset($_POST['especialidade'])) ? $_POST['especialidade'] : '';
		$status    		  = (isset($_POST['status'])) ? $_POST['status'] : '';

 
 
		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID da Especialidade desconhecida.</li>';
	    endif;
 
	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($especialidade == '' || strlen($especialidade) < 5):
				$mensagem .= '<li>Favor preencher a Especialidade.</li>';
		    endif;

		   if ($status == ''):
			   $mensagem .= '<li>Favor preencher o Status.</li>';
			endif;

		   if ($mensagem != ''):
				$mensagem = '<ul>' . $mensagem . '</ul>';
				echo "<div class='alert alert-danger' role='alert'>".$mensagem."</div> ";
				exit;
			endif;
 
			

			
		endif;
 
 
 
		if ($acao == 'incluir'):
 
			$sql = 'INSERT INTO especialidade (especialidade, status)
							   VALUES(:especialidade, :status)';
 			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':especialidade', $especialidade);
			$stm->bindValue(':status', $status);
		
			$retorno = $stm->execute();
		
		 if ($retorno):
				echo "<center><div class='card text-white bg-success mb-3' style='max-width: 40rem;'>
  						<div class='card-header'>Sucesso</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Cadastro realizado com sucesso!</h5>
   							<p class='card-text'>Você irá retornar para a tela de cadastro em 5 segundos...</p>
  					    </div>
  					 </div></center>";
		    else:
		    	echo "<center><div class='card text-white bg-danger mb-3' style='max-width: 40rem;' role='alert'>
  						<div class='card-header'>Erro</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Falha eu realizar o cadastro!</h5>
   							<p class='card-text'>Contate o Suporte Técnico.<br>Você irá retornar para a tela de cadastro em 5 segundos...</p>
  					    </div>
  					 </div></center>";
			endif;
 
			echo "<meta http-equiv=refresh content='5;URL=../cad_especialidade.php'>";
		endif;

		if ($acao == 'editar'):
		$sql = 'UPDATE especialidade SET especialidade=:especialidade, status=:status ';
		$sql .= 'WHERE idesp = :id';
 
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':especialidade', $especialidade);
			$stm->bindValue(':status', $status);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<center><div class='card text-white bg-success mb-3' style='max-width: 40rem;'>
  						<div class='card-header'>Sucesso</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Cadastro editado com sucesso!</h5>
   							<p class='card-text'>Você irá retornar para a tela de consulta em 5 segundos...</p>
  					    </div>
  					 </div></center>";
		    else:
		    	echo "<center><div class='card text-white bg-danger mb-3' style='max-width: 40rem;' role='alert'>
  						<div class='card-header'>Erro</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Falha ao editar o cadastro!</h5>
   							<p class='card-text'>Contate o Suporte Técnico.<br>Você irá retornar para a tela de consulta em 5 segundos...</p>
  					    </div>
  					 </div></center>";
			endif;
			echo "<meta http-equiv=refresh content='5;URL=../consulta_especialidade.php'>";
			endif;

			if ($acao == 'excluir'):
			$sql = 'DELETE FROM especialidade WHERE idesp = :id';
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':id', $id);
			$retorno = $stm->execute();

			if ($retorno):
				echo "<center><div class='card text-white bg-success mb-3' style='max-width: 40rem;'>
  						<div class='card-header'>Sucesso</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Cadastro excluído com sucesso!</h5>
   							<p class='card-text'>Você irá retornar para a tela de consulta em 5 segundos...</p>
  					    </div>
  					 </div></center>";
		    else:
		    	echo "<center><div class='card text-white bg-danger mb-3' style='max-width: 40rem;' role='alert'>
  						<div class='card-header'>Erro</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Falha ao excluir o cadastro!</h5>
   							<p class='card-text'>Contate o Suporte Técnico.<br>Você irá retornar para a tela de consulta em 5 segundos...</p>
  					    </div>
  					 </div></center>";
			endif;
			echo "<meta http-equiv=refresh content='5;URL=../consulta_especialidade.php'>";
			endif;



		?>
 
	</div>
</body>
</html>