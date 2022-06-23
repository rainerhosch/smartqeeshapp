<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 bg-warning py-2">
            <h1 style="color: white;">LEGAL COMPLIANCE</h1>
          </div>
          <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
            <ol class="breadcrumb  float-sm-left">
              <li class="breadcrumb-item"><a href="<?=base_url('legal_compliance/legal_compliance_home') ?>">LEGAL COMPLIANCE</a></li>
              <li class="breadcrumb-item text-white"><a>REGULATION COMPLIANCE PERFORMANCE</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card card-secondary">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn active" id="custom-tabs-four-quality-tab" data-toggle="pill" href="#custom-tabs-four-quality" role="tab" aria-controls="custom-tabs-four-quality" aria-selected="true">QUALITY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn" id="custom-tabs-four-health-tab" data-toggle="pill" href="#custom-tabs-four-health" role="tab" aria-controls="custom-tabs-four-health" aria-selected="false">HEALTH</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn" id="custom-tabs-four-safety-tab" data-toggle="pill" href="#custom-tabs-four-safety" role="tab" aria-controls="custom-tabs-four-safety" aria-selected="false">SAFETY AND FIRE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn" id="custom-tabs-four-environment-tab" data-toggle="pill" href="#custom-tabs-four-environment" role="tab" aria-controls="custom-tabs-four-environment" aria-selected="false">ENVIRONMENT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn" id="custom-tabs-four-energy-tab" data-toggle="pill" href="#custom-tabs-four-energy" role="tab" aria-controls="custom-tabs-four-energy" aria-selected="false">ENERGY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link bg-secondary active-tab btn" id="custom-tabs-four-all-tab" data-toggle="pill" href="#custom-tabs-four-all" role="tab" aria-controls="custom-tabs-four-all" aria-selected="false">ALL</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-four-quality" role="tabpanel" aria-labelledby="custom-tabs-four-quality-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-3 text-center"> 
                    <h5>Regulation as per level</h5>
                  </div>
                  <div class="col-lg-4 my-3 text-center"> 
                    <h5>Evaluasi Kepatuhan</h5>
                  </div>
                  <div class="col-lg-4 my-3 text-center">
                    <h5>Evaluasi Ketaatan per-Quartal</h5>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="QChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="QChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="QbarChart" style="min-height: 250px; height: 300px; max-height: 300px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-5">DOWNLOAD TO PDF</button>
              </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-health" role="tabpanel" aria-labelledby="custom-tabs-four-health-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="HChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="HChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="HbarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
              </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-safety" role="tabpanel" aria-labelledby="custom-tabs-four-safety-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="SChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="SChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="SbarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-environment" role="tabpanel" aria-labelledby="custom-tabs-four-environment-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="EVChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="EVChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="EVbarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-energy" role="tabpanel" aria-labelledby="custom-tabs-four-energy-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="ENChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="ENChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="ENbarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-all" role="tabpanel" aria-labelledby="custom-tabs-four-all-tab">
                <div class="form-group row mt-2">
                    <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperiod">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="AChart1" style="min-height: 150px; height: 300px; max-height: 400px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto"> 
                    <canvas id="AChart2" style="min-height: 150px; height: 300px; max-height: 300px; max-width: 100%; display: block; width: 187px;" width="187" height="300" class="chartjs-render-monitor">
                    </canvas>
                  </div>
                  <div class="col-lg-4 my-auto">
                    <canvas id="AbarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
                    </canvas>
                  </div>
                </div>
                <div>
                  <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
             </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script>
  $(function () {
    
    var areaChartData = {
      labels  : ['Q1 2020', 'Q2 2020'],
      datasets: [
        {
          label               : 'Belum Patuh',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : [28, 48, 40, 19, 86, 27, 90]
        },
        {
          label               : 'Sudah Patuh',
          backgroundColor     : 'rgba(210, 214, 222, 1)',
          borderColor         : 'rgba(210, 214, 222, 1)',
          pointRadius         : false,
          pointColor          : 'rgba(210, 214, 222, 1)',
          pointStrokeColor    : '#c1c7d1',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(220,220,220,1)',
          data                : [65, 59, 80, 81, 56, 55, 40]
        },
      ]
    }
    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#QChart1').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'UU',
          'PP',
          'PerPres',
          'KepMen',
          'PerGub',
          'PerBup',
          'Lainnya',
      ],
      datasets: [
        {
          data: [0,0,0,31,15,0,54],
          backgroundColor : ['#21417B', '#f39c12', '#70AD47','#4A77CA','#21417B','#FF00FF','#FFFC00'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //TPM APF PERFORMANCE
    var donutChartCanvas = $('#QChart2').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Patuh',
          'Belum Patuh',
      ],
      datasets: [
        {
          data: [60,40],
          backgroundColor : ['#4574CA', '#f39c12'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }

    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

    //-------------
    //- BAR CHART -
    //-------------
    var barChartCanvas = $('#QbarChart').get(0).getContext('2d')
    var barChartData = $.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    var temp1 = areaChartData.datasets[1]
    barChartData.datasets[0] = temp1
    barChartData.datasets[1] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    new Chart(barChartCanvas, {
      type: 'bar',
      data: barChartData,
      options: barChartOptions
    })
  })
</script>