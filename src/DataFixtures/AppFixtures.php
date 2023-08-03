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
            ->setPassword('$2y$10$qMpfHTKGJ7fNcryF6N8MuOdpL.Y5FmL3kQXkjmXLOnVcGRtBONuT.');


        $faker = \Faker\Factory::create('fr_FR');
        $populator = new \Faker\ORM\Doctrine\Populator($faker, $manager);
        $manager->persist($u);
        $manager->flush();

        $populator->addEntity(Technologie::class, 6, [
            'nom' => function () use ($faker) {
                return $faker->word();
            },
            'icone' => function () {
                return 'https://picsum.photos/' . rand(100, 200);
            },
            'niveau' => function () use ($faker) {
                return $faker->numberBetween(0, 5);
            }
        ]);
        $populator->addEntity(Utilisateur::class, 5, [
            'avatar' => function () {
                return 'https://picsum.photos/' . rand(100, 200);
            },
            'password' => '$2y$10$qMpfHTKGJ7fNcryF6N8MuOdpL.Y5FmL3kQXkjmXLOnVcGRtBONuT.'
        ]);
        $populator->addEntity(Projet::class, 10, [
            'titre' => function () use ($faker) {
                return $faker->sentence();
            }
        ]);
        $populator->addEntity(Image::class, 10, [
            'url' => function () {
                return 'https://picsum.photos/' . rand(500, 800);
            },
        ]);
        $populator->addEntity(Commentaire::class, 15);

        $populator->addEntity(Experience::class, 4, [
            'titre' => function () use ($faker) {
                return $faker->words(3, true);
            },
            'etablissement' => function () use ($faker) {
                return $faker->words(2, true);
            },
            'lieu' => function () use ($faker) {
                return $faker->sentence();
            },
            'description' => function () use ($faker) {
                return $faker->sentence();
            }
        ]);
        $populator->addEntity(Formation::class, 3, [
            'titre' => function () use ($faker) {
                return $faker->words(3, true);
            },
            'etablissement' => function () use ($faker) {
                return $faker->words(2, true);
            },
            'lieu' => function () use ($faker) {
                return $faker->sentence();
            },
            'description' => function () use ($faker) {
                return $faker->sentence();
            }
        ]);
        $populator->addEntity(CentreDInteret::class, 5, [
            'nom' => function () use ($faker) {
                return $faker->words(3, true);
            },
            'image' => function () {
                return 'https://picsum.photos/' . rand(100, 200);
            }
        ]);
        $populator->addEntity(Competence::class, 10, [
            'nom' => function () use ($faker) {
                return $faker->words(3, true);
            }
        ]);

        $populator->execute();
    }
}
