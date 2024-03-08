

 // menu
const hnNavbarBurgerBtn = document.querySelector('.hn-navbar__burger__btn');
const hnNavbarMenu = document.querySelector('.hn-navbar__menu');
const hnNavbarBurger = document.querySelector('.hn-navbar__burger');
const hnNavbarBurgerTitle = document.querySelector('.hn-navbar__burger__title');

let isBurgerActive = false;

hnNavbarBurgerBtn.addEventListener('click', () => {
    hnNavbarMenu.classList.toggle('active');
    hnNavbarBurger.classList.toggle('active');
    hnNavbarBurgerTitle.classList.toggle('active');
    console.log('Melnkov dev', 'https://newportfolio-sooty-kappa.vercel.app/')
    if (isBurgerActive) {
        themeBtn.style.display = 'block';
        isBurgerActive = false;
    } else {
        themeBtn.style.display = 'none';
        isBurgerActive = true;
    }

});


// Website dark/light theme

const themeBtn = document.querySelector(".theme-btn");

themeBtn.addEventListener("click", () => {
    document.body.classList.toggle("dark-theme");
    themeBtn.classList.toggle("sun");

    localStorage.setItem("saved-theme", getCurrentTheme());
    localStorage.setItem("saved-icon", getCurrentIcon());
});

const getCurrentTheme = () => document.body.classList.contains("dark-theme") ? "dark" : "light";
const getCurrentIcon = () => themeBtn.classList.contains("sun") ? "sun" : "moon";

const savedTheme = localStorage.getItem("saved-theme");
const savedIcon = localStorage.getItem("saved-icon");

if(savedTheme) {
    document.body.classList[savedTheme === "dark" ? "add" : "remove"]("dark-theme");
    themeBtn.classList[savedIcon === "sun" ? "add" : "remove"]("sun");
}



//  modal window
const btnModalCard = document.getElementById('card-btn');
const runningString = document.getElementById('runningString')
const btnOpenModal = document.querySelectorAll('.btn')
    , modalWindow = document.querySelector('.modal-window')
    , closeModal = document.querySelectorAll('.close-modal, .modal-bg')
    , scroll = calcScroll();

btnOpenModal.forEach(i => {
    i.addEventListener('click', () => {
        let qwerty = modalWindow.querySelector('input[name=hidden]').value = i.getAttribute('data-btn');
        if(modalWindow.style.display !== 'block') {
            modalWindow.style.display = 'block';
            themeBtn.style.display = 'none';
            runningString.style.display='none';
            document.body.style.overflow = 'hidden';
            document.body.style.marginRight = `${scroll}px`;
        }
    });
});

closeModal.forEach(elem => {
    elem.addEventListener('click', function() {
        if(modalWindow.style.display !== 'none') {
            modalWindow.style.display = 'none';
            document.body.style.overflow = '';
            themeBtn.style.display = 'block';
            /* runningString.style.display='block'; */
            runningString.style.display='none';
            document.body.style.marginRight = '0px';
        }
    });
});



function calcScroll() {
    const div = document.createElement('div');

    div.style.width = '50px';
    div.style.height = '50px';
    div.style.overflowY = 'scroll';
    div.style.visibility = 'hidden';

    document.body.appendChild(div);

    let scrollWidth = div.offsetWidth - div.clientWidth;
    div.remove();

    return scrollWidth;
}

// Маска в поле телефона
let inp = document.querySelectorAll('.mask-phone');

inp.forEach((e) => {
    // Проверяем фокус
    e.addEventListener('focus', event => {
        // Если там ничего нет или есть, но левое
        if(!/^\+\d*$/.test(event.value))
            // То вставляем знак плюса как значение
            e.value = '+7';
    });

    e.addEventListener('keypress', evt => {
        // Отменяем ввод не цифр
        if(!/\d/.test(evt.key))
            e.preventDefault();
    });
})

// alert с рекламой

