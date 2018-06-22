<?php

if (!empty($_GET['NumberTest'])) {
    header("Location:test.php?NumberTest=$_GET[NumberTest]");
}
?>

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>
<p> Выберите Тест </p>

<?php

$NewTest=array();
$Testes=array();

if ($handle = opendir("tests/")) {
    while (false !== ($file = readdir($handle))) {
        if(strpos($file,".")!=0)
            $Testes[]= $file;
    }
    closedir($handle);
}

?>
<form enctype="multipart/form-data"  method="GET">
    <?php
    foreach ($Testes as $key=>$value){
        ?>
        <label><input type="radio"  name='NumberTest' value=<?=$value ?>><?=$value ?></label><br/>
        <?php
    }
    ?>
    <input type="submit" value="Выбрать" />
</form >



</body>
</html>
