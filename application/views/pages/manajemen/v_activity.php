<!-- Content Wrapper. Contains page content -->
<input type="hidden" id="txtHiddenObject">
<div class="content-wrapper">
     <section class="content-header">
          <div class="container-fluid">
               <div class="row mb-2">
                    <div class="col-sm-6">
                         <h1><?= $subpage; ?></h1>
                    </div>
                    <div class="col-sm-6">
                         <ol class="breadcrumb float-sm-right">
                              <li class="breadcrumb-item"><a href="#"><?= $page; ?></a></li>
                              <li class="breadcrumb-item active"><?= $subpage; ?></li>
                         </ol>
                    </div>
               </div>
          </div>
     </section>
     <section class="content">
          <div class="container-fluid">
               <div class="row">
                    <div class="col-12">
                         <div class="card bg-white">
                              <div class="card-header">
                                   <h3 class="card-title">Form <?= $subpage; ?></h3>
                              </div>
                              <form id="frmActivity">
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label for="intIdActivity" class="col-sm-2 col-form-label">ID</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="intIdActivity" readonly>
                                             </div>
                                        </div>
								<div class="form-group row">
                                             <label for="intIdSection" class="col-sm-2 col-form-label">Function<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <select class="form-control" id="intIdSection" required>
                                                       <option value="0">Pilih Function</option>
											<?php foreach ($section as $item) : ?>
                                                            <option value="<?= $item['intIdSection']; ?>"><?= $item['txtNamaSection']; ?></option>
                                                       <?php endforeach; ?>
                                                  </select>
                                                  <small class="text-danger">*Wajib di Pilih</small>
                                             </div>
                                        </div>
								<div class="form-group row">
                                             <label for="intIdDepartement" class="col-sm-2 col-form-label">Departement<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <select class="form-control" id="intIdDepartement" required>
                                                       <option value="0">Pilih Departement</option>                                                       
                                                  </select>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label for="txtNamaActivity" class="col-sm-2 col-form-label">Activity<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtNamaActivity" placeholder="Aktifitas pekerjaan" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>                                        
                                        <div class="form-group row">
                                             <label for="bitActive" class="col-sm-2 col-form-label">Active<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="checkbox" class="form-control" id="bitActive">
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>
                                   </div>
                                   <!-- /.card-body -->
                                   <div class="card-footer">
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                   </div>
                              </form>
                         </div>
                    </div>
               </div>
               <div class="row">
                    <div class="col-12">
                         <div class="card bg-white">
                              <div class="card-header">
                                   <h3 class="card-title">List Data <?= $subpage; ?></h3>
                                   <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 150px;">
                                             <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                             <div class="input-group-append">
                                                  <button type="submit" class="btn btn-default">
                                                       <i class="fas fa-search"></i>
                                                  </button>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                              <div class="card-body">
                                   <table class="table table-sm">
                                        <thead>
                                             <tr>
                                                  <th class="text-center">#</th>
                                                  <th class="text-center">NAMA DEPARTEMENT</th>
                                                  <th class="text-center">NAMA ACTIVITY</th>
                                                  <th class="text-center">AKTIF</th>
                                                  <th class="text-center">TOOL</th>
                                             </tr>
                                        </thead>
                                        <tbody id="menu_tbody">
                                             <?php foreach ($activities as $activity) : ?>
                                                  <tr>
                                                       <td class="text-center"><?= $activity["intIdActivity"] ?></td>
                                                       <td><?= $activity["txtNamaDepartement"] ?></td>
                                                       <td><?= $activity["txtNamaActivity"] ?></td>
                                                       <td class="text-center">
                                                            <?php if ($activity["bitActive"]) : ?>
                                                                 <i class="fas fa-check text-success"></i>
                                                            <?php else : ?>
                                                                 <i class="fas fa-times text-danger"></i>
                                                            <?php endif; ?>
                                                       </td>
                                                       <td class="text-center">
                                                            <button class="btn btn-warning btn-sm btnEditActivity" data-id="<?= $activity["intIdActivity"]; ?>"><i class="fas fa-edit"></i> Edit</button>
                                                       </td>
                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                              <!-- <div class="card-footer clearfix">
                                   <ul class="pagination pagination-sm m-0 float-right">
                                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                                   </ul>
                              </div> -->
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>
<script src="<?= base_url("assets/custom_js/master/activity.js"); ?>"></script>
