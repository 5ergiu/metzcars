window.addEventListener('DOMContentLoaded', () => {
    const loadingButtons = document.querySelectorAll('.btn-loading')
    const forms          = document.querySelectorAll('.needs-validation')

    forms.forEach(form => {
        form.addEventListener('click', () => {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }
                form.querySelector('button[type=submit]').disabled = true
                form.querySelector('button[type=submit]').classList.add('btn-loading-submit--show')
            }, false)
        })
    })

    loadingButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.disabled = true
            button.classList.add('btn-loading--show')
        })
    })
})
