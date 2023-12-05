function toggleAdvertising(event) {
    event.preventDefault();

    fetch('/status-string')
        .then(response => response.json())
        .then(data => {
            const advertisingStatusElement = document.getElementById('advertisingStatus');
            if (data.active.is_active === 1) {
                advertisingStatusElement.innerText = 'Отключить рекламу';
            } else {
                advertisingStatusElement.innerText = 'Включить рекламу';
            }
            console.log(data.active.is_active);
        })
        .catch(error => {
            // Обработка ошибки
            console.error(error);
        });
}
