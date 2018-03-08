<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUEats</title>
<meta charset="utf-8">
<meta name="keywords" content="Home, NTUEats">

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

h2 { text-align: right; font-size:70%;}
h1 {font-family: Verdana, sans-serif; font-weight: bold; font-size: 1.5em; color: #000000; 
}



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

#div1 { position: absolute; margin-left: 340px; top: 400px; font-size:0.9em; text-align: center;}
#div1:hover { border: 1px solid #777 }

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
    <h1><center>Search Result</center></h1>
    <center> 
   
    <?php
    $search = $_POST['mySearch'];
    
    //S1
    $S1 = file_get_contents("S1.html");
    if (strpos($S1, $search) !== false) {
    	echo '<a href="S1.html">Canteen 1 - Ban Mian Store<br><img src="Banmian.png" width="400" height="200" alt="Header"></a>';
    }
    else { 
    	echo 'No result found.';
    }
    
    ?>
    
    </center></div>
<footer><br>
<i>
Copyright &copy; 2017 NTUEats<br>
<a href="mailto:contact@ntueats.com">contact@ntueats.com</a>
</i>
</footer>

</div>
</body>
</html>
