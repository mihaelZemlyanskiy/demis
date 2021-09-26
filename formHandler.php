
	<?php
require_once 'connect.php';
	
		$arrform=$_POST;
		$arrKeys=array_keys($arrform);
if(!$connect){
		die('Ошибка подключения');
}
$fullname=$arrform['fullname'];
$address=$arrform['address'];
$phone=$arrform['phone'];
$mail=$arrform['mail'];
if(!$mail and !$address and !$phone and !$mail){
	die('Ошибка при вводе формы');
}
mysqli_query($connect, "INSERT INTO `tabletest`(`fullname`,`address`,`phone`,`mail`) VALUES ('$fullname','$address','$phone','$mail')");

	

if (isset($fullname) && isset($address) && isset($phone) && isset($mail)) { 

    $result = array(

    	'fullname' => $fullname,
    	'address' => $address,    	
    	'phone' => $phone,
    	'mail' => $mail,
    ); 

    echo json_encode($result); 
}