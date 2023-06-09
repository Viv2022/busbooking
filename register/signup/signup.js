function validateForm() {
  let name = document.forms['signup']['name'].value;
  let pass = document.forms['signup']['pass'].value;
  let confirmpass = document.forms['signup']['repass'].value;


  const uppercaseRegex = /[A-Z]/;
  const lowercaseRegex = /[a-z]/;
  const numberRegex = /[0-9]/;
  const symbolRegex = /[!@#$%^&*()_+\-=[\]{};':"\\|,.<>/?]/;
  
 
  if(name.length===0){
    document.getElementById('name-error').innerHTML = 'Enter your name.';
    return false;
  }else  if(numberRegex.test(name)) {
    document.getElementById('name-error').innerHTML = 'Error: Name should not contain numbers';
    return false;
  }
  
  else{
    document.getElementById('name-error').innerHTML = '';
  }

  if(uppercaseRegex.test(pass) && lowercaseRegex.test(pass) && symbolRegex.test(pass) &&
      numberRegex.test(pass) && pass.length >= 8){

    if(pass===confirmpass){
      return true;
    }
    else{
      document.getElementById('confirm-error').innerHTML = 'Passwords do not match.';
      return false;
    }
  }
  else{
    document.getElementById('password-error').innerHTML = 'Password not strong enough';
    return false;
  }
}
