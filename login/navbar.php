
<!DOCTYPE html>
<html>
<head>
	<title>Navbar</title>
	<link href="https://fonts.googleapis.com/css?family=Work+Sans&display=swap" rel="stylesheet">
	<link href="style.css" rel="stylesheet" type="text/css">

</head>
<body style="background-color: #222;">
	<header>
	<div class="container">
		<!-- <img src="" alt="logo" class="logo"> -->

		<nav>
			<ul>
				<li><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\navbar.html">Home</a></li>
        <li><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\trash.html">Topics</a></li>
        <li><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\Discussion_Forum.html">Message Boards</a></li>
        <li><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\courses.html">Internships</a></li>
        <li><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\internships.html">Courses</a></li>
        <li><a href="a">                                                                                                                                     </a></li>
        <li class="now"><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\lg.html">Login</a></li>
        <li ><a href="C:\Users\Om Shreenidhi\Documents\web tech project\real stuff\sg.html">Signup</a></li>
			</ul>
		</nav>
	</div>
</header>

<h1 onmouseover="hoverPlayerName(this);">Consilium</h1>

<div class="wrap">
   <div class="search">
      <input type="text" class="searchTerm" placeholder="Search for specialization or name">
      <button type="submit" class="searchButton">
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<!-- <div id="ab"> -->
	<div style="background: black;">
	<div class="popup" style="float: left;background-image:linear-gradient(#F1F0F0,#222);margin-left: 200px;padding: 50px 75px 50px 75px;" onclick="myFunction()">
    <h1 style="font-size: 50px;text-align: center;">About Us</h1>
     </div>

  <div class="popup" id="contactus"style="float:right;background-image:linear-gradient(#F1F0F0,#222); margin-right: 200px;padding: 50px 75px 50px 75px;" onclick="myFunc()">
    <h1 style="font-size: 50px;text-align: center;">Contact Us</h1>
    <p class="popuptext" id="myPop">Om 82374209823 <br> Saurav 238923842 <br> Kalp 2834784238</p>

  
</div>
</div>
<!-- </div> -->
<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  alert("Creating a website for interviews of experts. An interactive website that offers a look into the lives and inspirations of these people that other users can learn from and imbibe in their own lives. Could be very useful for aspiring students who are seeking guidance in various fields.")
}

function myFunc()
{
	 var popup = document.getElementById("myPop");
  alert("Om 82374209823 \n Saurav 238923842 \n Kalp 2834784238")
}
</script>





</body>
</html>


