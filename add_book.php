
<?php
require('config.php');

$status = "";

if(isset($_POST['title']) && $_POST['author'] && $_POST['ISBN'] && $_POST['price']  ){
  $title = $_POST['title'];
  $author = $_POST['author'];
  $ISBN = $_POST['ISBN'];
  $price = $_POST['price'];

  $stmt = "INSERT INTO `books` (`title`, `author`, `ISBN`, `price`) VALUES ('" . $title . "', '" . $author . "', '" . $ISBN ."', '". $price ."');";
  $result = $link->query($stmt);

  $status = ">> Book added";

}
else {
  $status = ">> noch nichts gesendet";
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

    <!--

    Funktionen nicht nötig! Gelöst mit Placeholdern.

    <script>
	  function replaceTitle(){
		document.getElementById('title').value = "";
    }
    function replaceAuthor(){
		document.getElementById('author').value = "";
    }
    function replaceISBN(){
		document.getElementById('ISBN').value = "";
    }
    function replacePrice(){
		document.getElementById('price').value = "";
	  }
    </script>
    -->
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h1>Add Book</h1>
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
            <button type="submit" class="btn btn-default" name="btn-save">Add Book</button>

          </form>

          </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
