<!DOCTYPE html>

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

<html>
<head>
	<title> Forum </title>
	<style type="text/css">
	body {
		color: purple;
		background-color: #d8da3d }
	
  </style>
</head>

<body>

	<?php 
		include ("connect.php"); 
		echo "<table height = 10> </table>";
		include ("forms/header.php");
	?>

	
	<table height = 10> </table>

	<table border = 0 bordercolor = "grey" width = 620  align = "center" bgcolor = "#f5ff34">
	
		<tr height = 48>
			<td>
				<h2 align = "center"> АНОНИМНЫЙ ФОРУМ </h2>
			</td>
		</tr>
		
		<?php
			$max_page_posts = 3;
				
			$page = 1;
			if (isset($_GET["page"]) && $_GET["page"] > 0)
				$page = $_GET["page"];
			
			if (($page - 1) * $max_page_posts >= $max_posts)
				$page = ceil($max_posts / $max_page_posts); 
			
			for ($i = 1 + ($max_page_posts * ($page - 1)); $i <= ($max_page_posts * $page); $i++) {				
				
				if ($i > $max_posts)
					break;
				
				[$text, $like, $dislike, $fun, $post_id, $img_id] = parse_post($i - 1, $result);
				[$comments, $comm_count, $c_id, $sub_comm_count] = parse_comment($post_id, $comments_db);
				
				echo "<tr> <td>";
				include ("forms/post.php");
				echo "</td></tr>";
				
				echo "<tr height = 5> </tr>";
				echo "<tr><td>";
				include ("forms/comments.php"); 
				echo "</td></tr>";
				
				echo "<tr height = 20> <td> <hr> <td> </tr>";
			}
		
		?>
			
	</table>
	

	<?php
		include ("forms/footer.php");
	
		if (isset($_GET["message"]))
			echo "<script> alert('".$_GET["message"]."') </script>";
	?>
</body>	