<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= ucwords(strtolower($page)); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><?= ucwords(strtolower($modul)); ?></li>
						<li class="breadcrumb-item active"><?= ucwords(strtolower($page)); ?></li>
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
							<h3 class="card-title">Data <?= ucwords(strtolower($page)); ?></h3>
						</div>
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
</div>
