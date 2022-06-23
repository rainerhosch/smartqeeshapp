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
            <li class="breadcrumb-item text-white">INPUT NEW REGULATION</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

   <!-- Main content -->
   <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-7">
                            <form action="" method="post">
                                <div class="form-group row">
                                    <label for="regulation_related_to" class="col-sm-4 col-form-label">REGULATION RELATED TO</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="regulation_related_to" name="regulation_related_to">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regulation_number" class="col-sm-4 col-form-label">REGULATION NUMBER</label>
                                    <div class="col-sm-8">
                                      <input type="number" class="form-control" id="regulation_number" name="regulation_number">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regulation_title" class="col-sm-4 col-form-label">REGULATION TITLE</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="regulation_title" name="regulation_title">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level_of_regulation" class="col-sm-4 col-form-label">LEVEL OF REGULATION</label>
                                    <div class="col-sm-8">
                                     <select name="level_of_regulation" id="level_of_regulation" class="form-control">
                                         <option value="">-- Level Of Regulation --</option>
                                     </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_of_regulation" class="col-sm-4 col-form-label">TYPE OF REGULATION</label>
                                    <div class="col-sm-8">
                                     <select name="type_of_regulation" id="type_of_regulation" class="form-control">
                                         <option value="">-- Type Of Regulation --</option>
                                     </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="related_clause" class="col-sm-4 col-form-label">RELATED CLAUSE</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="related_clause" name="related_clause">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="form-group row">
                                            <label for="status_of_compliance" class="col-6 col-form-label">STATUS OF COMPLIANCE</label>
                                            <div class="col-sm-6">
                                                <select name="status_of_compliance" id="status_of_compliance" class="form-control">
                                                    <option value="">-- Status Of Compliance --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="priod" class="col-6 col-form-label">PERIOD</label>
                                            <div class="col-sm-6">
                                                <select name="priod" id="priod" class="form-control">
                                                    <option value="">-- Period --</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activy" class="col-sm-4 col-form-label">ACTIVY/IMPLEMENTATION</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="activy" name="activy">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="action_program" class="col-sm-4 col-form-label">ACTION PROGRAM</label>
                                    <div class="col-sm-8">
                                      <input type="text" class="form-control" id="action_program" name="action_program">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4"></div>
                                    <div class="col">
                                        <a href="" class="btn btn-sm btn-secondary">ADD NEW RELATED CLAUSE</a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="upload" class="col-sm-4 col-form-label">UPLOAD</label>
                                    <div class="col-sm-8">
                                      <input type="file" class="form-control" id="upload" name="upload">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4"></div>
                                    <div class="col">
                                        <button class="btn btn-danger">SAVE</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->