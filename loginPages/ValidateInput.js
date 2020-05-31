const email = document.getElementById('email')
const form = document.getElementById('form')
const confirm_email = document.getElementById('confirm_email')
const password = document.getElementById('password')
const confirm_password = document.getElementById('confirm_password')
const first_name = document.getElementById('first_name')
const last_name = document.getElementById('last_name')
const my_check = document.getElementById('my_check')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
    let messages = []
    var emailExp = /\S+@\S+\.\S+/;
    if (email.value === '' || email.value === null) {
        messages.push('Email address is blank')
    } else if (!emailExp.test(String(email.value).toLowerCase())) {
        messages.push('Invalid email address')
    } else if (confirm_email.value != email.value) {
        messages.push("Email values do not match")
    }

    if (password.value === '' || password.value === null) {
        messages.push('Please enter a password ')
    } else if (password.value.length < 8) {
        messages.push("Please enter a Password with minimium 8 characters")
    } else if (password.value != confirm_password.value) {
        messages.push('Passwords do not match')
    }
    
    if (first_name.value === '' || first_name.value === null) {
        messages.push('Please enter your first name')
    } 
    
    if (last_name.value === '' || last_name.value === null) {
        messages.push("Please enter your last name")
    }

    if (my_check.checked == false) {
        messages.push('Please agree to our terms of service')
    }

    if (messages.length > 0) {
        e.preventDefault()
        alert(messages.join(', '))
    } else if (messages.length == 0) {
        e.preventDefault()
        var account = { 'email' : email.value, 'password': password.value, 'first_name': first_name.value, 'last_name': last_name.value }
        localStorage.setItem(email.value, JSON.stringify(account))
        alert("Thank You for Signing Up with Us ")
    }
    
})