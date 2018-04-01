<?php

ini_set("display_errors", 1);
ini_set("log_errors",1);
ini_set("error_log", "/tmp/error.log");
error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT);
error_log("Hello, errors!");

include ( 'accounts.php' );

($dbh = mysqli_connect ($hostname, $username, $password, $project)) or die ("Unable to connect to MySql db");

?>

  <table>
    <tr>
        <td>UserName</td>
        <td>storename</td>
        <td>address</td>
        <td>city</td>
        <td>zipcode</td>
    </tr>

<?php while $row = mysqli_query($con, "SELECT * FROM itinerary") {
  ?>

    <tr>
      <td><?php echo $row[UserName]; ?></td>
      <td><?php echo $row[storename]; ?></td>
      <td><?php echo $row[address]; ?></td>
      <td><?php echo $row[zipcode]; ?></td>
      <td><?php echo $row[zipcode]; ?></td>
    </tr>
  <?php>
        }

        ?>
    </table>
