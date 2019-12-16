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
            }
            .dark
            {
                filter: invert(100%);
                background-color: black;
            }
        </style>
    </head>

    <body>

        <nav class="navbar navbar-expand-md" style="background-color: black;">
            <ul class="navbar-nav mr-auto">
                 <li class="nav-item"><a class="nav-link" href="./index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="./trash.html">Topics</a></li>
                <li class="nav-item"><a class="nav-link" href="./Discussion_Forum.php">Message Boards</a></li>
                <li class="nav-item"><a class="nav-link" href="./courses.html">Internships</a></li>
                <li class="nav-item"><a class="nav-link" href="./internships.html">Courses</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item"><button id="darkmodebutton" class="nav-link">Dark Mode</button></li>
                <li class="nav-item"><a href="./lg.html" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="./sg.html" class="nav-link">Register</a></li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="container-fluid" style= "background-color: black; color:white; height: 30px;">
                <p>Field:Discussion Forum</p>
            </div>
        </div>

        <br><br>

        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-10" style= "background-color:orange;">
                        <h2>Field</h2>
                        <button id="newpostbutton" data-toggle="collapse" data-target="#newpost">New Post</button>
                        <div id="newpost" class="collapse">
                            <br>
                            <div class="container-fluid">
                                <form>
                                    <div class="form-group" style="background-color: ghostwhite;">
                                        <label>Title</label>
                                        <input id="posttitle" class="form-control" name="titlename">
                                    </div>
                                    <div class="form-group" style="background-color: ghostwhite;">
                                        <label>Details</label>
                                        <textarea id="postdetails" class="form-control" name="detailsname"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button id="postbutton" type="button">Post</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        MONTHLY POLL<br>Demand:
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                <div class="text-dark">Full Stack - 70%</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:40%">
                                <div class="text-dark">Back End - 40%</div>
                            </div>
                        </div>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:30%">
                                <div class="text-dark">Front End - 30%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div id="postscolumn" class="col-sm-10">
                        <!--POSTS COLUMN-->
                        
                            <?php
                            $sql = "SELECT * FROM posts";
                            $result = mysqli_query($conn,$sql);
                            if (mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                                    echo '<div class="media border p-3" style="background-color: ghostwhite;">';
                                    echo '<div class="media-body">';
                                    echo '<h4 class="media-heading">';
                                    echo $row["title"];
                                    echo "</h4>";
                                    echo "<p>";
                                    echo $row["details"];
                                    echo "</p>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                            }
                            else
                            {
                                echo "NO DATA";
                            }
                            ?>
                        <!--POSTS COLUMN CLOSE-->
                    </div>


                </div>
            </div>
        </div>

        <script>
            //new post <-> cancel
            var temp_text = document.getElementById("newpostbutton");
            temp_text.addEventListener("click",function_newpost_cancel,false);
            function function_newpost_cancel(event)
            {
                if (temp_text.innerHTML == "New Post")
                {
                    temp_text.innerHTML = "Cancel";
                }
                else
                {
                    temp_text.innerHTML = "New Post";
                }
            }
            //

            //POSTING TO SERVER
            $(document).ready(function(){
                $("#postbutton").click(function() {
                    $.get("test_post.php", {
                        titlename: $("#posttitle").val(),
                        detailsname: $("#postdetails").val()
                    }, function(data, status){
                        $("#postscolumn").html(data);
                    });
                });
            });

            //to create new post
            //document.getElementById("postbutton").addEventListener("click", function_new_post,false);
            function function_new_post()
            {
                var new_post = document.createElement("div");
                new_post.className = "media border p-3";
                new_post.style.backgroundColor = "ghostwhite";
                
                var new_post_body = document.createElement("div");
                new_post_body.className = "media-body";

                //content with text
                var new_post_title = document.createElement("h4");
                new_post_title.className = "media-heading";

                var new_post_details = document.createElement("p");
                /*
                new_post_title.innerHTML = document.getElementById("posttitle").value;
                new_post_details.innerHTML = document.getElementById("postdetails").value;
                new_post_body.appendChild(new_post_title);
                new_post_body.appendChild(new_post_details);
                new_post.appendChild(new_post_body);
                document.getElementById("postscolumn").appendChild(new_post);
                */

            }

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











            /*
            //TEST
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("test").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET","trial2.php",true);
            xmlhttp.send();
            

            //ON LOAD DISPLAY ALL POSTS
            
            $(document).ready( function() {
                $("test").load("localhost/trial2.php");
            });
            
            //ON CLICKING POST BUTTON, USE AJAX AND FETCH NEW POST/ALL POSTS AGAN?
            */
        </script>
    </body>
</html>