<?php
// src/Controller/BackOfficeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\RandomTitleGenerator;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @route("/admin", name="bo_")
 */
class BackOfficeController extends Controller {

    /**
     * @route("/", name="home")
     */
    public function home(RandomTitleGenerator $rtg) {
        $title = $rtg->generateRandomTitle();
        
        return $this->render('backoffice/home.html.twig', ['title' => $title]);
    }
}