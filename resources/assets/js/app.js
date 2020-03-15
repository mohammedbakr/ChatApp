require('./bootstrap');

import Echo from "laravel-echo"

window.io = require('socket.io-client');

window.Echo = new Echo({

    broadcaster: 'socket.io',
    host: window.location.hostname + ':6001'

});

let onlineUsersLength = 0;

window.Echo.join(`online`)

    .here((users) => {

        onlineUsersLength = users.length;

        if(onlineUsersLength > 1){

            $('#no-online-users').css('display', 'none');

        }

        let userId = $('meta[name=user-id]').attr('content');

        
        users.forEach((user) => {

            if(user.id == userId){

                return;

            }// end of if

            $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><i class="fa fa-circle text-success"></i> ${user.name}</li>`);

        });// end of for each

    })
    .joining((user) => {

        //counter for users
        onlineUsersLength++;

        $('#no-online-users').css('display', 'none');

        $('#online-users').append(`<li id="user-${user.id}" class="list-group-item"><i class="fa fa-circle text-success"></i> ${user.name}</li>`);

    })
    .leaving((user) => {

        //counter for users
        onlineUsersLength--;

        if(onlineUsersLength == 1){

            $('#no-online-users').css('display', 'block');

        }

        $('#user-' + user.id).remove();

    });
