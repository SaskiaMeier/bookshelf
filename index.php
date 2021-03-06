<?php
  header('Content-Type: text/html; charset=utf-8');
  require('config.php');

if(isset($_GET['deleteID'])) {
  $deleteID = $_GET['deleteID'];
  $sql = "DELETE FROM `user` WHERE `user`.`id` = ". $deleteID;
  echo $sql;
  mysqli_query($link, $sql);
}
if(isset($_GET['deleteBook'])) {
  $deleteBook = $_GET['deleteBook'];
  $sql2 = "DELETE FROM `books` WHERE `books`.`id` = ". $deleteBook;
  echo $sql2;
  mysqli_query($link, $sql2);
}

?>
<!doctype html>
<html lang="de">

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  </head>

  <body>

  <h1>Users</h1>
	<table class="table-striped table">
		<th>Name</th>
		<th>E-Mail</th>
    <th>Edit</th>
    <th>Delete</th>

		<?php
			$stmt = "SELECT * FROM `user`";
			$result = $link->query($stmt);

			if ($result->num_rows > 0){
				while ($row = mysqli_fetch_row($result)){
					echo "<tr>\n";
					echo "<td>" . $row[1] . "</td>\n";
					echo "<td>" . $row[3] . "</td>\n";
          echo "<td> <a href='edit_user.php?editID=". $row[0] ."'>Edit User</a> </td>\n";
          echo "<td> <a href='index.php?deleteID=". $row[0] ."'>Delete User</a> </td>\n";
					echo "</tr>";
				}
			}
      else {
          echo "<tr><td colspan='4'>No data found</td></tr>";
      }
		?>
	</table>

  <h1>Books</h1>
	<table class="table-striped table">
		<th>Title</th>
		<th>Author</th>
    <th>ISBN</th>
    <th>Price</th>
    <th>Edit</th>
    <th>Delete</th>

		<?php
			$stmt2 = "SELECT * FROM `books`";
			$result2 = $link->query($stmt2);

			if ($result2->num_rows > 0){
				while ($row = mysqli_fetch_row($result2)){
					echo "<tr>\n";
          echo "<td>" . $row[1] . "</td>\n";
					echo "<td>" . $row[2] . "</td>\n";
          echo "<td>" . $row[3] . "</td>\n";
					echo "<td>" . $row[4] . "</td>\n";
          echo "<td> <a href='edit_book.php?editBook=". $row[0] ."'>Edit Book</a></td>\n";
          echo "<td> <a href='index.php?deleteBook=". $row[0] ."'>Delete Book</a></td>\n";
					echo "</tr>";
				}
			}
      else {
          echo "<tr><td colspan='6'>No data found</td></tr>";
      }
		?>
	</table>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

  </body>

</html>
