<?php
    include "test_connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

        <style>
            .normal
            {
                filter: invert(0%);
                background-color: black;
            }
            .dark
            {
                filter: invert(100%);
                background-color: black;
            }

            #ddlTheme{
              background-color: #FF69B4;
              border: 2px #FFC0CB;
              border-radius: 10px;
              margin-left: 10px;
              padding: 2px;
                font-family:'Work Sans',sans-serif;
              font-weight:400;
            }

        </style>


      


    </head>
    <body class="normal">

        <nav class="navbar navbar-expand-md" style="background-color: black;">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./trash.html">Topics</a></li>
                <li class="nav-item"><a class="nav-link" href="./Discussion_Forum.php">Message Boards</a></li>
                <li class="nav-item"><a class="nav-link" href="./courses.html">Internships</a></li>
                <li class="nav-item"><a class="nav-link" href="./internships.html">Courses</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><button id="darkmodebutton" class="nav-link" onclick="clickCounter()">Dark Mode</button></li>
                <li class="nav-item"><a href="./lg.html" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="./sg.html" class="nav-link">Register</a></li>
            </ul>
        </nav>
        <div class="container-fluid" style="background-color: white;" id="background">
            <div class="jumbotron jumbotron-fluid" style="background-color:#55d6aa;">
                     <select id="ddlTheme" onchange="setColorCookie()">
                      <option value="Select Color">Select Color</option>
                      <option value="#7B3F00">Red</option>
                      <option value="#414a4c">Grey</option>
                      <option value="#222">Black</option>
                    </select>
                  <br>
                  <br>
                    <div = "jumbotron" style="background-color: orange">
                    <h1 class="text-center">Consilium</h1><br>
                </div>
                <h1 class="text-center">Look for industry professional interviews...</h1><br>
                <div class="container">
                        <div class="active-cyan-4 mb-4">
                                <input id="searchbox" class="form-control" type="text" placeholder="Search" aria-label="Search">
                        </div>
                </div>
                <div id="suggestions" class="jumbotron jumbotron-fluid text-center" style="background-color:#55d6aa;">
                    <!--SEARCH SUGGESTIONS-->
                </div>
            </div>
             <div class="jumbotron jumbotron-fluid bg-black" style="background-color: black;">
                        <div class="container bg-black">
                            <p class="text-muted"><a href="./about.html">About Us</a></p>
                            <p class="text-muted"><a href="./contact.html">Contact Us</a></p>
                            <p class="text-muted" id="result"></p>
                            <h2 class="text-muted" id="timer"></h2>
                        </div>
                    </div>
        </div>

        <script>
            var darkmode_button = document.getElementById("darkmodebutton");
            darkmode_button.addEventListener("click",function_dark_mode,false);

            function function_dark_mode()
            {
                if (darkmode_button.innerHTML == "Dark Mode")
                {
                    document.body.className = "dark";
                    darkmode_button.innerHTML = "Light Mode";
                }
                else
                {
                    document.body.className = "normal";
                    darkmode_button.innerHTML = "Dark Mode";
                }
            }

            $(document).ready(function(){
                $("#searchbox").on("keyup", function(){
                    $text = $("#searchbox").val();
                    if($text.length)
                    {
                        $.get("test_search.php", {
                            text: $text
                        }, function(data, status) {
                            $("#suggestions").html(data);
                        });
                    }
                    else{
                        $("#suggestions").html("");
                    }
                });
            });


            window.onload=function(){
     //alert(document.cookie.length);
    var m=document.getElementById("background");
    if(document.cookie.length!=0){
      //window.alert(document.cookie);
      var nameValueArray=document.cookie.split("=");
      m.style.backgroundColor = nameValueArray[1];
      document.getElementById("ddlTheme").value=nameValueArray[1];
    }
  }

//response.setHeader("Set-Cookie","HttpOnly;Secure;SameSite=Strict");

function setColorCookie()
{
   
  var selectedColor=document.getElementById("ddlTheme").value;
  var m=document.getElementById("background");
  // window.alert(selectedColor)
  if(selectedColor!="Select Color")
  {
    m.style.backgroundColor = selectedColor;
    // var t='Sat, 23 Nov 2019 08:00:00 GMT';
    document.cookie="colour="+selectedColor+";expires=Fri, 23 Nov 2019 01:00:00 UTC;";
     console.log(document.cookie);
  }

}



var myVar = setInterval(myTimer, 1000);

            function myTimer() {
              var d = new Date();
              var t = d.toLocaleTimeString();
              document.getElementById("timer").innerHTML = t;
            }

function clickCounter() {
          if (typeof(Storage) !== "undefined") {
            if (sessionStorage.clickcount) {
              sessionStorage.clickcount = Number(sessionStorage.clickcount)+1;
            } else {
              sessionStorage.clickcount = 1;
            }
            document.getElementById("result").innerHTML = "You have clicked the Dark Mode button " + sessionStorage.clickcount + " time(s) in this session.";
          } else {
            document.getElementById("result").innerHTML = "Sorry, your browser does not support web storage...";
          }
        }


        </script>
    </body>
</html>
