ymaps.ready(init);

function init() {
  // Создание карты
  var map = new ymaps.Map("map", {
    center: [85.76, 37.64],
    zoom: 13
  });

  // Определение местоположения пользователей
  fetch('https://xn--80aagge2ckkol0hd.xn--p1ai/apilogist')
    .then(response => {
      if (!response.ok) {
        throw new Error('Ошибка HTTP: ' + response.status);
      }
      return response.json();
    })
    .then(data => {
      data.forEach(location => {
        var userCoordinates = location.coordinates;
        var userStatus = location.status;
        if(userStatus === 'еду на склад'){
            userStatus = 'едит на склад';
        }else if(userStatus === 'в пути'){
            userStatus = 'в пути';
        }else if(userStatus === 'на месте'){
            userStatus = 'приехал на точку доставки';
        }else if (userStatus === null){
            userStatus = ' не отправил статус';
        }

        var username = location.username;

        var userMarker = new ymaps.Placemark(userCoordinates, { balloonContent: `${username} ` + userStatus }, {
            preset: 'islands#redIcon'
          });
          map.geoObjects.add(userMarker);

      });

      // Центрирование карты по первому местоположению пользователя
      map.setCenter(data[0].coordinates, 13);
    })
    .catch(error => {
      console.error('Произошла ошибка:', error);
    });
}


