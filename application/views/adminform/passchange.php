<form action = "<?echo $actionurl?>" method="post">
	Новый пароль:<input name="newpass" type="password"><br>
	Повторите новый пароль:<input name="resieve" type="password"><br>
	<input type="submit" value="Изменить"><br>
	<div style="color: #f33"><?if (isset($error)) echo $error;?></div>
</form>
