<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>Sistema de Cadastro</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
</head>
<body>
	<div class='container box-mensagem-crud'>
		<?php 
		
		require_once 'conexao.php';
 
		// Atribui uma conexão PDO
		$conexao = conexao::getInstance();
 
		// Recebe os dados enviados pela submissão
		$acao             = (isset($_POST['acao'])) ? $_POST['acao'] : '';
		$id               = (isset($_POST['id'])) ? $_POST['id'] : '';
		$nome             = (isset($_POST['nome'])) ? $_POST['nome'] : '';
		$cns              = (isset($_POST['cns'])) ? str_replace(array('.'), '', $_POST['cns']): '';
		$sexo 			  = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
		$nome_mae         = (isset($_POST['nome_mae'])) ? $_POST['nome_mae'] : '';
		$data_nascimento  = (isset($_POST['data_nascimento'])) ? $_POST['data_nascimento'] : '';
		$endereco         = (isset($_POST['endereco'])) ? $_POST['endereco'] : '';
		$telefone  		  = (isset($_POST['telefone'])) ? str_replace(array('-', ' '), '', $_POST['telefone']) : '';
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

			if ($nome_mae == '' || strlen($nome_mae) < 3):
				$mensagem .= '<li>Favor preencher o Nome da Mãe.</li>';
		    endif;
 
			if ($telefone == ''): 
				$mensagem .= '<li>Favor preencher o Telefone.</li>';
			elseif(strlen($telefone) < 10):
				  $mensagem .= '<li>Formato do Telefone inválido.</li>';
		    endif;
 
			if ($endereco == '' || strlen($endereco) < 6):
				$mensagem .= '<li>Favor preencher o Endereço.</li>';
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
 
			$sql = 'INSERT INTO pacientes (nome, sexo, data_nascimento, cns, nome_mae, endereco, telefone, status)
							   VALUES(:nome, :sexo, :data_nascimento, :cns, :nome_mae, :endereco, :telefone, :status)';
 
			$stm = $conexao->prepare($sql);
			$stm->bindValue(':nome', $nome);
			$stm->bindValue(':sexo', $sexo);
			$stm->bindValue(':data_nascimento', $data_nascimento);
			$stm->bindValue(':cns', $cns);
			$stm->bindValue(':nome_mae', $nome_mae);
			$stm->bindValue(':endereco', $endereco);
			$stm->bindValue(':telefone', $telefone);
			$stm->bindValue(':status', $status);
			$retorno = $stm->execute();
 
			if ($retorno):
				echo "<div class='alert alert-success' role='alert'>Registro inserido com sucesso, aguarde você está sendo redirecionado ...</div> ";
		    else:
		    	echo "<div class='alert alert-danger' role='alert'>Erro ao inserir registro!</div> ";
			endif;
 
			//echo "<meta http-equiv=refresh content='3;URL=index.php'>";
		endif;
		?>
 
	</div>
</body>
</html>