	<?php include('/includes/head.inc.php'); ?>
	<title>multiplications</title>
	</head> 
	<?php include('/includes/menu.inc.php'); ?>
	<h1>Tables de multiplication</h1>	
	<h4><table style=\"width:100%\">
		<?php
	for ($i = 0 ; $i<10 ; $i++)
	{
		echo "<tr>";
		for ($j= 0 ; $j<10 ; $j++)
		{
			$mult = $i*$j;
			echo "<th> $i * $j = $mult </th>";
		}
		echo "</tr>";
	}
	?>
</table> 
</h4>
</body>
</html>
