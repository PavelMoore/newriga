<form action="<?echo $logonurl?>" method="post" style="margin: 0 auto;">
	Логин: <br><input name="login" type="text"><br>
	Пароль: <br><input type="password" name="password"> <br>
	<input type="submit" value="Войти">
	<div style="color: #f33"><?if (isset($error)) echo $error;?></div>
</form>