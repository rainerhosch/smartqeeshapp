    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="z-index: -999 !important;">

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
                <li class="breadcrumb-item text-white">INPUT RISK REGISTER</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->

      <section class="content">
        <div class="card">
          <!--TAB-->
          <ul class="nav nav-tabs bg-secondary" id="custom-content-above-tab" role="tablist" style="background-color: #e9c338; margin-bottom: -1px;">
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">ACTIVITY LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_activity")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA ACTIVITY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/form_filled")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">FORM FILLED RISK REGISTER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_data")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA RISK REGISTER</a>
            </li>
          </ul>
          <!--/.TAB-->

          <div class="row">
              <div class="col-md-12">
                <div class="card-body" style="background-color: #F8ECC2;">
                  <div class="form-grup row mb-4 col-12">
                      <label for="input" class="col-form-label">KEYWORD SEARCH :</label>
                      <div class="col-sm-8 my-">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                      </div>
                      <button class="btn btn-success mr-2">Search</button>
                      <button class="btn btn-danger">Reset</button>
                  </div>
                  <div class="form-grup row mb-4 col-12">
                      <label class="col-form-label">DATE :</label>
                      <div class="col-sm-3">
                      <input type="date" class="form-control" id="input" name="input">
                      </div>
                      <label class="col-form-label"> - </label>
                      <div class="col-sm-3">
                      <input type="date" class="form-control" id="input" name="input">
                      </div>
                  </div>
                  <div class="card" style="background-color: white;">
                      <div class="table-responsive">
                      <table class="table table-striped table-bordered-sm ">
                          <thead class="align-middle">
                          <tr class="table-primary align-middle" style="text-align: center;">
                              <th scope="col">NO.</th>
                              <th scope="col">ACTIVITY / PRODUCT / SERVICES<br><i>(BASED ON PROSES)</i></th>
                              <th scope="col">TAHAPAN PROSES</th>
                              <th scope="col">RISK CONTEXT<br>(INTERNAL / EKSTERNAL</th>
                              <th scope="col">RISK SOURCE IDENTIFICATION</th>
                              <th scope="col">RISK ANALYSIS</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                              <td>njkl</td>
                              <td>njkl</td>
                          </tr>
                          <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                              <td>sdfewfr</td>
                              <td>njkl</td>
                          </tr>
                          <tr>
                              <th scope="row">3</th>
                              <td>abuioh</td>
                              <td>Larry the Bird</td>
                              <td>@twitter</td>
                              <td>ouhdsfuioh</td>
                              <td>njkl</td>
                          </tr>
                          </tbody>
                      </table>
                      </div>
                      <div class="card-footer clearfix">
                      <ul class="pagination pagination-sm m-0 float-right">
                          <li class="page-item"><a class="page-link" href="#">«</a></li>
                          <li class="page-item"><a class="page-link" href="#">1</a></li>
                          <li class="page-item"><a class="page-link" href="#">2</a></li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item"><a class="page-link" href="#">»</a></li>
                      </ul>
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