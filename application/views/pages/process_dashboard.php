<!-- CSS -->
<style type="text/css">
.card{
  width: 115px;
  font-size: 0.7rem;

}

.card-header{
  height: 50px;
  padding: 8px 8px 0px 8px;
}

.card-footer{
  font-size: 10pt;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="z-index: -999 !important;">
  <!-- Content Header (Page header) -->

  <div class="content-header">
    <div class="container-fluid">
      <div class="row px-auto py-2 mb-3 text-center" style="background-color: #F3CA4D;">
          <h2 class="card-body text-bold" style="color: white; text-align: center;">PROCESS MANAGEMENT DASHBOARD</h2>
      </div>
      <div class="row py-5" align="center" style="background-color: #FDF2D0">
        <div class="col-1 mr-auto">
          <a href="<?=base_url('risk_management/home')?>" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              RISK<br>MANAGEMENT
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/rim_icon.png')?>" >
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (1) RIM
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="<?=base_url('legal_compliance/legal_compliance_home')?>" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              REGULATION COMPLIANCE
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/leg_icon2.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (2) LEG
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              BUSSINES<br>PLAN
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/bnp_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (3) BNP
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              PERFORMANCE MANAGEMENT
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/pfm_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (4) PFM
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header px-1" style="font-weight: bold;">
              NONCOMFORMITY & CORRECTIVE ACTION
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/nca_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (5) NCA
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header py-auto" style="font-weight: bold;">
              INTERNAL<br>AUDIT
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/ina_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (6) INA
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              MANAGEMENT REVIEW
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/mrg_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (7) MRG
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              CONTINUAL IMPROVEMENT
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/cim_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (8) CIM
            </div>
          </a>
        </div>
        <div class="col-1 mr-auto">
          <a href="#" class="card text-center bg-warning btn-warning">
            <div class="card-header" style="font-weight: bold;">
              MANAGEMENT OF CHANGE
            </div>
            <div class="card-body" style="background-color: #e3e6df;">
              <img src="<?= base_url('assets/templates/img/icon/moc_icon.png')?>">
            </div>
            <div class="card-footer" style="font-weight: bold;">
              (9) MOC
            </div>
          </a>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
</div>
<!-- /.content-wrapper -->
<!-- script -->
<script>
  window.onload = function(){  
     var element =  document.getElementById("mydiv");
     element.classList.add('sidebar-collapse');
    }
</script>