function showAlert() {
    var alertBox = document.getElementById('alert-box');
    alertBox.style.display = 'block';
  }

  function closeAlert() {
    var alertBox = document.getElementById('alert-box');
    alertBox.style.display = 'none';
  }

  var now = new Date();
  var targetDate = new Date(now.getFullYear(), now.getMonth() + 1, 1, 14, 30);

  var intervalId = setInterval(function() {
    var currentDate = new Date();
    if (currentDate.getTime() >= targetDate.getTime()) {
      showAlert();
      targetDate = new Date(targetDate.getFullYear(), targetDate.getMonth() + 1, 1, 14, 30);
    }
  }, 60000);

  // калькулятор расчет лесов

  const calculatorForm = document.querySelector('#calculator-form');
        const calculateBtn = document.querySelector('#calculate-btn');




        calculateBtn.addEventListener('click', function(event) {
            event.preventDefault();



            const length = Number(document.querySelector('#length').value);
            const height = Number(document.querySelector('#height').value);

            let area = length * height;
            let stairsFrames = Math.floor(height/2) + (length > 15 ? Math.floor(height/2) * Math.floor(length/15): 0);
            let passageFrames = Math.round(area/6) - (length > 15 ? Math.round(height/2) * Math.floor(length/15) : 0);
            let doubleConnections = (length * height / 6) ;
            let singleConnections = (length * height / 6);
            let level1Rafters = (length / 3 * 2);
            let allLevelRafters = singleConnections * 2;
            let bash = (height > 6) ? Math.round((length/3+1)*2) : 0;
            let level1Panels = length;
            let allLevelPanels = doubleConnections * 3;


            const resultsDiv = document.querySelector('.modal__content');
            resultsDiv.innerHTML = `
            <span onclick="closesModal()" id="close">&times;</span>
            <p>Площадь: ${area} кв.м</p>
            <p>Рам с лестницей: ${stairsFrames}</p>
            <p>Рам проходных: ${passageFrames}</p>
            <p>Башмаков: ${bash} шт</p>
            <p>Связей двойных: ${doubleConnections}</p>
            <p>Связей одинарных: ${singleConnections}</p>
            <p>Регелей на 1 ярус: ${level1Rafters}</p>
            <p>Регелей на все ярусы: ${allLevelRafters}</p>
            <p>Щитов на 1 ярус: ${level1Panels}</p>
            <p>Щитов на все ярусы: ${allLevelPanels}</p>
            `

        });


        // модальное окно калькулятор


        function openModal() {
            let modalOpen = document.getElementById('modals');
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

        function closesModal(e) {
            let modalOpen = document.getElementById('modals');
            modalOpen.style.display = 'none';
            themeBtn.style.display = "block";
            runningString.style.display='none';
            document.body.style.overflow = '';


        }

        // модальное окно оформления заказа
        function openModalCard() {
            var modal = document.getElementById("modal-card");
            var moadalCart = document.getElementById('modal_card_content')
            modal.style.display = "block";
            themeBtn.style.display = "none";
            btnModalCard.style.display ="none";
            runningString.style.display='none';
            moadalCart.style.bottom='180px';
            if(window.innerWidth < 560){
                moadalCart.style.bottom = '20px';
            };
            modal.style.overflow = 'hidden';
            document.body.style.overflow = 'hidden';

            var closeBtn = document.getElementsByClassName("close")[0];
            closeBtn.onclick = function() {
              modal.style.display = "none";
              themeBtn.style.display = "block";
              btnModalCard.style.display = "block";
              runningString.style.display='none';
              document.body.style.overflow = '';

            }

            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
                themeBtn.style.display = 'block';
                btnModalCard.style.display = 'block';
                runningString.style.display='none';
                document.body.style.overflow = '';

              }
            }
          }










console.log('Melnkov dev', 'https://newportfolio-sooty-kappa.vercel.app/');





