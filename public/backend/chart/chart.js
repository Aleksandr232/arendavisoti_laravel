 /* var ctx1 = document.getElementById('myChart1').getContext('2d');
  fetch('/status') // делаем GET-запрос на сервер
  .then(response => response.json()) // преобразуем полученный ответ в json формат
  .then(data => { // обрабатываем полученные данные
    var myChart1 = new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: ['Клиенты',
                'Фото тур',
                'Статьи',
                'Фото лесов',
                'Фото техника',
                'Фото минитрактор',
                'Заказы'
            ],
        datasets: [{
          label: 'Количиство',
          data: data.map((idx) => {
            return idx.statistica.length;
        }),
          backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(75, 192, 192)',
            'rgb(255, 205, 86)',
            'rgb(201, 203, 207)',
            'rgb(54, 162, 235)',
            'rgb(255, 29, 132)',
            'rgb(155, 19, 100)',
            ]
        }],
      },
      options: {
        borderWidth:2,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
   
  })
  .catch(error => {
    console.error('Ошибка:', error);
  }); */

var ctx2 = document.getElementById('myChart2').getContext('2d');
let currentDate = new Date();
let currentYear = currentDate.getFullYear();

const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

fetch('/contactspost')
  .then(response => response.json())
  .then(data => {
    var myChart2 = new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: data.map(obj => months[obj.month-1]),
        datasets: [{
          label: `Клиентов через сайт в ${currentYear}`,
          data: data.map(obj => obj.total) // Массив с данными о количестве контактов для каждого месяца
        }],
      },

      options: {
        borderWidth:2,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    /* console.log(data); */ // выводим данные в консоль
  })
  .catch(error => {
    console.error('Ошибка:', error);
  });

  var ctx3 = document.getElementById('myChart3').getContext('2d');
  fetch('/visit') // делаем GET-запрос на сервер
  .then(response => response.json()) // преобразуем полученный ответ в json формат
  .then(data => { // обрабатываем полученные данные
    var colors = generateRandomColors(data.length);
    var myChart3 = new Chart(ctx3, {
      type: 'doughnut',
      data: {
        labels: data.map((idx)=>{
            return idx.city;
        }),
        datasets: [{
          label: 'Количиство',
          data: data.map((idx) => {
            return idx.count;
        }),
          backgroundColor: colors
        }],
      },
      options: {
        borderWidth:2,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
   /*  console.log(data); */ // выводим данные в консоль
  })
  .catch(error => {
    console.error('Ошибка:', error);
  });
