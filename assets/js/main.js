window.addEventListener('load', function() {
    setTimeout(() => {
        const box = document.getElementById('notification');
      
        box.classList.add('fade-out-right');
        box.classList.remove('fade-in-right');
      
    }, 3000)

    const openButton = document.querySelector("[data-open-modal]")
    const closeButton = document.querySelector("[data-close-modal]")
    const modal = document.querySelector("[data-modal]")

    if (openButton) {
        openButton.addEventListener("click", () =>{
            modal.showModal()
        })
    }
    if (openButton) {
        closeButton.addEventListener("click", () =>{
            modal.close()
        })
    }
});
