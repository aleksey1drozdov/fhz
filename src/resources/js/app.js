import './bootstrap';

import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

let chat = document.getElementById("chat");
let textField = document.getElementById("text");
textField.focus();

function addMassage(time, user, message) {
    let msg = "[" + time + "] " + user + ": " + message;
    let el = document.createElement('div');
    el.textContent = msg;
    chat.appendChild(el);
    textField.focus();
}

function sendMessage(text) {
    textField.value = '';
    axios.post('/api/chat/send', {
        message: text,
    })
        .then(function (response) {
            addMassage(
                response.data.data.time,
                response.data.data.user,
                response.data.data.message
            );
        })
        .catch(function (error) {
            console.log(error);
        });
}

let button = document.getElementById("submit");
button.onclick = function () {
    sendMessage(textField.value);
};

textField.onkeyup = function (e) {
    if (e.key === 'Enter') {
        sendMessage(textField.value);
    }
};

axios.get('/api/chat/history')
    .then(function (response) {
        response.data.data.reverse().forEach(function (el) {
            addMassage(
                el.time,
                el.user,
                el.message
            );
        });
    })
    .catch(function (error) {
        console.log(error);
    });

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'chat',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
    authEndpoint: 'broadcasting/auth',
})
    .private('chat')
    // .channel('chat')
    .listen('MessageSent', (e) => {
        addMassage(
            e.time,
            e.userName,
            e.message
        );
    });
