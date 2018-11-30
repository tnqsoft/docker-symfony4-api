<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;

use Doctrine\ORM\EntityManagerInterface;

use FOS\RestBundle\Controller\Annotations\Route;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\Annotations\Version;

use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;

use App\Entity\User;
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
     * @SWG\Response(
     *     response=200,
     *     description="Returns the current user",
     *     @SWG\Schema(ref=@Model(type=User::class))
     * )
     * @SWG\Tag(name="User")
     * @Security(name="Bearer")
     *
     * @return string
     */
    public function getCurrentUser()
    {
        echo get_class($this->getUser());
        return $this->getUser();
    }
}