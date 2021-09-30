window.addEventListener('DOMContentLoaded', () => {
    tail.select('#contactBrand', {
        search: true,
    }).on('change', e => {
        console.log(e)
        try {
            axios.get(`/autovit/${e.option.dataset.brand}/models`)
                .then(function (response) {
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
