
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
$nameErr = $startErr = $cityErr = $serviceErr = $sectorErr = $roleErr = $clientErr = $projectErr = $sideErr = $skillErr = "";
$name = $start = $city = $service = $sector = $role = $client = $project = $side = $skill = "";
$allErr = 0;
$sql = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
    $allErr += 1;  
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["start"])) {
    $startErr = "Start date is required";
    $allErr += 1;  
  } else {
    $start = test_input($_POST["start"]);
  }
  
  if (empty($_POST["city"])) {
    $cityErr = "City is required";
    $allErr += 1;  
  } else {
    $city = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$office)) {
      $cityErr = "Only letters and white space allowed";
    }
  }
  
    if (empty($_POST["service"])) {
    $serviceErr = "Service line is required";
    $allErr += 1;  
  } else {
    $service = test_input($_POST["service"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $serviceErr = "Only letters and white space allowed";
    }
  }
  
    
    if (empty($_POST["sector"])) {
    $sectorErr = "Service line is required";
    $allErr += 1;  
  } else {
    $sector = test_input($_POST["sector"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $sectorErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["role"])) {
    $roleErr = "Current role is required";
    $allErr += 1;  
  } else {
    $role = test_input($_POST["role"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$sector)) {
      $sectorErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["client"])) {
    $clientErr = "Current client is required";
    $allErr += 1;  
  } else {
    $client = test_input($_POST["client"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $clientErr = "Only letters and white space allowed";
    }
  }
  
  if (empty($_POST["project"])) {
    $projectErr = "Project is required";
    $allErr += 1;  
  } else {
    $project = test_input($_POST["project"]);
  }

  if (empty($_POST["side"])) {
    $sideErr = "Side work is required";
    $allErr += 1;  
  } else {
    $side = test_input($_POST["side"]);
  }

  if (empty($_POST["skill"])) {
    $skillErr = "Skills are required";
    $allErr += 1;  
  } else {
    $skill = test_input($_POST["skill"]);
  }  
  
if ($allErr == 0) { //if new message is being added
   $sql = "INSERT INTO MESSAGES_TABLE VALUES ('" . $name . "', '" . $start . "', '" . $city . "', '" . $service . "', '" . $sector . "', '" . $role . "', '" . $client . "', '" . $project . "', '" . $side .  "', '" . $skill . "');";
   echo "<script type='text/javascript'>alert('$sql');</script>";
   if ($mysqli->query($sql)) {
       //echo "Insert success!";
   } else {
       echo "Cannot insert data.  If you have previously submitted this information, please follow the link to the next page. "  . mysqli_error();
   }     
}

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>CBD Survey</h2>
	<br>
            <input type="button" class = "mybutton" onclick="window.location = 'datatable.php';" class="btn" value="Continue Without Submitting "></input>
        </br>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  Start Date (YYYY-MM-DD): <input type="text" name="start" value="<?php echo $start;?>">
  <span class="error">* <?php echo $startErr;?></span>
  <br><br>
  City: <input type="text" name="city" value="<?php echo $city;?>">
  <span class="error">* <?php echo $cityErr;?></span>
  <br><br>
  Service Line: <input type="text" name="service" value="<?php echo $service;?>">
  <span class="error">* <?php echo $serviceErr;?></span>
  <br><br>
  Sector: <input type="text" name="sector" value="<?php echo $sector;?>">
  <span class="error">* <?php echo $sectorErr;?></span>
  <br><br>
  Current Role: <input type="text" name="role" value="<?php echo $role;?>">
  <span class="error">* <?php echo $roleErr;?></span>
  <br><br>
  Current Client: <input type="text" name="client" value="<?php echo $client;?>">
  <span class="error">* <?php echo $clientErr;?></span>
  <br><br>  
  Project Description: <textarea name="project" rows="5" cols="40"><?php echo $project;?></textarea>  <span class="error">* <?php echo $projectErr;?></span>
  <br><br>
  Side Work: <textarea name="side" rows="3" cols="40"><?php echo $side;?></textarea>  <span class="error">* <?php echo $sideErr;?></span>
  <br><br>
  Skills: <input type="text" name="skill" value="<?php echo $skill;?>">
  <span class="error">* <?php echo $skillErr;?></span>
  <br><br>
  <input type="submit" onclick="window.location = 'datatable.php';" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $start;
echo "<br>";
echo $city;
echo "<br>";
echo $service;
echo "<br>";
echo $role;
echo "<br>";
echo $client;
echo "<br>";
echo $sector;
echo "<br>";
echo $project;
echo "<br>";
echo $side;
echo "<br>";
echo $skill;
echo "<br>";
echo $sql;
?>

</body>
</html>