<!DOCTYPE html>
<html>
<head>
<title>User Data</title>
<style>
.button{
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
</style>

</head>
<body>
<form method="post" action="questions.php">
First Name:  <input type="text" name="firstname" required/><br>
<br>
Last Name:  <input type="text" name="lastname" required/><br>
<br>
Email:  <input type="text" name="email" required/><br>
<br>
Phone:  <input type="text" name="phone" required/><br>
<br>
USN :  <input type="text" name="usn" required/><br><br><br>



<button class="button" type="submit">Submit</button>
</form>
</body>
</html>