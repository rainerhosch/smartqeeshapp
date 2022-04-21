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
          <ul class="nav nav-tabs bg-secondary" id="custom-content-above-tab" role="tablist" style="margin-bottom: -1px;">
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">ACTIVITY LIST</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_activity")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA ACTIVITY</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/form_filled")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">FORM FILLED RISK REGISTER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link bg-secondary" id="custom-content-above-home-tab" href="<?=base_url("risk_management/Input_new_risk_register/table_data")?>" role="tab" aria-controls="custom-content-above-home" aria-selected="true">TABEL DATA RISK REGISTER</a>
            </li>
          </ul>
          <!--/.TAB-->

          <div class="row">
              <div class="col-md-12">
              <!-- form -->
              <form class="form-horizontal" method="post" > 
                <!--card body-->
                <div class="card-body" style="background-color: #F8ECC2;">
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">ACTIVITY / PRODUCT / SERVICES<br><i>(BASE ON PROCESS)</i> </label>
                    <div class="col-sm-9">
                      <select class="form-control activity" id="activity>
                          <option value="1">Activity 1</option>
                          <option value="2">Activity 2</option>
                          <option value="3">Activity 3</option>
                        </select>
                    </div> 
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">TAHAPAN PROSES</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK SOURCE IDENTIFICATION</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CONTEXT<br>(INTERNAL / EXTERNAL) </label>
                    <div class="col-sm-9" id="fieldList">
                      <input type="text" class="form-control" id="riscon" name="riskcontext" placeholder="TEXT">
                      <button class="btn btn-flat btn-secondary mt-2" id="addinput">Add other</button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK ANALYSIS</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TYPE</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="input" name="input" placeholder="TEXT">
                        <option selected disabled>SELECT</option>
                        <?php foreach($risk_type as $row):?>
                          <option value="<?= $row['id']?>"><?= $row['name'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CATEGORY</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="input" name="input" placeholder="TEXT">
                        <option selected disabled>SELECT</option>
                        <?php foreach($risk_category as $row):?>
                          <option value="<?= $row['id']?>"><?= $row['name'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK CONDITION</label>
                    <div class="col-sm-9">
                      <select class="form-control" id="input" name="input" placeholder="TEXT">
                        <option selected disabled>SELECT</option>
                        <?php foreach($risk_condition as $row):?>
                          <option value="<?= $row['id']?>"><?= $row['name'];?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TREATMENT (PRESENT)</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <h5 class="text-center" style="margin: 25px;"><strong>RISK EVALUATION</strong></h5>
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
                      <select class="form-control" name="package" id="package">
                        <option selected disabled>SELECT</option>
                        <option value="1">LOW</option>
                        <option value="2">MEDIUM</option>
                        <option value="3">HIGH</option>
                        <option value="4">EXTREME</option>
                      </select>
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
                      <input type="text" class="form-control" id="status" name="input" placeholder="---" readonly>
                      <!--<input type="hidden" name="hdstatus" id="hdstatus">-->
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK OWNER</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                      <button class="btn btn-flat btn-secondary mt-2" onClick="dynamicinput()">Save</button>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK TREATMENT (FUTURE)<br>MANAGEMENT PROGRAM</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">RISK PRIOITY CONSIDERATION</label>
                    <div class="col-sm-9">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="riskprior1" name="riskprior">
                        <label for="riskprior1" class="custom-control-label">Regulation Compliance</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="riskprior2" name="riskprior">
                        <label for="riskprior2" class="custom-control-label">The availability pf theecnology options</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="riskprior3" name="riskprior">
                        <label for="riskprior3" class="custom-control-label">Consideration of finan capability</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="riskprior4" name="riskprior">
                        <label for="riskprior4" class="custom-control-label">Requirents for business interest</label>
                      </div>
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" id="riskprior5" name="riskprior">
                        <label for="riskprior5" class="custom-control-label">Consideration of related parties</label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">IMPROVMENT OPPORTUNITY /<br> STRATEGIC INITIATIVE </label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">PRIORITY</label>
                    <div class="col-sm-3">
                      <select class="form-control" id="input" name="input" placeholder="TEXT">
                        <option>SELECT</option>
                        <option>A - URGENT</option>
                        <option>B - </option>
                        <option>C - </option>
                      </select>
                    </div>
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">TIME PLANT</label>
                    <div class="col-sm-3">
                      <input type="date" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">STATUS IMPLEMENTATION</label>
                    <div class="col-sm-3">
                      <select class="form-control" id="input" name="input" placeholder="TEXT">
                        <option>SELECT</option>
                        <option>BOT COMPLETED</option>
                        <option>IN PROGRESS</option>
                        <option>COMPLETED</option>
                      </select>
                    </div>
                    <label for="input" class="col-sm-3 col-form-label" style="text-align:right">EVIDANCE</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="input" name="input" placeholder="TEXT">
                    </div>
                  </div>
                  <div id="reeva" >
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
                        <button class="btn btn-flat btn-secondary mt-2" onClick="dynamicinput()">Save</button>
                      </div>
                    </div>
                  </div>

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
          </div>
        </div>
      </section>
      <!-- /.content -->

    </div>
    <!-- /.content-wrapper -->

    <!-- JSQuery -->
  
  <script src="<?= base_url('assets/templates') ?>/plugins/select2/js/select2.full.min.js"></script>
  <script>

    window.onload = function(){  
      document.getElementById("reeva").style.visibility = "hidden";
    } 

    $('#package').on('change', function(){
    const selectedPackage = $('#package').val();
    var result="ACCEPTED";
    //var sthd= 1;
    if(selectedPackage!=1){
      result="NOT ACCEPTED";
      document.getElementById("reeva").style.visibility = "visible";
      //shhd = 0;
    }else{
      document.getElementById("reeva").style.visibility = "hidden";
      result="ACCEPTED";
    }
    $('#status').val(result);
    //$('#hdstatus').val(sthd);

    $('#activity').select2();

  });
  </script>