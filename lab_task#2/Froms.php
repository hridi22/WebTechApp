<!DOCTYPE html>
<html>
<head>
	<title>From</title>
</head>
<body>

	<?php

	$nameerr = $emailerr = $gendererr = $doberr = $degreeerr = $blood_grouperr ="";
	$name = $email = $gender = $dob = $degree = $blood_group = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") 
	{
	  if (empty($_POST["name"])) 
	  {
	    $nameerr = "Name is required";
	  } 
	  else 
	  {
	    $name = test_input($_POST["name"]);
	  
	    if (!preg_match("/^[a-zA-Z-' ]*$/",$name) ) 
	    {
	      $nameerr = "Period and dash allowed";
	    }
	    elseif(str_word_count($name)<2)
	    {
	    	 $nameerr = "Contains at least two words";
	    }
	  }

	  if (empty($_POST["email"])) 
	  {
	    $emailerr = "Email is required";
	  } 
	  else 
	  {
	    $email = test_input($_POST["email"]);
	   
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
	     {
	      $emailErr = "Invalid email";
	     }
	  }

	  if (empty($_POST["dob"])) 
		  {
		    $doberr = "Date Of Birth is required";
		  } 
		  else 
		  {
		    $dob = test_input($_POST["dob"]);
		  }

	  if (empty($_POST["gender"])) 
	  {
	    $gendererr = "Gender is required";
	  } 
	  else 
	  {
	    $gender = test_input($_POST["gender"]);
	  }
	

	    if (empty($_POST["degree"]) ) 
		  {
		    $degreeerr = "Degree is required";
		  } 
		  else 
		  {
		    if (count($_POST["degree"])<2)
		    {
		      $degreeerr = "Atleast two degrees should be selected";
		    }
		    
		  }

	 if (empty($_POST["blood_group"]))
	  {
	    $blood_grouperr = "Blood Group is required";
	  }
	   else
	    {
	    $blood_group = test_input($_POST["blood_group"]);
	    }

	}
	


?>
    <fieldset align = "center">
      <legend><b>Registration</b></legend>
	
	<div class="reg_box">
		<form method="post"  action="submit.php">   
			<div class="wraper">
		
		<div class="content" >
			<label class="label">Name</label><br>
			<input type="text" name="name" class="input" value="<?php echo $name;?>"><span class="error">* <?php echo $nameerr;?></span><br>
			
		</div>


		<div class="content">
			<label class="label">Email</label><br>
			<input type="text" name="email" class="input" value="<?php echo $email;?>">
		<span class="error">*
	 		<?php echo $emailerr;?>
	 	</span><br>
		</div>


		<div class="content">
			<label class="label">Date Of Birth</label><br>
			 <input type="date" name="dob" class="input" value="<?php echo $dob;?>">
      <span class="error">*<?php echo $doberr;?></span><br>
		</div>


		<div class="content">
			<label class="label">Gender</label><br>
			 <input type="radio" name="gender" value="female">Female
		<input type="radio" name="gender" value="male">Male
		<input type="radio" name="gender" value="other">Other
		<span class="error">*
	 		<?php echo $gendererr;?>
	 	</span>
		<br>
		</div>


		<div class="content">
			<label class="label">Degree</label><br>
			 <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="ssc") echo "checked";?> value="ssc">SSC
     		 <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="hsc") echo "checked";?> value="hsc">HSC
      		<input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="bsc") echo "checked";?> value="bsc">BSc
      <input type="checkbox" name="degree[]" <?php if (isset($degree) && $degree=="msc") echo "checked";?> value="msc">MSc
      <span class="error">* <?php echo $degreeerr;?></span><br>
		</div>


		<div class="content">
			<label class="label">Blood group</label><br>
			<select name="blood_group" class="input" value="<?php echo $blood_group;?>">
        <option></option>
        <optionname="blood_group" <?php if (isset($dblood_group) && $blood_group=="a+") echo "checked";?> value="a+">A+</option>
        <option  name="blood_group" <?php if (isset($dblood_group) && $blood_group=="a-") echo "checked";?> value="a-">A-</option>
        <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b+") echo "checked";?> value="b+">B+</option>
        <option  name="blood_group" <?php if (isset($dblood_group) && $blood_group=="b-") echo "checked";?> value="b-">B-</option>
        <option  name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o+") echo "checked";?> value="o+">O+</option>
        <option s name="blood_group" <?php if (isset($dblood_group) && $blood_group=="o-") echo "checked";?> value="o-">O-</option>
        <option  name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab+") echo "checked";?> value="ab+">AB+</option>
        <option name="blood_group" <?php if (isset($dblood_group) && $blood_group=="ab-") echo "checked";?> value="ab-">AB-</option>
      </select>
      <span class="error">* <?php echo $blood_grouperr;?></span><br>
	 	</span>
		<br>
		</div>

		<div class="submit_content">
			<input type="submit" name="submit" value="Submit" class="submit_button">
		</div>

		</div>
	</form>

	</div>




</body>
</html>
