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
		$nome             = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$cns              = (isset($_POST['cns'])) ? str_replace(array('.'), '', $_POST['cns']): '';
		$sexo 			  = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
		$data_nascimento  = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : '';
		$telefone  		  = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
		$especialidade    = (isset($_POST['especialidade'])) ? $_POST['especialidade'] : '';
		$status    		  = (isset($_POST['status'])) ? $_POST['status'] : '';
 
 
		// Valida os dados recebidos
		$mensagem = '';
		if ($acao == 'editar' && $id == ''):
		    $mensagem .= '<li>ID do registros desconhecido.</li>';
	    endif;
 
	    // Se for ação diferente de excluir valida os dados obrigatórios
	    if ($acao != 'excluir'):
			if ($nome == '' || strlen($nome) < 3):
				$mensagem .= '<li>Favor preencher o Nome.</li>';
		    endif;
 
			if ($cns == ''):
			   $mensagem .= '<li>Favor preencher o CNS.</li>';
		    elseif(strlen($cns) < 15):
				  $mensagem .= '<li>Formato do CNS inválido.</li>';
		    endif;
 
			if ($sexo == ''):
			   $mensagem .= '<li>Favor preencher o Sexo.</li>';
			endif;
 
			if ($data_nascimento == ''): 	
				$mensagem .= '<li>Favor preencher a Data de Nascimento.</li>';
			endif;
 
			if ($telefone == ''): 
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
			elseif(strlen($telefone) < 10):
				  $mensagem .= '<li>Formato do Telefone inválido.</li>';
		    endif;
 
			if ($especialidade == ''):
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
 
			$sql = 'INSERT INTO profissional (nome, sexo, data_nascimento, cns, telefone, idespecialidade, status)
							   VALUES(:nome, :sexo, :data_nascimento, :cns, :telefone, :especialidade, :status)';
 			
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':data_nascimento', $data_nascimento);
			$stm->bindValue(':cns', $cns);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':especialidade', $especialidade);
			$stm->bindValue(':status', $status);
			$retorno = $stm->execute();
 
			if ($retorno):
				echo "<div class='card text-white bg-success mb-3' style='max-width: 40rem;'>
  						<div class='card-header'>Sucesso</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Cadastro realizado com sucesso!</h5>
   							<p class='card-text'>Você irá retornar para a tela de cadastro em 5 segundos...</p>
  					    </div>
  					 </div>";
		    else:
		    	echo "<center><div class='card text-white bg-danger mb-3' style='max-width: 40rem;' role='alert'>
  						<div class='card-header'>Erro</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Falha eu realizar o cadastro!</h5>
   							<p class='card-text'>Contate o Suporte Técnico.<br>Você irá retornar para a tela de cadastro em 5 segundos...</p>
  					    </div>
  					 </div></center>";
			endif;
 
			echo "<meta http-equiv=refresh content='5;URL=../cad_profissional.php'>";
		endif;

		if ($acao == 'editar'):
		$sql = 'UPDATE profissional SET nome=:nome, sexo=:sexo, data_nascimento=:data_nascimento, cns=:cns, telefone=:telefone, idespecialidade=:especialidade, status=:status ';
		$sql .= 'WHERE id = :id';
 
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':data_nascimento', $data_nascimento);
			$stm->bindValue(':cns', $cns);
			$stm->bindValue(':telefone', $telefone);
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
		    	echo "<center<div class='card text-white bg-danger mb-3' style='max-width: 40rem;' role='alert'>
  						<div class='card-header'>Erro</div>
 						<div class='card-body'>
   							<h5 class='card-title'>Falha ao editar o cadastro!</h5>
   							<p class='card-text'>Contate o Suporte Técnico.<br>Você irá retornar para a tela de consulta em 5 segundos...</p>
  					    </div>
  					 </div></center>";
			endif;
			echo "<meta http-equiv=refresh content='5;URL=../consulta_profissional.php'>";
			endif;



			if ($acao == 'excluir'):
			$sql = 'DELETE FROM profissional WHERE id = :id';
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
			echo "<meta http-equiv=refresh content='5;URL=../consulta_profissional.php'>";
			endif;



		?>
 
	</div>
</body>
</html>