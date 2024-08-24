<?php
	// Recebe os dados do formulário
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$jobTitle = $_POST['job-title'];
	$department = $_POST['department'];
	$email = $_POST['email'];

	// Cria o conteúdo do arquivo HTML
	$htmlContent = "
		<!DOCTYPE html>
		<html lang='en'>
		<head>
			<meta charset='UTF-8'>
			<meta name='viewport' content='width=device-width, initial-scale=1.0'>
			<title>Form Data</title>
		</head>
		<body>
			<p>Name and Surname: $name</p>
			<p>Job Title: $jobTitle</p>
			<p>Department: $department</p>
			<p>Phone Number: $phone</p>
			<p>Email: $email</p>
		</body>
		</html>
	";

	// Define o nome do arquivo para download
	$fileName = "form_data.html";

	// Define os headers para o download do arquivo
	header('Content-Type: text/html');
	header('Content-Disposition: attachment; filename="' . $fileName . '"');
	header('Content-Length: ' . strlen($htmlContent));

	// Envia o conteúdo do arquivo HTML para o navegador
	echo $htmlContent;
	exit;
?>
