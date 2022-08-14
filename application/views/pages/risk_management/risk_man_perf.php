<!-- Style -->
<style type="text/css">
.label-box {
  border: 1px solid white;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  min-height: 30px;
  min-width: 30px;
  width: 100%;
}

.label-text{
  font-size: 10px;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 bg-warning py-2">
          <h1 style="color: white;">RISK MANAGEMENT</h1>
        </div>
        <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
          <ol class="breadcrumb  float-sm-left">
            <li class="breadcrumb-item"><a href="#">RISK MANAGEMENT</a></li>
            <li class="breadcrumb-item text-white">RISK MANAGEMENT PERFORMANCE</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card" style="background-color: #76C1A5;">
          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td bgcolor="#1EAF9C"><strong>LOW RISK</strong></td>
                  <td align="center" bgcolor="#E2F0D9" width="20%">
                    <strong id="intLowRisk">>loading...</strong>
                  </td>
                  <td align="right" width="5%" bgcolor="#E2F0D9">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="#" style="color: black;" data-filter="LOW" class="btnUpRisk"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#5B9BD5">MEDIUM RISK</td>
                  <td align="center" bgcolor="#DEEBF7" id="intMediumRisk">>loading...</td>
                  <td align="right" width="5%" bgcolor="#DEEBF7">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="#" style="color: black;" data-filter="MEDIUM" class="btnUpRisk"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#FFD966">HIGH RISK</td>
                  <td align="center" bgcolor="#FFF2CC" id="intHighRisk">>loading...</td>
                  <td align="right" width="5%" bgcolor="#FFF2CC">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="#" style="color: black;" data-filter="HIGH" class="btnUpRisk"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E04A4A">EXTREME RISK</td>
                  <td align="center" bgcolor="#FBE5D6" id="intExtremeRisk">loading...</td>
                  <td align="right" width="5%" bgcolor="#FBE5D6">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="#" style="color: black;" data-filter="EXTREME" class="btnUpRisk"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <br />
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td bgcolor="#7F7F7F"><strong>TOTAL RISK</strong></td>
                  <td align="center" style="padding-left: 0px;" bgcolor="#BFBFBF" width="25.5%"><strong id="intTotalRisk">>loading...</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card" style="background-color: #83A2B4;">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4" style="margin-top: 36px;">
                <table class="table table-bordered">
                  <tbody align="center">
                    <tr>
                      <td bgcolor="#DAE3F3" style="font-size: 80px;"><strong>18</strong></td>
                    </tr>
                    <tr>
                      <td bgcolor="#5B9BD5">TOTAL PROGRAM MANAGEMENT</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-4 my-auto">
                <canvas id="TPMChart" style="min-height: 150px; height: 170px; max-height: 200px; max-width: 100%; display: block; width: 187px;" width="187" height="130" class="chartjs-render-monitor">
                </canvas>
              </div>
              <div class="col-lg-4 my-auto">
                <table cellpadding="5">
                  <tbody>
                    <tr>
                      <td class="label-box" style="background-color: #FFC000;">
                      </td>
                      <td class="label-text"><strong>PROGRAM NOT STARTED</strong></td>
                    </tr>
                    <tr>
                      <td class="label-box" style="background-color: #ED7D31;">
                      </td>
                      <td class="label-text">PROGRAM IN PROGRESS</td>
                    </tr>
                    <tr>
                      <td class="label-box" style="background-color: #70AD47;">
                      </td>
                      <td class="label-text">PROGRAM COMPLETE</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

  <!-- Content Header 2 (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12 py-2" style="background-color: #3b3838;">
          <h1 style="color: white;">DASHBOARD OF APF PERFORMANCE</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content 2 -->
  <section class="content">
    <div class="row">
      <div class="col-lg-6">
        <div class="card" style="background-color: #76C1A5;">

          <div class="card-body">
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td bgcolor="#1EAF9C"><strong>LOW RISK</strong></td>
                  <td align="center" bgcolor="#E2F0D9" width="20%">
                    <strong>70</strong>
                    <!-- | <i class="fa fa-eye"></i> -->
                  </td>
                  <td align="right" width="5%" bgcolor="#E2F0D9">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url(); ?>/dashboard/apf_performance/low_risk" style="color: black;"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#5B9BD5">MEDIUM RISK</td>
                  <td align="center" bgcolor="#DEEBF7">20</td>
                  <td align="right" width="5%" bgcolor="#DEEBF7">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url(); ?>/dashboard/apf_performance/medium_risk" style="color: black;"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#FFD966">HIGH RISK</td>
                  <td align="center" bgcolor="#FFF2CC">8</td>
                  <td align="right" width="5%" bgcolor="#FFF2CC">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url(); ?>/dashboard/apf_performance/hard_risk" style="color: black;"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
                <tr>
                  <td bgcolor="#E04A4A">EXTREME RISK</td>
                  <td align="center" bgcolor="#FBE5D6">2</td>
                  <td align="right" width="5%" bgcolor="#FBE5D6">
                    <a data-toggle="tooltip" data-placement="top" title="Detail" href="<?= base_url(); ?>/dashboard/apf_performance/extreme_risk" style="color: black;"><i class="fas fa-eye"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <br />
            <table class="table table-bordered">
              <tbody>
                <tr>
                  <td bgcolor="#7F7F7F"><strong>TOTAL RISK</strong></td>
                  <td align="center" style="padding-left: 0px;" bgcolor="#BFBFBF" width="25.5%"><strong>100</strong></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        <div class="card" style="background-color: #83A2B4;">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-4" style="margin-top: 36px;">
                <table class="table table-bordered">
                  <tbody align="center">
                    <tr>
                      <td bgcolor="#DAE3F3" style="font-size: 80px;"><strong>18</strong></td>
                    </tr>
                    <tr>
                      <td bgcolor="#5B9BD5">TOTAL PROGRAM MANAGEMENT</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="col-lg-4 my-auto">
                <canvas id="TPMChart2" style="min-height: 150px; height: 170px; max-height: 200px; max-width: 100%; display: block; width: 187px;" width="187" height="130" class="chartjs-render-monitor">
                </canvas>
              </div>
              <div class="col-lg-4 my-auto">
                <table cellpadding="5">
                  <tbody>
                    <tr>
                      <td class="label-box" style="background-color: #FFC000;">
                      </td>
                      <td class="label-text"><strong>PROGRAM NOT STARTED</strong></td>
                    </tr>
                    <tr>
                      <td class="label-box" style="background-color: #ED7D31;">
                      </td>
                      <td class="label-text">PROGRAM IN PROGRESS</td>
                    </tr>
                    <tr>
                      <td class="label-box" style="background-color: #70AD47;">
                      </td>
                      <td class="label-text">PROGRAM COMPLETE</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content 2-->

  <div class="modal fade" id="modalTabelRisk">
    <div class="modal-dialog modal-xl" style="width: 90%;">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="titleTabelRisk"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body table-responsive">
          <table class="table table-bordered table-hover" id="tabelRisk">
            <thead>
              <tr>
                <th class="text-center">ACTIVITY</th>
                <th class="text-center">TAHAPAN PROSES</th>
                <th class="text-center">CONTEXT</th>
                <th class="text-center">RISK RESOURCE IDENTIFICATION</th>
                <th class="text-center">RISK ANALYSIS</th>
                <th class="text-center">RISK TYPE</th>
                <th class="text-center">RISK CATEGORY</th>
                <th class="text-center">RISK CONDITION</th>
                <th class="text-center">LAST STATUS</th>
              </tr>
            </thead>

            <tbody id="tbodyRisk">

            </tbody>
          </table>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

</div>
<!-- /.content-wrapper -->
<script src="<?= base_url('assets/templates') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url("assets/custom_js/risk_management/risk_man_perf.js"); ?>"></script>

<script>
  $(function() {
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#TPMChart').get(0).getContext('2d')
    var donutData = {
      labels: [
          'PROGRAM NOT STARTED',
          'PROGRAM IN PROGRESS',
          'PROGRAM COMPLETE',
      ],
      datasets: [{
        data: [31, 15, 54],
        backgroundColor: ['#FFC000', '#f39c12', '#70AD47'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
            display: false,
            position: 'right'
        },
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //TPM APF PERFORMANCE
    var donutChartCanvas = $('#TPMChart2').get(0).getContext('2d')
    var donutData = {
      labels: [
          'PROGRAM NOT STARTED',
          'PROGRAM IN PROGRESS',
          'PROGRAM COMPLETE',
      ],
      datasets: [{
        data: [31, 15, 54],
        backgroundColor: ['#FFC000', '#f39c12', '#70AD47'],
      }]
    }
    var donutOptions = {
      maintainAspectRatio: false,
      responsive: true,
      legend: {
            display: false,
            position: 'right'
        },
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
  })
</script>
