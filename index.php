<?php
$servername = "localhost";
$username = "root";
$password = "root";

$firstname= $_POST['firstname'];
$lastname= $_POST['lastname'];
$email= $_POST['email'];
$eduqul = $_POST['eduqual'];
$gender= $_POST['gender'];

$myfile=fopen("CandidateInfo.txt","a") or die("unable to open file");
	$txt="First name:".$firstname."\Last name:".$lastname."\nEmail:".$email."\nEdqual:".$eduqul."\nGender:".$gender."\n\n\n\n";
		fwrite($myfile,$txt);
		fclose($myfile);
    echo "First name:".$firstname."<br>Last name:".$lastname."<br>Email:".$email."<br>Edqual:".$eduqual."<br>Gender:".$gender;
        
try {
  $user = "root";
  $pass = "root";
  $dbh = new PDO('mysql:host=localhost;dbname=Candidate', $user, $pass);
  foreach($dbh->query('SELECT * from Candidate') as $row) {
      print_r($row);
  }
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $que="INSERT INTO CandidateDB (cname, addr, email, mobno, high_qual, dob) VALUES ('$firstname', '$lastname', '$email', $eduqual, 'gender')";
  
  $stmt=$dbh->prepare($que);
  $stmt->execute();
  } catch (PDOException $e) {
  print "Error!: " . $e->getMessage() . "<br/>";
  die();
  }
  $dbh = null; 
  
		?>

?>