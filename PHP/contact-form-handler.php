<?php
$errors = '';
$myemail = 'sanketnaik99@gmail.com';//<-----Put Your email address here.
if(empty($_POST['first_name'])  ||
   empty($_POST['email']))
{
    $errors .= "\n Error: all fields are required";
}
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email_address = $_POST['email'];
$mobile_number = $_POST['mobile'];
$landline_number = $_POST['landline'];
$website_type = $_POST['website_type'];

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
    header('Location: ../Webpages/contact-form-error.html');

}
if(!isset($_POST['website_type']))
{
$errors .= "<li>You forgot to select the type of the website you require!</li>";
header('Location: ../Webpages/contact-form-selecterror.html');
}

if( empty($errors))
{
$to = $myemail;
$email_subject = "Contact form submission: $name";
$email_body = "You have received a new message. ".
" Here are the details:\n Name: $first_name $last_name \n ".
"Email: $email_address\n Mobile No.: $mobile_number \n Landline No.: $landline_number \n Type of Website required : $website_type";
$headers = "From: $myemail\n";
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
//redirect to the 'thank you' page
header('Location: ../Webpages/contact-form-thankyou.html');
}
?>
