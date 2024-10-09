<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<!-- Style -->
<style type="text/css">
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 480px;
        max-width: 480px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #ebebeb;
        margin: 10px auto;
        text-align: center;
        width: 100%;
        max-width: 500px;
    }

    .highcharts-data-table caption {
        padding: 1em 0;
        font-size: 1.2em;
        color: #555;
    }

    .highcharts-data-table th {
        font-weight: 600;
        padding: 0.5em;
    }

    .highcharts-data-table td,
    .highcharts-data-table th,
    .highcharts-data-table caption {
        padding: 0.5em;
    }

    .highcharts-data-table thead tr,
    .highcharts-data-table tr:nth-child(even) {
        background: #f8f8f8;
    }

    .highcharts-data-table tr:hover {
        background: #f1f7ff;
    }

    .highcharts-description {
        margin: 0.3rem 10px;
    }

    .label-box {
        border: 1px solid white;
        display: flex;
        min-height: 30px;
        min-width: 30px;
        width: 100%;
        text-align: center;

    }

    .label-text {
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
                        <li class="breadcrumb-item"><a href="<?= base_url('performance_management/dashboard') ?>">PERFORMANCE MANAGEMENT</a></li>
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
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Medical_checkup') ?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Medical_checkup/mcu_record') ?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn btn-flat active" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Medical_checkup/mcu_perf') ?>">MCU PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">

                <!--MCU PERFORMANCE-->

                <?php
                $t_btn_w = 'secondary';
                $t_btn_m = 'secondary';
                $t_btn_y = 'secondary';
                $type_report = isset($_GET['report']) ? $_GET['report'] : 'weekly';
                if ($type_report == 'weekly') {
                    $t_btn_w = 'warning';
                } else if ($type_report == 'monthly') {
                    $t_btn_m = 'warning';
                } else if ($type_report == 'yearly') {
                    $t_btn_y = 'warning';
                }
                ?>
                <!-- form -->
                <form class="form-horizontal" method="get">
                    <!--card body-->
                    <div class="card-body" style="background-color: #77a0e6;">
                        <div class="form-group row mb-2 col-12">
                            <div class="col-12">
                                <button class="btn btn-<?= $t_btn_w; ?> col-sm-2 mr-2" name="report" value="weekly">Daily/Weekly</button>
                                <button class="btn btn-<?= $t_btn_m; ?> col-sm-2 mr-2" name="report" value="monthly">Monthly</button>
                                <button class="btn btn-<?= $t_btn_y; ?> col-sm-2 mr-2" name="report" value="yearly">Yearly</button>
                            </div>
                        </div>
                        <br>
                    </div>

                    <div class="card col-12" style="background-color: #83A2B4;">
                        <div class="row">
                            <?php
                            if ($type_report == 'weekly') { ?>
                                <div id="weeklyreportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                </div>
                                <div class="row mt-12">
                                    <div class="col-lg-6 my-auto float-left">
                                        123
                                    </div>
                                    <div class="col-lg-6 my-auto float-left">

                                    </div>
                                </div>
                            <?php } else if ($type_report == 'monthly') { ?>
                                <div class="row g-3">
                                    <div class="col-auto">
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option value="1">2024</option>
                                            <option value="2">2023</option>
                                            <option value="3">2022</option>
                                        </select>
                                    </div>
                                    <div class="col-auto">
                                        <select class="form-select form-control" aria-label="Default select example">
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                        </select>
                                    </div>

                                </div>

                            <?php } else if ($type_report == 'yearly') { ?>


                            <?php } ?>


                        </div>
                    </div>
                </form>
                </br>
                </br>
                <div class="hidden">
                    <!-- form -->
                    <form class="form-horizontal" method="get">
                        <!--card body-->
                        <div class="card-body" style="background-color: #77a0e6;">

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
                                        <!-- <h5 class="text-center pb-4"><b>STATUS OF HEALTH</b></h5> -->
                                        <div class="row mt-3">
                                            <figure class="highcharts-figure">
                                                <div id="weekly_3"></div>
                                                <p class="highcharts-description">
                                                </p>
                                            </figure>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button> -->

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
    <p id="ArrName"><?= $dimNameArray; ?></p>
</div>
<!-- <input type="hidden" id="ArrName" value="<?= $dimNameArray; ?>">
<input type="hidden" id="ArrValue" value="<?= $dimValueArray; ?>"> -->

