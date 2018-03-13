<?php
require_once('database.php');
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel = "stylesheet" type = "text/css" href = "CSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php
if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {

    header('Location: enter.php');
}

echo "<h1> List of registered users</h1>";

// DROP DOWN menu
require('dropdown.html');
?>

<br>

<?php
echo "<a href = 'index.php?status=2'><button>Previous page</button></a><br><br>";
echo "You are logined as" .$_SESSION['username']."";

// // Attempt select query execution
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
 
// // Close connection - Should be it?
// mysqli_close($connection);

echo "<br>";
echo "<a href='logout.php'>Logout</a>";		
?>

</body>
</html>