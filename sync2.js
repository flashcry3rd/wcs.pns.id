const axios = require("axios");

let url_online = 'http://localhost/wcs.pns.id/home/check2'
let url_data = 'http://localhost/wcs.pns.id/home/sync2'

// For todays date;
Date.prototype.today = function () { 
    return ((this.getDate() < 10)?"0":"") + this.getDate() +"/"+(((this.getMonth()+1) < 10)?"0":"") + (this.getMonth()+1) +"/"+ this.getFullYear();
}

// For the time now
Date.prototype.timeNow = function () {
     return ((this.getHours() < 10)?"0":"") + this.getHours() +":"+ ((this.getMinutes() < 10)?"0":"") + this.getMinutes() +":"+ ((this.getSeconds() < 10)?"0":"") + this.getSeconds();
}

const getData = async () => {
	try {
	    const ress = await axios.get(url_data).then((response) => {
            // console.log(response);
            var newDate = new Date();
            var sync = "Success Sync: " + newDate.today() + " @ " + newDate.timeNow();
            console.log(sync);
            SyncData();
        });
	} catch (error) {
        var newDate = new Date();
        var sync = "Failed Sync: " + newDate.today() + " @ " + newDate.timeNow();
        console.log(sync);
	    // console.log(error);
        SyncData();
	}
};

const SyncData = async () => {
    try {
        const res = await axios.get(url_online).then((response) => {
            // console.log(response);
            var newDate = new Date();
            var online = "Online: " + newDate.today() + " @ " + newDate.timeNow();
            console.log(online);
            getData();
        });
    } catch (error) {
        var newDate = new Date();
        var online = "Offline: " + newDate.today() + " @ " + newDate.timeNow();
        console.log(online);
        // console.log(error);
        SyncData();
    }

}
// setInterval(SyncData, 20000);
SyncData();