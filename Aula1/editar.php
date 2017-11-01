<!DOCTYPE html>
<html>
<head>
	<title>Editar</title>
</head>
<body>
<?php 
// error_reporting(1);
		$con = new mysqli('localhost', 'andrecos_unifacs', 'unifacs123','andrecos_unifacs');

		if( $con -> connect_errno){
			echo "error ao conectar no bd" ; 
		}
?>

<h1>Editar</h1>
	
<?php 

if ( $_GET != NULL){

	$idEditar = $_GET['id'];
	$editarQuery = "SELECT * FROM aluno WHERE id= ". $idEditar . ";";
	$retorno = $con->query( $editarQuery );


	while ($registro = $retorno->fetch_array() ) {
		$id = $registro['id'];
		$nome = $registro['nome'];
		$matricula = $registro['matricula'];
		$email = $registro['email'];
		$curso = $registro['curso'];
		$sexo = $registro['sexo'];
	
		echo "
		<form method='POST'>
			<input type='hidden' value=$id name='id'>
			<p> nome</p>
			<input value=$nome name='nome' type='text'>
			<p> matricula</p>
			<input value=$matricula  name='matricula' type='number'>
			<p> email</p>
			<input value=$email name='email' type='email'>
			<p> curso</p>
			<input value=$curso name='curso' type='text'>
		<div class='sexo'>";

		if($sexo=='feminino'){
			echo "
			<input type='radio' name='sexo' value='masculino' required>Masculino<br>
	      	<input type='radio' name='sexo' value='feminino' checked required>Femenino
	      	<br>
	      	";
		  }else{
		  	echo "
			<input type='radio' name='sexo' value='masculino' checked required>Masculino<br>
		  	<input type='radio' name='sexo' value='feminino' required>Femenino<br>
		  	";
		  }

		echo "
		</div>
		<input type='submit' value='Atualizar'>
		</form>";
	}
}
else{
	echo "
		<form method='POST'>
			<input placeholder='nome' name='nome'>
			<input placeholder='matricula'  name='matricula'>
			<input placeholder='email' name='email'>
			<input placeholder='curso' name='curso'>
			<div class='sexo'>
			<input type='hidden' value='id'>
			<input type='radio' name='sexo' value='masculino' required>Masculino<br>
	      	<input type='radio' name='sexo' value='feminino' checked required>Femenino
	      	<br>
	      	</div>
		<input type='submit' value='Atualizar'>
		</form>";
}

if( $_POST != NULL){

	$nome = addslashes($_POST['nome']);
    $matricula = addslashes($_POST['matricula']);
    $email = addslashes($_POST['email']);
    $curso = addslashes($_POST['curso']);
    $sexo = addslashes($_POST['sexo']);

    $insertQuery = "UPDATE aluno SET nome='$nome', matricula='$matricula', email='$email', curso='$curso', sexo='$sexo' WHERE id='$id'";
    echo "$insertQuery";
    echo "
    <script>
    	alert('postou');
    	window.location.href='./listar.php'; 
    </script>";
    $retorno = $con->query( $insertQuery );
}

?>
<style type="text/css">
	h1,p{
		text-align: center;
	}
	form{
		display: flex;
		flex-direction: column;
		justify-content: center;
	}
	input{
		margin:5px auto;
		width: 400px;
	}
	.sexo{
		display: flex;
		justify-content: center;
		width: 350px;
		margin:auto;
	}
</style>		
</body>


</html>
