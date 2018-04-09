<?php
// src/Controller/HomeController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Homepage controller
 *
 * @author kbj
 */
class HomeController extends Controller{
    
    /**
     * HomePage display function
     * @return Symfony\Component\HttpFoundation\Response
     */
    public function home() {
        return $this->render('home/home.html.twig');
    }
}