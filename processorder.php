

<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUEats</title>
<script type = "text/javascript" src = "costing.js"></script>

<meta charset="utf-8">
<style>

body {font-family:Verdana, Arial, sans-serif;
      background-color: #FFFFFF;
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

h1 {font-family: Verdana, sans-serif; font-weight: bold; font-size: 1.5em; color: #000000; }
h2 { text-align: right; font-size:70%;}
h3 {font-family: Courier New, Monospace; font-weight: bold; font-size: 1.2em; color: #A58366; }



.content {padding: 20px 20px 0 20px; height: 500px;
} 

footer {
	font-size:70%; text-align: center;
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

table { margin: auto; margin-left: 350px;  font-size:0.9em;}
th { padding: 20px; font-family: Verdana, sans-serif; border-style: none; text-align: center; }
td { padding: 10px 20px 10px 10px; font-family: Verdana, sans-serif; border-style: none; text-align: center;}
tr:nth-of-type(even) { background-color: #F5F5DC;}
tr:nth-of-type(odd) { background-color: #DEB887;}


#div1 { position: absolute; margin-left:30px; top: 400px; font-size:0.9em; text-align: center;}
#div1:hover { border: 1px solid #A58366 }

#div2 { position: absolute; margin-left:670px; top: 400px;  font-size:0.9em;text-align: center; }
#div2:hover { border: 1px solid #A58366 }


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
    <h1><center>BAN MIAN STORE</h1>
    <div class="div1">
    <form action="" method="POST">
    <Strong>Order Cart</strong>
    
    <?php 

		if($_POST['originalqty'] > 0) { 
		$originalqty = $_POST['originalqty']; }
		else $originalqty = 0;
		
		if($_POST['porkqty'] > 0) { 
		$porkqty = $_POST['porkqty']; }
		else $porkqty = 0;
		
		if($_POST['prawnqty'] > 0) { 
		$prawnqty = $_POST['prawnqty']; }
		else $prawnqty = 0;
		
		if($_POST['tomyamqty'] > 0) { 
		$tomyamqty = $_POST['tomyamqty']; }
		else $tomyamqty = 0;
		
		$firstname = $_POST['fname'];
		$lastname = $_POST['lname'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];

        $today = date("Y-m-d");

                
        $totalqty = 0;
        $totalqty = $originalqty + $porkqty + $prawnqty + $tomyamqty;
        
        $totalamount = 0.00;
        
        $OriginalTotal = $originalqty * 4.00;
        $PorkTotal = $porkqty * 4.00;
        $PrawnTotal = $prawnqty * 4.00;
        $TomYamTotal = $tomyamqty * 4.00;
        $totalamount = $OriginalTotal + $PorkTotal + $PrawnTotal + $TomYamTotal;
        
        if ($totalqty == 0) {
        	echo "<br><br>You did not order anything on the previous page!<br><br>";
        	echo "<a href='S1.html'><input type='button' value = 'Go Back to Store'></a>";
        } 
        
        else {
        	echo "Items ordered: ".$totalqty."<br><br>";
        	echo "<p>Order Processed at ".date('1. F dS Y, h:i')."</p>";
        	echo "<p>Your Order is as follows: </p>";

        	if ($originalqty > 0) { 
        		echo $originalqty. " qty x Original Taste Ban Mian  S$" .number_format($OriginalTotal,2). "<br>";
        	}
        	
        	if ($porkqty > 0) {
        		echo $porkqty. " qty x Pork Belly Ban Mian  S$" .number_format($PorkTotal,2). "<br>";
        	}
        	
        	if ($prawnqty > 0) {
        		echo $prawnqty. " qty x Fresh Prawn Ban Mian  S$" .number_format($PrawnTotal,2). "<br>";
        	}
        	
        	if ($tomyamqty > 0) {
        		echo $tomyamqty. " qty x Tom Yam Ban Mian  S$" .number_format($TomYamTotal,2). "<br>";
        	}
        	
        	echo "Subtotal: $".number_format($totalamount,2). "<br><br>";
        
        
        
        @ $db = new mysqli('localhost','f31im','f31im','f31im');
        if (mysqli_connect_errno()) {
        	echo "Error: Could not connect to database. Please try again later.";
        	exit;
        }
        
        $sql = "INSERT INTO orders VALUES (NULL, '$today', '$firstname', '$lastname', '$email', '$contact', '$address', '$originalqty', '$OriginalTotal', '$porkqty', '$PorkTotal', '$prawnqty', '$PrawnTotal', '$tomyamqty', '$TomYamTotal', '$totalamount')";
        
		if (mysqli_query($db, $sql)) {
			echo "<a href='orderhistory.html'><input type='button' value = 'Check Order'></a>";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($db);
		}
		
		}
		mysqli_close($db);
		
		?>

        
        	
    </form></div>
    <h3>

      </h3>
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
