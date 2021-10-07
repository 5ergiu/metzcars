window.addEventListener('DOMContentLoaded', () => {
    const model = $('#contactModel')

    model.select2({
        theme: 'bootstrap-5'
    })
    $('#contactBrand').select2({
        theme: 'bootstrap-5'
    }).on('select2:select', e => {
        let brand = e.params.data.element.dataset.brand

        model.html('') // reset select options
        try {
            axios.get(`/autovit/${brand}/models`)
                .then(function (response) {
                    model.select2({
                        theme: 'bootstrap-5',
                        data: response.data,
                    })
                    model.select2('updateResults')
                })
        } catch (error) {
            console.error(error)
        }
    })

    // tail.select('#contactBrand', {
    //     search: true,
    // }).on('change', e => {
    //     tail.select('#contactModel').remove()
    //     let brand   = e.option.dataset.brand
    //     const model = document.getElementById('contactModel')
    //
    //     try {
    //         axios.get(`/autovit/${brand}/models`)
    //             .then(function (response) {
    //                 model.disabled = false
    //                 model.querySelector('option')?.remove()
    //                 tail.select('#contactModel', {
    //                     search: true,
    //                     items: response.data,
    //                 })
    //             })
    //     } catch (error) {
    //         console.error(error)
    //     }
    // })
})
