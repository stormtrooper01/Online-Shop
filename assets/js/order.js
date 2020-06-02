if (document.forms[0] && window.FormData) {
    let message = new Object();
    message.loading = 'Loading...';
    message.success = 'Thank you! Everything is ok';
    message.failure = 'Ooops! Something went wrong...';
    let form = document.forms[0];
    let statusMessage = document.createElement('div');
    statusMessage.className = 'status';
    
    let request = new XMLHttpRequest();
    request.open('POST', url, true);
    request.setRequestHeader('accept', 'application/json');
    
    form.addEventListener('submit', function (event) {
        event.preventDefault();
        form.appendChild(statusMessage);
        
        let formData = new FormData(form);
        
        request.send(formData);
        
        request.onreadystatechange = function () {
            
            if (request.readyState < 4) statusMessage.innerHTML = message.loading;
          
            else if (request.readyState === 4) {
              
                if (request.status == 200 && request.status < 300) statusMessage.innerHTML = message.success;
                else form.insertAdjacentHTML('beforeend', message.failure);
            }
        }
    });
}
