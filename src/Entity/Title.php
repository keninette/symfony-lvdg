<?php
namespace App\Entity;
/**
 * Class to manage the blog's title
 * Which is totally random and divided in 2 parts
 */
class Title
{
    private $id;
    private $label;
    
    // getters & setters
    function getId() {
        return $this->id;
    }
    function getLabel() {
        return $this->label;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setLabel($label) {
        $this->label = $label;
    }
}