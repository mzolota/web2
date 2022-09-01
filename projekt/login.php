
<?php
   $driver = new mysqli_driver();
   $driver -> report_mode = MYSQLI_REPORT_OFF;
   
   if(isset($_SESSION['log']))
   {
      header('Location: index.php');
      exit();
   }
   else
   {
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
         function validData($x)
         {
            $x = trim($x);
            $x = stripslashes($x);
            $x = htmlspecialchars($x);
            return $x;
         }
         
         $server = "localhost";
         $user = "root";
         $pass = "";
         $db = "test";
      
         $conn = @new mysqli($server, $user, $pass, $db);
      
         if($conn->connect_errno)
         {
            echo "Database connection failed!<BR>";
            echo "Reason: ", $conn->connect_error;
            exit();
         }
      
         $fname = $lname = $uname = $email = $pass = "";
         $unameE = $emailE = $passE = "";
         
         $fname = validData($_POST["firstname"]);
         $lname = validData($_POST["lastname"]);
         $uname = validData($_POST["username"]);
         $email = validData($_POST["email"]);
         $pass = validData($_POST["password"]);
         
         if(empty($uname))
            $unameE = "Username field was empty!<BR>";
         if(empty($email))
            $emailE = "Email Id field was empty!<BR>";
         if(empty($pass))
            $passE = "Password field was empty!<BR>";
         if(strlen($uname)<6)
            $unameE .= "Username must be of 6 or more characters!<BR>";
         if(strlen($pass)<6)
            $passE .= "Password must be of 6 or more characters!<BR>";
         if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            $emailE .= "Enter a valid Email ID!<BR>";
      
         if(!empty($unameE) || !empty($emailE) || !empty($passE))
            $err = "Try again";
         else
         {
            $sql = "INSERT INTO `table`(`FirstName`, `LastName`, `Username`, `Email`, `Password`)
               VALUES (?, ?, ?, ?, ?)";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $fname, $lname, $uname, $email, $pass);
      
            if($stmt->execute())
            {
               $_SESSION['log'] = $uname;
               header('Location: full.php');
               
               exit();
            }
            else
               $execE = "Something went wrong<BR>Please try again!";
         }
         $conn->close();
      }
   }
?>
<HTML>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="Ulogiraj.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> </head>


<BODY class="pozadina">

<div class = "main">
<DIV class="Loginform">
   <H2>Registracija</H2>
   <FORM name="register" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <LABEL>Ime</LABEL><BR>
      <INPUT type="text" name="firstname" placeholder="Vaše ime"><BR>
      <LABEL>Prezime</LABEL><BR>
      <INPUT type="text" name="lastname" placeholder="Vaše prezime"><BR>
      <LABEL>Username
      <?php
         if(!empty($unameE))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?>
      </LABEL><BR>
      <INPUT type="text" name="username" placeholder="Username" required><BR>
      <LABEL>Email
      <?php
         if(!empty($emailE))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?>
      </LABEL><BR>
      <INPUT type="text" name="email" placeholder="Email obavezan! mora imati više od 6 slova" required><BR>
      <LABEL>Lozinka
      <?php
         if(!empty($passE))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?>
      </LABEL><BR>
      <INPUT type="text" name="password" placeholder="Lozinka obavezna! mora imati više od 6 slova" required><BR>
      <BUTTON type="submit">Registriraj se</BUTTON>
   </FORM>
   <?php
   if(isset($err))
   {
      echo "<DIV class=\"red\">";
      if(!empty($unameE))
         echo $unameE;
      if(!empty($emailE))
         echo $emailE;
      if(!empty($passE))
         echo $passE;
      echo "</DIV>";
   }
   elseif(isset($execE))
      echo $execE;
   else
   
   ?>
   <div class="login">
   <DIV class="form">
   <LABEL for="chk" aria-hidden="true">Prijavi se!</label>
   <LABEL>Email
      <?php
         if(!empty($emailE))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?>
      </LABEL><BR>
	  <INPUT type="text" name="email" placeholder="Email" required><BR>
	  <LABEL>Lozinka
      <?php
         if(!empty($passE))
            echo "<SPAN class=\"red\">*</SPAN>";
         else
            echo "*";
      ?>
      </LABEL><BR>
      <INPUT type="text" name="password" placeholder="Lozinka" required><BR>
					<button>Prijavi se</button>
</div>
</div>
</DIV>
</div>

<div class="vratime">
   <p><span><button class="vrati" onclick="document.location='index.php'"><b>Vrati me nazad</b></button> </span></p> </div>
</BODY>

</HTML>



