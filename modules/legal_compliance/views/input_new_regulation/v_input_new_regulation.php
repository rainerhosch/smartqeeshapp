<!-- Content Wrapper. Contains page content -->
<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 bg-warning py-2">
                    <h1 style="color: white;"><?=$modul?></h1>
                </div>
                <div class="col-sm-12 py-2 mt-2" style="background-color: rgb(66, 66, 66);">
                    <ol class="breadcrumb  float-sm-left">
                        <li class="breadcrumb-item text-white"><?=$modul?></li>
                        <li class="breadcrumb-item text-white"><?=$page?></li>
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
                            <form id="form" data-url="<?=$saveUrl?>">
                                <div class="form-group row">
                                    <label for="regulation_related_to" class="col-sm-4 col-form-label">REGULATION RELATED TO</label>
                                    <div class="col-sm-8">
                                        <input  name="fileUpload" type="hidden" id="fileUpload" data-type="input" value = ""/>
                                        <input type="text" class="form-control" id="relateds" name="relateds" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regulation_number" class="col-sm-4 col-form-label">REGULATION NUMBER</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="number" name="number" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="regulation_title" class="col-sm-4 col-form-label">REGULATION TITLE</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="title" name="title" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="level_of_regulation" class="col-sm-4 col-form-label">LEVEL OF REGULATION</label>
                                    <div class="col-sm-8">
                                        <select name="levels" id="levels" class="form-control select2" data-placeholder="-- Level Of Regulation --" data-library="select2" data-type="select" style="width:100%">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="type_of_regulation" class="col-sm-4 col-form-label">TYPE OF REGULATION</label>
                                    <div class="col-sm-8">
                                        <select name="types" id="types" class="form-control select2" data-type="select" data-library="select2" data-placeholder="-- Type Of Regulation --">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="related_clause" class="col-sm-4 col-form-label">RELATED CLAUSE</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="related_clause" name="related_clause" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-8">
                                        <div class="form-group row">
                                            <label for="status_of_compliance" class="col-6 col-form-label">STATUS OF COMPLIANCE</label>
                                            <div class="col-sm-6">
                                                <select name="status" id="status" class="form-control select2" data-type="select" data-library="select2" data-placeholder="-- Status Of Compliance --">
                                                    <option value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group row">
                                            <label for="priod" class="col-6 col-form-label">PERIOD</label>
                                            <div class="col-sm-6">
                                                <select name="periode" id="periode" class="form-control select2" data-library="select2" data-type="select" data-placeholder="-- Period --">
                                                    <option value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="activy" class="col-sm-4 col-form-label">ACTIVITY/IMPLEMENTATION</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="activity" name="activity" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="action_program" class="col-sm-4 col-form-label">ACTION PROGRAM</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="action_program" name="action_program" data-type="input">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-4"></div>
                                    <div class="col">
                                        <a href="" class="btn btn-sm btn-secondary">ADD NEW RELATED CLAUSE</a>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <label for="upload" class="col-sm-4 col-form-label">UPLOAD</label>
                                <div class="col-4 dropzoneLegal">
                                    <form class="dropzone image-temporary text-center" data-url="" enctype="multipart/form-data" data-target="fileUpload">
                                        <div class="fallback">
                                            <input name="file" type="file" />
                                        </div>
                                    </form>
                                    <div class="" id="fileUploadPlace"></div>
                                </div>
                                <style>
                                    .dropzone {
                                        border: 2px dashed rgba(0,0,0,.3) !important;
                                    }
                                </style>
                            </div>
                            <div class="row">
                                <div class="offset-4 col-4">
                                    <button class="btn btn-primary btn-rounded mt-4" type="button" id="btnProcessRegulation" data-type="insert">Save Change</button>
                                </div>
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
