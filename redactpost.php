<?php
//include auth.php file on all secure pages
include("auth.php");
$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		$i=0;
		
		while($rows = $result->fetch_assoc()){
			session_start();
			if ($rows[iduser]==$_SESSION['user_id'] OR $_SESSION['username']=="admin") {
				$i=$i+1;
		} }
		if ($i>=1) {
		
			$rows = "";
?>
<!doctype HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
<link rel="stylesheet"  href="http://localhost/style.css">
<title> Редактирование поста </title>
<!-- <style>  -->
<!-- </style> -->
</head>
<body >
	<div class="wrapper">
		<div class="headerwrapper">
		<div class="logo">
			
		</div>
		<div class="logout">
		Вы авторизованы как 
		<?php 
				session_start();
				echo $_SESSION['username'];
				
				?>.</br>
				<a href='http://localhost/userpage.php'>Мой профиль</a>
				<a href='http://localhost/logout.php'>Выйти</a></br>		
		</div>
		</div>
		<div class="mainwrapper">
		<div class="left" >
		
		</div>
		

		<div class="menu">
			
			<a href='http://localhost/main.php'><h3>Главная</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/search.php'><h3>Поиск</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/chosen.php'><h3>Избранное</h3></a></br>
			<div class="line">
			</div>
			<a href='http://localhost/userposts.php'><h3>Мои посты</h3></a>
		</div>

		<div class="content" >
			<div class="form">
		<h1>Редактировать</h1><br> <p> </p>
		<?php
		$mysql = new mysqli('localhost','root','','users');
if ( !empty($_POST["header"]) &&  !empty($_POST["text"] )) {
		$varchar1 = filter_var(trim($_POST['header']),
		FILTER_SANITIZE_STRING);
		$text = filter_var(trim($_POST['text']),
		FILTER_SANITIZE_STRING);
		
		//$char = $_POST["header"];
		//$text = $_POST["text"];
		$iduseer=$_GET["id"];
		$query1="UPDATE `test` SET `varchar1` = '$varchar1', `text` = '$text'  WHERE `test`.`id` ='$iduseer'";
		$sql = mysqli_query( $mysql, $query1);
		 if (!$sql) { echo mysqli_error($mysql); } 
		 
		}
		$id= $_GET["id"];
		$mysql = new mysqli('localhost','root','','users');
			$query ="SELECT * FROM `test` WHERE `id`=\"".$id."\"";
 
			$result = mysqli_query($mysql, $query);
			if($result)
			$rows = "";
		while($rows = $result->fetch_assoc()){
		$header=$rows[varchar1];
		$text=$rows[text];
		}
		echo "<form name=\"add_post\" action=\"\" method=\"post\">
		 <p>Введите заголовок </p><input type=\"text\" name=\"header\" placeholder=\"введите заголовок\" value=\"".$header."\" required /><br>
		<p>Введите текст</p><textarea name=\"text\" rows=\"10\" cols=\"70\"  required>".$text."
		</textarea><br>
		
		<input type=\"submit\" name=\"submit\" value=\"Изменить\" />
		</form>"
		?>
		
		</div>
		
		</div>
		<div class="right">
		
		</div>
		</div>
		<div class="footerwrapper">
		<div class="footer">
			<h3>IU4-11B Krawez</h3>
		</div>
		</div>
	</div>
</body>
</html>
		<?php }  else { header("Location: http://localhost/main.php");
		}  
				?>