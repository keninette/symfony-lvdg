<?php
// src/Service/RandomTitleGenerator.php
namespace App\Service;

use App\Entity\Title;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;

/**
 * Service destined to randomly construct a blog title
 * Because life is funnier when your blog's title's random
 * 
 * @author kbj
 */
class RandomTitleGenerator {
    
    private $emi;
    private $logger;
    
    public function __construct(EntityManagerInterface $emi, LoggerInterface $logger) {
        $this->emi      = $emi;
        $this->logger   = $logger;
    }
    
    /**
     * Randomly picks a title from database
     */
    public function generateRandomTitle() :Title {
        $lastTitleId    = $this->emi->getRepository(Title::class)->findMax();
        
        return $this->emi ->getRepository(Title::class)
                            ->findOneBy(['id' => rand(1, $lastTitleId)]);
    }
}