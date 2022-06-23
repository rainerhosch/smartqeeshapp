 <style type="text/css">
   /*TEXT BOX*/
.info-box-dasbor {
    display: block;
    text-align: center; 
    font-weight: bold;
    color: white;
  }

.info-box-mini {
    display: block; 
    font-weight: bold;
    font-size: 0.55rem;
    color: white;
  }

/*BUTTON DASHBOARD*/
/*Management Policy*/
.bg-mp {
    background-color: #E58B79 !important;
}
  
.bg-mp,
.bg-mp > a {
  color: #fff !important;
}
  
.bg-mp.btn:hover {
  background-color: #9b0000 !important;
  color: #ececec;
}

/*IMS MANUAL*/
.bg-im {
    background-color: #C5BDAC !important;
}
  
.bg-im,
.bg-im > a {
  color: #fff !important;
}
  
.bg-im.btn:hover {
  background-color: #747474 !important;
  color: #ececec;
}

/*ORGANIZATION CONTEXT*/
.bg-oc {
    background-color: #E29D63 !important;
}
  
.bg-oc,
.bg-oc > a {
  color: #fff !important;
}
  
.bg-oc.btn:hover {
  background-color: #b65200 !important;
  color: #ececec;
}

/*SMART QEESH MOBILE*/
.bg-sqm {
    background-color: #936A9B !important;
}
  
.bg-sqm,
.bg-sqm > a {
  color: #fff !important;
}
  
.bg-sqm.btn:hover {
  background-color: #5d0070 !important;
  color: #ececec;
}

/*DIGITAL WORK PERMIT*/
.bg-dwp {
    background-color: #4C87A7 !important;
}
  
.bg-dwp,
.bg-dwp > a {
  color: #fff !important;
}
  
.bg-dwp.btn:hover {
  background-color: #003e5f !important;
  color: #ececec;
}

.card{
  width: 90px;
  font-size: 5pt;
}

.card-header{
  height: 30px;

}

