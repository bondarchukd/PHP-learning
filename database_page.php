<?php

session_start();

if (!isset($_SESSION['login'])) {

    header('Location: login.html');
}

require ('connection.php');

echo "<h1> List of registered users</h1>";  
echo "<a href = 'user.php'><button>Previous page</button></a><br><br>";
echo $_SESSION['login'];

// Attempt select query execution
$sql = "SELECT * FROM users ORDER BY ID";
$result = mysqli_query($connection, $sql);

if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table bgcolor =#C0C0C0>";
            echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>USERNAME</th>";
                echo "<th>EMAIL</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td width = 50px align = center>" . $row['ID'] . "</td>";
                echo "<td width = 70px align = center>" . $row['USERNAME'] . "</td>";
                echo "<td width = 70px align = center>" . $row['EMAIL'] . "</td>";
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