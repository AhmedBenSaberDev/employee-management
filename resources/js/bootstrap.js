window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.baseURL = 'http://ahmed91.sites.3wa.io/Employee-management/public';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

import Echo from 'laravel-echo';

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    host: 'http://ahmed91.sites.3wa.io/Employee-management/public',
    forceTLS: true
});

// TASKS
let userId = $('#user_id').val();

window.Echo.private('App.Models.User.' + userId)
    .notification((notification) => {
         console.log(notification)
        document.querySelector('#notif-count').innerHTML =  parseInt(document.querySelector('#notif-count').innerHTML) +1

        let notifMenu = document.querySelector('#notification-menu');
        let liEl = document.createElement('li');
        let aEl = document.createElement('a');
        let iEl = document.createElement('i');

        iEl.setAttribute('class','fa fa-user text-primary');

        aEl.setAttribute('href','/task/view');
        aEl.appendChild(iEl);
        aEl.innerHTML = aEl.innerHTML + notification.from;
        
        liEl.appendChild(aEl);
        notifMenu.appendChild(liEl);
        
        // Notification box
        let notificationBox = document.querySelector('#notification-box');
        let noNotificationBox = document.querySelector('#no-notification-box');

        // First div
        let firstDiv = document.createElement('div');
        firstDiv.setAttribute('class','my-5 offset-lg-2 col-md-8 col-12');
        
        // First div

        // Second div
        let secondDiv = document.createElement('div');
        secondDiv.setAttribute('class','box');
        
        // Second div

        // Third div
        let thirdDiv = document.createElement('div');
        thirdDiv.setAttribute('class','box-header');
        
        // Third div

        // h4
        let title = document.createElement('h4');
        title.setAttribute('class','box-title');
        title.innerHTML = notification.from;
        
        // h4

        // Fourth div
        let fourthDiv = document.createElement('div');
        fourthDiv.setAttribute('class','box-controls pull-right');
        
        // Fourth div

        // ancer link
        let link = document.createElement('a');
        link.setAttribute('class','btn btn-info');
        link.innerHTML = "Mark As Read";
        link.setAttribute('href',"/task/read/" + notification.id);
        
        // ancer link
        
        // fifth div
        let fifthDiv = document.createElement('div');
        fifthDiv.setAttribute('class','box-body');
        
        // fifth div

        // Para
        let para = document.createElement('p');
        para.innerHTML = notification.content;
        
        // Para

        fourthDiv.appendChild(link);
        firstDiv.appendChild(secondDiv);
        fifthDiv.appendChild(para);
        secondDiv.appendChild(thirdDiv);
        secondDiv.appendChild(fifthDiv);
        thirdDiv.appendChild(title);
        thirdDiv.appendChild(fourthDiv);

        noNotificationBox.style.display = "none";
        notificationBox.appendChild(firstDiv);
        
});

// CHAT MESSAGES
$( document ).ready(function() {

    $('#submit-chat-message').on('click',function(){

        const message = $('#chat-message'); 
        axios.post('/chat/store',{message:message.val()})
    })
    });

window.Echo.channel('chat').listen('.chat-message',(event)  => {

    let userName = $('#userName').val();

    if(event.message !== null)
    {
        if( event.nickname != userName)
        {
            $('#chat-app').append(`

         <div style="margin-left:0;" class="direct-chat-text">
         <span class="direct-chat-name">${event.nickname}</span>
             <p>${event.message}</p>
             <p class="direct-chat-timestamp"><time datetime="2018">23:58</time></p>
         </div>                                   
                                    
         `)
        }
        else{

            $('#chat-app').append(`
            <div class="direct-chat-msg right mb-30">
                <div class="clearfix mb-15">
                    <span class="direct-chat-name pull-right">You</span>
                </div>
                <div class="direct-chat-text">
                    <p>${event.message}</p>
                    <p class="direct-chat-timestamp"><time datetime="2018">00:06</time></p>
                </div>
                
            </div>
            `)
        }
    
        $('#chat-message').val('')
    }

})



console.log(userId)
window.Echo.channel('task'.userId).listen('.task-message',(event)  => {

   console.log("testt".event.message)

})
window.Echo.channel('task').listen('.task-message',(event)  => {

   console.log("testt".event)

})