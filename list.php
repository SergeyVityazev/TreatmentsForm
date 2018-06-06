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
        <label><input type="radio"  name='name' value=<?=$value ?>><?=$value ?></label><br/>
        <?php
    }
    ?>
    <input type="submit" value="Выбрать" />
</form >

<?php

if (!empty($_GET['name'])) {
     echo "Выбрано";
     echo $_GET['name'];
     /*  session_start();
       $_SESSION['count']=$value;*/
       header('Location:test.php');
    }
?>

</body>
</html>
