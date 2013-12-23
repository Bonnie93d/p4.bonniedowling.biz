
<table width="70%" border="0" cellspacing="5" cellpadding="5">
<tr>
<td bgcolor: white colspan="2"><h1>REGISTER NOW</h1></td>
<table width="70%" border="0" cellspacing="5" cellpadding="5">
    </tr>
  
  <tr>
    <td bgcolor: white width="8%"></td>
    <td bgcolor: white width="92%"><!--SIGNUP FORM____________________-->
      
      <form id='sup' method="post" action='/users/p_signup'>
        <fieldset>
          <ul>
            <li>
              <label for="first_name">First Name:</label>
              <span class="alert">
              <div id='firstError'></div>
              </span>
              <input type="text" name="first_name" id="firstName" class="signupFields" value= "<?php echo $first_name?>" />
            </li>
            <li>
              <label for="last_name">Last Name:</label>
              <span class="alert">
              <div id='lastError'></div>
              </span>
              <input type="text" name="last_name" id="lastName" class="signupFields" value= "<?php echo $last_name?>" />
            </li>
            <li>
              <label for="password">Password:</label>
              <span class="alert">
              <div id='passError'></div>
              </span>
              <input type="password" name="password" id='password'class="signupFields" value= "<?php echo $password?>" />
            </li>
            <li>
              <label for="password2">Confirm Password:</label>
              <span class="alert">
              <div id='passError2'></div>
              </span>
              <input type="password" name="password2" id='password2' class="signupFields" value= "<?php echo $password2?>" />
            </li>
            <li>
              <label for="email">Email:</label>
              <span class="alert">
              <div id='emailError'></div>
              </span>
              <input type="text" name="email" id='email'class="signupFields" value= "<?php echo $email?>" />
            </li>
            <span>Create a security question.<br>
            This question will help us verify your identity should you forget your password.</span>
            <li>
              <label for="security_question">Security Question:</label>
              <span class="alert">
              <div id='qError'></div>
              </span>
              <input type="text" name="security_question" id="sec_question"class="signupFields" >
            </li>
            <li>
              <label for="security_answer">Answer:</label>
              <span class="alert">
              <div id='answer_error'></div>
              </span>
              <input type="text" name="security_answer" id="sec_answer" class="signupFields" value= "<?php echo $email?>" />
            </li>
            <span id='regButton'>
            <li>
              <input type="submit" id='reg' value="Register" class="large blue button" />
            </li>
            </span>
          </ul>
        </fieldset>
      </form>
      <div id='results'></div></td>
  </tr>
</table>
