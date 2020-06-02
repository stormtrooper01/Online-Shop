if (document.forms[0] && window.FormData) {
    let message = new Object();
    message.loading = 'Loading...';
    message.success = 'Thank you! Everything is ok';
    message.failure = 'Ooops! Something went wrong...';
    let form = document.forms[0];
    let statusMessage = document.createElement('div');
    statusMessage.className = 'status';
    // Настройка AJAX запроса
    let request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('accept', 'application/json');
    // Добавляем обработчик на событие `submit`
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        form.appendChild(statusMessage);
        // Это простой способ подготавливить данные для отправки (все браузеры и IE > 9)
        let formData = new FormData(form);
        // Отправляем данные
        request.send(formData);
        // Функция для наблюдения изменения состояния request.readyState обновления statusMessage соответственно
        request.onreadystatechange = function () {
            // <4 =  ожидаем ответ от сервера
            if (request.readyState < 4) statusMessage.innerHTML = message.loading;
            // 4 = Ответ от сервера полностью загружен
            else if (request.readyState === 4) {
                // 200 - 299 = успешная отправка данных!
                if (request.status == 200 && request.status < 300) statusMessage.innerHTML = message.success;
                else form.insertAdjacentHTML('beforeend', message.failure);
            }
        }
    });
}
