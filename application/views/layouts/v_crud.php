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
			<div class="row">
				<div class="col-12">
					<div class="card bg-white">
						<div class="card-body">
                            <div class="btn-group mb-4 float-right" role="group">
                                <?= isset($buttonAction) ? $buttonAction : "" ?>
                            </div>
							<?=isset($table) ? $table : ""?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
