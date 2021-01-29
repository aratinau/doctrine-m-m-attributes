<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $userRepository;
    private $postRepository;

    /**
     * HomeController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository, PostRepository $postRepository)
    {
        $this->userRepository = $userRepository;
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $user = $this->userRepository->findOneBy([], []);
        $posts = $this->postRepository->findAll();

        return $this->render('home/index.html.twig', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}
