<table style="margin-top: 15px">

<?
for ($i = 0; $i < count($list); $i++) {
	?>
	<tr>
		<td  style="width: 430px"><a href="<?echo $changeurl."/".$table."/".$list[$i]->id; ?>" title="Изменить <?echo $list[$i]->header;?>">
			<?echo $list[$i]->header;?>
		</td></a>
		<td><a href="<?echo $deleteurl."/".$table."/".$list[$i]->id; ?>" title="Удалить <?echo $list[$i]->header;?>">
			x
		</td></a>
	<tr><?
}
?>
</table>