<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
    Highcharts.chart('weekly_3', {
        chart: {
            type: 'pie',
            custom: {},
            events: {
                render() {
                    const chart = this,
                        series = chart.series[0];
                    let customLabel = chart.options.chart.custom.label;

                    if (!customLabel) {
                        customLabel = chart.options.chart.custom.label =
                            chart.renderer.label(
                                '<div class="text-right" style="float:right;">FIT WITH NOTE : 9 </br>' +
                                'UNFIT         : 11 </br>' +
                                'FIT FOR WORK  : 4 </br>' +
                                '<strong>TOTAL         : 24 </strong><div>'
                            )
                            .css({
                                color: '#000',
                                textAnchor: 'middle'
                            })
                            .add();
                    }

                    const x = series.center[0] + chart.plotLeft,
                        y = series.center[1] + chart.plotTop -
                        (customLabel.attr('height') / 2);

                    customLabel.attr({
                        x,
                        y
                    });
                    // Set font size based on chart diameter
                    customLabel.css({
                        fontSize: `${series.center[2] / 20}px`
                    });
                }
            }
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        title: {
            text: 'MCU Medical'
        },
        subtitle: {},
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.0f}%</b>'
        },
        legend: {
            enabled: true
        },
        plotOptions: {
            series: {
                allowPointSelect: true,
                cursor: 'pointer',
                borderRadius: 8,
                dataLabels: [{
                    enabled: true,
                    distance: 20,
                    format: '{point.name}'
                }, {
                    enabled: true,
                    distance: -15,
                    format: '{point.percentage:.0f}%',
                    style: {
                        fontSize: '0.9em'
                    }
                }],
                showInLegend: true
            }
        },
        series: [{
            name: 'Registrations',
            colorByPoint: true,
            innerSize: '70%',
            data: [{
                name: 'FIT WITH NOTE ',
                y: 50
            }, {
                name: 'UNFIT',
                y: 44
            }, {
                name: 'FIT FOR WORK',
                y: 16
            }]
        }]
    });

    $(function() {

        // var start = moment().subtract(29, 'days');
        var start = moment();
        var end = moment();

        function cb(start, end) {
            $('#weeklyreportrange span').html(start.format('D, MMMM YYYY') + ' - ' + end.format('D, MMMM YYYY'));
            // console.log(start.format('YYYY-MM-DD'));
            // console.log(end.format('YYYY-MM-DD'));
            <?php
            $start = isset($_GET['start']) ? $_GET['start'] : '';
            $end = isset($_GET['end']) ? $_GET['end'] : '';
            ?>
            // let typeas = `<?= $type_report; ?>`;
            // let start1 = `<?= $start; ?>`;
            // let end1 = `<?= $end; ?>`;
            // let url1 = '?report=' + typeas + '&start=' + start.format('YYYY-MM-DD') + '&end=' + end.format('YYYY-MM-DD');
            // let url2 = '?report=' + typeas + '&start=' + start1 + '&end=' + end1;
            // console.log(url1);
            // // console.log($(location).attr("href"));
            // if (url1 == url2) {} else {
            // window.location.replace(url1);
            // }
        }

        $('#weeklyreportrange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        }, cb);

        cb(start, end);

    });
</script>
<!-- SCRIPT -->
<script type="text/javascript">
    // //Doughnut Chart
    var fwn = Number('<?= COUNT($fwn) ?>');
    var unfit = Number('<?= COUNT($unfit) ?>');
    var ffw = Number('<?= COUNT($ffw) ?>');
    var total = Number(fwn) + Number(unfit) + Number(ffw);
    var percentfwn = parseFloat((fwn / total) * 100).toFixed(2);
    var percentunfit = parseFloat((unfit / total) * 100).toFixed(2);
    var percentffw = parseFloat((ffw / total) * 100).toFixed(2);
    $('#unfit').html(unfit + ' ( ' + percentunfit + '% )');
    $('#fwn').html(fwn + ' ( ' + percentfwn + '% )');
    $('#ffw').html(ffw + ' ( ' + percentffw + '% )');
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
        labels: [],
        datasets: [{
                label: " ",
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: []
            },
            {
                label: " ",
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: []
            },
            {
                label: " ",
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: []
            },
            {
                label: " ",
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: []
            },
            {
                label: " ",
                backgroundColor: 'rgba(60,141,188,0.9)',
                borderColor: 'rgba(60,141,188,0.8)',
                pointRadius: false,
                pointColor: '#3b8bba',
                pointStrokeColor: 'rgba(60,141,188,1)',
                pointHighlightFill: '#fff',
                pointHighlightStroke: 'rgba(60,141,188,1)',
                data: []
            },
        ]
    };

    var barChartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        datasetFill: false,
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
            var old = parseInt(formatTypeTime('Y')) - parseInt(4);
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
                    for (var h = 0; h < 5; h++) {
                        if (c[h] === undefined) {
                            data.datasets[h].data.push(0);
                        } else {
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