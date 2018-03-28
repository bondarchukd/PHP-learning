<?php
// https://stackoverflow.com/questions/27085580/sort-mysql-tables-using-php
// https://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql

require_once('database.php');
require_once('check_enter.php');

echo "<h1> List of registered users</h1>";

if (isset($_GET["page"])) { 
    $page  = $_GET["page"]; 
} else { 
    $page = 1; 
}
$results_per_page = 5;
$start_from = ($page-1) * $results_per_page;

$sql = "SELECT * FROM users ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
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

// separate to pages
$sql = "SELECT COUNT(ID) AS total FROM users";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_array($result);
$total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results

for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
            echo "<a href='sort_php.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 

echo "<br><br><a href='logout.php'>Logout</a>";		
?>