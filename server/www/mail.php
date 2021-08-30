<?php
$to = "riosolar777@gmail.com.com, contacto@mauriciooyola.com";
$subject = "This is a test HTML email";

$message = "
<html>
<head>
<title>This is a test HTML email</title>
</head>
<body>
<p>Test email. Please ignore.</p>
</body>
</html>
";


// More headers. From is required, rest other headers are optional
$headers .= 'From: <admin@areaprop.com.ar>' . "\r\n";

mail($to,$subject,$message,$headers);
?>
