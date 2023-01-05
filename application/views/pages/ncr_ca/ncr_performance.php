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

  .label-text {
    font-size: 1rem;
  }

  .card-number {
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
          <h1 style="color: white;">
            <?= $menu_header ?>
          </h1>
        </div>
        <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
          <ol class="breadcrumb  float-sm-left">
            <li class="breadcrumb-item"><a href="#">
                <?= $page ?>
              </a></li>
            <li class="breadcrumb-item text-white">
              <?= $subpage ?>
            </li>
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
              <div class="col-lg-4 my-auto">
                <div class="card text-center w-75 h-auto mx-auto">
                  <div class="card-header text-lg" style="background-color: #5B9BD5;">
                    TOTAL ACCIDENT
                  </div>
                  <div class="card-body" style="background-color: #DAE3F3;">
                    <h1 class="card-number"></h1>
                  </div>
                </div>
              </div>
              <div class="col-lg-4">
                <canvas class="p-1 mr-1" id="ncr-chart" width="auto" height="auto">
                </canvas>
              </div>
              <div class="col-lg-4 my-auto label_desc">
              </div>
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
  //Doughnut 
  $(document).ready(function () {
    $.ajax({
      url: `<?= base_url() ?>ncr_ca/Ncr_performance/getDataRecord`,
      type: `POST`,
      dataType: 'json',
      success: function (response) {
        // console.log(response);

        var label = [];
        var value = [];
        var bgColor = [];
        var html = ``;
        $.each(response.data.detail, function (i, item) {
          html += `<div class="row py-1">`;
          html += `<div class="label label-box col-sm-1" style="background-color: ${item.color};"></div>`;
          html += `<div class="label label-text px-2">${item.label}</div>`;
          html += `</div>`;
          label.push(item.label);
          value.push(item.jumlahdata);
          bgColor.push(item.color);
        });
        $('.label_desc').html(html);
        $('.card-number').html(response.data.total_accident);

        new Chart(document.getElementById("ncr-chart"), {
          type: 'doughnut',
          data: {
            labels: label,
            datasets: [{
              label: "Type",
              backgroundColor: bgColor,
              data: value
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
      }
    });
  });
</script>