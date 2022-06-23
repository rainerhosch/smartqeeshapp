<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12 bg-warning py-2">
        <h1 style="color: white;"><?= $menu_header ?></h1>
      </div>
      <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
        <ol class="breadcrumb  float-sm-left">
            
          <li class="breadcrumb-item"><a href="#"><?= $page ?></a></li>
          <li class="breadcrumb-item text-white"><a><?= $subpage ?></a></li>
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
              <a class="nav-link bg-secondary active-tab btn btn-flat active" id="ca-incident-tab" href="<?=base_url('ncr_ca/ca_incident')?>" role="tab" aria-controls="ca-incident-tab" aria-selected="true">INCIDENT INVESTIGATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="ca-fire-tab" href="<?=base_url('ncr_ca/ca_fire')?>" role="tab" aria-controls="ca-fire-tab" aria-selected="false">FIRE INVESTIGATION</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="ca-environment-tab" href="<?=base_url('ncr_ca/ca_environment')?>" role="tab" aria-controls="ca-environment-tab" aria-selected="false">ENVIRONMENT ABNORMALITY</a>
            </li>
          </ul>
          <!-- /.TAB -->
        </div>
        <div class="card-body" style="background-color: #a5c0d3;">
          <div class="tab-content" id="corrective-action-tabContent">
            <div class="tab-pane fade show active" id="ca-incident-tab" role="tabpanel" aria-labelledby="ca-incident-tab">
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
                      <tbody>
                        <tr>
                          <td>1.</td>
                          <td>Action Plan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Action Plan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Action Plan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Action Plan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Action Plan</td>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                  </table>
              </div>
              <!-- /. TAB -->
            </div>
          </div>
        </div>
        <!-- /.card -->
      </div>
  </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->