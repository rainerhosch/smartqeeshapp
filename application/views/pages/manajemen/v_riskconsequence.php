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
                              <form id="frmRiskConsequence">
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label for="intIdRiskConsequence" class="col-sm-2 col-form-label">ID</label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="intIdRiskConsequence" readonly>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="intTingkatKlasifikasi" class="col-sm-2 col-form-label">Tingkat Klasifikasi<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="number" class="form-control" id="intTingkatKlasifikasi">
                                                  <small class="text-danger">*Wajib di isi (hanya nomor)</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtNamaTingkatKlasifikasi" class="col-sm-2 col-form-label">Nama Tingkat Klasifikasi<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtNamaTingkatKlasifikasi" placeholder="Contoh: INSIGNIFICANT" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtTingkatKeparahan" class="col-sm-2 col-form-label">Tingkat Keparahan<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtTingkatKeparahan" placeholder="Tingkat Keparahan & Kepatuhan Perundangan" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtSebaranResiko" class="col-sm-2 col-form-label">Sebaran Resiko<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtSebaranResiko" placeholder="Contoh: didalam area kerja" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtBiayaPemulihan" class="col-sm-2 col-form-label">Biaya Pemulihan<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtBiayaPemulihan" placeholder="Contoh: < Rp. 500.000" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtLamaPemulihan" class="col-sm-2 col-form-label">Lama Pemulihan<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtLamaPemulihan" placeholder="Contoh: < 1 Hari" required>
                                                  <small class="text-danger">*Wajib di isi</small>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label for="txtCitraPerusahaan" class="col-sm-2 col-form-label">Citra Perusahaan<small class="text-danger">*</small></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCitraPerusahaan" placeholder="Contoh: Tidak menurunkan citra perusahaan" required>
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
                                                  <th class="text-center">TINGKAT KLASIFIKASI</th>
                                                  <th class="text-center">NAMA TINGKAT KLASIFIKASI</th>
                                                  <th class="text-center">AKTIF</th>
                                                  <th class="text-center">TOOL</th>
                                             </tr>
                                        </thead>
                                        <tbody id="menu_tbody">
                                             <?php foreach ($risksequences as $risksequence) : ?>
                                                  <tr>
                                                       <td class="text-center"><?= $risksequence["intIdRiskConsequence"] ?></td>
                                                       <td class="text-center"><?= $risksequence["intTingkatKlasifikasi"] ?></td>
                                                       <td><?= $risksequence["txtNamaTingkatKlasifikasi"] ?></td>
                                                       <td class="text-center">
                                                            <?php if ($risksequence["bitActive"]) : ?>
                                                                 <i class="fas fa-check text-success"></i>
                                                            <?php else : ?>
                                                                 <i class="fas fa-times text-danger"></i>
                                                            <?php endif; ?>
                                                       </td>
                                                       <td class="text-center">
                                                            <button class="btn btn-warning btn-sm btnEditRiskSequence" data-id="<?= $risksequence["intIdRiskConsequence"]; ?>"><i class="fas fa-edit"></i> Edit</button>
                                                       </td>
                                                  </tr>
                                             <?php endforeach; ?>
                                        </tbody>
                                   </table>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </section>
</div>

<script src="<?= base_url("assets/custom_js/master/riskconsequence.js"); ?>"></script>