
<html>
	<head>
		<link rel="stylesheet" href="style/style.css">
		<title>Окно ввода</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
			<?php
				error_reporting(E_ALL);
				ini_set('display_errors', 'on');
				mb_internal_encoding('UTF-8');	
				require_once 'connect.php';
			?>
	<div>
		<form id='form' action='' method='post'>
			<div><span>ФИО</span><input type="text" name="fullname" placeholder="Иванов Иван Иваныч" pattern="[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,30}"></div>
			<div><span>Адрес</span><input type="text" name="address"placeholder="Тамбов Советская 33 кв 159"></div>
			<div><span>Телефон</span><input type="tel" name="phone"placeholder="7894561532" pattern="[0-9]{10}"></div>
			<div><span>Почта</span><input type="email" name="mail"placeholder="user@gmail.com" ></div>
			<div id='sub'><input id='button' type='submit' name='sub'></div>	
		</form>

		<table class="resultTable">
			<tr>
				<th>ФИО</th><th>Адрес</th><th>Телефон</th><th>Почта</th>
			</tr>


			<?php

			$users=mysqli_query($connect, "SELECT * FROM `tabletest`");
			$users=mysqli_fetch_all($users);
			foreach($users as $user){
				echo '<tr>';
				foreach($user as $id=>$elem){
					if($id!='id'){
					echo '<td>'.$elem.'</td>';
					}
				}
				echo '</tr>';
			}
			?>
			

		</table>

	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src='script/script.js'></script>

	</body>
</html>