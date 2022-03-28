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
                                   <button type="button" class="btn btn-sm btn-primary mb-2" id="btnAddDepartment">Add Department</button>
                                   <table class="table table-sm">
                                        <thead>
                                             <tr>
                                                  <th class="text-center">#</th>
                                                  <th class="text-center">NAMA PLANT</th>
                                                  <th class="text-center">NAMA DEPARTMENT</th>
                                                  <th class="text-center">AKTIF</th>
                                                  <th class="text-center">TOOL</th>
                                             </tr>
                                        </thead>
                                        <tbody id="menu_tbody">
                                             <?php foreach ($departments as $department) : ?>
                                                  <tr>
                                                       <td class="text-center"><?= $department["intIdDepartement"] ?></td>
                                                       <td><?= $department["txtNamaPlant"] ?></td>
                                                       <td><?= $department["txtNamaDepartement"] ?></td>
                                                       <td class="text-center">
                                                            <?php if ($department["bitActive"]) : ?>
                                                                 <i class="fas fa-check text-success"></i>
                                                            <?php else : ?>
                                                                 <i class="fas fa-times text-danger"></i>
                                                            <?php endif; ?>
                                                       </td>
                                                       <td class="text-center">
                                                            <button class="btn btn-warning btn-sm btnEditDepartment" data-id="<?= $department["intIdDepartement"]; ?>"><i class="fas fa-edit"></i> Edit</button>
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
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="modalDepartment" tabindex="-1" role="dialog" aria-labelledby="modalDepartmentTitle" aria-hidden="true">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
               </div>
               <form id="formModalDepartment">
                    <div class="modal-body">
                         <div class="form-group">
                              <label for="intIdDepartement">ID Department</label>
                              <input type="text" class="form-control" name="intIdDepartement" id="intIdDepartement" readonly>
                         </div>
                         <div class="form-group">
                              <label for="intIdPlant">Plant<small class="text-danger">* (Wajib di isi)</small></label>
                              <select class="form-control" id="intIdPlant" name="intIdPlant"></select>
                         </div>
                         <div class="form-group">
                              <label for="txtNamaDepartement">Nama<small class="text-danger">* (Wajib di isi)</small></label>
                              <input type="text" class="form-control" id="txtNamaDepartement" name="txtNamaDepartement" placeholder="Nama Department" required>
                         </div>
                         <div class="form-group">
                              <label for="bitActive">Aktif</label>
                              <input type="checkbox" class="form-control" id="bitActive" name="bitActive">
                         </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                         <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Tutup</button>
                         <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>
<script src="<?= base_url("assets/custom_js/master/department.js"); ?>"></script>