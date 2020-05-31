const email = document.getElementById('email')
const password = document.getElementById('password')
const form = document.getElementById('form')

form.addEventListener('submit', (e) => {
    if (email.value in localStorage) {
        var jsonObject = JSON.parse(localStorage.getItem(email.value));
        if (jsonObject['password'] == password.value) {
            e.preventDefault()
            alert( "Thank you "  +jsonObject['first_name'] + " " + jsonObject["last_name"]+ " for logging in")
        } else {
            e.preventDefault()
            alert("Wrong Password")
        }
    } else {
        e.preventDefault()
        alert("Email Doesnt Exist")
    }
})
