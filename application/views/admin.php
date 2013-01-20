<link rel="stylesheet" type="text/css" href="<?echo $cssurl;?>">
<div class="section">
	
		<div class="sectionhead"></div>
		<div class="sectionbody">
			<h1 style="font-size: 22pt">Администрирование</h1>
			<div class="functions">
				<table>
					<tr>
						<td>
							<span><a href="admin/password_change">i</a></span> 
						</td>
						<td>
							Сменить пароль						
						</td>
					</tr>
					<tr>
						<td>
							<span><a href="admin/logout">i</a></span> 
						</td>
						<td>
							Выйти					
						</td>
					</tr>
				</table>
			</div>
		</div>	
	</div>

<?

/*echo "<pre>";
var_dump($menu);
echo "</pre>";*/
foreach ($menu as $name => $properties) {
?>
	<div class="section">
	
		<div class="sectionhead"></div>
		<div class="sectionbody">
			<h1><?echo $name?></h1>
			<div class="functions">
				<table>
					<?foreach ($properties as $name => $href) {?>
<tr>
						<td>
							<span><a href="<?echo $href[1]?>"><?echo $href[0]?></a></span> 
						</td>
						<td>
							<?echo $name?>
						
						</td>
					</tr>
				<?}?>
</table>
			</div>
		</div>	
	</div>
	<?}?>
