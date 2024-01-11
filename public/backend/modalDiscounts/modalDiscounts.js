function openModalDiscounts() {
    let modalOpen = document.getElementById('modal-windows');
    modalOpen.style.display = 'block';
    document.body.style.overflow = 'hidden';

    window.onclick = function(event) {
        if (event.target == modalOpen ) {
            modalOpen.style.display = "none";
            document.body.style.overflow = '';

        }
      }
}

function closesModalDiscounts(e) {
    let modalOpen = document.getElementById('modal-windows');
    modalOpen.style.display = 'none';
    document.body.style.overflow = '';


}
