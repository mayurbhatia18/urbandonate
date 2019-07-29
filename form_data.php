<?php

$name = $email = $phone = $address = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = test_input($_POST["sender"]);
  $email = test_input($_POST["senderEmail"]);
  $phone = test_input($_POST["senderPhone"]);
  $address = test_input($_POST["senderAdd"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if($_POST["volunteer"]) {
    $recipient="volunteer@urbandonate.org.in";
    $subject="Volunteer";
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $phone=$_POST["senderPhone"];
    $interest=$_POST["interest"];

    $mailBody="Name: $sender\nEmail: $senderEmail\nPhone: $phone\nArea of interest: $interest";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankYou="<p>Thank you for your support. We will get back to you soon.</p>";
 

}

else{
	if($_POST["grow"]){
	$recipient="abhishek@urbandonate.org.in";
    $subject="Helper";
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $phone=$_POST["senderPhone"];

    $mailBody="Name: $sender\nEmail: $senderEmail\nPhone: $phone";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankGrow="<p>Thank you for your support.</p>";
	}

	else{
		if($_POST["contact"]){
	$recipient="support@urbandonate.org.in";
    $subject="Query";
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $phone=$_POST["senderPhone"];

    $mailBody="Name: $sender\nEmail: $senderEmail\nPhone: $phone";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankCon="<p>Thank you for reaching out to us.</p>";
	}
    else{
        if($_POST["donate"]){
    $recipient="donate@urbandonate.org.in";
    $subject="Donation";
    $sender=$_POST["sender"];
    $senderEmail=$_POST["senderEmail"];
    $phone=$_POST["senderPhone"];
    $add=$_POST["senderAdd"];
    $ngo=$_POST["selectedNgo"];
    $item='None';
    if(isset($_POST['selectedItem']) && is_array($_POST['selectedItem']) && count($_POST['selectedItem']) > 0){
    $item = implode(', ', $_POST['selectedItem']);
}
    $quantity='None';
    if(isset($_POST['quant']) && is_array($_POST['quant']) && count($_POST['quant']) > 0){
    $quantity = implode(', ', $_POST['quant']);
}
    $itemdesc='None';
    if(isset($_POST['itemdesc']) && is_array($_POST['itemdesc']) && count($_POST['itemdesc']) > 0){
        $itemdesc = implode(', ', $_POST['itemdesc']);
    }

    $mailBody="Name: $sender\nEmail: $senderEmail\nPhone: $phone\nAddress: $add\nNGO: $ngo\nItems: $item\nQuantity: $quantity\nItem Description: $itemdesc\n";

    mail($recipient, $subject, $mailBody, "From: $sender <$senderEmail>");

    $thankdon="<p>Thank you for your Request, Our representative will get in touch with you soon.</p>";
        }
    }
	}
}
?>