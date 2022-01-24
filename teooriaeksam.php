<?php
require_once("konf.php");
if(!empty($_REQUEST["teooriatulemus"])){
    global $yhendus;
    $kask=$yhendus->prepare(
        "UPDATE jalgrattaeksam SET teooriatulemus=? WHERE id=?");
    $kask->bind_param("ii", $_REQUEST["teooriatulemus"], $_REQUEST["id"]);
    $kask->execute();
}
$kask=$yhendus->prepare("SELECT id, eesnimi, perekonnanimi 
     FROM jalgrattaeksam WHERE teooriatulemus=-1");
$kask->bind_result($id, $eesnimi, $perekonnanimi);
$kask->execute();
?>
<!doctype html>
<html lang="et">
<head>
    <title>Teooriaeksam</title>
    <link rel ="stylesheet" type="text/css" href="css2/MainCssFile.css">
    <meta charset="UTF-8">
</head>
<body>
<section id='sec2'>
    <p><img src="img/logo.PNG" alt='img' id="pic1"></p>
</section>
<h1>Teooriaeksam</h1>
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
			  <td><form action=''>
			         <input type='hidden' name='id' value='$id' />
					 <input type='text' name='teooriatulemus' />
					 <input type='submit' value='Sisesta tulemus' />
			      </form>
			  </td>
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
