<?php
/**
 * Created by PhpStorm.
 * User: macmininewcom4u
 * Date: 18.10.16
 * Time: 14:35
 */

namespace AppBundle\Controller;


use AppBundle\Service\MarmitonService;
use FOS\RestBundle\Controller\FOSRestController;
use sylouuu\MarmitonCrawler\Recipe\Recipe;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Prefix;
use FOS\RestBundle\Controller\Annotations\NamePrefix;
use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

class RecipeController extends FOSRestController
{

    /** @var MarmitonService $marmitonService */
    protected $marmitonService;

    public function setMarmitonService(MarmitonService $service){
        $this->marmitonService = $service;
    }


    /**
     * Search a recipe
     *
     * @param string $recipeName name of the recipe needed
     *
     * @return array data
     *
     * @View()
     * @QueryParam(name="recipeName", nullable=false, description="name of the recipe needed")
     * @ApiDoc()
     */
    public function searchAction($recipeName)
    {

        // http://www.marmiton.org/recettes/recherche.aspx?aqt=test

        // Fetch the recipe
        //$recipe = new Recipe('http://www.marmiton.org/recettes/recette_fondue-de-poireaux_20348.aspx');
        //$recipe = $recipe->getRecipe();

        $recipes = $this->marmitonService->searchRecipes($recipeName);

        return new Response(json_encode($recipes));
    }


}