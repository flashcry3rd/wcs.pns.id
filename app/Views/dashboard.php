<style> 
  .garis_panjang {
    border-bottom: solid 0.8px;
    border-color: grey;
  
  }
</style>
<div class="row mt-4" >

<div class="col-xl-4" >
  <div class="card" >
    <div class="card-body">
      <h4 >Filter Data</h4>
      <div class="row">
        <form id="filter">
          <div class="col-md-6">
            <div class="form-group mt-3">
              <input type="radio" name="tipe_data" id="tipe1" value="all" checked>
              <label>All Data</label>
            </div>
            <div class="form-group">
              <input type="radio" name="tipe_data" id="tipe2" value="truck">
              <label>Data Truck</label>
            </div>
          </div>
          <div class="col-md-6" >
            <div class="form-group mt-3">
              <input type="radio" name="tipe_data" id="tipe3" value="barge">
              <label>Data Barge</label>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

</div>

<div class="garis_panjang mt-4" ></div>
<div class="row mt-4" >
  <div class="col-xl-12">
    <h4>DASHBOARD DATA</h4>
  </div>
</div>
<div class="row mt-4">
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Kemaren</p>
              <h5 class="font-weight-bolder mb-0">
                <a id="timbang_kemaren"><?= $timbang1 ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Hari ini</p>
              <h5 class="font-weight-bolder mb-0">
                <a id="timbang_hariini" ><?= $timbang2 ?></a>
                
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Todate</p>
              <h5 class="font-weight-bolder mb-0">
                <a id="timbang_all"><?= $timbangAll ?></a>
                <span class="text-danger text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<div class="row mt-4">

  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Per Jam </p>
              <div class="col-md-12">

              <div class="row">
              <div class="col-sm-8" >
                <input type="time" id="jam" name="jam" class="form-control" timeformat="24h" value="<?= date("H").":00" ?>">
              </div>
              </div>
              </div>
              <div class="row mt-3">
              </div>
              <!-- <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= date("H").":00 s/d ".date("H").":59" ?> )</p> -->
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_perjam" ><?= $timbangHour?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-air-baloon text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Batas Jam Todate </p>
              <div class="col-md-12">

              <div class="row">
              <div class="col-sm-8" >
                <input type="time" id="jam_2" name="jam_2" class="form-control" timeformat="24h" value="<?= date("H").":00" ?>">
              </div>
              </div>
              </div>
              <div class="row mt-3">
              </div>
              <!-- <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= date("H").":00 s/d ".date("H").":59" ?> )</p> -->
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_perjam_2" ><?= $timbangHour_2?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-air-baloon text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<div class="row mt-4">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
              <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Week 1</p>
              <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= $whereMinggu1 ?> )</p>
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_week1"><?= $timbangMinggu1  ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Week 2</p>
              <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= $whereMinggu2 ?> )</p>
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_week2" ><?= $timbangMinggu2  ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Week 3</p>
              <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= $whereMinggu3 ?> )</p>
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_week3" ><?= $timbangMinggu3  ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Week 4</p>
              <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= $whereMinggu4 ?> )</p>
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_week4"><?= $timbangMinggu4  ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>
<div class="row mt-4">
  <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
      <div class="card-body p-3">
        <div class="row">
          <div class="col-8">
            <div class="numbers">
            <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Timbang Week 5</p>
              <p class="text-sm mb-0 text-capitalize font-weight-bold">( <?= $whereMinggu5 ?> )</p>
              <div class="garis_panjang"></div>
              <h5 class="font-weight-bolder mb-0" style="padding: 2%;">
                <a id="timbang_week5"><?= $timbangMinggu5  ?></a>
                <span class="text-success text-sm font-weight-bolder"></span>
              </h5>
            </div>
          </div>
          <div class="col-4 text-end">
            <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
              <i class="ni ni-notification-70 text-lg opacity-10" aria-hidden="true"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="./assets/js/plugins/chartjs.min.js"></script>
<script type="text/javascript">
    $("#filter input[type=radio]").click(function(){
      var tipe = $(this).val();
      $.ajax({
        data: {tipe: tipe},
        cache: false,
        type: "post",
        dataType: "json",
        url: "<?= base_url()?>/home/filterDashboard",
        success: function(data){
          $("#timbang_kemaren").html(data['timbang1']);
          $("#timbang_hariini").html(data['timbang2']);
          $("#timbang_all").html(data['timbangAll']);
          $("#timbang_perjam").html(data['timbangHour']);
          $("#timbang_perjam_2").html(data['timbangHour_2']);
          $("#jam").val("<?= date("H:00") ?>");
          $("#jam_2").val("<?= date("H:00") ?>");
          $("#timbang_week1").html(data['timbangMinggu1']);
          $("#timbang_week2").html(data['timbangMinggu2']);
          $("#timbang_week3").html(data['timbangMinggu3']);
          $("#timbang_week4").html(data['timbangMinggu4']);
          $("#timbang_week5").html(data['timbangMinggu5']);
        }
      })
    })
    $("#jam").change(function(){
      var jam = $(this).val();
      var tipe = $("#filter input[type=radio]:checked").val();
      $.ajax({
        data: {jam: jam, tipe: tipe},
        cache: false,
        type: "post",
        dataType: "json",
        url: "<?= base_url() ?>/home/timbangPerJam",
        success: function(data){
          $("#timbang_perjam").html(data['timbangHour']);
        }
      })
    })
    $("#jam_2").change(function(){
      var jam = $(this).val();
      var tipe = $("#filter input[type=radio]:checked").val();
      $.ajax({
        data: {jam: jam, tipe: tipe},
        cache: false,
        type: "post",
        dataType: "json",
        url: "<?= base_url() ?>/home/timbangPerJam_2",
        success: function(data){
          $("#timbang_perjam_2").html(data['timbangHour']);
        }
      })
    })
</script>
<script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "#fff",
          data: [450, 200, 100, 220, 500, 100, 400, 230, 500],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 15,
              font: {
                size: 14,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false
            },
            ticks: {
              display: false
            },
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(203,12,159,0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(203,12,159,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.2)');
    gradientStroke2.addColorStop(0.2, 'rgba(72,72,176,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(20,23,39,0)'); //purple colors

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "Mobile apps",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#cb0c9f",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            fill: true,
            data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
            maxBarThickness: 6

          },
          {
            label: "Websites",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#3A416F",
            borderWidth: 3,
            backgroundColor: gradientStroke2,
            fill: true,
            data: [30, 90, 40, 140, 290, 290, 340, 230, 400],
            maxBarThickness: 6
          },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#b2b9bf',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#b2b9bf',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>