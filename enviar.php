<?php 
require("PHPMailer-master/src/PHPMailer.php"); 
require("PHPMailer-master/src/SMTP.php"); 
 $mail = new PHPMailer\PHPMailer\PHPMailer(); 
 $mail->SMTPDebug = 2; 
 $mail->IsSMTP(); // enable SMTP 
 $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only 
 $mail->SMTPAuth = true; // authentication enabled 
 $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail 
 $mail->Host = "br1058.hostgator.com.br"; 
 $mail->Port = 465; // or 587 
 $mail->IsHTML(true); 
 $mail->Username = "admimpacta@impactacaosocial.com.br"; 
 $mail->Password = "Impactacaosocial@123"; 
 $mail->SetFrom("admimpacta@impactacaosocial.com.br"); 
 $mail->Subject = "Termo vencido"; 
 $mail->Body = "Escreva o texto do email aqui"; 
 $mail->AddAddress("denermichel@uni9.edu.br"); 
    if(!$mail->Send()) { 
       echo "Mailer Error: " . $mail->ErrorInfo; 
    } else { 
       echo "Mensagem enviada com sucesso"; 
    } 
?> 