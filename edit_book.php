<!--nach Ändern der Daten: keine Änderung in Datenbank. Ebenfalls: Trying to get property of non-object in C:\xampp\htdocs\i217w_boox\edit_user.php on line 55" Wie kann ich das vemreiden bzw. Seite wieder zum Index zurückschicken?-->

<?php
require('config.php');

$status = "";

if(isset($_POST['title']) && $_POST['author'] && $_POST['ISBN'] && $_POST['price']  ){
  $title = $_POST['title'];
  $author = $_POST['author'];
  $ISBN = $_POST['ISBN'];
  $price = $_POST['price'];

  if (isset($_GET['editBook'])){
  $bookID = $_GET['editBook'];
  $stmt = "UPDATE `books` SET `title` = '" . $title . "', `author` = '" . $author . "', `ISBN` = '" . $ISBN ."' WHERE `books`.`id` = ". $bookID;
  $result = $link->query($stmt);

  $status = ">> Book edited";
  }
}
else {
  $status = ">> Nothing edited yet";
}
/* !!! funktioniert nicht. Überprüfung in Zeile 7, jedoch ohne Ausgabe, welches Feld leer ist bzw was das Pronlem war. !!!
if(empty($author)) {
echo 'Author must not be empty';
        die;
}
if(empty($title)) {
echo 'Title must not be empty';
        die;
}
if(empty($ISBN)) {
echo 'ISBN must not be empty';
        die;
}
if(empty($price)) {
echo 'Price must not be empty';
        die;
}
*/
if (isset($_GET['editBook'])){
	$bookID = $_GET['editBook'];

	$stmt = "SELECT * FROM `user` WHERE `id` = ".$bookID;
	$result = $link->query($stmt);

	$id = "";
	$title = "";
	$author = "";
	$ISBN = "";
  $price = "";

	if ($result->num_rows > 0){
		while ($row = mysqli_fetch_row($result)){
			$id = $row[0];
			$title = $row[1];
			$author = $row[2];
			$ISBN = $row[3];
      $price = $row[4];
		}
	}
}
else {
	die("NO ID PROVIDED");
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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?editBook=<?php $bookID?>">
            <h1>Edit Book</h1>
			<h2><?php echo $status ?></h2>
            <div class="form-group">
              <input type="text" placeholder="Title" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Author"class="form-control" id="author" name="author">
            </div>
            <div class="form-group">
              <input type="text" placeholder="ISBN" class="form-control" id="ISBN" name="ISBN">
            </div>
            <div class="form-group">
              <input type="text" placeholder="Price" class="form-control" id="price" name="price">
            </div>
            <button type="submit" class="btn btn-default" name="btn-save">Edit Book</button>

          </form>

          </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
