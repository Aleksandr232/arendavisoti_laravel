const pusher = new Pusher('PUSHER_APP_KEY', {
    cluster: 'PUSHER_APP_CLUSTER',
    encrypted: true
});

// Подписываемся на канал "chat"
const channel = pusher.subscribe('chat');

// Слушаем событие "ChatMessageSent"
channel.bind('ChatMessage', function(data) {
    // Отобразить новое сообщение в интерфейсе
    const message = data.message;
    const username = data.username;

    // Ваш код для отображения нового сообщения
});

// Обработчик отправки сообщения
const form = document.getElementById('chat-form');
const messageInput = document.getElementById('message-input');

form.addEventListener('submit', function(event) {
    event.preventDefault();

    const message = messageInput.value;
    const url = '/chat';

    // Запрос на сервер для отправки сообщения
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Исправьте на правильный токен CSRF
        },
        body: JSON.stringify({
            message: message
        })
    })
    .then(function(response) {
        if (response.ok) {
            // Сообщение успешно отправлено
            messageInput.value = '';
        } else {
            // Обработка ошибок при отправке
        }
    })
    .catch(function(error) {
        console.error('Error:', error);
    });
});
