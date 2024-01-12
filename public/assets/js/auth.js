document.getElementById('formular').addEventListener('submit', function (event) {
    var firstname = document.getElementById('firstname');
    var lastname = document.getElementById('lastname');
    var email = document.getElementById('email');
    var password = document.getElementById('password');

    
    if (!isValidEmail(email.value)) {
        email.classList.add('is-invalid');
        email.classList.remove('is-valid');
        event.preventDefault();
    } else {
        email.classList.add('is-valid');
        email.classList.remove('is-invalid');
    }

    if (password.value.trim() === '') {
        password.classList.add('is-invalid');
        password.classList.remove('is-valid');
        event.preventDefault();
    } else {
        password.classList.add('is-valid');
        password.classList.remove('is-invalid');
    }
    
    if (!isValidName(firstname.value)) {
        firstname.classList.add('is-invalid');
        firstname.classList.remove('is-valid');
        event.preventDefault();
    } else {
        firstname.classList.add('is-valid');
        firstname.classList.remove('is-invalid');
    }

    if (!isValidName(lastname.value)) {
        lastname.classList.add('is-invalid');
        lastname.classList.remove('is-valid');
        event.preventDefault();
    } else {
        lastname.classList.add('is-valid');
        lastname.classList.remove('is-invalid');
    }

});

function isValidName(name) {
    var nameRegex = /^[A-Za-z\s]+$/;
    return nameRegex.test(name);
}

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}
