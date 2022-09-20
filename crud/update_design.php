<?php include("connection.php");
$registration= $_GET['reg'];

$query = "SELECT * FROM registration_form where registration='$registration'";
$data  = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="style.css">
    <title>Update</title>
</head>
<body>
    <div class="container">
      <form action="#" method="POST">
      <div class="title">
       Update Participants Details
      </div>
      <div class="form">
       <div class="input_field">
            <label>Full Name</label>
            <input type="text" value="<?php echo $result['name']; ?>" class="input" name="name" required>
        </div>  
         <div class="input_field">
            <label>Registration Number</label>
            <input type="number" value="<?php echo $result['registration']; ?>" class="input" name="registration_number" required>
        </div> 
         <div class="input_field">
            <label>Student Of</label>
           <select class="selectbox" name="student_of" required>
            <option value="">Select</option>
            <option value="B-Tech"
              <?php
                if($result['student']=='B-Tech')
                {
                    echo "selected";
                }
                 ?>
            >
            B-Tech</option>
            <option value="Agriculture"
            <?php
                if($result['student']=='Agriculture')
                {
                    echo "selected";
                }
                 ?>
            >
            Agriculture</option>
            <option value="BCA"
            <?php
                if($result['student']=='BCA')
                {
                    echo "selected";
                }
                 ?>
            >
            BCA</option>
            <option value="Diploma"
            <?php
                if($result['student']=='Diploma')
                {
                    echo "selected";
                }
                 ?>
            >
            Diploma</option>
           </select>
            <label class="c">Gender</label>

           <select class="selectbox" name="gender" required>
            <option value="">select</option>
            <option value="Male"
              <?php
                if($result['gender']=='Male')
                {
                    echo "selected";
                }


              ?>
            >
                Male</option>

            <option value="Female"
                          <?php
                if($result['gender']=='Female')
                {
                    echo "selected";
                }
                 ?>
            >
            Female</option>
            <option Value="Others"
             <?php
                if($result['gender']=='Others')
                {
                    echo "selected";
                }


              ?>
            >
            Others</option>
           </select >

        </div> 
         <div class="input_field">
            <label>Email </label>
            <input type="email" value="<?php echo $result['email']; ?>"  class="input" name="email" required>
        </div>  
         <div class="input_field">
            <label>Phone Number</label>
            <input type="number" value="<?php echo $result['phone']; ?>"  class="input" name="phone_number" required>
        </div> 
        <div class="input_field">
            <label class="check">
            <input type="checkbox" required>
            <span class="checkmark"></span> 
            </label>
             <p>Agree to term & conditions</p>
        </div>   
          <div class="input_field">
             <input type="submit"  value ="Update" class="btn" name="update">
        </div>      
             
      </div>
     </form>
    </div>
</body>
</html>


<!--php code for data base store-->
<?php
if($_POST['update'])
{
   $name                = $_POST['name'];
   $registration_number = $_POST['registration_number'];
   $student_of          = $_POST['student_of'];
   $gender              = $_POST['gender'];
   $email               = $_POST['email'];
   $phone_number        = $_POST['phone_number'];

   if($name != "" && $registration_number != "" && $student_of != "" && $gender != ""
     && $email != ""  && $phone_number != "" )
   {

     $query= " UPDATE registration_form SET name='$name',
  student='$student_of',gender='$gender',email='$email',phone='$phone_number' where registration='$registration_number'";



  $data = mysqli_query($conn,$query);
  if($data)
    { 
    
         echo "<script>alert('Record Updated ..');</script>";
       ?>
       
        <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>
        <?php
       
  }
  else
  {
    echo "update nhi hoga";
  }
 }
//  else{
//     echo "<script>alert('Fill your details First');</script>";
//  }
 }


?>