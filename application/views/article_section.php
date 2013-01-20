<?
foreach ($article as $header => $art) {
	$a = isset($article_id);
	?>
	<?if ($a) {?>
		<a href="../news/more/<?echo $article_id[$header];?>">
	<?}?>
	<h3>
		<?echo $header?>
	</h3>
	<?if ($a) {?>
		</a>
	<?}?>
	<?
	echo $art;
}?>