<?php
	include 'ShortNumber.php';
	$sn = new ShortNumber();

	// Generante a random set of letters to the sample.	
	$len = rand(2, $sn->getBase());
	$l = substr($sn->getLetters(), 0, $len);
	$sn->setLetters($l);
	
?>

<html>
<head></head>
<body>

<h1>Sample engoding numbers in base <?php echo $sn->getBase() ?></h1>

<p><strong>Using those letters:</strong> <?php echo $sn->getLetters() ?></p>

<table border="1">
	<tr>
		<th>Number</th>
		<th>Encoded</th>
		<th>Decoded</th>
	</tr>
<?php

for ($x=0; $x<=1000; $x++){
	$e = $sn->encode($x);
	$d = $sn->decode($e);
	echo "<tr><td>$x</td><td>$e</td><td>$d</td></tr>";
}

?>
</table>
</body>
</html>
