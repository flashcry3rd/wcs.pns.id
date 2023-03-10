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
var stream8 = 0;
var stream9 = 0;
var stream10 = 0;
var stream11 = 0;
var stream12 = 0;
var stream13 = 0;
var stream14 = 0;
var stream15 = 0;
var err1 = null;
var err2 = null;
var err3 = null;
var err4 = null;
var err5 = null;
var err6 = null;
var err7 = null;
var err8 = null;
var err9 = null;
var err10 = null;
var err11 = null;
var err12 = null;
var err13 = null;
var err14 = null;
var err15 = null;
var comport1 = null;
var comport2 = null;
var comport3 = null;
var comport4 = null;
var comport5 = null;
var comport6 = null;
var comport7 = null;
var comport8 = null;
var comport9 = null;
var comport10 = null;
var comport11 = null;
var comport12 = null;
var comport13 = null;
var comport14 = null;
var comport15 = null;

const { ReadlineParser } = require('@serialport/parser-readline')

const SerialPort1 = require('serialport').SerialPort,
      port1 = new SerialPort1({path: "COM1", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err1 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort2 = require('serialport').SerialPort,
      port2 = new SerialPort2({path: "COM2", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err2 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort3 = require('serialport').SerialPort,
      port3 = new SerialPort3({path: "COM3", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err3 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort4 = require('serialport').SerialPort,
      port4 = new SerialPort4({path: "COM4", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err4 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort5 = require('serialport').SerialPort,
      port5 = new SerialPort5({path: "COM5", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err5 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort6 = require('serialport').SerialPort,
      port6 = new SerialPort6({path: "COM6", baudRate: 9600,  dataBits: 8, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err6 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort7 = require('serialport').SerialPort,
      port7 = new SerialPort7({path: "COM7", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err7 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort8 = require('serialport').SerialPort,
      port8 = new SerialPort8({path: "COM8", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err8 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort9 = require('serialport').SerialPort,
      port9 = new SerialPort9({path: "COM9", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err9 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort10 = require('serialport').SerialPort,
      port10 = new SerialPort10({path: "COM10", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err10 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort11 = require('serialport').SerialPort,
      port11 = new SerialPort11({path: "COM11", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err11 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort12 = require('serialport').SerialPort,
      port12 = new SerialPort12({path: "COM12", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err12 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort13 = require('serialport').SerialPort,
      port13 = new SerialPort13({path: "COM13", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err13 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort14 = require('serialport').SerialPort,
      port14 = new SerialPort14({path: "COM14", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err14 = err.message;
        // return
    }
}).setEncoding('utf8');

const SerialPort15 = require('serialport').SerialPort,
      port15 = new SerialPort15({path: "COM15", baudRate: 9600,  dataBits: 7, stopBits: 1, bufferSize: '16777216'}, err => {
    if(err != null) {
        console.log(err)
        err15 = err.message;
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
const parser8 = port8.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser9 = port9.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser10 = port10.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser11 = port11.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser12 = port12.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser13 = port13.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser14 = port14.pipe(new ReadlineParser({ delimiter: '\r\n' }))
const parser15 = port15.pipe(new ReadlineParser({ delimiter: '\r\n' }))
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
            comport1 = "COM1"
        })
    }else{
        stream1 = err1;
        comport1 = "NO DATA";
    }
    if(err2 == null){
        parser2.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream2 = data
            comport2 = "COM2"
        })
    }else{
        stream2 = err2;
        comport2 = "NO DATA";
    }
    if(err3 == null){
        parser3.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream3 = data
            comport3 = "COM3"
        })
    }else{
        stream3 = err3;
        comport3 = "NO DATA";
    }
    if(err4 == null){
        parser4.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream4 = data
            comport4 = "COM4"
        })
    }else{
        stream4 = err4;
        comport4 = "NO DATA";
    }
    if(err5 == null){
        parser5.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream5 = data
            comport5 = "COM5"
        })
    }else{
        stream5 = err5;
        comport5 = "NO DATA";
    }
    if(err6 == null){
        parser6.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream6 = data
            comport6 = "COM6"
        })
    }else{
        stream6 = err6;
        comport6 = "NO DATA";
    }

    if(err7 == null){
        parser7.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream7 = data
            comport7 = "COM7"
        })
    }else{
        stream7 = err7;
        comport7 = "NO DATA"
    }

    if(err8 == null){
        parser8.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream8 = data
            comport8 = "COM8"
        })
    }else{
        stream8 = err8;
        comport8 = "NO DATA";
    }

    if(err9 == null){
        parser9.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream9 = data
            comport9 = "COM9"
        })
    }else{
        stream9 = err9;
        comport9 = "NO DATA";
    }

    if(err10 == null){
        parser10.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream10 = data
            comport10 = "COM10"
        })
    }else{
        stream10 = err10;
        comport10 = "NO DATA";
    }

    if(err11 == null){
        parser11.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream11 = data
            comport11 = "COM11"
        })
    }else{
        stream11 = err11;
        comport11 = "NO DATA";
    }

    if(err12 == null){
        parser12.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream12 = data
            comport12 = "COM12"
        })
    }else{
        stream12 = err12;
        comport12 = "NO DATA";
    }

    if(err13 == null){
        parser13.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream13 = data
            comport13 = "COM13"
        })
    }else{
        stream13 = err13;
        comport13 = "NO DATA"
    }

    if(err14 == null){
        parser14.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream14 = data
            comport14 = "COM14"
        })
    }else{
        stream14 = err14;
        comport14 = "NO DATA";
    }

    if(err15 == null){
        parser15.on('data', data => {
            data = JSON.stringify(data)
            data = JSON.parse(data)
            stream15 = data
            comport15 = "COM15"
        })
    }else{
        stream15 = err15;
        comport15 = "NO DATA";
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
            data8: stream8,
            data9: stream9,
            data10: stream10,
            data11: stream11,
            data12: stream12,
            data13: stream13,
            data14: stream14,
            data15: stream15,
        },
        data_post: req.body,
        
    }
    // console.log(data_send);
    res.json(data_send)
})