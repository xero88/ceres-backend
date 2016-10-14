<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use sylouuu\MarmitonCrawler\Recipe\Recipe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        // INPUT : recette name
        // OUTPUT : dans la bdd

        // Fetch the recipe
        $recipe = new Recipe('http://www.marmiton.org/recettes/recette_fondue-de-poireaux_20348.aspx');

        // JSON format
        $recipe = $recipe->getRecipe();
        die($recipe);

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);
    }
}
