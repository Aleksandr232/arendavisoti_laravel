//  modal window
function openModalDiscounts() {
    let modalOpen = document.getElementById('modal-windows');
    modalOpen.style.display = 'block';
    themeBtn.style.display = "none";
    runningString.style.display='none';
    document.body.style.overflow = 'hidden';

    window.onclick = function(event) {
        if (event.target == modalOpen ) {
            modalOpen.style.display = "none";
            themeBtn.style.display = "block";
            runningString.style.display='none';
          document.body.style.overflow = '';

        }
      }
}

function closesModalDiscounts(e) {
    let modalOpen = document.getElementById('modal-windows');
    modalOpen.style.display = 'none';
    themeBtn.style.display = "block";
    runningString.style.display='none';
    document.body.style.overflow = '';


}
