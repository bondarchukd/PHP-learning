<?php
// https://stackoverflow.com/questions/27085580/sort-mysql-tables-using-php
// https://stackoverflow.com/questions/3489783/how-to-sort-rows-of-html-table-that-are-called-from-mysql
// https://www.phpjabbers.com/php--mysql-select-data-and-split-on-pages-php25.html
// https://owlcation.com/stem/Simple-search-PHP-MySQL - SEARCH 
require_once('database.php');
require_once('check_enter.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel = "stylesheet" type = "text/css" href = "CSS.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
        
        function deleteS(id) {
            $.get("http://localhost:8888/PHP-learning/delete.php?id="+id, function(data,status){
                location.reload()
            })
        }
    </script>
</head>
<body>

<?php

if (!isset($_SESSION['email']) && !isset($_SESSION['password'])) {

    header('Location: login.php');
}

echo "<h1> List of users</h1>";

// DROP DOWN menu
require('dropdown.html');
echo "<br>";
echo "<a href = 'index.php?status=2'><button>Previous page</button></a><br><br>";
?>

<!-- SEARCH FORM -->
<div>
<form action="search.php" method="GET">
        <input type="text" name="query" />
        <input type="submit" value="Search" />
    </form>
</div>
<br>

<?php
// PAGES
if (isset($_GET["page"])) { 
    $page  = $_GET["page"]; 
} else { 
    $page = 1; 
}
$results_per_page = 10; // number of rows per
$start_from = ($page-1) * $results_per_page;

$sql = "SELECT * FROM users ORDER BY ID ASC LIMIT $start_from, ".$results_per_page;
if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
echo "<table bgcolor =#C0C0C0>";
            echo "<tr>";
                echo "<th><a href='table.php?sort=id'>ID</th>";
                echo "<th><a href='table.php?sort=username'>USERNAME</th>";
                echo "<th><a href='table.php?sort=email'>EMAIL</th>";
                echo "<th>Action</th>";
            echo "</tr>";
while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td width = 50px align = center>" . $row['ID'] . "</td>";
                echo "<td width = 70px align = center>" . $row['USERNAME'] . "</td>";
                echo "<td width = 70px align = center>" . $row['EMAIL'] . "</td>";
                echo "<td width = 70px align = center><button onclick='deleteS(".$row['ID'].")'>Delete</button></td>";
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
            echo "<a href='table.php?page=".$i."'";
            if ($i==$page)  echo " class='curPage'";
            echo ">".$i."</a> "; 
}; 

echo "<br><br>";		
echo "<a href='logout.php'>Logout</a>";
echo "<br><br>";     
?>



</body>
<footer>
    <?php include "footer.php" ?>
</footer>
</html>