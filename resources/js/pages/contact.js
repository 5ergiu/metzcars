window.addEventListener('DOMContentLoaded', () => {
    tail.select('#contactBrand', {
        search: true,
    }).on('change', e => {
        tail.select('#contactModel').remove()
        let brand   = e.option.dataset.brand
        const model = document.getElementById('contactModel')

        try {
            axios.get(`/autovit/${brand}/models`)
                .then(function (response) {
                    model.disabled = false
                    model.querySelector('option')?.remove()
                    tail.select('#contactModel', {
                        search: true,
                        items: response.data,
                    })
                })
        } catch (error) {
            console.error(error)
        }
    })
})