.card-footer{
  font-size: 10pt;
}
 </style>

 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <!-- Main content -->
  <section class="content-header">
    <div class="row">
      <div class="col-lg-9 my-2">
        <div style="background-color: #FDF2D0;">
          <div class="card-body px-1 py-1">
            <div align="center">
              <h5 class="text-bold">PROCESS MANAGEMENT</h5>
              <h6>PM 1.0</h6>
            </div>
            <hr>
            <div class="row">
              <div class="col-1 mr-auto">
                <a href="<?=base_url('risk_management/home')?>" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    RISK MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/rim_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (1) RIM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="<?=base_url('legal_compliance/legal_compliance_home')?>" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    REGULATION COMPLIANCE
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/leg_icon2.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (2) LEG
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;  line-height: 3;">
                    BUSSINES PLAN
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/bnp_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (3) BNP
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="<?=base_url('performance_management/dashboard')?>" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    PERFORMANCE MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/pfm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (4) PFM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="<?=base_url('ncr_ca/Incident_Investigation') ?>" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1 px-1" style="font-weight: bold;">
                    NONCOMFORMITY & CORRECTIVE ACTION
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/nca_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (5) NCA
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-auto" style="font-weight: bold;">
                    INTERNAL AUDIT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/ina_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (6) INA
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="dashboard.html" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    MANAGEMENT REVIEW
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/mrg_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (7) MRG
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    CONTINUAL IMPROVEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/cim_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (8) CIM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-warning btn-warning">
                  <div class="card-header py-1" style="font-weight: bold;">
                    MANAGEMENT OF CHANGE
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #e3e6df;">
                    <img src="<?= base_url('assets/templates/img/icon/moc_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (9) MOC
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div style="background-color: #E0EBF6;">
          <div class="card-body px-1 py-1">
            <div align="center">
              <h5 class="mb-2 text-bold">OPERATION MANAGEMENT</h5>
              <h6>OM 2.0</h6>
            </div>
            <hr>
            <div class="text-center mx-1">
              <img src="<?= base_url('assets/templates/img/bagan_om.jpeg')?>" style="width: 60%; height: 60%;" class="mb-2">
            </div>
          </div>
        </div>
        <div style="background-color: #C1EED3;">
          <div class="card-body px-1 py-1">
            <div align="center">
                <h5 class="mb-2 text-bold">SUPPORTING MANAGEMENT</h5>
                <h6>SM 3.0</h6>
              </div>
              <hr>
            <div class="row">
              <div class="col-1 mr-auto">
                <a href="<?=base_url('risk_management/home')?>" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold; line-height: 1.5;">
                    FINANCE MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/fin_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (1) FIN
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold;">
                    HUMAN CAPITAL MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/hcm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (2) HCM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold; line-height: 1.5;">
                    ASSET MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/asm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (3) ASM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold;">
                    MAINTENANCE MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/mms_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (4) MMS
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="dashboard.html" class="card text-center bg-success btn-success">
                  <div class="card-header py-1 px-1" style="font-weight: bold; line-height: 1.5;">
                    WORKING ENVIRONMENT MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/wem_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (5) WEM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold; line-height: 1.5;">
                    INFORMATION MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/ifm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (6) IFM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="dashboard.html" class="card text-center bg-success btn-success">
                  <div class="card-header py-1" style="font-weight: bold;">
                    COMMUNICATION MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/com_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (7) COM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1 px-1" style="font-weight: bold;">
                    EMERGENCY RESPONSE MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/erm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (8) ERM
                  </div>
                </a>
              </div>
              <div class="col-1 mr-auto">
                <a href="#" class="card text-center bg-success btn-success">
                  <div class="card-header py-1 px-1" style="font-weight: bold;">
                    BUSSINES CONTINUITY MANAGEMENT
                  </div>
                  <div class="card-body px-1 py-1" style="background-color: #c7e3b3;">
                    <img src="<?= base_url('assets/templates/img/icon/bcm_icon.png')?>" style="width: 60px; height: 60px;">
                  </div>
                  <div class="card-footer" style="font-weight: bold;">
                    (9) BCM
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-2 my-2">
        <a href="<?= base_url('process_dashboard')?>" class="btn btn-block btn-warning btn-flat info-box-dasbor text-center py-auto" style="height: 31.5%;">
          <div class="text-lg" style="padding-top: 50%;">PROCESS MANAGEMENT</div>
        </a>
        <a href="#" class="btn btn-block btn-primary btn-flat info-box-dasbor" style="height: 35.5%;">
        <div class="text-lg" style="padding-top: 50%;">OPERATION MANAGEMENT</div>
        </a>
        <a href="#" class="btn btn-block btn-success btn-flat info-box-dasbor"  style="height: 31.5%;">
        <div class="text-lg" style="padding-top: 50%;">SUPPORTING MANAGEMENT</div>
        </a>
      </div>
      <div class="col-lg-1 my-2">
        <a href="#" class="btn btn-block bg-mp btn-flat" style="height: 19%; padding-top: 50%;">
          <div class="info-box-content">
            <span class="info-box-mini">MANAGEMENT POLICY</span>
          </div>
        </a>
        <a href="#" class="btn btn-block bg-im btn-flat" style="height: 19%; padding-top: 50%;">
            <div class="info-box-content">
              <span class="info-box-mini">IMS MANUAL</span>
            </div>
        </a>
        <a href="#" class="btn btn-block bg-oc btn-flat" style="height: 20.7%; padding-top: 50%;">
            <div class="info-box-content">
              <span class="info-box-mini">ORGANIZATION CONTEXT</span>
            </div>
        </a>
          <a href="#" class="btn btn-block bg-sqm btn-flat" style="height: 19%; padding-top: 50%;">
            <div class="info-box-content">
              <span class="info-box-mini">SMART QEESH MOBILE</span>
            </div>
        </a>
          <a href="#" class="btn btn-block bg-dwp btn-flat" style="height: 19%; padding-top: 50%;">
            <div class="info-box-content">
              <span class="info-box-mini">DIGITAL WORK PERMIT</span>
            </div>
        </a>
      </div>
    </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  window.onload = function(){  
     var element =  document.getElementById("mydiv");
     element.classList.add('sidebar-collapse');
    }
</script>