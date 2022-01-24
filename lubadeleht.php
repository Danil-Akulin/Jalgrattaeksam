<?php
require_once("konf.php");
global $yhendus;
$kask=$yhendus->prepare(
    "SELECT id, eesnimi, perekonnanimi, teooriatulemus, 
	     slaalom, ringtee, t2nav, luba FROM jalgrattaeksam;");
$kask->bind_result($id, $eesnimi, $perekonnanimi, $teooriatulemus,
    $slaalom, $ringtee, $t2nav, $luba);
$kask->execute();
?>
<!doctype html>
<html lang="et">
<head>
    <title>Lõpetamine</title>
    <link rel ="stylesheet" type="text/css" href="css2/MainCssFile.css">
    <meta charset="UTF-8">
</head>
<body>
<section id='sec2'>
    <p><img src="img/logo.PNG" alt='img' id="pic1"></p>
</section>
<h1>Lõpetamine</h1>
<?php
include ('navigatione.php');
?>
<table>
    <?php
    while($kask->fetch()){
        echo "
		     <tr>
			   <td>$eesnimi</td>
			   <td>$perekonnanimi</td>
			   <td>$teooriatulemus</td>
			   <td>$slaalom</td>
			   <td>$ringtee</td>
			   <td>$t2nav</td>
			   <td>$luba</td>
			 </tr>
		   ";
    }
    ?>
</table>
<?php
include ('footer.php')
?>
</body>
</html>
