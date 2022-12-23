# Реализация шаблона CRUD
------

## Задача
Разработать и реализовать клиент-серверную информационную систему, реализующую мехнизм CRUD. Система представляет собой веб-страницу с лентой постов и форму добавления нового поста.
#### Реализовать возможности системы:
 -  Добавление постов в общую ленту (текст и 1 поясняющая картинка, если необходимо)
 -  Реагирование на чужие посты (лайки, дизлайки...)
 -  Комментирование чужих постов
 -  Ответы на комментарии под постами (комментирование второго уровня)
 -  "Раскрывающиеся" комментарии

## Ход работы

### 1. Разработка пользовательского интерфейса

Разработанный дизайн форума:

<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%94%D0%B8%D0%B7%D0%B0%D0%B9%D0%BD.png"/width = 50%></p>

### 2. Описание пользовательских сценариев работы
На сайте доступны следующие возможности:
- Публикация записей с прикреплением картинки
- Реагирование на существующие записи (лайки...)
- Комментирование записей и ее комментариев
- Перемещение по форуму для чтения старых постов

1) Если пользователь введет в посте более 3000 символов или менее 4, или прикрепит картинку более 2 МБ, или картинка будет не jpeg(jpg), то будет выведено сообщение об ошибке.

2) Если пользователь ошибок при добавлении поста не допустил, то после нажатия на кнопку "добавить", страница форума обновится и среди всех записей появится его новая запись.

3) Пользователь может оставить реакции (лайк, дизлайк и смех сквозь слезы), количество реакций от одного пользователя не ограничено. Но само количество реакций ограничено 999.

4) Пользователь может прокомментировать запись или комментарий первого уровня под ней. Объем комментария от 4 до 1000 символов, иначе появится сообщение об ошибке. Если объем комментария соответствует условиям, то после нажатия на кнопку "Оставить комментарий", страница форума обновится и к записи добавится новый комментарий.


### 3. Описание API сервера и хореографии
#### HTTP запросы:

- Запрос на пост новой записи (на оставление комментария аналогичный):
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BF%D0%BE%D1%81%D1%82%D0%B0.png"/width = 370></p>

- Запрос при оставлении реакции на запись:
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D1%80%D0%B5%D0%B0%D0%BA%D1%86%D0%B8%D0%B8.png"/width = 370></p>

- Запрос при перемещении между страницами:
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BD%D0%B0%20%D0%B4%D1%80%D1%83%D0%B3%D1%83%D1%8E%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D1%83.png"/width = 300></p>


### 4. Описание структуры базы данных

#### Для хранения данных форума используется база данных MySQL. 

Всего в базе данных содержится 3 таблицы: 
1) Для информации о постах на форуме:
    1) "id" - id поста.
    2) "text" - текст поста.
    3) "like_count" - количество лайков на посте.
    4) "dislike_count" - количество дизлайков на посте.
    5) "fun_count" - количество смеха сквозь слезы на посте.
    6) "time" - время добавления поста.
    7) "img_id" - название добавленной картинки.
2) Для основных комментариев:
    1) "id" - id комментария.
    2) "text" - текст комментария.
    3) "post_id" - id поста.
    4) "time" - время добавления комментария.
3) Для комментариев второго уровня
    1) "id" - id комментария второго уровня.
    2) "text" - текст комментария второго уровня.
    3) "comment_id" - id основного комментария.
    4) "time" - время добавления комментария второго уровня.

### 5. Описание алгоритмов (блок-схемы)

- Добавление нового поста:
<p align = "center"> <img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BF%D0%BE%D1%81%D1%82%D0%B0.png" width = "400"> </p>


- Добавление комментариев:
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D0%BA%D0%BE%D0%BC%D0%BC%D0%B5%D0%BD%D1%82%D0%B0%D1%80%D0%B8%D1%8F.png" width = "300"/></p>


- Добавление реакции:
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%B4%D0%BE%D0%B1%D0%B0%D0%B2%D0%BB%D0%B5%D0%BD%D0%B8%D0%B5%20%D1%80%D0%B5%D0%B0%D0%BA%D1%86%D0%B8%D0%B8.png" width = "300"/></p>


- Переключение между страницами:
<p align = "center"><img src="https://github.com/FedrovSergey/lab2_Forum/blob/main/for%20readme/%D0%BF%D0%B5%D1%80%D0%B5%D1%85%D0%BE%D0%B4%20%D0%BF%D0%BE%20%D1%81%D1%82%D1%80%D0%B0%D0%BD%D0%B8%D1%86%D0%B0%D0%BC.png" width = "120"/></p>

## Значимые фрагменты кода

Код получение комментария и записи его в базу данных:
```sh
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
```

Парсинг постов, комментариев и комментариев второго уровня:
```sh
function parse_post($index, $result) {
	
	$data_string = $result[$index];
	
	$text = $data_string['text'];
	$like = $data_string['like_count'];
	$dislike = $data_string['dislike_count'];
	$fun = $data_string['fun_count'];
	
	$post_id = $data_string['id'];
			
	if(strlen($data_string['img_id']) == 10	)
		$img_id = $data_string['img_id'];
	else
		$img_id = "none";
	
	return [$text, $like, $dislike, $fun, $post_id, $img_id];
}


function parse_comment($post_id, $comments_db) {
	$comm_count = 0;
	$comments_a = array();
	$comments_id = array();
		
	foreach ($comments_db as $comment) {
		if ($comment["post_id"] == $post_id) {
			
			$comm_count += 1;
				
			$comments_a[$comm_count] = $comment["text"];
			$comments_id[$comm_count] = $comment["id"];
				
		}
	}
		
	return [$comments_a, $comm_count, $comments_id, 0];
}


function parse_sub_comments($comment_id, $sub_comments_db) {
	$sub_comm_count = 0;
	$sub_comments_a = array();
	
	foreach ($sub_comments_db as $sub_comment) {
		if ($sub_comment["comment_id"] == $comment_id) {
			
			$sub_comm_count += 1;
				
			$sub_comments_a[$sub_comm_count] = $sub_comment["text"];
		}
	}
	
	return [$sub_comments_a, $sub_comm_count];
}
```

Код раскрывающихся комментариев:
```sh
<script> 
	function show_comments(id){
		let c = document.getElementById("c"+id);
		c.removeAttribute("hidden");
		
		let b = document.getElementById("b"+id);
		b.textContent = "Скрыть комментарии";
		
		b.setAttribute("onClick", "hide_comments('"+id+"')");
	}
	
	function hide_comments(id) {
		let c = document.getElementById("c"+id);
		c.setAttribute("hidden", true);
		
		let b = document.getElementById("b"+id);
		b.textContent = "Показать комментарии";
		
		b.setAttribute("onClick", "show_comments('"+id+"')");
	}
</script>
```