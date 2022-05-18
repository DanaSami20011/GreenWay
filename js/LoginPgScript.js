const form = document.getElementById('form');
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
    const unamelValue = uname.value.trim();
    const passwordValue = password.value.trim();
    var cnt = 0;


    if (unamelValue === '') {
        setError(uname, 'username is required');
    } else {
        ValidateEmail(unamelValue)
        setSuccess(uname);
        cnt++;
    }

    if (passwordValue === '') {
        setError(password, 'Password is required');
    } else {
        setSuccess(password);
        cnt++;
    }

    if (cnt == 2) {
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
