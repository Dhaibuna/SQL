<?php
declare(strict_types=1);
require 'functions.php';

// Call to database

$db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306", "root", "root");


new_question(1);
$customerQuantity= $db->query("
SELECT *
FROM customers");
$result = $customerQuantity->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "We have 121 customers";

new_question(2);

$specifiedCustomer = $db->query("
SELECT customerNumber,
       contactLastName,
       contactFirstName
FROM customers
WHERE contactLastName = 'Young' AND
      contactFirstName = 'Mary' ");

$result = $specifiedCustomer->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "Customer number of Mary Young is 219";

new_question(3);
$specifiedCustomer = $db->query("
SELECT customerNumber,
       city, 
       addressLine1
FROM customers
WHERE city = 'Frankfurt'");

$result = $specifiedCustomer->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "Customer number who lives at Magazinweg 7, Frankfurt 60528 is 247";

new_question(4);

$firstEmployee = $db->query("
SELECT lastName,
        email
FROM employees
ORDER BY lastName");

$result = $firstEmployee->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "The email of the first employee is  lbondur@classicmodelcars.com";
new_question(5);

$firstEmployee = $db->query("
SELECT lastName,
        email
FROM employees
ORDER BY lastName DESC ");

$result = $firstEmployee->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "The email of the last employee is  gvanauf@classicmodelcars.com";

new_question(6);

$firstTruckProduct = $db->query("
SELECT productCode,
       productName,
       productLine, 
       productScale
FROM products
WHERE productLine = 'Trucks and buses'
ORDER BY productScale AND 
         productName
");

$result = $firstTruckProduct->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "The first the product code of all the products from the line 'Trucks and Buses', sorted first by productscale, then by productname is S50_1392";

new_question(7);
$firstEmployeeLastNameT = $db->query("
SELECT lastName,
       email
FROM employees
WHERE lastName LIKE 'T%'
ORDER BY lastName
");

$result = $firstEmployeeLastNameT->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "The email of the first employee, which last name starts with a 't' is lthompson@classicmodelcars.com";

new_question(8);

$customerPayment = $db->query("
SELECT customerNumber, 
       paymentDate
FROM payments
WHERE paymentDate LIKE '2004-01-19'
");

$result = $customerPayment->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo "the customer number who payed by check on 2004-01-19 is 177";

new_question(9);

$customerLocation = $db->query("
SELECT contactLastName,
        state
FROM customers
WHERE state LIKE '%NY%'
OR state LIKE '%NV%'
");

$result = $customerLocation->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo " 7 customers are living in the state Nevada or New York";

new_question(10);

$customerLocation = $db->query("
SELECT contactLastName,
        state,
        country
FROM customers      
WHERE state  LIKE '%NY%'
OR state LIKE '%NV%'
OR country != 'USA'

");

$result = $customerLocation->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo " 93 customers are living in the state Nevada or New York and outside of USA";

