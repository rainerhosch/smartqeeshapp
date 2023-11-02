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
                        <li class="breadcrumb-item text-white">DOCTOR HEALTH FOLLOWUP</li>
                        <li class="breadcrumb-item text-white">DOCTOR CONTROL PERFORMANCE</li>
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
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Doctor_health_followup')?>">LIST OF EMPLOYEES UNDER CONTROL BY DOCTOR</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Doctor_health_followup/followup_perf')?>">DOCTOR CONTROL PERFORMANCE</a>
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
                            </div>
                            <div class="form-group row mb-2 col-12">
                                <div class="col-6">
                                    <button class="btn btn-warning col-sm-4 float-right" name="search" value="1">SEARCH</button>
                                    <button type="reset" class="btn btn-secondary col-sm-3 float-right mr-2" name="resetVal" value="reset">CLEAR</button>
                                </div>
                            </div>
                            <?php if($dept != NULL):?>
                                <div class="form-grup row mb-2 col-12">
                                    <div class="col-9">
                                    </div>
                                    <div class="col-3">
                                        <a href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>" class="btn btn-danger float-right">Reset to Default</a>
                                    </div>
                                </div>
                            <?php endif;?>
                            <br>
                            </form>

                            <div class="card col-lg-12" style="background-color: aliceblue;">
                                <div class="row justify-content-md-center m-2">
                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;">
                                        <h5 class="text-center pb-4"><b>NUMBER OF DISEASE FOUND</b></h5>
                                        <canvas class="p-1" id="bar-chart-horizontal" width="auto" height="auto">
                                        </canvas>
                                    </div>

                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;" width="100%">
                                        <h5 class="text-center"><b>NUMBER OF ACTION TAKEN</b></h5>
                                        <div class="row mt-2" id="chart-wrapper">
                                            <canvas class="p-1" id="pieChart" width="auto" height="auto">
                                            </canvas>
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


<!-- SCRIPT -->
<script type="text/javascript">
//-------------
//- DONUT CHART -
//-------------
// Get context with jQuery - using jQuery's .get() method.
var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
var pieData        = {
    labels: <?= $action ?>,
    datasets: [
    {
        data: <?= $actiontotal ?>,
        backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
    }
    ]
}
var pieOptions     = {
    maintainAspectRatio : true,
    responsive : true,
    legend: {
    position: 'right',
    display: true
    }
}
//Create pie or douhnut chart
// You can switch between pie and douhnut using the method below.
new Chart(pieChartCanvas, {
    type: 'pie',
    data: pieData,
    options: pieOptions
})


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