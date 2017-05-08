<?php

/**
 * Builder short summary.
 * creates different html pages
 * Builder description.
 * two parts to this design:
 * the directory controls building the different variations of an object
 * the builder knows how to assemble the object with the directions from the builder
 *
 * @version 1.0
 * @author matthew dunning
 */
abstract class Builder
{
    abstract function getPage();
}

//page director which controls the parts going
//into the object
abstract class Director {
    abstract function __construct(Builder $builder);
    abstract function buildPage();
    abstract function getPage();
}


/**
 * Summary of HTMLPage
 * this creates a specific html page
 * we can use different pages for easy interchanability
 */
class HTMLPage{
   private $page = NULL;
    private $page_title = NULL;
    private $page_heading = NULL;
    private $page_text = NULL;
    function __construct() {
    }
    function showPage() {
      return $this->page;
    }
    function setTitle($title_in) {
      $this->page_title = $title_in;
    }
    function setHeading($heading_in) {
      $this->page_heading = $heading_in;
    }
    function setText($text_in) {
      $this->page_text .= $text_in;
    }

    //we can abstract this function out to support many different layouts
    function formatPage() {
       $this->page  = '<html>';
       $this->page .= '<head><title>'.$this->page_title.'</title></head>';
       $this->page .= '<body>';
       $this->page .= '<h1>'.$this->page_heading.'</h1>';
       $this->page .= $this->page_text;
       $this->page .= '</body>';
       $this->page .= '</html>';
    }
}

//creates the final object delegated from the director
class HTMLPageBuilder extends Builder {
    private $page = NULL;
    function __construct() {
        $this->page = new HTMLPage();
    }
    function setTitle($title_in) {
        $this->page->setTitle($title_in);
    }
    function setHeading($heading_in) {
        $this->page->setHeading($heading_in);
    }
    function setText($text_in) {
        $this->page->setText($text_in);
    }
    function formatPage() {
        $this->page->formatPage();
    }
    function getPage() {
        return $this->page;
    }
}

//specifies what should be int the object
//then passes the actual creation to the builder
class HTMLPageDirector extends Director {
    private $builder = NULL;
    public function __construct(Builder $builder_page) {
        $this->builder = $builder_page;
    }
    public function buildPage() {
        $this->builder->setTitle('Legends HTML page');
        $this->builder->setHeading('Legends Furniture');
        $this->builder->setText('some item');
        $this->builder->setText('format it');
        $this->builder->setText('format more stuff');
        $this->builder->formatPage();
    }
    public function getPage() {
        return $this->builder->getPage();
    }
}

include("TEST\BuilderTest.php");

?>