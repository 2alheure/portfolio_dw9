<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Projet;
use App\Entity\Formation;
use App\Entity\Competence;
use App\Entity\Experience;
use App\Entity\Commentaire;
use App\Entity\Technologie;
use App\Entity\Utilisateur;
use App\Entity\CentreDInteret;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture {
    public function load(ObjectManager $manager): void {
        $u = new Utilisateur;
        $u->setPseudo('2alheure')
            ->setEmail('admin@yopmail.fr')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword('$2y$10$dImCwd.TvDCuuc2c/d0QBuFG4jJDHC8azGQZV88aS7dYWv5U37Oi.');


        $faker = \Faker\Factory::create('fr_FR');
        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager);
        $manager->persist($u);
        $manager->flush();

        $populator->addEntity(Technologie::class, 10);
        $populator->addEntity(Utilisateur::class, 5, [
            'avatar' => function () {
                return 'https://picsum.photos/' . rand(100, 200);
            },
            'password' => '$2y$10$dImCwd.TvDCuuc2c/d0QBuFG4jJDHC8azGQZV88aS7dYWv5U37Oi.'
        ]);
        $populator->addEntity(Projet::class, 10);
        $populator->addEntity(Image::class, 10);
        $populator->addEntity(Commentaire::class, 15);

        $populator->addEntity(Experience::class, 10);
        $populator->addEntity(Formation::class, 10);
        $populator->addEntity(CentreDInteret::class, 10, [
            'image' => function () {
                return 'https://picsum.photos/' . rand(100, 200);
            }
        ]);
        $populator->addEntity(Competence::class, 10);

        $populator->execute();
    }
}
