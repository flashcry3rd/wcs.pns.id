const express = require('express')
const app = express()
const bodyParser = require("body-parser");
const cors=require("cors");
const corsOptions ={
   origin:'*', 
   credentials:true,            //access-control-allow-credentials:true
   optionSuccessStatus:200,
}

app.use(cors(corsOptions)) // Use this after the variable declaration
app.use(bodyParser.json());
const port = 3000
app.use(express.static(__dirname))
app.get('/', (req, res) => res.send('Hello World!'))
app.listen(port, () => console.log(`Listening on port ${port}!`))

var stream1 = 0;
var stream2 = 0;
var stream3 = 0;
var stream4 = 0;
var stream5 = 0;
var stream6 = 0;
var stream7 = 0;
var err1 = null;
var err2 = null;
var err3 = null;
var err4 = null;
var err5 = null;
var err6 = null;
var err7 = null;

const { ReadlineParser } = require('@serialport/parser-readline')
const SerialPort6 = require('serialport').SerialPort,
      port6 = new SerialPort6({path: "COM3", baudRate: 9600,  dataBits: 8, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err6 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort7 = require('serialport').SerialPort,
      port7 = new SerialPort7({path: "COM4", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err7 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort1 = require('serialport').SerialPort,
      port1 = new SerialPort1({path: "COM11", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err1 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort2 = require('serialport').SerialPort,
      port2 = new SerialPort2({path: "COM12", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err2 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort3 = require('serialport').SerialPort,
      port3 = new SerialPort3({path: "COM7", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err3 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort4 = require('serialport').SerialPort,
      port4 = new SerialPort4({path: "COM8", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err4 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort5 = require('serialport').SerialPort,
      port5 = new SerialPort5({path: "COM9", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err5 = err.message;
        // return
    }
}).setEncoding('utf8');


// SerialPort.list().then(function (ports) {
//     ports.forEach(function (portz) {
//         console.log("Port: ", portz);
//     })
// });

const parser1 = port1.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser2 = port2.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser3 = port3.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser4 = port4.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser5 = port5.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser6 = port6.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser7 = port7.pipe(new ReadlineParser({ delimiter: '\r\n' }))
// parser.on('data', console.log)

app.get('/data', (req,res) => {
    // portx.setMaxListeners(9000)
    console.log(req.body);
    if(err1 == null){
        parser1.on('data', data => {
            // var enc = new TextDecoder();
            // var arr = new Uint8Array(data);
            // stream = enc.decode(arr)
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream1 = data
        })
    }else{
        stream1 = err1;
    }
    if(err2 == null){
        parser2.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream2 = data
        })
    }else{
        stream2 = err2;
    }
    if(err3 == null){
        parser3.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream3 = data
        })
    }else{
        stream3 = err3;
    }
    if(err4 == null){
        parser4.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream4 = data
        })
    }else{
        stream4 = err4;
    }
    if(err5 == null){
        parser5.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream5 = data
        })
    }else{
        stream5 = err5;
    }
    if(err6 == null){
        parser6.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream6 = data
        })
    }else{
        stream6 = err6;
    }

    if(err7 == null){
        parser7.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream7 = data
        })
    }else{
        stream7 = err7;
    }
    // portx.on('readable', () => {
    //     console.log('Data2:', portx.read());
    // })
    // res.json(stream)
    const data_send = {
        data_weight : {
            data1: stream1,
            data2: stream2,
            data3: stream3,
            data4: stream4,
            data5: stream5,
            data6: stream6,
            data7: stream7,
        },
        data_post: req.body,
    }
    // console.log(data_send);
    res.json(data_send)
})