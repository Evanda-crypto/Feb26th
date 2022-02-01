<?php

ini_set('SMTP','myserver');
ini_set('smtp_port',25);

$to = "evanceodhiambo07@yahoo.com, evanceodhiambo07@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <evanceodhiambo07@yahoo.com.com>' . "\r\n";
$headers .= 'Cc: evanceotieno660@gmail.com' . "\r\n";

mail($to,$subject,$message,$headers);
?>
