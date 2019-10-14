<?php
require 'vendor/autoload.php';

use PHPUnit\Framework\TestCase;

final class PayrollTest extends TestCase
{
    protected $payroll;

    public function setUp()
    {
        $this->payroll = new \App\DatesCalculations;
    }

    /** @test */
    public function Get_Salary_Date_Shouldnt_Return_Sunday()
    {
        $this->assertNotEquals($this->payroll->getSalaryDate(0,3,2019),'2019-03-31');
    }

    /** @test */
    public function Get_Salary_Date_Shouldnt_Return_Saturday()
    {
        $this->assertNotEquals($this->payroll->getSalaryDate(0,8,2019),'2019-08-31');
    }
    
    /** @test */
    public function Get_Salary_Date_Should_Return_Last_Workingday()
    {
        $this->assertEquals($this->payroll->getSalaryDate(0,3,2019),'2019-03-29');
    }
    
    /** @test */
    public function Get_Salary_Date_Should_Equal_Friday()
    {
        $this->assertEquals($this->payroll->getSalaryDate(0,8,2019),'2019-08-30');
    }
    
    /** @test */
    public function Get_Salary_Date_Should_Return_The_Working_Day_Wednesday()
    {
        $this->assertEquals($this->payroll->getSalaryDate(0,7,2019),'2019-07-31');
    }
    
    /** @test */
    public function Shouldnt_Return_A_Sunday_01_09_2019() 
    {
        // 01/09/2019 is a Sunday
        $this->assertNotEquals($this->payroll->getExpenseDate(1,9,2019),'2019-09-01');
    }
    
    /** @test */
    public function Shouldnt_Return_A_Saturday_01_06_2019() 
    {
        // 01/06/2019 is a Saturday
        $this->assertNotEquals($this->payroll->getExpenseDate(1,6,2019),'2019-06-01');
    }
    
    /** @test */
    public function Should_Return_A_Monday_02_09_2019_Instead_Of_Sunday_01_09_2019() 
    {
        // 01/09/2019 is a Sunday
        $this->assertEquals($this->payroll->getExpenseDate(1,9,2019),'2019-09-02');
    }
    
    /** @test */
    public function Should_Return_A_Monday_03_06_2019_Instead_Of_Saturday_01_06_2019() 
    {
        // 01/06/2019 is a Saturday
        $this->assertEquals($this->payroll->getExpenseDate(1,6,2019),'2019-06-03');
    }
    
    /** @test */
    public function Should_Return_The_Workday_01_04_2019_Is_A_Monday() 
    {
        // 01/04/2019 is a Monday
        $this->assertEquals($this->payroll->getExpenseDate(1,4,2019),'2019-04-01');
    }

    /** @test */
    public function Shouldnt_return_a_Sunday_15_09_2019()
    {
        // 15/09/2019 is a Sunday
        $this->assertNotEquals($this->payroll->getExpenseDate(15,9,2019),'2019-09-15');
    }

    /** @test */
    public function Shouldnt_Return_a_Saturday_15_06_2019() 
    {
        // 15/06/2019 is a Saturday
        $this->assertNotEquals($this->payroll->getExpenseDate(15,6,2019),'2019-06-15');
    }

    /** @test */
    public function Should_return_a_Monday_16_12_2019_Instead_of_Sunday_15_12_2019()
    {
        // 15/12/2019 is a Sunday
        $this->assertEquals($this->payroll->getExpenseDate(15,12,2019),'2019-12-16');

    }

    /** @test */
    public function Should_return_a_Monday_17_06_2019_instead_of_Saturday_15_06_2019() 
    {
        // 15/06/2019 is a Saturday
        $this->assertEquals($this->payroll->getExpenseDate(15,6,2019),'2019-06-17');
    }

    /** @test */
    public function Should_Return_the_Workday_15_02_2019_is_a_Friday()
    {
        // 15/02/2019 is a Friday
        $this->assertEquals($this->payroll->getExpenseDate(15,2,2019),'2019-02-15');
    }
}