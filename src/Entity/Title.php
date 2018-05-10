<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class to manage the random blog's title
 *
 * @ORM\Entity(repositoryClass="App\Repository\TitleRepository")
 */
class Title
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /** 
     * @var: string 
     * 
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    private $label;
    
    /** 
     * @var: string 
     * 
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $submittedBy;
    
    /** 
     * @var: \DateTime 
     * 
     * @ORM\Column(type="datetime", nullable=false)
     */
    private $submittedOn;
    
    function getId() {
        return $this->id;
    }
    
    function getLabel(): string {
        return $this->label;
    }
    
    function getSubmittedBy(): string {
        return $this->submittedBy;
    }

    function getSubmittedOn(): \DateTime {
        return $this->submittedOn;
    }

    function setLabel($label) {
        $this->label = $label;
    }
    
    function setSubmittedBy($submittedBy) {
        $this->submittedBy = $submittedBy;
    }

    function setSubmittedOn($submittedOn) {
        $this->submittedOn = $submittedOn;
    }

    function setId($id) {
        $this->id = $id;
    }
}