const http =  require("http")

let url_online = 'http://localhost/wcs.pns.id/home/check2'
let url_data = 'http://localhost/wcs.pns.id/home/sync2'

async function SyncData(){
    http.get(url_online, res => {
        console.log(res.statusCode);
        statusCode = res.statusCode;
        if(statusCode == 200){
            console.log('Online');
            http.get(url_data, res_data => {
                if(res_data.statusCode == 200){
                    console.log('Berhasil sync data');
                }else{
                    console.log('Gagal sync data');
                }
                // res_data.on('data', chunk => {
                //     rawData += chunk
                // })

                // res_data.on('end', () => {
                // const parsedData = JSON.parse(rawData)
                // console.log(parsedData)
                // })
            }).on("error", (err) => {
                console.log("Error: " + err.message);
              });
        }else{
            console.log('Offline');
        }
    
    })
}
setInterval(SyncData, 20000);