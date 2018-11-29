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
 * UserController.
 *
 * @Route("/api/user", name="user_api.")
 */
class UserController extends AbstractController
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
     * @Rest\Get("/me", name="user_me")
     * @SWG\Get(
     *     path="/api/user/me",
     *     description="Get current user",
     *     operationId="api_user_me",
     *     tags={"User"},
     *     @SWG\Response(
     *         response=200,
     *         description="Get current user"
     *     )
     * )
     *
     * @return string
     */
    public function getCurrentUser()
    {
        return $this->getUser();
    }
}