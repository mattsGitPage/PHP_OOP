<?php

/**
 * AbstractFurnitureFactory short summary.
 * abstract factory design pattern that creates
 * furniture pieces made by the US or China
 * AbstractFurnitureFactory description.
 *
 * @version 1.0
 * @author matthew dunning
 */

//abstract factory
abstract class AbstractFurnitureFactory
{
    abstract function makeTable();
    abstract function makeChair();
}


/**
 * Summary of USFurnitureFactory and ChinaFurnitureFactory
 * concrete factory extends abstract furniture factory
 * it created a us furniture factory or china one depending what is chosen
 * by the delegated object at run time
 */
class USFurnitureFactory extends AbstractFurnitureFactory{
    private $instance = "US";
    function makeTable(){
        return new LegendsTable;
    }
    function makeChair(){
        return new LegendsChair;
    }
}

class ChinaFurnitureFactory extends AbstractFurnitureFactory{
    private $instance = "China";
    function makeTable(){
        return new ChinaTable;
    }
    function makeChair(){
        return new ChinaChair;
    }
}
//==================================================================



/**
 * Summary of AbstractFurniture
 * every piece of furniture will have these specs
 */
abstract class AbstractFurniture{
    abstract function getColor();
    abstract function getPrice();
}
//===============================================

/**
 * Summary of AbstractTable and AbstractChair
 * classes created by the concrete factory
 * specifies the type of furniture
 * everything that wants to make a table or chair must extend this
 */
abstract class AbstractTable extends AbstractFurniture{
    private $style = "Table";
}

abstract class AbstractChair extends AbstractFurniture{
    private $style = "Chair";
}
//==============================================


/**
 * Summary of LegendsTable/chair ChinaTable/chair
 * final created class each one of these objects will
 * have a slight variation in their contents
 */
class LegendsTable extends AbstractTable{
    private $color;
    private $price;

    function __construct(){
        $this->color = "legends custom color brown";
        $this->price = "$1000";
    }
    function getColor(){
        return $this->color;
    }
    function getPrice(){
        return $this->price;
    }

}

class ChinaTable extends AbstractTable{
    private $color;
    private $price;

    function __construct(){
        $this->color = "China custom gray";
        $this->price = "$500";
    }
    function getColor(){
        return $this->color;
    }
    function getPrice(){
        return $this->price;
    }

}

class LegendsChair extends AbstractChair{
    private $color;
    private $price;

    function __construct(){
        $this->color = "legends custom color green";
        $this->price = "$200";
    }
    function getColor(){
        return $this->color;
    }
    function getPrice(){
        return $this->price;
    }

}

class ChinaChair extends AbstractChair{
    private $color;
    private $price;

    function __construct(){
        $this->color = "China custom blue";
        $this->price = "$100";
    }
    function getColor(){
        return $this->color;
    }
    function getPrice(){
        return $this->price;
    }

}

//include the test cases for scope issues
include("TestAbstractFactory.php");

