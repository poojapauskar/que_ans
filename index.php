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
    margin: auto 30px ;
}
.navbar{

width:100%;
padding: 2%;
padding-bottom: 6%;
background-color:rgba(255, 255, 255);
margin-top: -10px;
margin-left:-10px;
}

</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">
        <img alt="Bitjini_logo" src="bitjini_apps_more_logo.png" style="float: right;
    margin: -6px 30px;">
      </a>
    </div>
  </div>
</nav>
<form method="post" action="questions.php" style="margin: 60px auto;width: 15%;">
<label>First Name</label><br>
<input type="text" name="firstname" required/><br>
<br>
<label>Last Name</label><br>
<input type="text" name="lastname" required/><br>
<br>
<label>Email</label><br>
<input type="text" name="email" required/><br>
<br>
<label>Phone</label><br>
<input type="text" name="phone" required/><br>
<br>
<label>USN</label><br>
<input type="text" name="usn" required/><br><br><br>



<button class="button" type="submit">Submit</button>
</form>
</body>
</html>