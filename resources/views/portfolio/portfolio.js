import * as FilePond from 'filepond'
import FilePondPluginImagePreview from 'filepond-plugin-image-preview'
import { Datepicker } from 'vanillajs-datepicker'

window.addEventListener('DOMContentLoaded', () => {

    new Datepicker(document.getElementById('advertRegistrationDate'), {
        format: 'y-m-d',
        autohide: true,
    })

    const featureButtons = document.querySelectorAll('.portfolio-create__features button')

    featureButtons.forEach(button => {
        button.addEventListener('click', () => {
            button.firstElementChild.value = button.firstElementChild.value === '0' ? '1' : '0'
            button.classList.toggle('btn-light--secondary--active')
        })
    })

    const advertImagesInput  = document.getElementById('advertImages')
    const advertDirectory    = document.getElementById('advertDirectory').value
    const advertImagesNUmber = document.getElementById('advertImagesNumber')?.value

    FilePond.registerPlugin(FilePondPluginImagePreview)

    const pond = FilePond.create(advertImagesInput, {
        credits: false,
        allowMultiple: true,
        instantUpload: false,
        allowReorder: true,
        storeAsFile: true,
        imagePreviewHeight: 200,
    })

    if(advertImagesNUmber) {
        const files = []

        for (let i = 1; i <= advertImagesNUmber; i++) {
            files.push(`/storage/images/${advertDirectory}/${i}.jpeg`)
        }

        pond.addFiles(files)
    }
})
