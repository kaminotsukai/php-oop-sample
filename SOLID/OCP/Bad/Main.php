<?php


/**
 * Gradeが追加されるとBounusServiceを変更する必要がある
 */
class Grade
{
    const ANALYST = 'Analyst';
    const CONSULTANT = 'Consultant';
}

class Employee {

    private string $grade;
    private int $salary;

    public function __construct(string $grade, int $salary)
    {
        $this->grade = $grade;
        $this->salary = $salary;
    }

    public function getGrade(): string
    {
        return $this->grade;
    }

    public function getSalary(): int
    {
        return $this->salary;
    }
}

class BounusService
{
    public function calculate(array $employees)
    {
        $bounusArray = [];
        foreach ($employees as $employee) {

            switch ($employee->getGrade()) {
                case Grade::ANALYST:
                    $bounus = $employee->getSalary() * 2;
                    break;
                case Grade::CONSULTANT:
                    $bounus = $employee->getSalary() * 3;
                    break;
            }

            $bounusArray[] = $employee->getSalary() + $bounus;
        }
        return $bounusArray;
    }
}


$employees = [
    new Employee(Grade::ANALYST, 100),
    new Employee(Grade::CONSULTANT, 200),
    new Employee(Grade::ANALYST, 150),
];

$bounusService = new BounusService();
print_r($bounusService->calculate($employees));