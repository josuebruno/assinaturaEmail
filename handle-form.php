<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$jobTitle = $_POST['job-title'];
	$department = $_POST['department'];
	$email = $_POST['email'];

	// Send email using PHP mail function
	$subject = "Form Submission";
	$message = "
		<html>
			<body>
				<p>Name and Surname: $name</p>
				<p>Job Title: $jobTitle</p>
				<p>Department: $department</p>
				<p>Phone Number: $phone</p>
				<p>Email: $email</p>
			</body>
		</html>
	";
	$headers = "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
	$headers .= "From: your-email@example.com\r\n";

	mail("recipient-email@example.com", $subject, $message, $headers);

	echo "Form submitted successfully!";
?>