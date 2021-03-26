<?php
declare(strict_types=1);
require 'functions.php';

// Call to database

$db = new PDO("mysql:host=mysql;dbname=classicmodels;port=3306", "root", "root");


new_question(1);
$customerQuantity= $db->query("
SELECT COUNT(*) 
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
SELECT COUNT(*)
FROM customers      
WHERE state  LIKE '%NY%'
OR state LIKE '%NV%'
OR country != 'USA'

");

$result = $customerLocation->fetchall(PDO::FETCH_ASSOC);

printr($result);

echo " 93 customers are living in the state Nevada or New York and outside of USA";

new_question(11);

try {
   dbQuery();
    $customerLocation = $db->prepare("
SELECT COUNT(*) 
FROM customers      
WHERE state  = 'NY'
OR state = 'NV'
OR country != 'USA'
AND creditLimit > '1000.00'
");
    $customerLocation->execute();
    $result = $customerLocation->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}
catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}

new_question(12);
try{
    dbQuery();
    $notSalesRepresentative = $db->prepare("
SELECT COUNT(*)
FROM customers
WHERE salesRepEmployeeNumber IS NULL 
");
    $notSalesRepresentative->execute();
    $result = $notSalesRepresentative->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}
catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}

new_question(13);
try{
    dbQuery();
    $ordersComment = $db->prepare("
SELECT COUNT(*)
FROM orders
WHERE comments IS NOT NULL 
");
    $ordersComment->execute();
    $result = $ordersComment->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(14);
try{
    dbQuery();
    $ordersComment = $db->prepare("
SELECT COUNT(*)
FROM orders
WHERE comments LIKE '%caution%' 
");
    $ordersComment->execute();
    $result = $ordersComment->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(15);
try{
    dbQuery();
    $averageCreditLimit= $db->prepare("
SELECT ROUND(AVG(creditLimit))
FROM customers
WHERE country LIKE 'USA'
");
    $averageCreditLimit->execute();
    $result = $averageCreditLimit->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(16);
try{
    dbQuery();
    $mostCommon= $db->prepare("
SELECT MAX(contactLastName)
FROM customers
");
    $mostCommon->execute();
    $result = $mostCommon->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(17);
try{
    dbQuery();
    $mostCommon= $db->prepare("
SELECT DISTINCT(status)
FROM orders
");
    $mostCommon->execute();
    $result = $mostCommon->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(18);
try{
    dbQuery();
    $noCustomers= $db->prepare("
SELECT DISTINCT(country)
FROM customers
");
    $noCustomers->execute();
    $result = $noCustomers->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(19);

try{
    dbQuery();
    $noCustomers= $db->prepare("
SELECT COUNT(*)
FROM orders
WHERE status IN ('Cancelled', 'Disputed')
");
    $noCustomers->execute();
    $result = $noCustomers->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();
}
new_question(20);

try{
    dbQuery();
    $neverShipped= $db->prepare("
SELECT salesRepEmployeeNumber,
       creditLimit
FROM customers
JOIN employees ON salesRepEmployeeNumber= employeeNumber 
                      WHERE lastName ='Patterson' AND firstName='Steve'
                      HAVING creditLimit > '100000.00'
");
    $neverShipped->execute();
    $result = $neverShipped->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(21);
try{
    dbQuery();
    $neverShipped= $db->prepare("
SELECT COUNT(*)
FROM orders
WHERE status = 'Shipped'
");
    $neverShipped->execute();
    $result = $neverShipped->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(22);
try{
    dbQuery();
    $neverShipped= $db->prepare("
SELECT AVG(Average_products) 
FROM     
(
SELECT productLine, AVG(quantityInStock) 'Average_products'
FROM products
GROUP BY productLine)avgs
");
    $neverShipped->execute();
    $result = $neverShipped->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}

new_question(23);
try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT count(*)
FROM products
WHERE quantityInStock < '100'


");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(24);
try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT COUNT(*)
FROM products
WHERE quantityInStock BETWEEN '100' AND '500'


");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(25);
try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT COUNT(*)
FROM orders
WHERE shippedDate BETWEEN '2004-06-01' AND '2004-09-30' AND status = 'Shipped'

");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(26);

try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT COUNT(contactLastName)
FROM customers
JOIN employees ON contactLastName = lastName


");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(27);
try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT MAX(buyPrice),
       productCode
FROM products

");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(28);
try{
    dbQuery();
    $countProduct= $db->prepare("
SELECT productCode,
       SUM(MSRP - buyPrice) 
FROM products
GROUP BY productCode
ORDER BY SUM(MSRP - buyPrice) DESC


");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(29);
try{
    dbQuery();
    $countProduct= $db->prepare("


");
    $countProduct->execute();
    $result = $countProduct->fetchall(PDO::FETCH_ASSOC);
    printr($result);
}catch(PDOException $e){
    echo "Error : " . $e->getMessage();

}
new_question(30);