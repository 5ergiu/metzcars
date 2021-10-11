window.addEventListener('DOMContentLoaded', () => {
    if (!document.getElementById('loader')) return

    window.page = 2

    const loader         = document.getElementById('loader')
    const loadMoreButton = loader.querySelector('button')
    const noMoreData     = loader.querySelector('p')

    loadMoreButton.addEventListener('click', () => {
        loadMoreData(window.page)
    })

    const loadMoreData = async page => {
        noMoreData.classList.add('d-none')
        try {
            await axios.get(`?page=${page}`)
                .then(response => {
                    if (response.data.html === '') {
                        noMoreData.classList.remove('d-none')
                    } else {
                        document.querySelector('.adverts-wrapper').innerHTML += response.data.html
                        noMoreData.classList.add('d-none')
                        window.page += 1
                    }
                    loadMoreButton.classList.remove('btn-loading--show')
                    loadMoreButton.disabled = false
                })
        } catch (error) {
            console.error(error)
        }
    }
})
