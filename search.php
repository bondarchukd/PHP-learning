<?php
   require_once('database.php');
   require_once('check_enter.php');

?>

<!DOCTYPE html>
<head>

</head>
<body>
<?php
    $query = $_GET['query']; 
    // gets value sent over search form
     
    $min_length = 3;
    // you can set minimum length of the query if you want
     
    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
         
        $raw_results = mysqli_query($connection, "SELECT * FROM users
            WHERE (`email` LIKE '%".$query."%') OR (`username` LIKE '%".$query."%')") or die(mysqli_error());
     
        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following
             

            echo "<a href = 'table.php'><button>Back</button></a><br><br>";
            echo "<p><h2>Result</h2></p>";
            
            echo "<table>";
                echo "<tr>";
                    echo "<th>EMAIL</th>";
                    echo "<th>USERNAME</th>";
                echo "</tr";

            while($result = mysqli_fetch_array($raw_results)){
               
                echo "<tr>";
                    echo "<td width = 50px align = center>".$result['EMAIL']."</td>";
                    echo "<td width = 50px align = center>".$result['USERNAME']."</td>";
                echo "</tr>";
            echo "</table>";        

        }
    }
        else{ // if there is no matching rows do following
            echo "No results";
        }
         
    }

    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }

?>
</body>
</html>