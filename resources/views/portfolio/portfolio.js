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

    const restrictions = {
        maxFileSize: 20971520, // 20 MB
        maxTotalFileSize: 734003200, // 700 MB
        maxNumberOfFiles: 50
    }

    const uppy = new Uppy.Core({
        meta: {
            directory: document.getElementById('advertDirectory').value
        },
        restrictions: restrictions
    })

    uppy.use(Uppy.Dashboard, {
        theme: 'dark',
        target: '#uppyModal',
        trigger: '#toggleUppyModal',
        allowMultipleUploads: false,
        closeModalOnClickOutside: true
    }).use(Uppy.XHRUpload, {
        endpoint: '/portfolio/upload',
        formData: true,
        bundle: true,
        fieldName: 'images[]',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
})
