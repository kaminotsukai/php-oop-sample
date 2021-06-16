<?php

class Grade
{
    const ANALYST = 'Analyst';
    const CONSULTANT = 'Consultant';
    const ENGINEER = 'Engineer';
}

interface IEmployee
{
    public function calculateBounus();
}

class Analyst implements IEmployee {

    const BONUS_COEFFICIENT = 2;

    private int $salary;
    private string $grade = Grade::ANALYST;

    public function __construct(int $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function calculateBounus(): float
    {
        return $this->salary * self::BONUS_COEFFICIENT;
    }
}

class Engineer implements IEmployee {

    const BONUS_COEFFICIENT = 5;

    private int $salary;
    private string $grade = Grade::ENGINEER;

    public function __construct(int $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function calculateBounus(): float
    {
        return $this->salary * self::BONUS_COEFFICIENT;
    }
}

class Consultant implements IEmployee {

    const BONUS_COEFFICIENT = 3;

    private int $salary;
    private string $grade = Grade::CONSULTANT;

    public function __construct(int $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function calculateBounus(): float
    {
        return $this->salary * self::BONUS_COEFFICIENT;
    }
}

/**
 * 職種がどれだけ増えてもBounusServiceは修正しなくてもよくなる
 */
class BounusService
{
    public function calculate(array $employees)
    {
        $bounus = [];
        foreach ($employees as $employee) {
            $bounus[] = $employee->getSalary() + $employee->calculateBounus();
        }
        return $bounus;
    }
}

$employees = [
    new Analyst(100),
    new Consultant(200),
    new Analyst(150),
    new Engineer(400),
];

$bounusService = new BounusService();
print_r($bounusService->calculate($employees));