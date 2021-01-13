var express = require('express');
var app = express();
var http = require('http').Server(app);
var redis = require('redis');
var client = redis.createClient("redis://localhost:6379");

var io = require('socket.io')(http)

app.use('/', express.static('www'));

http.listen(3000, function(){
    console.log('listening on *:3000');
});

client.on('message', function(chan, msg) {
    message = JSON.parse(msg);
    channel = message.event;
    data = message.data;

    io.sockets.emit(channel, data);
});

client.subscribe('test-channel');