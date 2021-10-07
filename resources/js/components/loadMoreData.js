window.addEventListener('DOMContentLoaded', () => {
    if (!document.getElementById('loader')) return

    let page = 2

    const loader = document.getElementById('loader')

    const loadMoreButton = loader.querySelector('button')
    const loadSpinner    = loader.querySelector('div')
    const noMoreData     = loader.querySelector('p')

    loadMoreButton.addEventListener('click', () => {
        loadMoreData(page)
    })

    const loadMoreData = async page => {
        try {
            loadMoreButton.classList.toggle('d-none')
            loadSpinner.classList.toggle('d-none')

            await axios.get(`?page=${page}`)
                .then(response => {
                    if (response.data.html == '') {
                        noMoreData.classList.remove('d-none')
                    } else {
                        document.querySelector('.wrapper--load-more').innerHTML += response.data.html
                        noMoreData.classList.add('d-none')
                        page += 1
                    }
                    loadMoreButton.classList.toggle('d-none')
                    loadSpinner.classList.toggle('d-none')
                })
        } catch (error) {
            console.error(error)
        }
    }
})
