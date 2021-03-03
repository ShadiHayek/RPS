<!DOCTYPE html>
<html>
<head>
<title>Shadi Al Hayek</title>

</head>
<style>.container  {
  border: 1px solid black;
  padding: 25px 50px 75px;
  background-color: Tomato;
}
input {

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
<h1>Rock Paper Scissors</h1>
<?php
if ( isset($_REQUEST['name']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['name']);
    echo "</p>\n";
}
?>
<form method="post">
<select name="human">
<option value="-1">Select</option>
<option value="0">Rock</option>
<option value="1">Paper</option>
<option value="2">Scissors</option>
<option value="3">Test</option>
</select>
<input type="submit" value="Play">
<input type="submit" name="logout" value="Logout">
</form>

<pre>
<?php
if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
    die('Name parameter missing');
}
if ( isset($_POST['logout']) ) {
    header('Location: index.php');
    return;
}
$names = array('Rock', 'Paper', 'Scissors');
$human = isset($_POST["human"]) ? $_POST['human']+0 : -1;
$computer = rand(0,2);

function check($computer, $human) {
  
    if ( $human == $computer ) {
        return "neutral";
    } else if ( $human == 1 AND $computer == 0 ){
        return "You Win";
    } else if ( $human == 2 AND $computer == 1 ){
        return "You Win";
    } else if ( $human == 0 AND $computer == 2 ){
    	return "You Win";
    } else if ( $human == 2  and $computer == 0 ) {
        return "You Lose";
    } else if ( $human == 1  and $computer == 2) {
        return "You Lose";
    } else if ( $human == 0  and $computer == 1 ) {
        return "You Lose";
    }
    
    return false;
}

$result = check($computer, $human);

?>
<?php
if ( $human == -1 ) {
    print "Please select a strategy and press Play.\n";
} else if ( $human == 3 ) {
    for($c=0;$c<3;$c++) {
        for($h=0;$h<3;$h++) {
            $r = check($c, $h);
            print "Human=$names[$h] Computer=$names[$c] Result=$r\n";
        }
    }
} else {
    print "Your Play=$names[$human] Computer Play=$names[$computer] Result=$result\n";
}
?>
</pre>
</div>
</body>
</html>