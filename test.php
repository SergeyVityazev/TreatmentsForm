

<!DOCTYPE HTML>
<html>
<head>
</head>
<body>


<?php

$NumberTest=$_GET['NumberTest'];
$TestText=file_get_contents("tests/".$NumberTest);
echo "Вы выбрали тест ".$NumberTest;
$DecodeTestText=json_decode($TestText,true);

$right=0;
$Noright=0;
$N=0;
?>
<form  method="post">
    <p>Введите Ваше имя</p>
    <label><input type="text" name="UserName"></label>
    <?php
    foreach ($DecodeTestText as $test) {
        foreach ($test as $inner_key => $questions) {
            if (is_string($questions))
                continue;

            foreach ($questions as $InInner_key => $question) {
                if ($InInner_key == "content") {
                    echo "<br/>";
                    echo $question ;
                    echo "<br/>";
                } elseif ($InInner_key !== "nameQ") {
                    if ($InInner_key=="yes"){
                        ?> <label><input type="checkbox" name=<?=$right=$right+1 ?> value="right"> <?= $question ?></label>
                    <?php }
                    else{ ?>
                        <label><input type="checkbox" name=<?=$Noright=$Noright+1 ?> value="Noright" > <?= $question ?></label>
                    <?php  }
                }
            }
        }
    }

    ?>

    <br/>
    <input type="submit" value="Отправить" />
</form >

<?php

if (!empty($_POST)) {
    $RightAnswer = 0;
    $NoRightAnswer = 0;

    foreach ($_POST as $key => $value) {
        if ($value == 'right')
            $RightAnswer = $RightAnswer + 1;
        if ($value == 'Noright')
            $NoRightAnswer = $NoRightAnswer + 1;
    }
    echo "Уважаемый ".$_POST['UserName'] . " Ваш результат:";
    echo "<br>";
    echo "Верных ответов: ".$RightAnswer;
    echo "<br>";
    echo "Неверных ответов: ".$NoRightAnswer;
}
?>


</body>
</html>
