/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import Echo from 'laravel-echo'
window.io = require('socket.io-client');

window.Echo = new Echo({
  broadcaster: 'socket.io',
  host: window.location.hostname + ':6001'
})

window.Echo.channel('test-event')
  .listen('DealersUpdatedEvent', function (e) {
    console.log('DDDDD DealersUpdatedEvent', e)
  })
  
$(document).ready(function() {

    $("#dealers-table").dataTable({
        "pageLength": 25
      });

      $('.summernote-field').summernote({
        height:300,
      });

});