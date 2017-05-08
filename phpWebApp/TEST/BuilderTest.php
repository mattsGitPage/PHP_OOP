<?php
//tests the builder pattern
echo 'testing builder pattern<br>';

$pageBuilder = new HTMLPageBuilder();
$pageDirector = new HTMLPageDirector($pageBuilder);
$pageDirector->buildPage();
$page = $pageDirector->GetPage();
echo $page->showPage();

?>