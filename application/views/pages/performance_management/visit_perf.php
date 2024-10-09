<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<style>
    .highcharts-figure,
    .highcharts-data-table table {
        min-width: 100%;
        max-width: 100%;
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
                        <li class="breadcrumb-item text-white">VISIT PERFORMANCE</li>
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
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Internal_clinic') ?>">EMPLOYEE VISIT CLINIC</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Internal_clinic/visit_record') ?>">CLINIC VISIT RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?= base_url('performance_management/Internal_clinic/visit_perf') ?>">CLINIC VISIT PERFORMANCE</a>
                </li>
            </ul>
            <!--/.TAB-->
            <!--TAB CONTENT-->
            <div class="tab-content">

                <!--CLINIC VISIT PERFOMANCE-->

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

                        <div class="card col-12" style="background-color: #83A2B4;">
                            <div class="row">
                                <?php
                                if ($type_report == 'weekly') { ?>
                                    <div id="weeklyreportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
                                        <i class="fa fa-calendar"></i>&nbsp;
                                        <span></span> <i class="fa fa-caret-down"></i>
                                    </div>
                                    <figure class="highcharts-figure">
                                        <div id="weekly_nov"></div>
                                    </figure>
                                    <button class="btn btn-info mr-3 col-3 btn-lg">COST TOTAL : RP. 40.000</button>
                                    <figure class="highcharts-figure">
                                        <div id="weekly"></div>
                                    </figure>
                                    <figure class="highcharts-figure">
                                        <div id="weekly_dept"></div>
                                    </figure>

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
                                    <figure class="highcharts-figure">
                                        <div id="monthly_nov"></div>
                                    </figure>
                                    <button class="btn btn-info mr-3 col-3 btn-lg">COST TOTAL : RP. 500.000</button>
                                    <figure class="highcharts-figure">
                                        <div id="monthly"></div>
                                    </figure>

                                    <figure class="highcharts-figure">
                                        <div id="monthly_dept"></div>
                                    </figure>
                                <?php } else if ($type_report == 'yearly') { ?>

                                    <figure class="highcharts-figure">
                                        <div id="yearly_nov"></div>
                                    </figure>
                                    <button class="btn btn-info mr-3 col-3 btn-lg">COST TOTAL : RP. 5.000.000</button>
                                    <figure class="highcharts-figure">
                                        <div id="yearly"></div>
                                    </figure>
                                    <figure class="highcharts-figure">
                                        <div id="yearly_dept"></div>
                                    </figure>
                                <?php } ?>


                            </div>
                        </div>
                        <!-- <button class="btn btn-danger mr-2 col-2">DOWNLOAD TO PDF</button> -->

                    </div>
                    <!-- /.card-body -->
                </form>
                <!--/.form-->
            </div>
            <!--/.CLINIC VISIT PERFORMANCE-->

        </div>
        <!--/.TAB CONTENT-->
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Page specific script -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script type="text/javascript">
    $(document).ready(function() {
        <?php if ($type_report == 'weekly') { ?>
            Highcharts.chart('weekly_dept', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Number of Visits | Departement',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['SS. HSE', 'OPRNS. PPC', 'IT GENERAL ADMIN'],
                    crosshair: true,
                    accessibility: {
                        description: 'Month'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [23, 19, 16]
                    },

                ]
            });

            Highcharts.chart('weekly_nov', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Number of Visits',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['01 October', '02 October', '03 October', '04 October', '05 October', '06 October'],
                    crosshair: true,
                    accessibility: {
                        description: 'Month'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Employes'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [18, 19, 22, 24, 26, 25]
                    },

                ]
            });

            Highcharts.chart('weekly', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Trends in the number of diseases'
                },
                subtitle: {
                    // text: 'Source: ' +
                    //     '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
                    //     'target="_blank">Wikipedia.com</a>'
                },
                xAxis: {
                    categories: [
                        '01 October', '02 October', '03 October', '04 October', '05 October', '06 October'
                    ],
                    accessibility: {
                        description: 'Months of the year'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    },
                    labels: {
                        format: '{value}'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                legend: {
                    enabled: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                    name: 'Flu',
                    marker: {
                        symbol: 'square'
                    },
                    data: [5, 5, 8, 13, 18, 21]

                }, {
                    name: 'Batuk',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: [13, 14, 14, 11, 8, 4]
                }]
            });
        <?php } else if ($type_report == 'monthly') { ?>

            Highcharts.chart('monthly_dept', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Number of Visits | Departement',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['SS. HSE', 'OPRNS. PPC', 'IT GENERAL ADMIN'],
                    crosshair: true,
                    accessibility: {
                        description: 'Month'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [30, 21, 20]
                    },

                ]
            });
            Highcharts.chart('monthly_nov', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Number of Visits',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['Januari'],
                    crosshair: true,
                    accessibility: {
                        description: 'Month'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Employes'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [47]
                    },

                ]
            });

            Highcharts.chart('monthly', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Trends in the number of diseases'
                },
                subtitle: {},
                xAxis: {
                    categories: [
                        'Jan'
                    ],
                    accessibility: {
                        description: 'Months of the year'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    },
                    labels: {
                        format: '{value}'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                legend: {
                    enabled: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },

                series: [{
                    name: 'Flu',
                    marker: {
                        symbol: 'square'
                    },
                    data: [35]

                }, {
                    name: 'Batuk',
                    marker: {
                        symbol: 'diamond'
                    },
                    data: [12]
                }]
            });
        <?php } else if ($type_report == 'yearly') { ?>
            Highcharts.chart('yearly_dept', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Number of Visits | Departement',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['SS. HSE', 'OPRNS. PPC', 'IT GENERAL ADMIN'],
                    crosshair: true,
                    accessibility: {
                        description: 'Month'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Jumlah'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [90, 81, 42]
                    },

                ]
            });
            Highcharts.chart('yearly_nov', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Number of Visits',
                    align: 'center'
                },
                subtitle: {

                },
                xAxis: {
                    categories: ['2022', '2023', '2024'],
                    crosshair: true,
                    accessibility: {
                        description: 'Year'
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Employes'
                    }
                },
                tooltip: {
                    valueSuffix: ''
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    }
                },
                series: [{
                        name: 'Visit',
                        data: [99, 98, 107]
                    },

                ]
            });
            Highcharts.chart('yearly', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Trends in the number of diseases'
                },
                subtitle: {

                },
                xAxis: {
                    categories: [
                        '2022', '2023', '2024'
                    ],
                    accessibility: {
                        description: ' '
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah'
                    },
                    labels: {
                        format: '{value}'
                    }
                },
                tooltip: {
                    crosshairs: true,
                    shared: true
                },
                legend: {
                    enabled: true
                },
                plotOptions: {
                    series: {
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            format: '{point.y}'
                        }
                    },
                    spline: {
                        marker: {
                            radius: 4,
                            lineColor: '#666666',
                            lineWidth: 1
                        }
                    }
                },

                series: [{
                        name: 'Flu',
                        marker: {
                            symbol: 'square'
                        },
                        data: [5, 5, 8]

                    }, {
                        name: 'Batuk',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: [1, 3, 5]
                    },
                    {
                        name: 'Asma',
                        marker: {
                            symbol: 'diamond'
                        },
                        data: [1, 8, 6]
                    }
                ]
            });
        <?php } ?>

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
            //     window.location.replace(url1);
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