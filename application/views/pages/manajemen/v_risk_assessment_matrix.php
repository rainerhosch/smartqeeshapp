<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $page; ?></h1>
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
                            <h3 class="card-title">Data <?= $subpage; ?></h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="search" class="form-control float-right inputSearch" placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default btnSearch">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-sm btn-primary btnAdd mb-2" data-toggle="modal">Add Risk Assessment Matrix</a>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">RISK CONSEQUENCE</th>
                                        <th class="text-center">LIKELIHOOD</th>
                                        <th class="text-center">TINGKAT RESIKO</th>
                                        <th class="text-center">RISK MATRIX</th>
                                        <th class="text-center">NAMA RESIKO</th>
                                        <th class="text-center">RISK OWNER</th>
                                        <th class="text-center">TOOL</th>
                                    </tr>
                                </thead>
                                <tbody id="menu_tbody">
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item"><a class="page-link" href="#">«</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">»</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- modal add menu -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modalAddMenuTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myForm">
                <input type="number" name="id" id="id" hidden>
                <input type="number" name="intIsAcceptable" hidden id="intIsAcceptable">
                    <div class="form-group row">
                        <label for="intIdRiskConsequence" class="col-sm-3 col-form-label">Risk Consequence</label>
                        <div class="col-sm-9">
                           <select name="intIdRiskConsequence" id="intIdRiskConsequence" class="form-control">
                               
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="intIdLikelihood" class="col-sm-3 col-form-label">Likelihood</label>
                        <div class="col-sm-9">
                           <select name="intIdLikelihood" id="intIdLikelihood" class="form-control">
                               
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ruleLikelihood" class="col-sm-3 col-form-label">Pilih</label>
                        <div class="col-sm-9">
                           <select name="ruleLikelihood" id="ruleLikelihood" class="form-control">
                               
                           </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtNamaResiko" class="col-sm-3 col-form-label">Nama Resiko</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="txtNamaResiko" id="txtNamaResiko">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtRiskMatrix" class="col-sm-3 col-form-label">Risk Matrix</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="txtRiskMatrix" id="txtRiskMatrix" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtTingkatResiko" class="col-sm-3 col-form-label">Tingkat Resiko</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="txtTingkatResiko" id="txtTingkatResiko" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="txtRiskOwner" class="col-sm-3 col-form-label">Owner Risk</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="txtRiskOwner" id="txtRiskOwner">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2 float-right">
                            <button type="submit" class="btn btn-block btn-sm btn-primary btnSave">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- modal Show -->
