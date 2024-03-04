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

  const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'];

  fetch('/contactspost')
    .then(response => response.json())
    .then(data => {
      var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: data.map(obj => months[obj.month-1] + ' ' + obj.year), // Добавляем год к месяцу
          datasets: [{
            label: 'Количество контактов', // Метка для данных о количестве контактов
            data: data.map(obj => obj.total) // Массив с данными о количестве контактов для каждого месяца
          }],
        },

        options: {
          borderWidth: 2,
          indexAxis: 'x', // Изменяем направление оси абсцисс на горизонтальное
          scales: {
            x: {
              beginAtZero: true,
              title: {
                display: true,
                /* text: 'Количество клиентов' */ // Заголовок оси абсцисс
              }
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
fetch('/visit')
.then(response => response.json())
.then(data => {
  var colors = generateRandomColors(data.length); // генерируем случайные цвета для каждого сектора
  var myChart3 = new Chart(ctx3, {
    type: 'doughnut',
    data: {
      labels: data.map((idx) => {
        return idx.city;
      }),
      datasets: [{
        label: 'Количество',
        data: data.map((idx) => {
          return idx.count;
        }),
        backgroundColor: colors // задаем сгенерированные цвета для секторов графика
      }],
    },
    options: {
      borderWidth: 2,
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
});

function generateRandomColors(count) {
  var colors = [];
  for (var i = 0; i < count; i++) {
    var color = 'rgb(' + getRandomNumber(256) + ',' + getRandomNumber(256) + ',' + getRandomNumber(256) + ')';
    colors.push(color);
  }
  return colors;
}

function getRandomNumber(max) {
  return Math.floor(Math.random() * max);
}

var ctx4 = document.getElementById('myChart4').getContext('2d');
fetch('/month-visit')
.then(response => response.json())
.then(data => {
  var labels = data.map((idx) => {
    return idx.month;
  });
  var counts = data.map((idx) => {
    return idx.count;
  });
  var counts_tg = data.map((idx) => {
    return idx.count_tg;
  });



  var myChart1 = new Chart(ctx4, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [
        {
          label: 'Посетителей сайта',
          data: counts,
          fill: true,
          borderColor: 'rgb(75, 192, 192)',
          tension: 0.1
        },
        {
          label: 'Посетителей бота',
          data: counts_tg,
          fill: true,
          borderColor: 'rgb(75, 192, 292)',
          tension: 0.1
        }
      ],
    },
    options: {
      borderWidth: 2,
      scales: {
        x: {
	      beginAtZero: true,
        },
        y: {
          beginAtZero: true // Начинать отображение оси y с нуля
        }
      }
    }
  });

})
.catch(error => {
  console.error('Ошибка:', error);
});

