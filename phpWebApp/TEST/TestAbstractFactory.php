

<?php
//test cases for the abstract factory design pattern
echo "testing the abstract factory pattern <br>";

echo "testing legends furniture factory<br>";

$legendsFactoryInstance = new USFurnitureFactory;
testConcreteFactory($legendsFactoryInstance);
echo "<br>";

echo "testing china furniture factory<br>";
$chinaFactoryInstance = new ChinaFurnitureFactory;
testConcreteFactory($chinaFactoryInstance);

//validates the abstractions are operating properly
function testConcreteFactory($instance){
    $table = $instance->makeTable();
    echo "table color " . $table->getColor() ."<br>";
    echo "table price " .$table->getPrice() . "<br>";

    $chair = $instance->makeChair();
    echo "chair color " . $chair->getColor() . "<br>";
    echo "chair price " .$chair->getPrice() . "<br>";
}


?>