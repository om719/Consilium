<?php
    include "test_connect.php";

    $text = $_GET['text'];
    $sql = "SELECT * FROM posts WHERE title LIKE '%$text%'";
    $result = mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            echo '<div class="container-fluid">';
            echo '<div class="container-fluid">';
            echo '<div class="media border p-3" style="background-color: ghostwhite;">';
            echo '<div class="media-body">';
            echo '<h4 class="media-heading">';
            echo '<a href="test.php">';
            echo $row["title"];
            echo '</a>';
            echo "</h4>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }
    else
    {
        echo '<div class="container-fluid">';
        echo '<div class="container-fluid">';
        echo '<div class="media border p-3" style="background-color: ghostwhite;">';
        echo '<div class="media-body">';
        echo '<h4 class="media-heading">';
        echo "NO DATA";
        echo "</h4>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }    
?>