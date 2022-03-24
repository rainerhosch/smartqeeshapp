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
  
<section class="content" >
  <div class="card">
    <!--TAB-->
    <ul class="nav nav-tabs" id="custom-content-above-tab" role="tablist" style="background-color: #e9c338; margin-bottom: -1px;">
      <li class="nav-item">
        <a class="nav-link active-tab btn" id="custom-content-above-home-tab" data-toggle="pill" href="#form-filled" role="tab" aria-controls="custom-content-above-home" aria-selected="true">FORM FILLED</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="custom-content-above-home-tab" data-toggle="pill" href="#tabel-data" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA</a>
      </li>
    </ul>
    <!--/.TAB-->
    <!--TAB CONTENT-->
  <div class="tab-content" id="custom-content-above-tabContent">
    <div class="tab-pane fade show active" id="form-filled" role="tabpanel" aria-labelledby="custom-content-above-home-tab">
      <!-- form -->
      <form class="form-horizontal" method="post" action="<?= base_url(); ?>dashboard/Input_new_risk_register/action_input_new_risk_register">
        <!--card body-->
        <div class="card-body" style="background-color: #F8ECC2;">
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">ACTIVITY / PRODUCT / SERVICES<br><i>(BASE ON PROCESS)</i> </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="activity" name="activity" placeholder="TEXT" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">TAHAPAN PROSES</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="tahapan_proses" name="tahapan_proses" placeholder="TEXT" required>
              <button onClick="dynamicinput()">Add other</button>
              <p id="addinput"></p>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK SOURCE IDENTIFICATION</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="risk_source" name="risk_source" placeholder="TEXT" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CONTEXT<br>(INTERNAL / EXTERNAL) </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="risk_context" name="risk_context" placeholder="TEXT" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK ANALYSIS</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="risk_analysis" name="risk_analysis" placeholder="TEXT" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TYPE</label>
            <div class="col-sm-9">
              <select class="form-control" id="risk_type" name="risk_type" placeholder="TEXT" required>
                <option value="0">SELECT</option>
                <?php foreach($risk_type as $k => $v){ ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div><div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CATEGORY</label>
            <div class="col-sm-9">
              <select class="form-control" id="risk_category" name="risk_category" placeholder="TEXT" required>
                <option value="0">SELECT</option>
                <?php foreach($risk_category as $k => $v){ ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
              </select>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CONDITION</label>
            <div class="col-sm-9">
              <select class="form-control" id="risk_condition" name="risk_condition" placeholder="TEXT" required>
                <option value="0">SELECT</option>
                <?php foreach($risk_condition as $k => $v){ ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TREATMENT (PRESENT)</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="risk_treatment" name="risk_treatment" placeholder="TEXT" required>
            </div>
          </div>
          <h5 class="text-center" style="margin: 25px;"><strong>RISK EVALUATION</strong></h5>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">CONSEQUENCES</label>
            <div class="col-sm-3">
              <select class="form-control" id="risk_evaluation" name="risk_evaluation" placeholder="TEXT" required>
                <option>SELECT</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK LEVEL</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="risk_level" name="risk_level" placeholder="TEXT" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">LIKELIHOOD</label>
            <div class="col-sm-3">
              <select class="form-control" id="likehood" name="likehood" placeholder="TEXT" required>
                <option>SELECT</option>
                <option>1</option>
                <option>2</option>
              </select>
            </div>
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK STATUS</label>
            <div class="col-sm-3">
              <select class="form-control" id="risk_status" name="risk_status" placeholder="TEXT" required>
                <option value="0">SELECT</option>
                <?php foreach($risk_status as $k => $v){ ?>
                    <option value="<?php echo $v['id']; ?>"><?php echo $v['name']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK OWNER</label>
            <div class="col-sm-9">
              <select class="form-control" id="risk_owner" name="risk_owner" placeholder="TEXT" required>
                <option value="0">SELECT</option>
                <?php foreach($user as $k => $v){ ?>
                    <option value="<?php echo $v['user_id']; ?>"><?php echo $v['nama']; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          
          
          <!--
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TREATMENT (FUTURE)<br>MANAGEMENT PROGRAM</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK PRIOITY CONSIDERATION</label>
            <div class="col-sm-9">
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio1" name="customRadio" checked>
                <label for="customRadio1" class="custom-control-label">Regulation Compliance</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio2" name="customRadio">
                <label for="customRadio2" class="custom-control-label">The availability pf theecnology options</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio3" name="customRadio">
                <label for="customRadio3" class="custom-control-label">Consideration of finan capability</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio4" name="customRadio">
                <label for="customRadio4" class="custom-control-label">Requirents for business interest</label>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="customRadio5" name="customRadio">
                <label for="customRadio5" class="custom-control-label">Consideration of related parties</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">IMPROVMENT OPPORTUNITY /<br> STRATEGIC INITIATIVE </label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
            </div>
          </div>

          <h5 class="text-center" style="margin: 25px;"><strong>RISK RE-EVALUATION</strong></h5>

          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">CONSEQUENCES</label>
            <div class="col-sm-3">
              <select class="form-control" id="input" name="input" placeholder="TEXT">
                <option>SELECT</option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK LEVEL</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">LIKELIHOOD</label>
            <div class="col-sm-3">
              <select class="form-control" id="input" name="input" placeholder="TEXT">
                <option>SELECT</option>
                <option>option 1</option>
                <option>option 2</option>
                <option>option 3</option>
                <option>option 4</option>
                <option>option 5</option>
              </select>
            </div>
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK STATUS</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK OWNER</label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
            </div>
          </div>
          -->
          <!--Button-->
          <div class="card-footer">
            <button type="submit" class="btn btn-primary float-right" style="margin-left: 20px;">Submit</button>
            <button type="reset" class="btn btn-warning float-right">Reset</button>
          </div>
          <!--/.Button-->
        </div>
        <!-- /.card-body -->
      </form>
      <!--/.form-->
    </div>
    <div class="tab-pane fade" id="tabel-data" role="tabpanel" aria-labelledby="custom-content-above-profile-tab">
      <div class="card-body" style="background-color: #F8ECC2;">
        <div class="form-grup row mb-4 col-12">
          <label for="input" class="col-form-label" >KEYWORD SEARCH :</label>
          <div class="col-sm-8 my-">
            <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
          </div>
          <button class="btn btn-success mr-2">Search</button>
          <button class="btn btn-danger">Reset</button>
        </div>
        <div class="card">
          <div class="table-responsive">
            <table class="table table-striped table-bordered-sm ">
              <thead class="align-middle">
                <tr class="table-primary align-middle" style="text-align: center;">
                  <th scope="col" >NO.</th>
                  <th scope="col" >ACTIVITY / PRODUCT / SERVICES<br><i>(BASED ON PROSES)</i></th>
                  <th scope="col" >TAHAPAN PROSES</th>
                  <th scope="col" >RISK CONTEXT<br>(INTERNAL / EKSTERNAL</th>
                  <th scope="col" >RISK SOURCE IDENTIFICATION</th>
                  <th scope="col" >RISK ANALYSIS</th>
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
        </div>
      </div>
    </div>
  </div>
  <!--/.TAB CONTENT-->
  </div>
  
  

  
</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->