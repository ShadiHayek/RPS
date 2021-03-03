<!DOCTYPE html>
<html>
<head>
<title>'317ef936'</title>
</head>
<style>.container  {
  border: 1px solid black;
  padding: 25px 50px 75px;
  background-color: Tomato;
}

#log {

    background-color: white;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}
#cancel {
    background-color: white;
  color: black;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
    
}
</style>
<body>
<div class="container">
<h1>Please Log In</h1>
<?php

if ( $failure !== false ) {
    echo('<p style="background-color: red;">'.htmlentities($failure)."</p>\n");
}
?>
<form method="POST">
<label for="nam">User Name</label>
<input type="text" name="qui" ><br/>
<label >Password</label>
<input type="text" name="pass" ><br/>
<input type="submit" value="Log In" id="log">
<input type="submit" name="cancel" value="Cancel" id="cancel">
</form>
<p>
For a password hint, view source and find a password hint
in the HTML comments.
<!-- Hint: The password is the 5  character a separate seat for one person
 (all lower case) followed by 76. -->
</p>
</div>
<?php 

if ( isset($_POST['cancel'] ) ) {
 
    header("Location: index.php");
    return;
}

$salt = '';
$stored_hash = '9576fbd24b9e10bf41b9801dbbfc3c07d475f9bf95de6a8b8f6cbc214a24dd50';  // Pw is chair76

$failure = false; 


if ( isset($_POST['qui']) && isset($_POST['pass']) ) {
    if ( strlen($_POST['qui']) < 1 || strlen($_POST['pass']) < 1 ) {
        $failure = "User name and password are required";
    } else {
        $check = hash('sha256', $salt.$_POST['pass']);
        if ( $check == $stored_hash ) {
            
            header("Location: game.php?name=".urlencode($_POST['qui']));
            return;
        } else {
            $failure = "Incorrect password";
        }
    }
}


?>
</body>
</html>