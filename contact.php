<?php


    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
   


$to = "avinashdw2910@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>Name&#58; $name</tr>
<tr>Email&#58; $email</tr>
<tr>Phone&#58; $contact</tr>

</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <avinashdw22@gmail.com>' . "\r\n";
$headers .= 'Cc: ' . "\r\n";



if(mail($to,$subject,$message,$headers)) //Send an Email. Return true on success or false on error
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://connect.leadrat.com/api/v1/integration/GoogleAds');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "{\n  \"name\": \"".$name."\",\n  \"email\": \"".$email."\",\n  \"countryCode\": \"91\",\n  \"mobile\": \"".$contact."\",\n  \"submittedDate\": \"".date('d-m-y')."\"}");
    
    $headers = array();
    $headers[] = 'Api-Key: bfbf5f5c8e745774aa0404baf6f80915';
    $headers[] = 'Content-Type: application/json';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }else
    {
        $res=json_decode($result,true);
        if(isset($res['succeeded'])==1)
        echo "submitted to lead";
        else
        echo "Failed to lead";
    }   
echo 

"<script>window.location.href='thank-you.html';</script>";
}
else
{
echo "<script>
alert('Plz Try Agian');
window.location.href='index.html'

;
</script>";
}
?>