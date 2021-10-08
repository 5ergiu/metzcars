window.addEventListener('DOMContentLoaded', () => {
    new Datepicker(document.getElementById('advertRegistrationDate'), {
        format: 'd/m/y',
        autohide: true,
    })

    const featureButtons = document.querySelectorAll('.portfolio-create__features button')

    featureButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.firstElementChild.value = button.firstElementChild.value === '0' ? '1' : '0'
            button.classList.toggle('btn-light--secondary--active')
        })
    })
})
