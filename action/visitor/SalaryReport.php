<?php

namespace visitor;

include_once 'Visitor.php';
include_once 'Company.php';
include_once 'Department.php';
include_once 'Employee.php';
class SalaryReport implements Visitor
{
    public function visitCompany(Company $company)
    {
        $output = "";
        $total = 0;

        foreach ($company->getDepartments() as $department) {
            $total += $department->getCost();
            $output .= "\n--" . $this->visitDepartment($department);
        }

        $output = $company->getName() .
            " (" . money_format("%i", $total) . ")\n" . $output;

        return $output;
    }

    public function visitDepartment(Department $department)
    {
        $output = "";

        foreach ($department->getEmployees() as $employee) {
            $output .= "   " . $this->visitEmployee($employee);
        }

        $output = $department->getName() .
            " (" . money_format("%i", $department->getCost()) . ")\n\n" .
            $output;

        return $output;
    }

    public function visitEmployee(Employee $employee)
    {
        return money_format("%#6n", $employee->getSalary()) .
        " " . $employee->getName() .
        " (" . $employee->getPosition() . ")\n";
    }
}

