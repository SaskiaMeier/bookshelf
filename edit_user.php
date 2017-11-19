<!--Problem verbleibend: nach dem Absenden der neuen Daten: Es steht da "User edited", aber in der Datenbank keine Änderung; "Notice: Trying to get property of non-object in C:\xampp\htdocs\i217w_boox\edit_user.php on line 48"-->
<?php

require('config.php');

$status = "";

if(isset($_POST['username']) && $_POST['password'] && $_POST['email']){
  $name = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];

  if (isset($_GET['editID'])){
  $userID = $_GET['editID'];
  $stmt = "UPDATE `user` SET `username` = '" . $name . "', `password` = '" . $password . "', `email` = '" . $email ."' WHERE `user`.`id` = ". $userID;
  $result = $link->query($stmt);

  $status = ">> User edited";
  }
}
else {
  $status = ">> Nothing edited yet";
}
/*
if(empty($name)) {
echo 'Username must not be empty';
        die;
}
if(empty($password)) {
echo 'Password must not be empty';
        die;
}
if(empty($email)) {
echo 'E-Mail must not be empty';
        die;
} */
if (isset($_GET['editID'])){
	$userID = $_GET['editID'];

	$stmt = "SELECT * FROM `user` WHERE `id` = ".$userID;
	$result = $link->query($stmt);

	$id = "";
	$username = "";
	$password = "";
	$email = "";

	if ($result->num_rows > 0){
		while ($row = mysqli_fetch_row($result)){
			$id = $row[0];
			$username = $row[1];
			$password = $row[2];
			$email = $row[3];
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
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?editID=<?php $userID?>">
            <h1>Edit User</h1>
			<h2><?php echo $status ?></h2>
            <div class="form-group">
              <input type="text" placeholder="Username" class="form-control" id="username" name="username">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control" id="password" name="password">
            </div>
            <div class="form-group">
              <input type="text" placeholder="E-mail" class="form-control" id="email" name="email">
            </div>
            <button type="submit" class="btn btn-default" name="btn-save">Edit User</button>

          </form>

          </div>
        </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
