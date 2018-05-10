<?php
// src/Controller/BackOfficeController.php
namespace App\Controller;

use App\Form\TitleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Service\RandomTitleGenerator;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Title;
use Symfony\Component\HttpFoundation\Request;
/**
 * @route("/admin", name="bo_")
 */
class BackOfficeController extends Controller {

    private $rtg;

    public function __construct(RandomTitleGenerator $rtg)
    {
        $this->rtg = $rtg;
    }

    /**
     * @route("/", name="home")
     */
    public function homeAction(RandomTitleGenerator $rtg) {
        return $this->render('backoffice/home.html.twig', ['title' => $this->rtg->generateRandomTitle()]);
    }
    
    /**
     * @route("/titleator", name="titleator")
     */
    public function titleatorAction(Request $request) {
        $form               = $this->createForm(TitleType::class);
        $submittedTitles    = $this->getDoctrine()->getRepository(Title::class)->findSubmitted();
        $em                 = $this->getDoctrine()->getEntityManager();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            dump($form);
            $newTitle = $form->getData();
            $em->persist($newTitle);
            $em->flush();
            $this->addFlash('success', 'Le titre a bien été ajouté en base de données');
        }

        return $this->render('backoffice/titleator.html.twig', [
            'title'             => $this->rtg->generateRandomTitle(),
            'submittedTitles'   => $submittedTitles,
            'form'              => $form->createView(),
        ]);
    }
}