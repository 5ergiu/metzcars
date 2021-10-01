window.addEventListener('DOMContentLoaded', () => {
    tail.select('#contactBrand', {
        search: true,
    }).on('change', e => {
        let brand = e.option.dataset.brand
        try {
            axios.get(`/autovit/${brand}/models`)
                .then(function (response) {
                    tail.select('#contactModel', {
                        search: true,
                        items: response.data,
                    }).on('change', e => {
                        let model = e.key
                        try {
                            axios.get(`/autovit/${brand}/${model}/gearboxes`)
                                .then(function (response) {
                                    tail.select('#contactGearbox', {
                                        items: response.data,
                                    })
                                })
                        } catch (error) {
                            console.error(error)
                        }
                    })
                })
        } catch (error) {
            console.error(error)
        }
    })
})
