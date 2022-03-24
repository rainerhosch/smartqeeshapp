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
              <li class="breadcrumb-item"><a href="<?=base_url('dashboard/legal_compliance/index') ?>">LEGAL COMPLIANCE</a></li>
              <li class="breadcrumb-item text-white"><a>MASTERLIST REGULATION</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

  <!-- Main content -->
    <section class="content">
      <div class="col-12">
        <div class="card card-primary card-outline card-outline-tabs">
          <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-tabs-four-quality-tab" data-toggle="pill" href="#custom-tabs-four-quality" role="tab" aria-controls="custom-tabs-four-quality" aria-selected="true">QUALITY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-health-tab" data-toggle="pill" href="#custom-tabs-four-health" role="tab" aria-controls="custom-tabs-four-health" aria-selected="false">HEALTH</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-safety-tab" data-toggle="pill" href="#custom-tabs-four-safety" role="tab" aria-controls="custom-tabs-four-safety" aria-selected="false">SAFETY AND FIRE</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-environment-tab" data-toggle="pill" href="#custom-tabs-four-environment" role="tab" aria-controls="custom-tabs-four-environment" aria-selected="false">ENVIRONMENT</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-energy-tab" data-toggle="pill" href="#custom-tabs-four-energy" role="tab" aria-controls="custom-tabs-four-energy" aria-selected="false">ENERGY</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-tabs-four-all-tab" data-toggle="pill" href="#custom-tabs-four-all" role="tab" aria-controls="custom-tabs-four-all" aria-selected="false">ALL</a>
              </li>
            </ul>
          </div>
          <div class="card-body">
            <div class="tab-content" id="custom-tabs-four-tabContent">
              <div class="tab-pane fade show active" id="custom-tabs-four-quality" role="tabpanel" aria-labelledby="custom-tabs-four-quality-tab">
                <h5>QUALITY REGULATION MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-health" role="tabpanel" aria-labelledby="custom-tabs-four-health-tab">
                <h5>HEALTH REGULATION MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-safety" role="tabpanel" aria-labelledby="custom-tabs-four-safety-tab">
                <h5>SAFETY REGULATION MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-environment" role="tabpanel" aria-labelledby="custom-tabs-four-environment-tab">
                <h5>ENVIRONMENT REGULATION MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-energy" role="tabpanel" aria-labelledby="custom-tabs-four-energy-tab">
                <h5>ENERGY REGULATION MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
                </div>
                <div>
                    <button class="btn btn-block btn-flat bg-danger col-md-2 mt-3">DOWNLOAD TO PDF</button>
                </div>
              </div>
              <div class="tab-pane fade" id="custom-tabs-four-all" role="tabpanel" aria-labelledby="custom-tabs-four-all-tab">
              <h5>ALL MASTERLIST</h5>
                <div class="form-group row mt-4">
                    <label for="filterperlevel" class="col-sm-2 col-form-label">FILTER AS PER LEVEL</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterperlevel">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                    <label for="filterpertype" class="col-sm-2 col-form-label">FILTER AS PER TYPE</label>
                    <div class="col-sm-4">
                        <select class="form-control" id="filterpertype">
                            <option disabled selected>-----</option>
                            <option value="id">Option 1</option>
                            <option value="id">Option 2</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-2">
                    <label for="keywordsearch" class="col-sm-2 col-form-label">KEYWORDS SEARCH</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keywordsearch">
                    </div>
                </div>
                <div class="table-responsive" style="height: 200px;">
                    <table class="table table-bordered table-head-fixed text-center">
                        <thead>
                          <tr>
                            <th style="width: 10px; background-color: #999999;">No.</th>
                            <th style="background-color: #999999;">TITLE</th>
                            <th style="background-color: #999999;">NUMBER</th>
                            <th style="background-color: #999999;">LEVEL</th>
                            <th style="background-color: #999999;">TYPE</th>
                            <th style="background-color: #999999;">COMPLIANCE STATUS</th>
                            <th style="background-color: #999999;">ACTION</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                          <tr>
                            <td>1.</td>
                            <td>Update software</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>
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