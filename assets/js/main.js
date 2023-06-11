window.addEventListener('load', function() {
    const openButton = document.querySelector("[data-open-modal]")
    const closeButton = document.querySelector("[data-close-modal]")
    const modal = document.querySelector("[data-modal]")

    openButton.addEventListener("click", () =>{
        modal.showModal()
    })
    closeButton.addEventListener("click", () =>{
        modal.close()
    })

    setTimeout(() => {
        const box = document.getElementById('notification');
      
        // box.style.display = 'none';
        box.classList.add('fade-out-right');
        box.classList.remove('fade-in-right');
      
    }, 3000)
});
