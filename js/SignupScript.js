const form = document.getElementById('form');
const email = document.getElementById('mail');
const uname = document.getElementById('username');
const password = document.getElementById('password');

    const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

function validateInputs() {
    const emailValue = email.value.trim();
    const unamelValue = uname.value.trim();
    const passwordValue = password.value.trim();
    var cnt = 0;

    if (emailValue === '') {
        setError(email, 'Email is required');
    } else {
        if( ValidateEmail(emailValue)){
            setSuccess(email);
            cnt++;
        }else{
            //if email is not valid
            setError(email, 'Email is not in the correct format');
        }
    }

    if (unamelValue === '') {
        setError(uname, 'username is required');
    } else {
        ValidateEmail(unamelValue)
            setSuccess(uname);
            cnt++;
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
    } else if (passwordValue.length < 8) {
        setError(password, 'Not strong password, must be at least 8 character.')
    } else {
        setSuccess(password);
        cnt++;
    }

    if (cnt == 3){
        document.form.submit();
    }

    
}
function ValidateEmail(input) {

    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@greenway\.[a-zA-Z0-9-]+$/i;

    emailValid = input.match(validRegex);

    if (emailValid) {
  
      return true;
  
    } else {
  
      return false;
  
    }
  
  }
