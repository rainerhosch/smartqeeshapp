<div class="modal fade" id="modal-revaluation_risk">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Add Risk Re-Evaluation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="button_close_revaluation">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-xs-12"><label for="">Consequences</label></div>
						<div class="col-lg-10 col-xs-12">
							<div class="row">
								<div class="col-lg-5 col-xs-5">
									<div class="row">
										<div class="col-lg-12 col-xs-12">
											<select name="intConsequence_revaluation" class="form-control" id="intConsequence_revaluation">

											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-xs-7">
									<div class="row">
										<div class="col-lg-2 col-xs-12"><label for="">Risk Level</label></div>
										<div class="col-lg-10 col-xs-12">
											<input type="text" name="txtRiskLevel_revaluation" id="txtRiskLevel_revaluation" class="form-control" required>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-xs-12"><label for="">Likelihood</label></div>
						<div class="col-lg-10 col-xs-12">
							<div class="row">
								<div class="col-lg-5 col-xs-5">
									<div class="row">
										<div class="col-lg-12 col-xs-12">
											<select name="intLikelihood_revaluation" class="form-control" id="intLikelihood_revaluation" required>

											</select>
										</div>
									</div>
								</div>
								<div class="col-lg-7 col-xs-7">
									<div class="row">
										<div class="col-lg-2 col-xs-12"><label for="">Risk Status</label></div>
										<div class="col-lg-10 col-xs-12">
											<select name="bitStatusKepentingan_revaluation" class="form-control" id="bitStatusKepentingan_revaluation" required>
												<option value="">Pilih Risk Status</option>
												<option value="1">Accepted</option>
												<option value="0">Not Accepted</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-lg-2 col-xs-12"><label for="">Risk Owner</label></div>
						<div class="col-lg-10 col-xs-12">
							<input type="text" name="txtRiskOwner_revaluation" id="txtRiskOwner_revaluation" class="form-control">
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="tombol_simpan_revaluation_risk">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>

</script>
