
<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php include 'db.php';?>

<?php
// define variables and set to empty values
$nameErr = $officeErr = $sectorErr = $projectErr = "";
$name = $office = $sector = $project = "";
$all = "";

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
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$office)) {
      $officeErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["sector"])) {
    $sectorErr = "Sector is required";
  } else {
    $sector = test_input($_POST["sector"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$sector)) {
      $sectorErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["project"])) {
    $projectErr = "Project is required";
  } else {
    $project = test_input($_POST["project"]);
  }
}

if ($nameErr == $officeErr == $sectorErr == $projectErr = "") { //if new message is being added
   $all = 1;
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
  <span class="error">* <?php echo $sectorErr;?></span>
  <br><br>
  Comment: <textarea name="project" rows="5" cols="40"><?php echo $project;?></textarea>  <span class="error">* <?php echo $projectErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $office;
echo "<br>";
echo $sector;
echo "<br>";
echo $project;
echo "<br>";
echo $all;
?>

</body>
</html>