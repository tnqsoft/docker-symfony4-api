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
 * LoginController.
 *
 * @Route("/", name="login_api.")
 */
class LoginController extends AbstractController
{
    /**
     * @Rest\Post("/login_check", name="check_login")
     * @SWG\Response(
     *     response=200,
     *     description="Check Login",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="token", type="string", default="")
     *     )
     * )
     * @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     format="application/json",
     *     description="JSON Payload",
     *     @SWG\Schema(
     *          type="object",
     *          @SWG\Property(property="username", type="string", default=""),
     *          @SWG\Property(property="password", type="string", default="")
     *     )
     * )
     * @SWG\Tag(name="User")
     *
     * @return string
     */
    public function checkLogin()
    {
        // Do something
        return "xxx";
    }
}