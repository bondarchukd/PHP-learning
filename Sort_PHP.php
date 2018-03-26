<?php
// https://stackoverflow.com/questions/27085580/sort-mysql-tables-using-php
// https://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql

require_once('database.php');
require_once('check_enter.php');
// $sort = $_GET['sort'];
$desc = "DESC";
echo "<h1> List of registered users</h1>";

$sql = "SELECT * FROM users ORDER BY ID " .$desc."";
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
echo "<table bgcolor =#C0C0C0>";
            echo "<tr>";
                echo "<th><a href='db_sorted_php?sort=id'>ID</th>";
                echo "<th><a href='db_sorted_php?sort=username'>USERNAME</th>";
                echo "<th><a href='db_sorted_php?sort=email'>EMAIL</th>";
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


// Attempt select query execution
// $sql = "SELECT * FROM users";
// $result = mysqli_query($connection, $sql);

// if($result = mysqli_query($connection, $sql)){
//     if(mysqli_num_rows($result) > 0){
//         echo "<table bgcolor =#C0C0C0>";
//             echo "<tr>";
//                 echo "<th>ID</th>";
//                 echo "<th>USERNAME</th>";
//                 echo "<th>EMAIL</th>";
//             echo "</tr>";
//         while($row = mysqli_fetch_array($result)){
//             echo "<tr>";
//                 echo "<td width = 50px align = center>" . $row['ID'] . "</td>";
//                 echo "<td width = 70px align = center>" . $row['USERNAME'] . "</td>";
//                 echo "<td width = 70px align = center>" . $row['EMAIL'] . "</td>";
//             echo "</tr>";
//         }
//         echo "</table>";
//         // Free result set
//         mysqli_free_result($result);
//     } else{
//         echo "No records matching your query were found.";
//     }
// } else{
//     echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
// }
 
// Close connection - Should be it?
mysqli_close($connection);
echo "<a href='logout.php'>Logout</a>";		
?>