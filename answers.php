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

echo '<pre>';
print_r($result);
echo '</pre>';

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

echo '<pre>';
print_r($result);
echo '</pre>';

echo "Customer number of Mary Young is 219";

new_question(3);
$specifiedCustomer = $db->query("
SELECT customerNumber,
       city, 
       addressLine1
FROM customers
WHERE city = 'Frankfurt'");

$result = $specifiedCustomer->fetchall(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($result);
echo '</pre>';

echo "Customer number who lives at Magazinweg 7, Frankfurt 60528 is 247";

new_question(4);

$firstEmployee = $db->query("
SELECT lastName,
        email
FROM employees
ORDER BY lastName");

$result = $firstEmployee->fetchall(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($result);
echo '</pre>';

echo "The email of the first employee is  lbondur@classicmodelcars.com";
new_question(5);

$firstEmployee = $db->query("
SELECT lastName,
        email
FROM employees
ORDER BY lastName DESC ");

$result = $firstEmployee->fetchall(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($result);
echo '</pre>';

echo "The email of the last employee is  gvanauf@classicmodelcars.com";