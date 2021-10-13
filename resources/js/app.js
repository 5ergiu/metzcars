require('./bootstrap');

window.addEventListener('DOMContentLoaded', () => {
    autosize(document.querySelectorAll('textarea'))
    document.querySelectorAll('.alert.show button').forEach(elem => {
        setInterval(() => {
           elem.click()
        }, 3000)
    })
})
