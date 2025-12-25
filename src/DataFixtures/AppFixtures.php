<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Création des utilisateurs
        $user1 = new User();
        $user1->setEmail('admin@example.com');
        $user1->setUsername('Admin');
        $user1->setRoles(['ROLE_ADMIN']);
        $user1->setPassword($this->passwordHasher->hashPassword($user1, 'admin123'));
        $manager->persist($user1);

        $user2 = new User();
        $user2->setEmail('user@example.com');
        $user2->setUsername('Utilisateur');
        $user2->setPassword($this->passwordHasher->hashPassword($user2, 'user123'));
        $manager->persist($user2);

        // Création des articles
        for ($i = 1; $i <= 10; $i++) {
            $article = new Article();
            $article->setTitle('Article ' . $i);
            $article->setContent('Contenu de l\'article ' . $i . '. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.');
            $article->setAuthor($i % 2 == 0 ? $user1 : $user2);
            $article->setCreatedAt(new \DateTimeImmutable('-' . $i . ' days'));
            $manager->persist($article);

            // Ajout de quelques commentaires
            for ($j = 1; $j <= rand(2, 5); $j++) {
                $comment = new Comment();
                $comment->setContent('Commentaire ' . $j . ' sur l\'article ' . $i);
                $comment->setAuthor($j % 2 == 0 ? $user1 : $user2);
                $comment->setArticle($article);
                $comment->setCreatedAt(new \DateTimeImmutable('-' . ($i - 1) . ' days'));
                $manager->persist($comment);
            }
        }

        $manager->flush();
    }
}