<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUEats</title>
<meta charset="utf-8">
<style>

body {font-family:Verdana, Arial, sans-serif;
      background-color: #FFFFFF;
}

img {
    border-radius: 50%;
}

#wrapper { background-color: #FCFCFC; 
           color: #000066;
           width: 80%;
		   margin: auto;
           min-width:1000px;
} 


#rightcolumn { margin-left: 0px;
               background-color: #FCFCFC;
               color: #000000;
} 

header{ background-color: #FFFFFF;
        color: #00005D; 
        font-size: 150%; 
        padding: 10px 0px 0px 0px;
}

h2 { text-align: right; font-size:70%;}
h1 {font-family: Verdana, sans-serif; font-weight: bold; font-size: 1.5em; color: #000000; 
}



.content {padding: 20px 20px 0 20px; height: 500px;
} 

footer {
	font-size:70%; text-align: center; margin-top: 1000px;
	left: 0; bottom:0; width: 100%;
    background-color: #FCFCFC;
}

nav a {
	text-decoration: none;
	text-align: right;
	color: #A58366;
	font-weight: bold;
}

a:visited {
	color: #DEB887
}

nav ul { list-style-type: none;}

input[type=search] {
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=search]:focus {
    width: 30%;
}

table { margin: auto; margin-left: auto;  font-size:0.9em;}
th { padding: 20px; font-family: Verdana, sans-serif; border-style: none; text-align: center; }
td { padding: 10px 20px 10px 10px; font-family: Verdana, sans-serif; border-style: none; text-align: center;}
tr:nth-of-type(even) { background-color: #F5F5DC;}
tr:nth-of-type(odd) { background-color: #DEB887;}

</style> 
</head>
<body>
<script>
function fnsearch() {
	document.forms[0].submit();
}
</script>


<div id="wrapper">

		<header>
	<a href="home.html"><img src="Logo2.png" width="400" height="200" alt="Header"></a>
	<h2>
	<nav>
	<a href="About.html">About</a>
	<a href="FAQ.html">FAQ</a>
	<a href="Contact.html">Contact</a>
	<a href="orderhistory.html">OrderHistory</a>
	<form action="search.php" method = "POST"><input type="search" name="mySearch" placeholder="Search.." onKeydown="Javascript: if (event.keyCode==13) fnsearch();"></form>
    </nav>
    </h2>
</header>
  
    <div class="content"> 
    <h1><center>EDIT ORDER</center></h1>
    <div id = "div1">
    <center>
    <?php 
    $orderid = $_POST['id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];

    echo 'Your Order #: '.$orderid. '<br><br><br>';
    
    if (!$firstname && !$lastname && !$address && !$contact && !$email) {
    	echo 'You have not entered any details. Please try again.';
    }
    
    @ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');
    	
    if (mysqli_connect_errno()) {
			 echo "Error: Could not connect to database.  Please try again later.";
			 exit;
		 }
	
	echo 'You have successfully updated: <br><br>';
	//firstname
	if ($firstname) {
		$query1 = "UPDATE orders SET firstname= ('".$firstname."') WHERE orderid=('" .$orderid."')";
	}
	$result1  = $db->query($query1);
	if ($result1) {
		echo "First Name<br>";
 	}
 	
 	//lastname
	if ($lastname) {
		$query2 = "UPDATE orders SET lastname= ('".$lastname."') WHERE orderid=('" .$orderid."')";
	}
	$result2  = $db->query($query2);
	if ($result2) {
		echo "Last Name<br>";
 	}
 	
	//address
	if ($address) {
		$query3 = "UPDATE orders SET address= ('".$address."') WHERE orderid=('" .$orderid."')";
	}
	$result3  = $db->query($query3);
	if ($result3) {
		echo "Address<br>";
 	}
 	
 	//contact
	if ($contact) {
		$query4 = "UPDATE orders SET contact= ('".$contact."') WHERE orderid=('" .$orderid."')";
	}
	$result4  = $db->query($query4);
	if ($result4) {
		echo "Contact<br>";
 	}
 	
	//email
	if ($email) {
		$query5 = "UPDATE orders SET email= ('".$email."') WHERE orderid=('" .$orderid."')";
	}
	$result5  = $db->query($query5);
	if ($result5) {
		echo "Email<br>";
 	}
		
 	$db->close(); 
    ?>
    </div></center></form>
      </div>
<footer><br>
<i>
Copyright &copy; 2017 NTUEats<br>
<a href="mailto:contact@ntueats.com">contact@ntueats.com</a>
</i>
</footer>

</div>
</body>
</html>