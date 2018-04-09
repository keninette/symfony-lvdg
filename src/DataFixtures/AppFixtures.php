<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;
use App\Entity\Title;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
/**
 * Creates dummy data in order to test the app
 *
 * @author kbj
 */
class AppFixtures extends Fixture {
    
    public function load(ObjectManager $manager) {
        $titles = [
            'La Vie D\'une Geekette'
            , 'Le Vomi du Grizzli'
            , 'La Vertèbre Du Gastéropode'
            , 'Les Violeurs De Fourmis'
            , 'La Vérité Dans la Gélatine'
            , 'Le Vengeur De Génépi'
            , 'Le Vélo Du Gastronome '
            , 'La Vis Du Gnou'
            , 'Les Voleurs De Gnomes'
            , 'Le Vacarme Du Gadget'
        ];
        
        foreach ($titles as $thisTitle) {
            $title = new Title();
            $title->setLabel($thisTitle);
            $manager->persist($title); 
        }
        
        $manager->flush();
    }
}