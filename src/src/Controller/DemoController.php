<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Swagger\Annotations as SWG;

/**
 * DemoController.
 *
 * @Route("/demo", name="demo_link.")
 */
class DemoController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    public function __construct(
        EntityManagerInterface $em
    ) {
        $this->em = $em;
    }

    /**
     * @Rest\Get("/{name}", name="say_hello")
     * @SWG\Get(
     *     path="/demo/{name}",
     *     description="Get List",
     *     operationId="demo_say_hello",
     *     tags={"Demo"},
     *     @SWG\Response(
     *         response=200,
     *         description="Demo say hello"
     *     )
     * )
     *
     * @param string $name
     *
     * @return string
     */
    public function get(string $name)
    {
        return $name;
    }
}