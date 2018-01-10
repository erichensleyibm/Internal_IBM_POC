
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $websiteErr = "";
$name = $email = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["office"])) {
    $officeErr = "Office is required";
  } else {
    $office = test_input($_POST["office"]);
    // check if e-mail address is well-formed
    if (!filter_var($office, FILTER_VALIDATE_EMAIL)) {
      $officeErr = "Invalid office format";
    }
  }
    
  if (empty($_POST["sector"])) {
    $sector = "";
  } else {
    $sector = test_input($_POST["sector"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$sector)) {
      $sectorErr = "Invalid Sector";
    }
  }

  if (empty($_POST["project"])) {
    $project = "";
  } else {
    $project = test_input($_POST["project"]);
  }

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Office: <input type="text" name="office" value="<?php echo $office;?>">
  <span class="error">* <?php echo $officeErr;?></span>
  <br><br>
  Sector: <input type="text" name="sector" value="<?php echo $sector;?>">
  <span class="error"><?php echo $sectorErr;?></span>
  <br><br>
  Project: <textarea name="project" rows="5" cols="40"><?php echo $project;?></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $office;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
?>

</body>
</html>
