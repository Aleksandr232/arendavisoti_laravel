document.addEventListener('DOMContentLoaded', function() {
    animateRunningString();
    hideRunningStringOnScroll();
  });

  let animationInterval; // Глобальная переменная для хранения интервала анимации

  function animateRunningString() {
    let element = document.getElementById('runningString');
    let position = 0;

    animationInterval = setInterval(() => {
      position++;
      element.style.left = position + 'px';

      if (position >= window.innerWidth) {
        position = -element.offsetWidth;
      }
    }, 10);
  }

  function hideRunningStringOnScroll() {
    let element = document.getElementById('runningString');
    let animationInterval;

    function startAnimation() {
      // Здесь вместо animationInterval нужно использовать идентификатор интервала анимации, чтобы его можно было остановить
      animationInterval = setInterval(/* код анимации */);
    }

    window.addEventListener('scroll', function() {
      if (window.pageYOffset > 0) {
        element.style.display = 'none';
        clearInterval(animationInterval); // Останавливаем интервал анимации
      } else {
        element.style.display = 'block'; // Сбрасываем стиль display на block, чтобы бегущая строка снова отображалась
        startAnimation(); // Запускаем анимацию
      }
    });
  }
