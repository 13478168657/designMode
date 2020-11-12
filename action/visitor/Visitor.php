<?php

namespace visitor;
include_once 'Company.php';

include_once 'Department.php';

include_once 'Employee.php';


interface Visitor
{
    public function visitCompany(Company $company);

    public function visitDepartment(Department $department);

    public function visitEmployee(Employee $employee);
}