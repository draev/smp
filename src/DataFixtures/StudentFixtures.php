<?php

namespace App\DataFixtures;

use App\Entity\Student;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;

class StudentFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        for($i=0; $i < 30; $i++) {
            $student = new Student();
            $student->setFirstName($faker->firstName);
            $student->setLastName($faker->lastName);
            $student->setFatherName($faker->firstName);
    
    
            $student->setCnp($faker->randomDigitNotNull);
            $student->setBirthday($faker->dateTimeInInterval(sprintf('-%d years', random_int(15,20))));

            $manager->persist($student);
        }
    
        $manager->flush();
    }
}
