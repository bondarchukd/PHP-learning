<?php
require 'session.php';

echo "<h1> Database structure below</h1>";

// Example from tutorial
$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM users";
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>USERNAME</th>";
                echo "<th>EMAIL</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['USERNAME'] . "</td>";
                echo "<td>" . $row['EMAIL'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
}
 
// Close connection - Should be it?
mysqli_close($connection);

echo "<a href='logout.php'>Logout</a>";		
?>