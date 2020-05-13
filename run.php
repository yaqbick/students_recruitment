<?php

require __DIR__.'/vendor/autoload.php';
use StudentsRecruitment\Student;
use StudentsRecruitment\Application;
use StudentsRecruitment\departments\DepartmentA;
use StudentsRecruitment\departments\DepartmentB;
use StudentsRecruitment\departments\DepartmentC;

$faker = Faker\Factory::create();

$applications = [];
for ($i = 0; $i < 200; ++$i) {
    $student = new Student($faker->firstName, $faker->lastName);
    $immutable = DateTimeImmutable::createFromMutable($faker->dateTime);
    $applications[] = new Application($student, $immutable, $faker->numberBetween($min = 0, $max = 100));
}
$departmentA = new DepartmentA(...$applications);
$departmentB = new DepartmentB(...$applications);
$departmentC = new DepartmentC(...$applications);
// print_r($departmentA->getRefusedList());
// $departmentC->setReserveLimit(10);
print_r($departmentC->getReserveList());
