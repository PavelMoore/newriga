<form action="<?echo $actionurl?>" method="post" >
	<?if (isset($head)) {?><input name="head" type="text" style="width: 460px; margin-top: 10px; margin-bottom: -10px; color: #000"><?}?>
	<textarea name="new" style="width: 460px; height: 300px; margin-top: 20px"><?if (isset($article)) echo $article;?></textarea>
	<input type="submit" value="Сохранить" style="margin-top: 10px"> 
</form>