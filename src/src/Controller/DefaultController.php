<?php

namespace App\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Route;
use Symfony\Component\HttpFoundation\Response;
use Swagger\Annotations as SWG;

/**
 * DefaultController.
 *
 * @Route("/", name="homepage.")
 */
class DefaultController
{
    const RESPONSE_OK = 'ALL OK';

    /**
     * @Get(name="index")
     * @SWG\Get(
     *     path="/",
     *     description="Example API response as HTML",
     *     operationId="example_html",
     *     tags={"Example"},
     *     @SWG\Response(
     *         response=200,
     *         description="Just for demo"
     *     )
     * )
     */
    public function index(): Response
    {
        return new Response(self::RESPONSE_OK);
    }
}