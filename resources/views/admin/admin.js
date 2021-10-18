window.addEventListener('DOMContentLoaded', () => {
    const adminDropdownMenu = document.getElementById('adminDropdownMenu')

    adminDropdownMenu?.addEventListener('click', e => {
        e.stopPropagation()
        document.getElementById('adminUpdateStock').submit()
    })
})
