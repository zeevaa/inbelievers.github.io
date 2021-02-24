<?php
    $fromEmail = $_POST['email'];
    $toEmail = 'info@inbelievers.com';
    $fromName = $_POST['name'];
    $subjectName = $_POST['subject'];
    $message = $_POST['message'];
    
    //save to db start
    $link = mysqli_connect("localhost", "inbelytj_digital_admin", "dataraledu", "inbelytj_inbelievers");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    
    // Attempt insert query execution
    $sql = "INSERT INTO contact_details (name,email,subject,message) VALUES ('$fromName', '$fromEmail', '$subjectName', '$message')";
    mysqli_query($link, $sql);
    
    // if(mysqli_query($link, $sql)){
    //     echo "Records added successfully.";
    // } else{
    //     echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    // }
 
    // Close connection
    mysqli_close($link);
    
    //save to db end

    $to = $toEmail;
    $subject = $subjectName;
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
    $message = '<!doctype html>
			<html lang="en">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport"
					  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
				<meta http-equiv="X-UA-Compatible" content="ie=edge">
				<title>Document</title>
			</head>
			<body>
			<span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
				<div class="container">
                 '.$message.'<br/>
                    Regards<br/>
                  '.$fromName.'
				</div>
			</body>
			</html>';
    $result = @mail($to, $subject, $message, $headers);

    echo '<script>alert("Thanks for the message! someone from team will contact you as soon as possible !")</script>';
    echo '<script>window.location.href="../index.html";</script>';

?>
