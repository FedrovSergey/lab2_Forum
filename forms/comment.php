<table>
	<tr>
		<td colspan = 2 id = "<?php echo $c_id[$comm]?>" width = 380> - <?php echo $comments[$comm]?> </td>
	</tr>
	
	<tr>
		<form  action = "add_comment.php" method = "post">
			<td width = 380>
				······
				<input type = "text" name = "sub_text" placeholder = "Комментировать"> </input>
				<input type = "hidden" name = "comment_id"  value = "<?php echo $c_id[$comm]?>"> </input>
				<input type = "hidden" name = "forum_page"  value = "<?php echo $page?>"> </input>
			</td>
			<td>
				<button type = "submit"> Комментировать </button>
			</td>
		</form>
	</tr>
</table>