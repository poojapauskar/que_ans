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

<script type="text/javascript">
  function check(){
    var n1 = document.forms["form1"]["firstname"].value;
    var n2 = document.forms["form1"]["lastname"].value;
    var x = document.forms["form1"]["phone"].value;
    var y = document.forms["form1"]["email"].value;
    var z = document.forms["form1"]["usn"].value;
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var letters = /^[a-zA-Z\s]*$/;
    var numbers = /^[0-9\s]*$/;
    var alpha_num = /^[a-z0-9]+$/i;

    if((n1 !== "") && (n1.match(letters) == null)){
       alert("Only letters and whitespaces allowed for firstname");
        return false; 
    }
    if((n2 !== "") && (n2.match(letters) == null)){
       alert("Only letters and whitespaces allowed for lastname");
        return false; 
    }
    if((x !== "") && (x.match(numbers) == null)){
       alert("Phone no. must contain only digits");
        return false; 
    }
    if((x !== "") && (x.length > 15 || x.length < 7)){
        /*alert(x);*/
        /*window.location.href = "#popup_contain_seven1";*/
        alert("Phone no. must contain 7-15 digits");
        return false;
    }
    if((z !== "") && (z.match(alpha_num) == null)){
       alert("USN must contain only letters and numbers");
        return false; 
    }
    if((z !== "") && (z.length < 10 || z.length >10)){
        /*alert(x);*/
        /*window.location.href = "#popup_contain_seven1";*/
        alert("USN must contain 10 digits");
        return false;
    }

    else{
    /*  $("#popup1").slideToggle("speed");
      $("#contact_us_btn").show();*/
      return true;
    }

  }
</script>

</head>
<body>
<form id="form1" name="form1" method="post" action="questions.php">
<label>First Name</label><br>
<input type="text" name="firstname" required/><br>
<br>
<label>Last Name</label><br>
<input type="text" name="lastname" required/><br>
<br>
<label>Email</label><br>
<input type="email" name="email" required/><br>
<br>
<label>Phone</label><br>
<input type="phone" name="phone" required/><br>
<br>
<label>USN</label><br>
<input type="text" name="usn" required/><br><br><br>



<button class="button" onclick="check()" type="submit">Submit</button>
</form>
</body>
</html>