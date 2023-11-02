<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">
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

            <li class="breadcrumb-item"><a href="#"><?= $page ?></a></li>
            <li class="breadcrumb-item text-white"><a>
                <?= $subpage ?>
              </a></li>
          </ol>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="card card-secondary">
      <div class="card-header p-0 border-bottom-0">
        <!-- TAB -->
        <ul class="nav nav-tabs bg-secondary" id="corrective-action" role="tablist" style="margin-bottom: -1px;">
          <li class="nav-item">
            <a class="nav-link bg-secondary active-tab btn btn-flat active" data-id="ca-incident-tab"
              data-url='incident_investigation' href="#incident_investigation" role="tab"
              aria-controls="ca-incident-tab" aria-selected="true">INCIDENT
              INVESTIGATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-secondary" data-id="ca-fire-tab" data-url='fire_investigation'
              href="#fire_investigation" role="tab" aria-controls="ca-fire-tab" aria-selected="false">FIRE
              INVESTIGATION</a>
          </li>
          <li class="nav-item">
            <a class="nav-link bg-secondary" data-id="ca-environment-tab" data-url='environment_abnormality'
              href="#env_abnormality" role="tab" aria-controls="ca-environment-tab" aria-selected="false">ENVIRONMENT
              ABNORMALITY</a>
          </li>
        </ul>
        <!-- /.TAB -->
      </div>
      <!-- tab incident investigation -->
      <div class="card-body" id='ca-incident-tab' style="background-color: #a5c0d3;">
        <div class="tab-content" id="corrective-action-tabContent">
          <div class="tab-pane fade show active" id="ca-incident-tab" role="tabpanel" aria-labelledby="ca-incident-tab">
            <!-- <div class="form-group row mt-2">
              <label for="filterperiod" class="col-sm-2 col-form-label text-center">PERIOD</label>
              <div class="col-sm-4">
                <select class="form-control" id="filterperiod">
                  <option disabled selected>-----</option>
                  <option value="id">Option 1</option>
                  <option value="id">Option 2</option>
                </select>
              </div>
            </div> -->
            <!-- TABLE -->
            <div class="table-responsive p-3">
              <table class="table table-striped table-bordered-sm" style="background-color: #ffffff;"
                id='ca-incident-tabel'>
                <thead>
                  <tr>
                    <th style="width: 10px; background-color: #999999;">No.</th>
                    <th style="background-color: #999999;">ACTION</th>
                    <th style="background-color: #999999;">PERSON RESPONSIBILITY</th>
                    <th style="background-color: #999999;">TIME TARGET</th>
                    <th style="background-color: #999999;">OPTION</th>
                  </tr>
                </thead>
                <tbody id='ca-incident-tab-tbody'></tbody>
              </table>
            </div>
            <!-- /. TAB -->
          </div>
        </div>
      </div>
      <!-- /.incident investigation card -->

      <!-- tab fire investigation -->
      <div class="card-body" id='ca-fire-tab' style="background-color: #ff000054;" hidden>
        <div class="tab-content" id="corrective-action-tabContent">
          <div class="tab-pane fade show active" id="ca-fire-tab" role="tabpanel" aria-labelledby="ca-fire-tab">
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
            <!-- TABLE -->
            <div class="table-responsive" style="height: 300px;">
              <table class="table table-bordered table-head-fixed text-center" style="background-color: #ffffff;">
                <thead>
                  <tr>
                    <th style="width: 10px; background-color: #999999;">No.</th>
                    <th style="background-color: #999999;">ACTION</th>
                    <th style="background-color: #999999;">PERSON RESPONSIBILITY</th>
                    <th style="background-color: #999999;">TIME TARGET</th>
                    <th style="background-color: #999999;">OPTION</th>
                  </tr>
                </thead>
                <tbody id='ca-fire-tab-tbody'></tbody>
              </table>
            </div>
            <!-- /. TAB -->
          </div>
        </div>
      </div>
      <!-- /.fire investigation card -->

      <!-- tab env abnormality -->
      <div class="card-body" id='ca-environment-tab' style="background-color: #7fc9bf;" hidden>
        <div class="tab-content" id="corrective-action-tabContent">
          <div class="tab-pane fade show active" id="ca-environment-tab" role="tabpanel"
            aria-labelledby="ca-environment-tab">
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
            <!-- TABLE -->
            <div class="table-responsive" style="height: 300px;">
              <table class="table table-bordered table-head-fixed text-center" style="background-color: #ffffff;">
                <thead>
                  <tr>
                    <th style="width: 10px; background-color: #999999;">No.</th>
                    <th style="background-color: #999999;">ACTION</th>
                    <th style="background-color: #999999;">PERSON RESPONSIBILITY</th>
                    <th style="background-color: #999999;">TIME TARGET</th>
                    <th style="background-color: #999999;">OPTION</th>
                  </tr>
                </thead>
                <tbody id='ca-environment-tab-tbody'></tbody>
              </table>
            </div>
            <!-- /. TAB -->
          </div>
        </div>
      </div>
      <!-- /.env abnormality card -->
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
  $(document).ready(function () {
    var tab_active = $('ul.nav-tabs').find('li>a.active').data('id');
    var url_resource = $('ul.nav-tabs').find('li>a.active').data('url');
    // console.log(url_resource);
    $.ajax({
      url: `<?= base_url() ?>ncr_ca/${url_resource}/getDataRecord`,
      type: `POST`,
      dataType: 'json',
      success: function (response) {
        // console.log(response)
        let html = ``;
        let no = 1;
        if (response.data.length > 0) {
          $.each(response.data, function (key, val) {
            html += `<tr>`;
            html += `<td class="text-center">${no}</td>`;
            html += `<td class="text-center">${val.txt_pca_preventive_action}</td>`;
            html += `<td class="text-center">${val.txt_pca_person_responsibility}</td>`;
            html += `<td class="text-center">${val.txt_pca_time_target}</td>`;
            html += `<td class="text-center">`;
            html += `<a class="btn btn-xs btn-warning btnEdit" data-id="${val.int_id_investigation}"><i class="fas fa-cog"></i></a>`;
            // html += `<a class="btn btn-xs btn-danger btnDelete" data-id="${val.int_id_investigation}"><i class="fas fa-trash-alt"></i></a>`;
            // html += `<a class="btn btn-xs btn-primary btnDownloadsDoc ml-1" data-id="${val.int_id_investigation}">Docs <i class="fa fa-download"></i></a>`;
            html += `</td>`;
            html += `</tr>`;
            no++;
          });

        } else {
          html += `<tr>`;
          html += `<td colspan="12" class="text-center"><br>`;
          html += `<div class='col-md-12'>`;
          html += `<div class='alert alert-warning alert-dismissible'>`;
          html += `<h4><i class='icon fa fa-warning'></i>Tidak ada data!</h4>`;
          html += `</div>`;
          html += `</div>`;
          html += `</td>`;
          html += `</tr>`;
        }
        $(`#${tab_active}-tbody`).html(html);
        $(`#${tab_active}el`).DataTable({
          lengthMenu: [
            [5, 10, 20, -1],
            [5, 10, 20, 'All'],
          ],
        });

        $(`select[name="${tab_active}el_length"]`).removeClass('form-select form-select-sm');
        $(`select[name="${tab_active}el_length"]`).addClass('form-control form-control-sm');
      }
    });

    $('ul>li>a').on('click', function () {
      let div_id = $(this).data('id');
      let url_data = $(this).data('url');
      // $(`#${div_id}-tbody`).empty();
      console.log(div_id);
      $(`div.card-body`).attr("hidden", true);
      $(`div#${div_id}`).removeAttr('hidden');
      $.ajax({
        url: `<?= base_url() ?>ncr_ca/${url_data}/getDataRecord`,
        type: `POST`,
        dataType: 'json',
        success: function (response) {
          console.log(response)
          let html = ``;
          let no = 1;
          if (response.data.length > 0) {
            $.each(response.data, function (key, val) {
              html += `<tr>`;
              html += `<td class="text-center">${no}</td>`;
              html += `<td class="text-center">${val.txt_pca_preventive_action}</td>`;
              html += `<td class="text-center">${val.txt_pca_person_responsibility}</td>`;
              html += `<td class="text-center">${val.txt_pca_time_target}</td>`;
              html += `<td class="text-center">`;
              html += `<a class="btn btn-xs btn-warning btnEdit" data-id="${val.int_id_investigation}"><i class="fas fa-cog"></i></a>`;
              // html += `<a class="btn btn-xs btn-danger btnDelete" data-id="${val.int_id_investigation}"><i class="fas fa-trash-alt"></i></a>`;
              // html += `<a class="btn btn-xs btn-primary btnDownloadsDoc ml-1" data-id="${val.int_id_investigation}">Docs <i class="fa fa-download"></i></a>`;
              html += `</td>`;
              html += `</tr>`;
              no++;

            });

          } else {
            html += `<tr>`;
            html += `<td colspan="12" class="text-center"><br>`;
            html += `<div class='col-md-12'>`;
            html += `<div class='alert alert-warning alert-dismissible'>`;
            html += `<h4><i class='icon fa fa-warning'></i>Tidak ada data!</h4>`;
            html += `</div>`;
            html += `</div>`;
            html += `</td>`;
            html += `</tr>`;
          }
          $(`#${div_id}el`).DataTable().destroy();
          $(`#${div_id}-tbody`).html(html);
          $(`#${div_id}el`).DataTable({
            lengthMenu: [
              [5, 10, 20, -1],
              [5, 10, 20, 'All'],
            ],
          });

          $(`select[name = "${div_id}el_length"]`).removeClass('form-select form-select-sm');
          $(`select[name = "${div_id}el_length"]`).addClass('form-control form-control-sm');
        }
      });
    });
  });
</script>