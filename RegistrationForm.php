<html lang="en">
<head>
  <title>User Registration</title>
</head>
<body>
  <h1>Register</h1>
    <form action="action.php" method="POST">
      Firstname: <input type="text" name="firstname" /><br />
      Lastname: <input type="text" name="lastname" /><br />
      Username: <input type="text" name="username" /><br />
      <p>Please select your gender:</p>
      <input type="radio" id="male" name="gender" value="male">
      <label for="male">Male</label><br>
      <input type="radio" id="female" name="gender" value="female">
      <label for="female">Female</label><br>
      <input type="radio" id="other" name="gender" value="other">
      <label for="other">Other</label> /><br />
      <label for="birthday">Birthday:</label>
       Dateofbirth: <input type="date" id="birthday" name="birthday"> /><br />
  
      Email: <input type="text" name="email" /><br />
      Phone: <input type="text" name="phone" /><br />
      Address:<input type="text" name="address" /><br />
      Password: <input type="text" name="password" /><br />
      Confirm password: <input type="text" name="password_confirm" /><br />
      <input type="submit" value="Register" />
    </form>
</body>
</html>