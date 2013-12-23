<!--MEMBER LOGIN FORM____________________-->

<h1>LOGIN</h1>
<br>
<br>
<form method="post" action='/users/p_login'>
  <fieldset>
    <ul>
      <li>
        <label for="email">Email:</label>
        <input type="text" name="email" class="signupFields" value= "<?php echo $email?>" />
      </li>
      <li>
        <label for="password">Password:</label>
        <input type="password" name="password" class="signupFields" value= "<?php echo $password?>" />
      </li>
      <li>
        <input type="submit" value="Login" class="large blue button" />
      </li>
    </ul>
  </fieldset>
</form>
