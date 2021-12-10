
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
		<div class="messageForm">
			<div>		
				<div class="formError">
					<div>
						<p>Ошибка при заполнении формы.</p>
						<p>Пожалуйста, попробуйте еще раз.</p>
					</div>
					<p class="clearmessage">Закрыть</p>	
				</div>
			</div>
		</div>

		<form id='form' action='' method='post'><!--formHandler.php-->
			<div><span>ФИО</span><span class="messageError fullname none">Это поле обязательно</span><input type="text" name="fullname" placeholder="Иванов Иван Иваныч" pattern="[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,15}\s[А-Яа-яЁё]{2,30}"></div>
			<div><span>Адрес</span><span class="messageError address none">Это поле обязательно</span><input type="text" name="address"placeholder="Тамбов Советская 33 кв 159"></div>
			<div><span>Телефон</span><span class="messageError phone none">Это поле обязательно</span><input type="tel" name="phone"placeholder="8(___) ___-____" pattern="[0-9]{10}"></div>
			<div><span>Почта</span><span class="messageError mail none">Это поле обязательно</span><input type="email" name="mail"placeholder="user@gmail.com"></div>
			<div id='sub'><input id='button' type='submit' name='sub'></div>	
		</form>

		<table>
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
			<!--<tr id='result_form'></tr>-->

		</table>

	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script src='script/script.js'></script>
	<script src="script/jquery.maskedinput.min.js"></script>

	</body>
</html>
