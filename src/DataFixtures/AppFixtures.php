<?php

namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\UserPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');

        for($i = 0; $i <= 15; $i++) {
            $user = new User();
            $firstname = $faker->firstName('male');
            $user->setUsername($firstname);
            $manager->persist($user);

            for($j = 0; $j <= 5; $j++) {
                $post = new Post();
                $content = $faker->text($maxNbChars = 200);
                $post->setContent($content);
                $manager->persist($post);

                $userPost = new UserPost();
                $userPost->setUser($user);
                $userPost->setPost($post);
                $userPost->setStatus($faker->randomElement(["READ","UNREAD"]));
                $manager->persist($userPost);
            }
        }

        $manager->flush();
    }
}
