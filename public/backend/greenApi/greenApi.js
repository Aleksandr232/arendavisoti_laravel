async function getMessages() {
    const limit = 10; // максимальное количество сообщений для получения
    const offset = 0; // начальный индекс сообщений для получения
    const apiTokenInstance = "50f056e043344dad929b2ee9d61d011cf40c530779fd42a1ba"; // токен авторизации для запроса
    const idInstance = '1101819093'

    try {
      const response = await fetch(`https://api.green-api.com/waInstance${idInstance}/lastIncomingMessages/${apiTokenInstance}`);
      const data = await response.json();
      console.log(data); // вывести список сообщений в консоль
    } catch (error) {
      console.error(error);
    }
  }

  // вызов функции для получения списка сообщений
  getMessages();
