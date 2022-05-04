<form action="#" method="post" enctype="multipart/form-data" id="form_data_risk_future">
	<div class="modal fade" id="modal-risk_future">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Tambah Risk Treatment Current</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="button_close_risk_future">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="">Risk Treatment Future</label>
						<input type="text" id="txtRiskTreatmentCurrent" class="form-control" autocomplete="false" />
					</div>
					<div class="form-group" class="checkbox_consideration">
						<label for="">Risk Priority Consideration</label>
						<br>
						<input type="checkbox" value="Regulation Compliance" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
						<label for="">Regulation Compliance</label>
						<br>
						<input type="checkbox" value="The availability of technology options" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
						<label for="">The availability of technology options</label>
						<br>
						<input type="checkbox" value="Consideration of financial capability" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
						<label for="">Consideration of financial capability</label>
						<br>
						<input type="checkbox" value="Requirements for business interests" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
						<label for="">Requirements for business interests</label>
						<br>
						<input type="checkbox" value="Consideration of related parties" name="txtRiskPriorityConsideration[]" id="txtRiskPriorityConsideration">
						<label for="">Consideration of related parties</label>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2 col-xs-12"><label for="">Improvement Opurtunity / Strategic Initiative</label></div>
							<div class="col-lg-10 col-xs-12">
								<textarea name="txtImprovement" id="txtImprovement" class="form-control" cols="30" rows="4"></textarea>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2 col-xs-12"><label for="">Priority</label></div>
							<div class="col-lg-10 col-xs-12">
								<select name="charRiskPriority" id="charRiskPriority" class="form-control" required>
									<option value="">Select Risk Priority</option>
									<option value="1">Urgent</option>
									<option value="2">Medium</option>
									<option value="3">Low</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2 col-xs-12"><label for="">Status Implementation</label></div>
							<div class="col-lg-10 col-xs-12">
								<select name="txtStatusImplementation" id="txtStatusImplementation" class="form-control" required>
									<option value="">Select Status Implementation</option>
									<option value="Not Completed">Not Completed</option>
									<option value="In Progress">In Progress</option>
									<option value="Completed">Completed</option>
								</select>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-2 col-xs-12"><label for="">Time Plan</label></div>
							<div class="col-lg-10 col-xs-12">
								<div class="row">
									<div class="col-lg-6 col-xs-6">
										<select name="intTimePlantMonth" class="form-control" id="intTimePlantMonth">
											<option value="1">January</option>
											<option value="2">February</option>
											<option value="3">March</option>
											<option value="4">April</option>
											<option value="5">May</option>
											<option value="6">June</option>
											<option value="7">July</option>
											<option value="8">August</option>
											<option value="9">September</option>
											<option value="10">October</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
									</div>
									<div class="col-lg-6 col-xs-6">
										<input type="number" name="intTimePlantYear" id="intTimePlantYear" class="form-control" placeholder="Year" value="<?= date('Y') ?>">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="exampleInputFile">Evidence</label>
						<div class="input-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="txtFileEvidance">
								<label class="custom-file-label" for="txtFileEvidance">Choose file</label>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary" id="tombol_simpan_add_risk_future">Save</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</form>
