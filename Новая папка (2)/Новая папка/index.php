<?php

    function countMe(&$first, $second)
    {
        $first += $second;
        return $first * $second;
    }


    function sumWords($arrayWord){

        if(is_array($arrayWord)){

            $countWord = 0;

            foreach ($arrayWord as $rowArray) {
                $countWord += sumWords($rowArray);
            }

            return $countWord;

        }else{

            return mb_strlen($arrayWord, 'UTF-8');

        }

    }
/*
$mysqli = new mysqli('127.0.0.1', 'root','')or die('Error connect to DB!');
if(mysqli_connect_errno()){
    echo ('not conection to database');
}
$mysqli->select_db('news')or die('can/t select database');


*/


    $conectDB =  mysqli_connect('localhost', 'root', '','news');
    mysqli_set_charset($conectDB, 'UTF-8');

    if(mysqli_connect_error()){
        echo 'Error: ' . mysqli_connect_error();
    }

    $resultDB = $conectDB->query('SELECT * FROM news ');

    $result = $resultDB->fetch_assoc();

    /*echo '<pre>';
    print_r($result);
    echo '</pre>';*/

    $result = mysqli_query($conectDB, "INSERT INTO news 
                                    VALUES ('', 'Help','Somebody help me ', UNIX_TIMESTAMP(), 'somebody_help_me' )");

    mysqli_close($conectDB);


   // echo '<pre>';
  //  print_r($result);
   // echo '</pre>';

/*
    echo $result['id'] . '</br>';
    foreach ($result as $row){
        echo $row['id'] . '</br>';
    }

*/
    $sendText;

    if(isset($_POST['text'])&& !empty($_POST['text'])){
        setcookie("Text", $_POST['text']);

        $sendText = $_POST['text'];

    }else{
        if(isset($_COOKIE['Text'])){
            $sendText = $_COOKIE['Text'];
        }else{
            $sendText = "Hello";
        }
    }

    echo "<h1>$sendText</h1>";

    echo "<a href='page.php'>page.php</a>";

    echo '<pre>';
    print_r($_SERVER);
    echo '</pre>';


    $now = getdate();

    echo '<pre>';
    print_r($now);
    echo '</pre>';


    $Student = array("name" => 'Jon',
                "surName" => 'Walts',
                "age" => 24);

    $Student2 = array("name1" => 'Hope',
        "surName1" => 'Sander',
        "age1" => 24);

    $ss = $Student + $Student2;


    echo '<pre>';
    print_r(array_count_values($ss));
    echo '</pre>';

    echo '<pre>';
    print_r(array_diff($Student, $Student2));

    print_r(array_intersect($Student, $Student2));
    echo '</pre>';

    $Text = 'В этом занятии мы учимся создавать свои функции. Теории не так много, но есть сложные моменты. Постарайтесь повторить все примеры из видео, немного поэкспериментировать на свое усмотрение. В дальнейшем практически весь код будет состоять из пользовательских функций, потому эту тему важно хорошо понимать. ';

    $TextForReplace = '</br>Предупреждаю сразу: занятие может быть скучным. Но и такое бывает!';


    $TextForReplace = str_replace(array('е', 'з'), array('E', 'Z'), $TextForReplace);

    echo $TextForReplace;



    $Result = explode('.', $Text);

    $arrayString = array();

    foreach ($Result as $row){

        $arrayString[] =  explode(' ', $row);



    }

    //------------------count words in array

    echo 'sum word string: ' . sumWords($arrayString);




    echo '<pre>';
    print_r($arrayString);
    echo '</pre>';


//-----------------------



    $a = '5';
    $b = 5;

    echo '</br>' . countMe($a , $b).'</br>';

    echo '</br>' . $a;
    echo '</br>';
    echo $b;

    $result = $a === $b;

    print_r ($result);

    echo(' ');

    var_dump($result);

    echo ('<br/>');

    if($a > $b){
        echo ('$a');
    }elseif ($a == $b){
        echo ('Равны');
    }else{
        echo ('$b');
    }

    $student = array(
        array('name' => 'Jon', 'age' => 32),
        array('name' => 'Deer', 'age' => 24),
        array('name' => 'Hope', 'age' => 29),
        array('name' => 'Iden', 'age' => 45)
    );

    echo ('<pre>');

    for($i = 0; $i < count($student); $i++){
        print_r($student[$i]['name']);
    }

    echo('</pre></br>');

    echo ('<pre>');


    foreach ($student as $key => $row){
        foreach ($row as $keyRow => $value):
            print_r($key . $keyRow . $value . '</br>');
        endforeach;

        }

    echo('</pre>');


