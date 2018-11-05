<?php 
	
	function insert(){
		try{
			$pdo = new pdo('mysql:host=localhost;dbname=thebanco', "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$stmt = $pdo->prepare('INSERT INTO teste VALUES(:teste)');
			$stmt->execute(array(
				':teste' => 'EAE ISABELA'
			));

			echo $stmt->rowCount();
			} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	function delete(){
		$teste = "teste"; 
   
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=thebanco', "root", "");
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   
			$stmt = $pdo->prepare('DELETE FROM teste WHERE teste = :teste');
			$stmt->bindParam(':teste', $teste); 
			$stmt->execute();
			     
			echo $stmt->rowCount(); 
			} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	function update(){
		$id = 1;
		$nome = "São Paulo";
	   
		try {
			$pdo = new PDO('mysql:host=localhost;dbname=thebanco', $username, $password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			   
			$stmt = $pdo->prepare('UPDATE estado SET nome = :nome WHERE id = :id');
			$stmt->execute(array(
			    ':id'   => $id,
			    ':nome' => $nome
			));
			     
			echo $stmt->rowCount(); 
			} catch(PDOException $e) {
			echo 'Error: ' . $e->getMessage();
		}
	}

	function select(){
		$consulta = $pdo->query("SELECT nome_estado FROM estado;");
 
  
		while ($linha = $consulta->fetch(PDO::FETCH_ASSOC)) {
    		echo "Nome: {$linha['nome_estado']}";
		}
	}
?>