<div class="modal fade" id="modalShow" tabindex="-1" aria-labelledby="modalShow" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalShow">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
            <table class="table table-sm table-hover table-striped">
                <tr>
                    <th>Risk Consequense</th>
                    <td> : </td>
                    <td id="tbRiskConsequence"></td>
                </tr>
                <tr>
                    <th>Likelihood</th>
                    <td> : </td>
                    <td id="tbLikelihood"></td>
                </tr>
                <tr>
                    <th>Tingkat Resiko</th>
                    <td> : </td>
                    <td id="tbTingkatResiko"></td>
                </tr>
                <tr>
                    <th>Risk Matrix</th>
                    <td> : </td>
                    <td id="tbRiskMatrix"></td>
                </tr>
                <tr>
                    <th>Nama Resiko</th>
                    <td> : </td>
                    <td id="tbNamaResiko"></td>
                </tr>
                <tr>
                    <th>Is Acceptable</th>
                    <td> : </td>
                    <td id="tbIsAcceptable"></td>
                </tr>
                <tr>
                    <th>Risk Owner</th>
                    <td> : </td>
                    <td id="tbRiskOwner"></td>
                </tr>
                <tr>
                    <th>Dibuat Oleh</th>
                    <td> : </td>
                    <td id="tbInsertedBy"></td>
                </tr>
                <tr>
                    <th>Dibuat</th>
                    <td> : </td>
                    <td id="tbInserted"></td>
                </tr>
                <tr>
                    <th>Diedit Oleh</th>
                    <td> : </td>
                    <td id="tbUpdatedBy"></td>
                </tr>
                <tr>
                    <th>Diedit</th>
                    <td> : </td>
                    <td id="tbUpdated"></td>
                </tr>
            </table>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            type: "POST",
            url: "<?= base_url() ?>manajemen/risk_assessment_matrix/get_json",
            dataType: "json",
            success: function(response) {
                var html_mn = ``;
                var no = ``;
                if(response.data)
                {
                    $.each(response.data, function(key,val){
                        no = key + 1;
                        html_mn += `<tr>`;
                        html_mn += `<td class="text-center">${no}</td>`;
                        html_mn += `<td class="text-center">${val.rcKlasifikasi}</td>`;
                        html_mn += `<td class="text-center">${val.lhNama}</td>`;
                        html_mn += `<td class="text-center">${val.txtTingkatResiko}</td>`;
                        html_mn += `<td class="text-center">${val.txtRiskMatrix}</td>`;
                        html_mn += `<td class="text-center">${val.txtNamaResiko}</td>`;
                        html_mn += `<td class="text-center">${val.txtRiskOwner}</td>`;
                        html_mn += `<td class="text-center"><a class="btn btn-xs btn-info btnShow" data-id="${val.intIdRiskAssessmentMatrix}"><i class="fas fa-eye"></i></a> | <a class="btn btn-xs btn-warning btnEdit" data-id="${val.intIdRiskAssessmentMatrix}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.intIdRiskAssessmentMatrix}"><i class="fas fa-trash-alt"></i></a></td>`;
                        html_mn += `</tr>`;
                    });
                }
                $('#menu_tbody').html(html_mn);

                // event Klik tombol add
                $('.btnAdd').on('click', function(){
                    $('.modal-title').text('Tambah Risk Assessment Matrix');
                    $('#myModal').modal('show');
                })

                $('body').on('click','.btnEdit', function(){
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var description = $(this).data('description');
                    $('.modal-title').text('Edit Risk Assessment Matrix');
                    $('#id').val(id);
                    $('#name').val(name);
                    $('#description').val(description);
                    $('#myModal').modal('show');
                })
                
                // event klik delete
                $('body').on('click','.btnDelete', function(){
                    var id = $(this).data('id');
                    Swal.fire({
                        title: 'Are you sure?',
                        text: `The Type ${name}, will delete!`,
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url: "<?= base_url() ?>manajemen/risk_assessment_matrix/destroy",
                                data: {
                                    id: id
                                },
                                dataType: "json",
                                success: function(response) {
                                    if(response.code == 200)
                                    {
                                        var icon = 'success';
                                        var title = 'Deleted';
                                        var text = response.msg;
                                    }else if(response.code == 400)
                                    {
                                        var icon = 'error';
                                        var title = 'Error';
                                        var text = response.msg;
                                    }
                                    Swal.fire({
                                        icon: icon,
                                        title: title,
                                        text: text
                                    }).then(function(isConfirm){
                                        location.reload();
                                    })
                                }
                            })
                        }
                    })
                })

                // event search
                $('.inputSearch').on('keyup', function(){
                    var keyword = $(this).val();
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>manajemen/risk_assessment_matrix/search",
                        dataType: "json",
                        data: {
                            keyword:keyword
                        },
                        success: function(response) {
                            var html_mn = ``;
                            var no = ``;
                            $.each(response.data, function(key,val){
                                no = key + 1;
                                html_mn += `<tr>`;
                                html_mn += `<td class="text-center">${no}</td>`;
                                html_mn += `<td class="text-center">${val.name}</td>`;
                                html_mn += `<td class="text-center">${val.description}</td>`;
                                html_mn += `<td class="text-center"><a class="btn btn-xs btn-warning btnEdit" data-id="${val.id}" data-name="${val.name}" data-description="${val.description}"><i class="fas fa-pen"></i></a> | <a class="btn btn-xs btn-danger btnDelete" data-id="${val.id}" data-name="${val.name}"><i class="fas fa-trash-alt"></i></a></td>`;
                                html_mn += `</tr>`;
                            });
                            $('#menu_tbody').html(html_mn);
                        }
                    })
                });

                // get data risk consequence
                $.ajax({
                    type:'POST',
                    dataType: 'JSON',
                    url: '<?= base_url('manajemen/risk_assessment_matrix/getConsequence') ?>',
                    success: function(response){
                        $('#intIdRiskConsequence').append('<option selected disable>-- Pilih Risk Consequence --</option>');
                        $.each(response, function(key,value){
                            $('#intIdRiskConsequence').append('<option value="'+value['intIdRiskConsequence']+'">'+ value['txtNamaTingkatKlasifikasi'] +'</option>');
                        })
                    }
                })
                // get data likelihood
                $.ajax({
                    type:'POST',
                    dataType: 'JSON',
                    url: '<?= base_url('manajemen/risk_assessment_matrix/getLikelihood') ?>',
                    success: function(response){
                        $('#intIdLikelihood').append('<option selected disable>-- Pilih Likelihood --</option>');
                        $.each(response, function(key,value){
                            $('#intIdLikelihood').append('<option value="'+value['intIdLikelihood']+'">'+ value['intLikelihoodNumber'] + ' - ' + value['txtNamaLikelihood'] + '</option>');
                        })
                    }
                })

                // get data rulelikelihood after select likelihood
                $('#intIdLikelihood').on('change', function()
                {
                    $('#ruleLikelihood').empty();
                    var likelihood = $(this).val();
                    $.ajax({
                    type:'POST',
                    dataType: 'JSON',
                    url: '<?= base_url('manajemen/risk_assessment_matrix/ruleLikelihood') ?>',
                    data: {
                        likelihood
                    },
                    success: function(response){
                            $('#ruleLikelihood').append('<option selected disabled>-- Pilih --</option>');
                            $.each(response, function(key,value){
                                $('#ruleLikelihood').append('<option value="'+value['no']+ ',' +value['nama']+ ',' +value['keterangan']+'">'+ value['nama'] + ' - ' + value['keterangan'] + '</option>');
                            })
                        }
                    })
                });

                $('#ruleLikelihood').on('change', function(){
                    var rule = $(this).val();
                    var split = rule.split(',');
                    var txtRiskMatrix = split[0] + split[1].charAt(0);
                    if(split[2] === 'ACCEPTABLE')
                    {
                        var intIsAcceptable = 1;
                    }else{
                        var intIsAcceptable = 0;
                    }
                    $('#txtRiskMatrix').val(txtRiskMatrix);
                    $('#txtTingkatResiko').val(split[1]);
                    $('#intIsAcceptable').val(intIsAcceptable);
                })

                // event submit
                $('#myForm').on('submit', function(e){
                    e.preventDefault();
                    var id = $('#id').val();
                    var form = $('#myForm');
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url() ?>manajemen/risk_assessment_matrix/store",
                        data: form.serializeArray(),
                        dataType: "json",
                        success: function(response){
                            console.log(response);
                            if(response.code == 200)
                            {
                                var icon = 'success';
                                var title = 'Success';
                                var text = response.msg;
                            }else if(response.code == 400)
                            {
                                var icon = 'error';
                                var title = 'Error';
                                var text = response.msg;
                            }
                            Swal.fire({
                                icon: icon,
                                title: title,
                                text: text
                            }).then(function(isConfirm){
                                location.reload();
                            })
                        }
                    })
                    
                })

                // get show
                $('body').on('click','.btnShow', function(){
                    var id = $(this).data('id');
                    $.ajax({
                        type:'POST',
                        dataType: 'JSON',
                        url: '<?= base_url('manajemen/risk_assessment_matrix/getShow') ?>',
                        data: {
                            id
                        },
                        success: function(response){
                            var isAcceptable = '';
                            if(response.intIsAcceptable == 1)
                            {
                                isAcceptable = 'Acceptable';
                            }else{
                                isAcceptable = 'Not Acceptable';
                            }
                            $('.modal-title').text('Detail Risk Assessment Matrix');
                            $('#tbRiskConsequence').text(response.rcKlasifikasi);
                            $('#tbLikelihood').text(response.lhNama);
                            $('#tbTingkatResiko').text(response.txtTingkatResiko);
                            $('#tbRiskMatrix').text(response.txtRiskMatrix);
                            $('#tbNamaResiko').text(response.txtNamaResiko);
                            $('#tbIsAcceptable').text(isAcceptable);
                            $('#tbRiskOwner').text(response.txtRiskMatrix);
                            $('#tbInsertedBy').text(response.us1Username);
                            $('#tbInserted').text(response.dtmInsertedDate);
                            $('#tbUpdatedBy').text(response.us2Username);
                            $('#tbUpdated').text(response.dtmUpdatedDate);
                            $('#modalShow').modal('show'); 
                        }
                    })
                })

            }
        });
    });
</script>