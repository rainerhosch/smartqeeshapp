<!-- Style -->
<style type="text/css">
.label-box {
  border: 1px solid white;
  display: flex;
  min-height: 30px;
  min-width: 30px;
  width: 100%;
  text-align: center;

}

.label-text{
  font-size: 0.8rem;
}

#chart-wrapper {
    display: inline-block;
    position: relative;
    font-size: 300px;
    width: 100%;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;">PERFORMANCE MANAGEMENT</h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item"><a href="<?=base_url('performance_management/dashboard')?>">PERFORMANCE MANAGEMENT</a></li>
                        <li class="breadcrumb-item text-white">MEDICAL CHECKUP</li>
                        <li class="breadcrumb-item text-white">MCU PERFORMANCE</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="card">
            <!--TAB-->
            <ul class="nav nav-tabs bg-secondary " id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">

                <!--MCU PERFORMANCE-->
                <div>
                    <!-- form -->
                    <form class="form-horizontal" method="get">
                        <!--card body-->
                        <div class="card-body" style="background-color: #77a0e6;">
                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterperiod" name="filterperiod" >
                                    <option value="" selected disabled>Select</option>
                                        <?php

                                        use function PHPSTORM_META\type;

                                        foreach($mcuperiod as $prd):?>
                                            <option value="<?php echo $prd->mcu_period ?>" <?php echo isset($_GET['filterperiod']) && $_GET['filterperiod']==$prd->mcu_period ? 'selected':'';?>><?php echo $prd->mcu_period ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="input" class="col-form-label col-2" style="text-align:right">DISEASE :</label>
                                <div class="col-sm-4">
                                    <select class="form-control" id="filterdisease" name="filterdisease">
                                        <option value="" selected disabled>Select</option>
                                        <?php foreach($disease as $dis):?>
                                            <option value="<?php echo $dis['intidDisease'] ?>"><?php echo $dis['txtNamaDisease'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                                <div class="col-sm-4">
                                    <select class="form-control js-example-basic-single" id="dept" name="dept" placeholder="">
                                    <option value="" selected disabled>Select</option>
                                        <?php foreach($deptlist as $dept):?>
                                        <option value="<?php echo $dept['intIdDepartement'] ?>" <?php echo isset($_GET['dept']) && $_GET['dept']==$dept['intIdDepartement'] ? 'selected':'';?>><?php echo $dept['txtNamaDepartement'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="input" class="col-form-label col-2" style="text-align:right">AGE :</label>
                                <div class="col-sm-4">
                                    <input type="text" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control" id="filterage" name="filterage" maxlength="2">
                                </div>
                            </div>

                            <div class="form-group row mb-2 col-12">
                                <div class="col-6">
                                </div>
                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right" name="search" value="1">SEARCH</button>
                                    <button type="reset" class="btn btn-secondary col-sm-3 float-right mr-2" name="resetVal" value="reset">CLEAR</button>
                                </div>
                            </div>
                            <br>

                            <div class="card col-lg-12" style="background-color: aliceblue;">
                                <div class="row justify-content-md-center m-2">
                                    
                                    <div class="card-body">
                                        <div class="chart">
                                            <canvas id="barChart" style="min-height: 400px; height: 400px; max-height: 400px; max-width: 100%;"></canvas>
                                        </div>
                                    </div>

                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;">
                                        <h5 class="text-center pb-4"><b>NUMBER OF DISEASE FOUND</b></h5>
                                        <canvas class="p-1" id="bar-chart-horizontal" width="auto" height="auto">
                                        </canvas>
                                    </div>

                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;" width="100%">
                                        <h5 class="text-center pb-4"><b>STATUS OF HEALTH</b></h5>
                                        <div class="row mt-3">
                                            <canvas class="col-lg-7" id="doughnut-chart" width="100%" height="70%">
                                            </canvas>
                                            <div class="col-lg-5 my-auto float-left">
                                                <div class="row my-1">
                                                    <div class="col-lg-4 text-center my-auto">
                                                        <span class="label-box" style="background-color: #3e95cd;"></span>
                                                    </div>
                                                    <div class="col-lg-8 label-text">
                                                        <strong>FIT WITH NOTE</strong><br>
                                                        <span id="fwn"><b><?= COUNT($fwn)?></b></span>
                                                    </div>
                                                </div>
                                                <div class="row my-1">
                                                    <div class="col-lg-4 text-center my-auto">
                                                        <span class="label-box" style="background-color: #ff2222;"></span>
                                                    </div>
                                                    <div class="col-lg-8 label-text">
                                                        <strong>UNFIT</strong><br>
                                                        <span id="unfit"><b><?= COUNT($unfit)?></b></span>
                                                    </div>
                                                </div>
                                                <div class="row my-1">
                                                    <div class="col-lg-4 text-center my-auto">
                                                        <span class="label-box" style="background-color: #fa0;"></span>
                                                    </div>
                                                    <div class="col-lg-8 label-text">
                                                        <strong>FIT FOR WORK</strong><br>
                                                        <span id="ffw"><b><?= COUNT($ffw)?></b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button>

                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!--/.form-->
                </div>
                <!--/.MCU PERFORMANCE-->
            </div>
        </div>
    </section>
</div>

<div style="display: none;">
    <p id="ArrName"><?= $dimNameArray;?></p>
</div>
<!-- <input type="hidden" id="ArrName" value="<?= $dimNameArray; ?>">
<input type="hidden" id="ArrValue" value="<?= $dimValueArray; ?>"> -->

<!-- SCRIPT -->
<script type="text/javascript">
// //Doughnut Chart
 var fwn = Number('<?= COUNT($fwn)?>');
 var unfit = Number('<?= COUNT($unfit)?>');
 var ffw   = Number('<?= COUNT($ffw)?>');
 var total = Number(fwn) + Number(unfit) + Number(ffw);
 var percentfwn = parseFloat((fwn/total)*100).toFixed(2);
 var percentunfit = parseFloat((unfit/total)*100).toFixed(2);
 var percentffw = parseFloat((ffw/total)*100).toFixed(2);
 $('#unfit').html(unfit +' ( ' + percentunfit + '% )');
 $('#fwn').html(fwn +' ( ' + percentfwn + '% )');
 $('#ffw').html(ffw +' ( ' + percentffw + '% )');
new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Fit with Note", "Unfit", "Fit for Work"],
        datasets: [{
            label: "Identified",
            backgroundColor: ["#3e95cd", "#ff2222", "#fa0"],
            data: [
                fwn,
                unfit,
                ffw,
            ]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
            display: false,
            position: 'right'
        },
        title: {
            display: false,
            text: 'STATUS OF HEALTH'
        }
    }
});


