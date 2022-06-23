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
  font-size: 1rem;
}

.card-number{
  font-size: 6rem;
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
      <div class="col-lg-12">
        <div class="card" style="background-color: #83A2B4;">
          <div class="card-body">
            <div class="row">

              <!-- STATUS -->
              <div class="col-lg-4 my-auto">
                <div class="card text-center w-75 h-auto mx-auto">
                  <div class="card-body" style="background-color: #DAE3F3;">
                    <h1 class="card-number">10</h1>
                  </div>
                  <div class="card-footer text-lg" style="background-color: #5B9BD5;">
                    NCR PERFORMANCE
                  </div>
                </div>
              </div>
              <!-- /.STATUS -->

              <!-- CHART -->
              <div class="col-lg-4">
                <canvas class="p-1 mr-1" id="ncr-chart" width="auto" height="auto">
                </canvas>
              </div>
              <!-- /.CHART -->

              <!-- LABEL -->
              <div class="col-lg-4 my-auto">
                <div class="row py-1">
                  <div class="label label-box col-sm-1" style="background-color: #405987;"></div>
                  <div class="label label-text px-2">INCIDENT INVESTIGATION</div>
                </div>
                <div class="row py-1">
                  <div class="label label-box col-sm-1" style="background-color: #984242;"></div>
                  <div class="label label-text px-2">FIRE INVESTIGATION</div>
                </div>
                <div class="row py-1">
                  <div class="label label-box col-sm-1" style="background-color: #2B7B70;"></div>
                  <div class="label label-text px-2">ENVIRONMENT ABNORMALITY</div>
                </div>
              </div>
              <!-- /.LABEL -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script>
//Doughnut Chart
new Chart(document.getElementById("ncr-chart"), {
    type: 'doughnut',
    data: {
        labels: ["Incident Investigation", "Fire Investigation", "Environment Abnormality"],
        datasets: [{
            label: "Type",
            backgroundColor: ["#405987", "#984242", "#2B7B70"],
            data: [25, 25, 50]
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: true,
        legend: {
            display: false,
            position: 'right',
            labels: {
              fontSize: 15,
              fontColor: 'black',
              margin: 20
            }
        },
        title: {
            display: false,
            text: 'Predicted world population (millions) in 2050'
        }
    }
});
</script>