<?php
    include "test_connect.php";

    $title = $_GET['titlename'];
    $details = $_GET['detailsname'];

    
    $sql = "INSERT INTO posts(title, details) VALUES ('$title','$details')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

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
    
    /*
    echo '<div class="media border p-3" style="background-color: ghostwhite;">';
    echo '<div class="media-body">';
    echo '<h4 class="media-heading">';
    echo $title;
    echo "</h4>";
    echo "<p>";
    echo $details;
    echo "</p>";
    echo "</div>";
    echo "</div>";
    */
?>