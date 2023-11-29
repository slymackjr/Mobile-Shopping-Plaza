<?php
error_reporting();

// require functions.php file
require('../functions.php');

$adminemail= $contact->getAdminEmail();


if(isset($_POST['submit']))
{
// getting Post values	
$name=$_POST['name'];
$phoneno=$_POST['phonenumber'];
$email=$_POST['emailaddres'];
$subject=$_POST['subject'];
$message=$_POST['message'];
$uip = $_SERVER ['REMOTE_ADDR'];
$isread=0;

$lastInsertId = $contact->insertIntoTblContact($name,$phoneno,$email,$subject,$message,$uip,$isread);

if($lastInsertId)
{
//mail function for sending mail
$to=$email.",".$adminemail; 
$headers .= "MIME-Version: 1.0"."\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
$headers .= 'From:Mobile Shopping Plaza Contact Form <info@jerrycode.com>'."\r\n";
$ms.="<html></body><div>
<div><b>Name:</b> $name,</div>
<div><b>Phone Number:</b> $phoneno,</div>
<div><b>Email Id:</b> $email,</div>";
$ms.="<div style='padding-top:8px;'><b>Message : </b>$message</div><div></div></body></html>";
mail($to,$subject,$ms,$headers);




echo "<script>alert('Your info submitted successfully.');</script>";
  echo "<script>window.location.href='index.php'</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
  echo "<script>window.location.href='index.php'</script>";
}


}


?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Mobile Shopping Plaza Contact Form</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>

        <!--web-fonts-->
        <link href='//fonts.googleapis.com/css?family=Josefin+Sans:400,100,300,600,700' rel='stylesheet' type='text/css'>
        <!--web-fonts-->
    </head>
    <body>
		<!---header--->
		<div class="header">
			<h1><a href="../index.php" style="text-decoration: none">Mobile Shopping Plaza</a></h1>
		</div>
		<!---header--->
		<!---main--->
        <div class="main">
            <div class="main-section">
				<div class="login-form">
					<h2>get in touch with us</h2>
					<p>Feel free to drop us a line and we'll get back to you in 24 hours min!</p>
						<span></span>
					<form name="ContactForm" method="post">
                        <h4>your name</h4>
                        <input type="text" name="name" class="user" placeholder="Johne"  autocomplete="off" required>
                        <h4>your phone number</h4>
                        <input type="text" name="phonenumber" class="phone" placeholder="0900.234.145678" maxlength="10" required autocomplete="off">
                        <h4>your email address</h4>
                        <input type="email" name="emailaddres" class="email" placeholder="Example@mail.com" required autocomplete="off">
                        <h4>your subject</h4>
                        <input type="text" name="subject" class="email" placeholder="Subject" autocomplete="off">
                        <h4>your message</h4>
                        <textarea class="mess" name="message" placeholder="Message" required></textarea>
                        <input type="submit" value="send your message" name="submit">
                    </form>
				</div>
            </div>
        </div>
		<!---main--->
    </body>
</html>