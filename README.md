## Tech
- PHP
- Composer

## Packages
- Carbon (to format the dates & to check saturday and sunday)
- PHPUnit for testing code

## Getting Started
- Please install [Composer](https://getcomposer.org/doc/00-intro.md) on your computer. 

- Please install the Composer dependency packages
`composer install`

- Please run composer dump-autoload
`composer dump-autoload -o`

## How it works?
### To get current year
`php calculatePayroll.php`

### To get a specified year
`php calculatePayroll.php 2020`

## How to check the test?
`./vendor/bin/phpunit`

## These are the test

-Get Salary Date Shouldn't Return Sunday `2019-03-31`
-Get Salary Date Shouldn't Return Saturday `2019-08-31`
-Get Salary Date Should Return Last Workingday `2019-03-29`
-Get Salary Date Should Equal Friday `2019-08-30`
-Get Salary Date Should Return The Working Day Wednesday `2019-07-31`

-Get Expense Date Shouldn't Return A Sunday `2019-09-01`
-Get Expense Date Shouldn't Return A Saturday `2019-06-01`
-Get Expense Date Should Return A Monday `2019-09-02` Instead Of Sunday `2019-09-01`
-Get Expense Date Should Return A Monday `2019-06-03` Instead Of Saturday `2019-06-01`
-Get Expense Date Should Return The Workday `2019-04-01` Is A Monday

-Get Expense Date Shouldn't Return A Sunday `2019-09-15`
-Get Expense Date Shouldn't Return A Saturday `2019-06-15`
-Get Expense Date Should Return A Monday `2019-12-16` Instead Of Sunday `2019-12-15`
-Get Expense Date Should Return A Monday `2019-06-17` Instead Of Saturday `2019-06-15`
-Get Expense Date Should Return The Workday `2019-02-15` Is A Monday