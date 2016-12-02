<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Formulário HTML5 - Tutsup</title>
	
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/scripts.js"></script>
</head>
<body>

<?php
// Se não postar nada
if ( ! isset( $_POST ) || empty( $_POST ) ) {
	
	// Mensagem para o usuário
	echo 'Nada a publicar!';
	
	// Mata o script
	exit;
}

// Verifica campos em branco
foreach ( $_POST as $chave => $valor ) {
	// Cria as variáveis dinamicamente
	$$chave = $valor;
	
	// Verifica campos em branco
	if ( empty( $valor ) ) {
		// Mensagem para o usuário
		echo 'Existem campos em branco.';
		
		// Mata o script
		exit;
	}
}

// Verifica se todas as variáveis estão definidas
if (  
	   ! isset( $sigla )  
	|| ! isset( $turno ) 
    || ! isset( $Questionário_idQuestionário)

) 
{
	// Mensagem para o usuário
	echo 'Existem variáveis não definidas.';

	// Mata o script
	exit;
}




// Inclui o arquivo de conexão
include('pdo.php');

// Prepara o envio
$prepara = $conexao_pdo->prepare("
	INSERT INTO `conselho_classe`.`turma` (
		`Sigla`,
		`Questionário_idQuestionário`,
		`Turno`
		
	) 
	VALUES
	( ?, ? ,? )
");

// Envia
$verifica = $prepara->execute(
	array(
		$sigla,
		$Questionário_idQuestionário,
		$turno,

	)
);

if ( $verifica ) {
	echo 'Cadastro realizado com sucesso<br/>';
	
	// Mata o script
} else {
	echo 'Erro ao enviar dados.';
	
	// Mata o script
}
?>


	<input type="button" value="Voltar" onClick="history.go(-1)"> 

</body>
</html>


