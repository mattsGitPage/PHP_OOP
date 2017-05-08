<?php

/**
 * Singleton short summary.
 * implements the singleton pattern
 * has a singleton class that has one table for sale or for return
 * Singleton description.
 *
 * @version 1.0
 * @author matthew dunning
 */

class Singleton {

    private static $single_instance = NULL;
    private static $quantity_of_tables = 1;


    //use private constructor so only this class can access it
    private function __construct() {
    }

    //user wants to buy a table make sure there are enough then decrement
    //using lazy instantiation, if threading is used switch to eager instantiation
    static function buyTable() {
        if (self::$quantity_of_tables > 0)
        {
            if (self::$single_instance == NULL)
            {
                self::$single_instance = new Singleton();
            }
            //decrement the count of tables
            echo "order completed<br>";
            self::$quantity_of_tables = self::$quantity_of_tables-1;

            return self::$single_instance;
        } else {
            echo "tables are all sold out<br>";
            return NULL;
        }
    }

    //table returned so increment the counter for it
    function returnTable(Singleton $tableReturned) {
        //checking for zero so a user doesnt return more than we have in stock
        if(self::$quantity_of_tables == 0){
            self::$quantity_of_tables = self::$quantity_of_tables + 1;
        }else{
            echo "you cannot have a table to return we only made one and we have it<br>";
        }
    }


}

/**
 * Summary of Purchaser
 * just implements a user that wants to buy a table
 * 
 */
class Purchaser {
    private $purchased_table;
    private $table_available = FALSE;
    

    function __construct() {
    }

    //gets an instance of the singleton and checks whether there are tables 
    //available to purchase
    function buyTable() {
        $this->purchased_table = Singleton::buyTable();
        if ($this->purchased_table == NULL) {
            $this->table_available = FALSE;
        } else {
            $this->table_available = TRUE;
        }
    }

    //allows a ueser to return a table
    function returnTable() {
        $this->purchased_table->returnTable($this->purchased_table);
    }
}


//include the test cases
include("TEST\TestSingleton.php");



?>