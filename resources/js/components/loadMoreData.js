window.addEventListener('DOMContentLoaded', () => {
    if (!document.getElementById('loader')) return

    let page = 2

    const loader         = document.getElementById('loader')
    const loadMoreButton = loader.querySelector('button')
    const noMoreData     = loader.querySelector('p')

    loadMoreButton.addEventListener('click', () => {
        loadMoreData(page)
    })

    const loadMoreData = async page => {
        noMoreData.classList.add('d-none')
        try {
            await axios.get(`?page=${page}`)
                .then(response => {
                    if (response.data.html === '') {
                        noMoreData.classList.remove('d-none')
                    } else {
                        document.querySelector('.container').innerHTML += response.data.html
                        noMoreData.classList.add('d-none')
                        page += 1
                    }
                    loadMoreButton.classList.remove('btn-loading--show')
                    loadMoreButton.disabled = false
                })
        } catch (error) {
            console.error(error)
        }
    }
})
