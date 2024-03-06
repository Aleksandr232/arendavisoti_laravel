document.addEventListener("DOMContentLoaded", function(event) {
    if (window.innerWidth <= 560) {
      function setupModal(modalSelector) {
        var modal = document.querySelector(modalSelector);

        if (modal) {
          var closeBtn = modal.querySelector('.close-modal');
          var input = modal.querySelector('input');
          var timerId = null;
          var isModalOpen = false;

          function showModal() {
            modal.style.display = 'block';
            isModalOpen = true; // Устанавливаем флаг открытого модального окна
          }

          function hideModal() {
            modal.style.display = 'none';
            isModalOpen = false;
            clearTimeout(timerId);
          }

          if (input) {
            input.addEventListener('focus', function() {
              clearTimeout(timerId);
            });
            input.addEventListener('blur', function() {
              if (isModalOpen) { // Если модальное окно открыто, устанавливаем таймер для его закрытия
                timerId = setTimeout(hideModal, 15000);
              }
            });
          }

          if (closeBtn) {
            closeBtn.addEventListener('click', function() {
              hideModal();
            });
          }

          modal.style.display = 'none';

          setTimeout(showModal, 15000);
        } else {
          console.error('Элемент ' + modalSelector + ' не найден');
        }
      }

      setupModal('.modal_home');
      setupModal('.modal_tours');
      setupModal('.modal_technics');
    }
});
