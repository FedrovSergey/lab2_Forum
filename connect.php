<?php

$link = mysqli_connect("localhost", "root", "", "posts");

mysqli_set_charset($link, "utf8");

$sql = 'SELECT * FROM posts ORDER BY time DESC';

$result = mysqli_query($link, $sql);
$max_posts = mysqli_num_rows($result);
$result = mysqli_fetch_all($result, MYSQLI_ASSOC);

$sql = 'SELECT * FROM comments ORDER BY time DESC';
$comments_db = mysqli_query($link, $sql);
$comments_db = mysqli_fetch_all($comments_db, MYSQLI_ASSOC);

$sql = 'SELECT * FROM sub_comments ORDER BY time DESC';
$sub_comments_db = mysqli_query($link, $sql);
$sub_comments_db = mysqli_fetch_all($sub_comments_db, MYSQLI_ASSOC);

?>