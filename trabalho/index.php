<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulário HTML5 - Tutsup</title>
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/scripts.js"></script>
</head>
<body>

<form class="form_turma" action="php/envia_turma.php" method="post" enctype="multipart/form-data">

	<label for="sigla"> Sigla: </label> <br>
	<input type="text" class="sigla" id="sigla" name="sigla" required> <br><br>
	
	<label for="turno"> Turno: </label> <br>
	<input type="text" class="turno" id="turno" name="turno" required> <br><br>
	
	<label for="Questionário_idQuestionário">Questionário : </label> <br>
	<input type="text" class="Questionário_idQuestionário" id="Questionário_idQuestionário" name="Questionário_idQuestionário" required> <br><br>
	
	<input type="submit" value="Enviar">
	
</form>

</body>
</html>