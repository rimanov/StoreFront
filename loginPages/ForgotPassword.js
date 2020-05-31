const email = document.getElementById('email')
const form = document.getElementById('form')

form.addEventListener('submit', (e) => {
   
    if (email.value in localStorage) {
        e.preventDefault()
        alert("Recovery link sent")
    } else {
        e.preventDefault()
        alert("Email not found")
    }
})