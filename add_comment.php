<?php
//com
	if (isset($_POST["text"])) {	
		$text = $_POST["text"];
		$time = time();
		$post_id = $_POST["post_id"];
		$page = $_POST["forum_page"];
	
		if (strlen($text) > 1000) {
			header("Location: http://localhost/forum.php?message=Слишком длинный текст");
			exit();
		}
		
		if (strlen($text) < 4) {
			header("Location: http://localhost/forum.php?message=Слишком короткий текст");
			exit();
		}
	
		$sql = "INSERT INTO `comments` (`id`, `text`, `post_id`, `time`) VALUES (NULL, '".$text."', '".$post_id."', '".$time."');";
		$link = mysqli_connect("localhost", "root", "", "posts");
		mysqli_set_charset($link, "utf8");
		$res = mysqli_query($link, $sql);
	
		header("Location: http://localhost/forum.php?page=".$page);
		exit();
	}
//sub_com	
	if (isset($_POST["sub_text"])) {																						
		$text = $_POST["sub_text"];
		$time = time();
		$comment_id = $_POST["comment_id"];
		$page = $_POST["forum_page"];
	
		if (strlen($text) > 1000) {
			header("Location: http://localhost/forum.php?message=Слишком длинный текст");
			exit;
		}
		
		if (strlen($text) < 4) {
			header("Location: http://localhost/forum.php?message=Слишком короткий текст");
			exit;
		}
	
		$sql = "INSERT INTO `sub_comments` (`id`, `text`, `comment_id`, `time`) VALUES (NULL, '".$text."', '".$comment_id."', '".$time."');";
		$link = mysqli_connect("localhost", "root", "", "posts");
		mysqli_set_charset($link, "utf8");
		$res = mysqli_query($link, $sql);
	
		header("Location: http://localhost/forum.php?page=".$page);
		exit();
	}
	
	else {
		header("Location: http://localhost/forum.php?message=Что-то пошло не так");
		exit();
	}
?>