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
    <h1><center>ORDER HISTORY SEARCH</center></h1>
    <div id = "div1">
    <center>

    <?php 
    
    $searchtype = $_POST['searchtype'];
    $searchterm = $_POST['searchterm'];
    
    if (!$searchtype || !$searchterm) {
    	echo "You have entered the wrong details. Please try again!";
    }
    	
    	@ $db = new mysqli('localhost', 'f31im', 'f31im', 'f31im');
    	
    	if (mysqli_connect_errno()) {
			 echo "Error: Could not connect to database.  Please try again later.";
			 exit;
		 }

	$query = "select * from orders where ".$searchtype." like '".$searchterm."'";

	$result = $db->query($query);
	$num_results = $result->num_rows;
	
	if ($num_results !== 0) {
	echo "<br><p>Number of orders found: ".$num_results."</p>";
	
	echo '<table border="0">';
	echo '<tr>';
	echo '<td>Order ID</td>';
	echo '<td>Personal Detail</td>';
	echo '<td>Order</td>';
	echo '<td>Total Amount: ($) </td>';
	echo '<td></td>';
	echo '</tr>';
	
	for ($i=0; $i <$num_results; $i++) {
		$row = $result->fetch_assoc();	
		$orderid=$row['orderid'];
		echo '<tr>';
		echo '<td>',htmlspecialchars(stripslashes($row['orderid'])),'</td>';
		echo '<td>',stripslashes($row['firstname']), ', ', stripslashes($row['lastname']),'<br> Contact: ', stripslashes($row['contact']),'<br> Email: ' ,stripslashes($row['email']),'<br> Address: ' ,stripslashes($row['address']),'<br></td>';
		echo '<td>';
		$originalqty = $row['originalqty'];
		if ($originalqty[0] != 0) {
			echo $originalqty[0]. " x Original Taste Ban Mian <br>";
		}	
		
		$porkqty = $row['porkqty'];
		if ($porkqty[0] != 0) {
			echo $porkqty[0]. " x Pork Belly Ban Mian <br>";
		}	
		
		$prawnqty = $row['prawnqty'];
		if ($prawnqty[0] != 0) {
			echo $prawnqty[0]. " x Fresh Prawn Ban Mian <br>";
		}	
		
		$tomyamqty = $row['tomyamqty'];
		if ($tomyamqty[0] != 0) {
			echo $tomyamqty[0]. " x Tom Yam Ban Mian <br>";
		}

		echo '</td>';
		echo '<td>',stripslashes($row['total']), '</td>';
		echo '<td><form action="edit.php" method = "POST"><input type="hidden" name="id" value="'.$orderid.'"/><input type = "submit" value = "Edit Order"/></form></td>';
		echo '</tr>';

	}
	} else {
		echo "<div id=#div2>";
		echo 'No result found!';
		echo "</div>";
		}
		
	echo '</table>';
	echo "<br><br><a href='orderhistory.html'><input type='button' value = 'Try again'></a>";
	$result->free();
	$db->close();

    
    ?>
    </div></center>
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