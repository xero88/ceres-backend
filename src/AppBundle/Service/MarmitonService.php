<?php

namespace AppBundle\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use PHPHtmlParser\Dom;

/**
 * Created by PhpStorm.
 * User: macmininewcom4u
 * Date: 18.10.16
 * Time: 15:12
 */
class MarmitonService
{

    /** @var $guzzleClient Client */
    protected $guzzleClient;

    protected $BASE_URL = "http://www.marmiton.org";

    /**
     * Inject Guzzle
     *
     * @param \GuzzleHttp\Client $client
     */
    public function setGuzzleClient(Client $client){
        $this->guzzleClient = $client;
    }

    /**
     *
     * Search recipes
     *
     * @param $recipeName
     * @return array
     */
    public function searchRecipes($recipeName){

        try{

            $response = $this->guzzleClient->request('GET', $this->BASE_URL . '/recettes/recherche.aspx?aqt=' . $recipeName);
            $response = $response->getBody();

            $dom = new Dom();
            $dom->load($response);

            $titles = array();
            $resultSearchRecipes = $dom->getElementsByClass('m_item');
            foreach($resultSearchRecipes as $recipeResult){
                $titles[] = $recipeResult->find('a')[0]->title; // TODO voir comme récupérer toutes les infos via les parser de sylouuu
            }

            return $titles;


        }catch(ClientException $exception){
            // TODO
            return null;
        }
    }

}