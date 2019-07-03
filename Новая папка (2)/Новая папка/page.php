<a href="index.php">Index.php</a>

<?php
$sendText = 0;
if(isset($_COOKIE['Text'])){
    $sendText = $_COOKIE['Text'];
}else{
    $sendText = "Hello";
}
echo "<h1>$sendText</h1>" ;




class Vehicle{
    protected $color;
    protected $speed;

    //----------Vehicle construct
    public function __construct($Color = 'White', $speed = 0){


        $this->color = $Color;
        $this->speed = $speed;
    }

    //----Return Vehicle color
    public function getColor(){

        return $this->color;
    }
    //----SetColor
    public function setColor($color){

        $this->color = $color;
    }


    //----Return Vehicle speed
    public function getSpeed(){

        return $this->color;
    }
    //----Set Color
    public function setSpeed($speed){

        $this->speed = $speed;
    }

    //----Print Param
    public function printClassParam(){
        $str = "Color: ". $this->color.
              " Speed: ". $this->speed;
        return $str;
    }
}









class Car extends Vehicle{
    const WHEELS = 4;

    private $fuel;

    //----------Car construct
    public function __construct($fuil = 1, $Color = 'White', $speed = 0){

        $this->fuel = $fuil;
        $this->color = $Color;
        $this->speed = $speed;

    }


    //--------------------------------
    //------Get fuel
    public function getFuel(){

        return $this->fuel;
    }

    //------Set fuel
    public function setFuel($fuel){

        $this->fuel = $fuel;
    }
    //--------------------------------



    //------Get count wheels
    public function getWheels(){

        return self::WHEELS;
    }


    //------Print Param

    public function printClassParam(){
        $str = parent::printClassParam().
              " Fuel: ". $this->fuel;
        return $str;
    }
}

$car1 = new Car(15, 'red', 120);


echo $car1->getColor() . $car1->getFuel() . Car::WHEELS;


$car1->setColor('Grey');

echo $car1->getColor() . $car1->getFuel() . Car::WHEELS;
echo '<br>';

echo $car1->printClassParam();




//-----------

$conectDB = mysqli_connect('localhost','root', '','news');

mysqli_query($conectDB,"DELETE FROM news WHERE Title = 'Help'");


?>
</br>

<form action="index.php" method="post" >
    <input type="text" name="text"/>
    <input type="submit"/>


</form>