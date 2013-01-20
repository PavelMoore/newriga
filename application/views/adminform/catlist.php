<a href="#" style="text-decoration: underline">Добавить категорию...</a><br>
<form action="<?$actionurl?>" method="post">
	<select size="6" name="cat"  >
		
		<?
		for ($i = 0; $i < count($list); $i++) {
			?><option value="<?echo $list[$i]->id?>">	<?echo $list[$i]->name?>	</option>
		<?}?>
		
	</select>
	<input type="submit" value="Выбрать">
</form>