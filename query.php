<!DOCTYPE HTML>
<html>
<body>

<?php
    $user_query = "";
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        $user_query = trim($_GET["user_query"]);
    }
    //connect to database
    $db = new mysqli('localhost', 'cs143', '', 'CS143');
    if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
    }
    //get query result
    $result = $db->query($user_query);
?>
    
<h1>Movie Database</h1>

Type an SQL query in the following box: <br><br>
Example:<tt> SELECT * FROM Actor WHERE id=10;</tt> <br><br>
    
<form action="query.php" method="get">
<textarea name="user_query" rows="8" cols="60"><?php echo $user_query;?></textarea> <br>
<input type="submit">
</form>    

<h2>Result: </h2>
   <?php
    $field_nums = mysqli_num_fields($result);
    // modified from anyexample.com
    echo "<table border='1'><tr>";
    // printing table headers
    for($i=0; $i<$field_nums; $i++)
    {
        $field = $result->fetch_field();
        echo "<th>$field->name</th>";
    }
    echo "</tr>\n";
    // printing table rows
    while($row = mysqli_fetch_row($result))
    {
        echo "<tr>";
        // $row is array... foreach( .. ) puts every element
        // of $row to $cell variable
        foreach($row as $cell)
            echo "<td>$cell</td>";
    echo "</tr>\n";
    }
    $result->free();
    ?>
    
</body>
</html>
