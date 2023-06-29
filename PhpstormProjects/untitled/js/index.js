// index.js

// Retrieve the login form and attach a submit event listener
const loginForm = document.querySelector('.form-box.login form');
loginForm.addEventListener('submit', handleLoginSubmit);

// Retrieve the registration form and attach a submit event listener
const registrationForm = document.querySelector('.form-box.register form');
registrationForm.addEventListener('submit', handleRegistrationSubmit);

function handleLoginSubmit(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Retrieve the entered email and password
    const emailInput = this.querySelector('input[type="email"]');
    const passwordInput = this.querySelector('input[type="password"]');
    const email = emailInput.value;
    const password = passwordInput.value;

    // Perform validation (e.g., check for empty fields)
    if (email.trim() === '' || password === '') {
        alert('Please enter both email and password.');
        return;
    }

    // Perform authentication using your preferred method (e.g., sending a request to a server)
    // Replace the following lines with your actual authentication logic
    if (email === 'example@example.com' && password === 'password123') {
        alert('Login successful!');
    } else {
        alert('Invalid email or password.');
    }

    // Reset the form fields
    emailInput.value = '';
    passwordInput.value = '';
}

function handleRegistrationSubmit(event) {
    event.preventDefault(); // Prevent the form from submitting

    // Retrieve the entered email and password
    const emailInput = this.querySelector('input[type="email"]');
    const passwordInput = this.querySelector('input[type="password"]');
    const email = emailInput.value;
    const password = passwordInput.value;

    // Perform validation (e.g., check for empty fields)
    if (email.trim() === '' || password === '') {
        alert('Please enter both email and password.');
        return;
    }

    // Perform registration using your preferred method (e.g., sending a request to a server)
    // Replace the following lines with your actual registration logic
    alert('Registration successful!');

    // Reset the form fields
    emailInput.value = '';
    passwordInput.value = '';
}