//Horizontal Chart
new Chart(document.getElementById("bar-chart-horizontal"), {
    type: 'horizontalBar',
    data: {
        labels: <?= $penyakit ?>,
        datasets: [{
            label: "Identified",
            backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
            data: <?= $total ?>
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
            display: false
        },
        title: {
            display: false,
            text: 'Predicted world population (millions) in 2050'
        }
    }
});
    </script>

<script>
    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var data = {
        labels  : [],
        datasets: [
            {
                label               : " ",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : []
            },
            {
                label               : " ",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : []
            },
            {
                label               : " ",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : []
            },
            {
                label               : " ",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : []
            },
            {
                label               : " ",
                backgroundColor     : 'rgba(60,141,188,0.9)',
                borderColor         : 'rgba(60,141,188,0.8)',
                pointRadius          : false,
                pointColor          : '#3b8bba',
                pointStrokeColor    : 'rgba(60,141,188,1)',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data                : []
            },
      ]
    };

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false,
      legend: {
            display: false
        },
    };

    var barChart = new Chart(barChartCanvas, {
      type: 'bar',
      data: data,
      options: barChartOptions
    })

    
    $.ajax({
        url: "<?= base_url('performance_management/Medical_checkup/toprank') ?>",
        type: 'post',
        dataType: 'json',
        success: function(response) {
            var old     = parseInt(formatTypeTime('Y')) - parseInt(4);
            var newYear = parseInt(formatTypeTime('Y'));
            var dataFromDatabase = response;

            // Get the years from the database data
            
            for (var i = old; i <= newYear; i++) {
                var found = false;
                if (response.hasOwnProperty(i)) {
                    found = true;
                }

                data.labels.push(i);
                if (found) {
                    var obj = response[i];
                    var c = Object.keys(obj);
                    var m = Object.values(obj);
                    
                    var labels = [];
                    
                    console.log('for ke' + i)
                    var v = c.length;
                    for(var h=0; h<5; h++){
                        if(c[h] === undefined){
                            data.datasets[h].data.push(0);
                        }else{
                            var k = m[h];
                            console.log('KEY = ' + c[h] + ' VAL = ' + m[h])
                            console.log(data.datasets[h].data.push(m[h]))
                            
                            console.log(data.datasets[h].label = c[h])
                            
                        }
                    }         
                } else {
                    data.datasets[0].data.push(0);
                    data.datasets[1].data.push(0);
                    data.datasets[2].data.push(0);
                    data.datasets[3].data.push(0);
                    data.datasets[4].data.push(0);
                }
                barChart.update();
            }
            
        }       
    })


    function formatTypeTime(type) {
        var today = new Date();
        var year = today.getFullYear();
        var month = String(today.getMonth() + 1).padStart(2, "0");
        var day = String(today.getDate());
        var dayval = String(today.getDate()).padStart(2, "0");
        var hours = String(today.getHours()).padStart(2, "0");
        var minutes = String(today.getMinutes()).padStart(2, "0");
        var seconds = String(today.getSeconds()).padStart(2, "0");

        if (type == "today") {
            return year + '-' + month + '-' + dayval;
        }

        if (type == "Y") {
            return year;
        }

        if (type == "dayNonPad") {
            return day;
        }
        if (type == "H") {
            return hours;
        }
        if (type == "H:i:s") {
            return hours + ":" + minutes + ":" + seconds;
        }
        if (type == "Y-m-d H:i:s") {
            return year + '-' + month + '-' + dayval + ' ' + hours + ':00:00';
        }
    }

</script>