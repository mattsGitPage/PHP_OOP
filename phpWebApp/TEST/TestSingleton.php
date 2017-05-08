<?php
//testing the singleton design pattern

echo "testing signlton service <br>";

$table_buyer1= new Purchaser();
$table_buyer2 = new Purchaser();

echo "table buyer 1 wants to buy the special table<br>";
$table_buyer1->buyTable();

echo "table buyer 2 wants to buy a special table as well<br>";
$table_buyer2->buyTable();

echo "table buyer 1 returned the table<br>";
$table_buyer1->returnTable();

echo "table buyer 2 purchased a table<br>";
$table_buyer2->buyTable();
?>