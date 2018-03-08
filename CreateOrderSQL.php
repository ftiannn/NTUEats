<?php
$servername = "localhost";
$username = "f31im";
$password = "f31im";
$dbname = "f31im";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "create table orders
( orderid int unsigned not null auto_increment primary key,
	date date not null,
	firstname varchar(30) not null, 
	lastname varchar (30) not null,
	email varchar(100) not null,
	contact int(10) unsigned not null, 
	address varchar(300) not null,
	originalqty int unsigned,
	originaltotal float(6,2),
	porkqty int unsigned,
	porktotal float(6,2),
	prawnqty int unsigned,
	prawntotal float(6,2),
	tomyamqty int unsigned,
	tomyamtotal float(6,2),
	total float(6,2)
)";

/* NOT NULL - Each row must contain a value for that column, null values are not allowed
DEFAULT value - Set a default value that is added when no other value is passed
UNSIGNED - Used for number types, limits the stored data to positive numbers and zero
AUTO INCREMENT - MySQL automatically increases the value of the field by 1 each time a new record is added
PRIMARY KEY - Used to uniquely identify the rows in a table. The column with PRIMARY KEY setting is often an ID number, and is often used with AUTO_INCREMENT
*/


if (mysqli_query($conn, $sql)) {
    echo "Table Orders created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>