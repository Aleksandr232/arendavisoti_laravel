const order = document.getElementById('orderapi');

fetch('/orderapi')  // выполняем GET-запрос на сервер
  .then(response => response.json())  // преобразуем полученный ответ в формат JSON
  .then(data => {
    order.innerHTML = '';  // очищаем содержимое элемента orderapi перед добавлением новых данных

    // перебираем полученные данные и добавляем их в элемент orderapi
    data.forEach(item => {
      const orderItem = document.createElement('div');
      orderItem.textContent = `${item.order.length}`;
      order.appendChild(orderItem);
    });
  });


