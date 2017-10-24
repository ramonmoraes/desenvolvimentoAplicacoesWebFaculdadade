<!DOCTYPE html>
<html>
<head>
	<title>Listar</title>
</head>
<body>
<h1>Listar BD</h1>
<?php 
// error_reporting(1);
		$con = new mysqli('localhost', 'andrecos_unifacs', 'unifacs123','andrecos_unifacs');

		if( $con -> connect_errno){
			echo "error ao conectar no bd" ; 
		}

		


		if ( $_GET != NULL){
			$idApagar = $_GET['apagar_id'];
			$apagarQuery = "DELETE FROM aluno WHERE id= ". $idApagar . ";";
			echo "$apagarQuery";
			$retorno = $con->query( $apagarQuery );
		}

		$listQuery = "SELECT * FROM aluno";

		$retorno = $con->query( $listQuery );
 ?>

 	<div class='col'>
 	<table border=1>
 		<tr>
 			<th>id</th>
 			<th>nome</th>
 			<th>matricula</th>
 			<th>email</th>
 			<th>curso</th>
 			<th>sexo</th>
 			<th>apagar</th>
 		</tr>
    	<?php 
    		while ($registro = $retorno->fetch_array() ) {
			$id = $registro['id'];
			$nome = $registro['nome'];
			$matricula = $registro['matricula'];
			$email = $registro['email'];
			$curso = $registro['curso'];
			$sexo = $registro['sexo'];
			$href = "apagar.php?apagar_id=$id";
			$url = "<a href=$href>Apagar</a>";
			
			echo "<tr>
					<td> $id </td>
			 		<td>$nome</td>
			 		<td>$matricula</td>
			 		<td>$email</td>
			 		<td>$curso</td>
			 		<td>$sexo</td>
			 		<td> $url </td>
			 	</tr>";
		}

    	 ?>
 	</table>

 	</div>
</body>
<style type="text/css">
	body{
		display: flex;
		flex-direction: column;
		text-align: center;
	}
	.col{
		margin: auto;
	}
</style>
</html>
