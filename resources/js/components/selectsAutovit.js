window.addEventListener('DOMContentLoaded', () => {
    const brand = $('#selectBrand')
    const model = $('#selectModel')

    model.select2({
        theme: 'bootstrap-5'
    })
    brand.select2({
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
                })
        } catch (error) {
            console.error(error)
        }
    })
})
