<?php
require 'session.php';

echo "<h1> List of registered users</h1><br>";
echo "<a href = 'user.php'><button>Backward</button></a><br><br>";
?>

<!-- Click the button should change diretion of sort -->
<!-- https://stackoverflow.com/questions/20738329/how-to-call-a-php-function-on-the-click-of-a-button -->
<!-- https://www.dougv.com/2009/06/sorting-your-mysql-results-set-in-php-using-jquery-and-a-more-traditional-approach/ -->
<html>
<script type="text/javascript">
    // client side of AJAX
    function sort(){

    }
</script>
<button onclick="sort()">Sort</button><br><br>
</html>

<?php
// Example from tutorial
$connection = mysqli_connect("mysql.j820528.myjino.ru", "j820528", "dbondarchuk1",  "j820528_test");
 
// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

// Server side of AJAX
if ($_GET) {
    if(isset($_GET['sort'])) {
        function sort() { $dir = "DESC";
    }
}

// instead ASC should be inserted $dir
$sql = "SELECT * FROM users ORDER BY ID ASC";
$result = mysqli_query($connection, $sql);

if($result = mysqli_query($connection, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table bgcolor = #C0C0C0>";
        ?>
        <html>
        <style>
        table {
            border-spacing: 0;
            width: 20%;
            border: 1px solid #ddd;
        }
        th {
            cursor: pointer;
        }
        th, td {
            text-align: left;
            padding: 16px;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
        </html>
        <?php   echo "<tr>";
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