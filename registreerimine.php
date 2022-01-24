
<?php
//header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]");
require_once("konf.php");
if(isSet($_REQUEST["sisestusnupp"])){
    global $yhendus;
    $kask=$yhendus->prepare(
        "INSERT INTO jalgrattaeksam(eesnimi, perekonnanimi) VALUES (?, ?)");
    $kask->bind_param("ss", $_REQUEST["eesnimi"], $_REQUEST["perekonnanimi"]);
    $kask->execute();
    $yhendus->close();
    header("Location: $_SERVER[PHP_SELF]?lisatudeesnimi=$_REQUEST[eesnimi]");
    exit();
}
?>
<!doctype html>
<html lang="et">
<head>
    <title>Kasutaja registreerimine</title>
    <link rel ="stylesheet" type="text/css" href="css2/MainCssFile.css">
    <meta charset="UTF-8">
</head>
<body>
<section id='sec2'>
    <p><img src="img/logo.PNG" alt='img' id="pic1"></p>
</section>
<h1>Registreerimine</h1>
<?php
include ('navigatione.php');
?>
<?php
if(isSet($_REQUEST["lisatudeesnimi"])){
    echo "Lisati $_REQUEST[lisatudeesnimi]";
}
?>
<form action="?">
    <dl>
        <dt>Eesnimi:</dt>
        <dd><input type="text" name="eesnimi" /></dd>
        <dt>Perekonnanimi:</dt>
        <dd><input type="text" name="perekonnanimi" /></dd>
        <dt><input type="submit" name="sisestusnupp" value="sisesta" /></dt>
    </dl>
</form>
<?php
include ('footer.php')
?>
</body>
</html>
