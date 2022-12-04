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
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup')?>">INPUT DATA PERSONAL MCU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_record')?>">PERSONAL MCU RECORD</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn active" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/mcu_perf')?>">MCU PERFORMANCE</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bg-secondary active-tab btn" id="custom-content-above-home-tab" href="<?=base_url('performance_management/Medical_checkup/unfit_followup')?>">UNFIT FOLLOWUP</a>
                </li>
            </ul>
            <!--/.TAB-->

            <!--TAB CONTENT-->
            <div class="tab-content">

                <!--MCU PERFORMANCE-->
                <div>
                    <!-- form -->
                    <form class="form-horizontal" method="post">
                        <!--card body-->
                        <div class="card-body" style="background-color: #77a0e6;">
                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">MCU PERIOD :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <div class="form-grup row mb-2 col-12">
                                <label for="input" class="col-form-label col-2" style="text-align:right">FILTER AS DEPARTEMENT :</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                                </div>
                            </div>
                            <br>


                            <div class="card col-lg-12" style="background-color: aliceblue;">
                                <div class="row justify-content-md-center m-2">
                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;">
                                        <h5 class="text-center pb-4"><b>NUMBER OF DISEASE FOUND</b></h5>
                                        <canvas class="p-1" id="bar-chart-horizontal" width="auto" height="auto">
                                        </canvas>
                                    </div>

                                    <div class="card-body col-lg-6" style="background-color: aliceblue; border-style: solid; border-width: thin;" width="100%">
                                        <h5 class="text-center pb-4"><b>STATUS OF HEALTH</b></h5>
                                        <div class="row mt-5">
                                            <canvas class="col-lg-7" id="doughnut-chart" width="auto" height="auto">
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
                                                        <span id="unfit"><b><?= COUNT($unfit)?><b></span>
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

new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Fit with Note", "Unfit", "Fit for Work"],
        datasets: [{
            label: "Identified",
            backgroundColor: ["#3e95cd", "#ff2222", "#fa0"],
            data: [
                <?= COUNT($fwn)?>, 
                <?= COUNT($unfit)?>, 
                <?= COUNT($ffw)?>
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