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
    <form action="editresult.php" method = "post" id="editform">
    <?php 
    $orderid = $_POST['id'];
    echo 'Your Order #: '.$orderid;
    echo '<br><br>';
    echo '<p><br>Please fill in the personal detail you would like to edit:</p><br>';
    echo 'First Name: <input type="text" name="firstname" id="firstname" ><br>';
    echo 'Last Name: <input type="text" name="lastname" id="lastname"><br>';
    echo 'Contact No: <input type="text" name="contact" id="contact"><br>';
    echo 'Email: <input type="email" name="email" id="email"><br>';
    echo 'Address: <input type="text" name="address" id="address"><br>';
    echo '<input type="hidden" name="id" value="'.$orderid.'"/><input type="submit" name="submit" value = "Change Details" onClick="ValidateForm();">';
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