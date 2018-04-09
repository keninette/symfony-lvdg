<?php
// src/Controller/BackOfficeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\RandomTitleGenerator;

/**
 * Back-Office homepage controller
 *
 * @author kbj
 */
class BackOfficeController extends Controller {

    public function home(RandomTitleGenerator $rtg) {
        $title = $rtg->generateRandomTitle();
        
        return $this->render('backoffice/home.html.twig', ['title' => $title]);
    }
}