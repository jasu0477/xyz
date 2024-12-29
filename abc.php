<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aa";

// Create a connection
$link = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($link) {
    echo "Connection successful";
} else {
    die("Error: " . mysqli_connect_error());
}
?>


<html>
    <head>
        <title>DBMS</title>
    </head>
    <body>
        <form name="form1" action="" method="post">
            <table>
                <tr>
                    <td>Name</td>
                    <td><input type="text" name="name" ></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td><input type="text" name="city" ></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" ></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <button type="submit" name="s1" value="insert">Insert</button>
                        <button type="submit" name="s2" value="delete">Delete</button>
                        <button type="submit" name="s3" value="update">Update</button>
                        <button type="submit" name="s4" value="display">Display</button>
                        <button type="submit" name="s5" value="search">Search</button>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>


<?php
    if(isset($_POST["s1"]))
    {
        mysqli_query($link, "insert into aat values('$_POST[name]','$_POST[city]','$_POST[email]')");
        echo("Added");
    }

    if(isset($_POST["s2"]))
    {
        mysqli_query($link, "delete from aat where name='$_POST[name]' ");
        echo("Deleted");
    }

    if(isset($_POST["s3"]))
    {
        mysqli_query($link, "update aat set city='$_POST[city]' , `email`='$_POST[email]' where name='$_POST[name]'");
        echo("Updated");
    }

    if (isset($_POST["s4"])) {
        $res = mysqli_query($link, "SELECT * FROM aat");
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>Name</th><th>City</th><th>Email</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($res)) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }

    if (isset($_POST["s5"])) {
        $res = mysqli_query($link, "SELECT * FROM aat WHERE name='$_POST[name]'");
        
        // Check if there are results
        if (mysqli_num_rows($res) > 0) {
            echo "<table border=1>";
            echo "<tr>";
            echo "<th>Name</th><th>City</th><th>Email</th>";
            echo "</tr>";
            
            while ($row = mysqli_fetch_array($res)) {
                echo "<tr>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["city"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "No records found for the name '" . $_POST['name'] . "'.";
        }
    }
    
?>


