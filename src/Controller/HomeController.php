<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $userRepository;

    /**
     * HomeController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $user = $this->userRepository->findOneBy([], []);

        return $this->render('home/index.html.twig', [
            'user' => $user
        ]);
    }
}
