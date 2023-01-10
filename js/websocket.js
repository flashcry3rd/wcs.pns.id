var fs = require('fs')
, http = require('http')
, socketio = require('socket.io')
, com = require("serialport");

var WebSocketServer = require('websocket').server;

// create the server
var wsServer = new WebSocketServer({
httpServer: http.createServer().listen(1337)
});

var serialPort = new com.SerialPort("COM3", {
baudrate: 9600,
dataBits: 7,
parity: 'none',
stopBits: 1,
parser: com.parsers.readline('\r\n')
});

wsServer.on('request', function(request) {

var connection = request.accept(null, request.origin);
serialPort.on('data', function(data) {
        console.log('Received Message: ' + data);
        fs.writeFile("data.txt", data, function(err) {
            if(err) {
                return console.log(err);
            }
        });
        connection.sendUTF(data);
        
});
});
// var net = require('net');

// var server = net.createServer();
// var host = '127.0.0.1';
// var port = 1337;

// server.on('listening', function() {
//     console.log('listening on '+host+':'+port);
// });

// server.on('connection', function(socket) {
//     socket.on('data', function(buf) {
//         console.log('received',buf.toString('utf8'));
//     });
// });

// server.listen(port, host);