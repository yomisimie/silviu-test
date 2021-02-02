<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $encode;
 
    public function __construct(UserPasswordEncoderInterface $encoder) {
        $this->encode = $encoder;
    }
    
    public function load(ObjectManager $manager)
    {
        $article = new Article();
        $article->setTitle('Article 1');
        $article->setContent(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel suscipit velit. Ut aliquet ac lectus ac molestie. Sed maximus lacus ac velit euismod, vel posuere velit cursus. Cras et iaculis ligula. Ut est turpis, bibendum in arcu non, tincidunt iaculis leo. Vivamus eleifend efficitur cursus. Vivamus sed enim a diam posuere sagittis. Curabitur ante ante, dictum quis imperdiet eget, faucibus nec mi. Quisque in iaculis sapien, vitae bibendum nulla. Cras purus justo, interdum quis lectus at, suscipit efficitur nisl. Nunc at lorem felis. ');
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Article 2');
        $article->setContent(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel suscipit velit. Ut aliquet ac lectus ac molestie. Sed maximus lacus ac velit euismod, vel posuere velit cursus. Cras et iaculis ligula. Ut est turpis, bibendum in arcu non, tincidunt iaculis leo. Vivamus eleifend efficitur cursus. Vivamus sed enim a diam posuere sagittis. Curabitur ante ante, dictum quis imperdiet eget, faucibus nec mi. Quisque in iaculis sapien, vitae bibendum nulla. Cras purus justo, interdum quis lectus at, suscipit efficitur nisl. Nunc at lorem felis. ');
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Article 3');
        $article->setContent(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel suscipit velit. Ut aliquet ac lectus ac molestie. Sed maximus lacus ac velit euismod, vel posuere velit cursus. Cras et iaculis ligula. Ut est turpis, bibendum in arcu non, tincidunt iaculis leo. Vivamus eleifend efficitur cursus. Vivamus sed enim a diam posuere sagittis. Curabitur ante ante, dictum quis imperdiet eget, faucibus nec mi. Quisque in iaculis sapien, vitae bibendum nulla. Cras purus justo, interdum quis lectus at, suscipit efficitur nisl. Nunc at lorem felis. ');
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Article 4');
        $article->setContent(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel suscipit velit. Ut aliquet ac lectus ac molestie. Sed maximus lacus ac velit euismod, vel posuere velit cursus. Cras et iaculis ligula. Ut est turpis, bibendum in arcu non, tincidunt iaculis leo. Vivamus eleifend efficitur cursus. Vivamus sed enim a diam posuere sagittis. Curabitur ante ante, dictum quis imperdiet eget, faucibus nec mi. Quisque in iaculis sapien, vitae bibendum nulla. Cras purus justo, interdum quis lectus at, suscipit efficitur nisl. Nunc at lorem felis. ');
        $manager->persist($article);

        $article = new Article();
        $article->setTitle('Article 5');
        $article->setContent(' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel suscipit velit. Ut aliquet ac lectus ac molestie. Sed maximus lacus ac velit euismod, vel posuere velit cursus. Cras et iaculis ligula. Ut est turpis, bibendum in arcu non, tincidunt iaculis leo. Vivamus eleifend efficitur cursus. Vivamus sed enim a diam posuere sagittis. Curabitur ante ante, dictum quis imperdiet eget, faucibus nec mi. Quisque in iaculis sapien, vitae bibendum nulla. Cras purus justo, interdum quis lectus at, suscipit efficitur nisl. Nunc at lorem felis. ');
        $manager->persist($article);

        $admin = new User();
        $admin->setEmail('admin@example.com');
        $admin->setFirstName('Admin');
        $admin->setLastName('Example');
        $admin->setRoles(['ROLE_ADMIN']);
        $admin->setPassword($this->encode->encodePassword($admin, '12345'));
        $manager->persist($admin);

        $user = new User();
        $user->setEmail('user@example.com');
        $user->setFirstName('User');
        $user->setLastName('Example');
        $user->setRoles(['ROLE_USER']);
        $user->setPassword($this->encode->encodePassword($user, '12345'));
        $manager->persist($user);

        $manager->flush();
    }
}
