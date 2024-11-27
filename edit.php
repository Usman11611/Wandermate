<?php 
session_start();
include("config.php");
if(!isset($_SESSION['valid'])){
    header("Location: SignIn.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Head contents remain unchanged -->
</head>
<body>
    <div class="nav">
        <!-- Navigation contents remain unchanged -->
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
               if(isset($_POST['submit'])){
                   $firstName = $_POST['firstName']; // Added field
                   $lastName = $_POST['lastName']; // Added field
                   $dob = $_POST['dob']; // Added field
                   $email = $_POST['email'];
                   $id = $_SESSION['id'];

                   // Adjust the UPDATE query to include the new fields
                   $edit_query = mysqli_query($con, "UPDATE users SET FirstName='$firstName', LastName='$lastName', DateOfBirth='$dob', Email='$email' WHERE Id=$id") or die("error occurred");

                   if($edit_query){
                       echo "<div class='message'><p>Profile Updated!</p></div><br>";
                       echo "<a href='home.php'><button class='btn'>Go Home</button>";
                   }
               } else {
                   $id = $_SESSION['id'];
                   $query = mysqli_query($con, "SELECT * FROM users WHERE Id=$id");

                   if($result = mysqli_fetch_assoc($query)){
                       $res_FirstName = $result['FirstName'];
                       $res_LastName = $result['LastName'];
                       $res_dob = $result['DateOfBirth']; // Assuming DATE type
                       $res_Email = $result['Email'];
                   }

            ?>
            <header>Change Profile</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="firstName">First Name</label>
                    <input type="text" name="firstName" id="firstName" value="<?php echo $res_FirstName; ?>" required>
                </div>

                <div class="field input">
                    <label for="lastName">Last Name</label>
                    <input type="text" name="lastName" id="lastName" value="<?php echo $res_LastName; ?>" required>
                </div>

                <div class="field input">
                    <label for="dob">Date of Birth</label>
                    <input type="date" name="dob" id="dob" value="<?php echo $res_dob; ?>">
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?php echo $res_Email; ?>" required>
                </div>
                
                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Update">
                </div>
                
            </form>
        </div>
        <?php } ?>
      </div>
</body>
</html>
