<div class="row" id="form_risk_iden">
	<div class="col-lg-12">
		<div class="card card-primary">
			<div class="card-header">
				<h3 class="card-title">Form Risk Identification</h3>
				<div class="card-tools">
					<button type="button" class="btn btn-tool" id="close_form_risk_iden">
						<i class="fas fa-times"></i>
					</button>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Source Identification</label></div>
								<div class="col-lg-10 col-xs-12">
									<input type="text" name="txtSourceRiskIden" id="txtSourceRiskIden" class="form-control">									
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Analysis</label></div>
								<div class="col-lg-10 col-xs-12">
									<input type="text" name="txtRiskAnalysis" id="txtRiskAnalysis" class="form-control">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Type</label></div>
								<div class="col-lg-10 col-xs-12">
									<select name="txtRiskType" id="txtRiskType" class="form-control" required></select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Category</label></div>
								<div class="col-lg-10 col-xs-12">
									<select name="txtRiskCategory" id="txtRiskCategory" class="form-control" required></select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Condition</label></div>
								<div class="col-lg-10 col-xs-12">
									<select name="txtRiskCondition" id="txtRiskCondition" class="form-control" required></select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Treatmen (Present)</label></div>
								<div class="col-lg-10 col-xs-12">
									<textarea name="txtRiskTreatmentCurrent" id="txtRiskTreatmentCurrent" class="form-control" cols="30" rows="4"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<h3 class="text-center"><b>Risk Evaluation</b></h3>
								<br>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Consequences</label></div>
								<div class="col-lg-10 col-xs-12">
									<div class="row">
										<div class="col-lg-5 col-xs-5">
											<div class="row">
												<div class="col-lg-12 col-xs-12">
													<select name="intConsequence" class="form-control" id="intConsequence">

													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-7 col-xs-7">
											<div class="row">
												<div class="col-lg-2 col-xs-12"><label for="">Risk Level</label></div>
												<div class="col-lg-10 col-xs-12">
													<input type="text" name="txtRiskLevel" id="txtRiskLevel" class="form-control" required disabled>
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
													<select name="intLikelihood" class="form-control" id="intLikelihood" required>

													</select>
												</div>
											</div>
										</div>
										<div class="col-lg-7 col-xs-7">
											<div class="row">
												<div class="col-lg-2 col-xs-12"><label for="">Risk Status</label></div>
												<div class="col-lg-10 col-xs-12">
													<select name="bitStatusKepentingan" class="form-control" id="bitStatusKepentingan" required disabled>
														<option value="">Select Risk Status</option>
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
									<input type="text" name="txtRiskOwner" id="txtRiskOwner" class="form-control" disabled>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Treatment (Future)</label></div>
								<div class="col-lg-10 col-xs-12">
									<textarea name="txtRiskTreatmentFuture" id="txtRiskTreatmentFuture" class="form-control" cols="30" rows="4"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-2 col-xs-12"><label for="">Risk Priority Consideration</label></div>
								<div class="col-lg-10 col-xs-12">
									<select name="txtRiskPriorityConsideration" id="txtRiskPriorityConsideration" class="form-control" required>
										<option value="">Select Risk Priority Consideration</option>
										<option value="Regulation Compliance">Regulation Compliance</option>
										<option value="The availability of technology options">The availability of technology options</option>
										<option value="Consideration of financial capability">Consideration of financial capability</option>
										<option value="Requirements for business interests">Requirements for business interests</option>
										<option value="Consideration of related parties">Consideration of related parties</option>
									</select>
								</div>
							</div>
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
											<input type="number" name="intTimePlantYear" id="intTimePlantYear" class="form-control" placeholder="Year">
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
				</div>
			</div>
			<div class="card-footer">
				<div class="row">
					<div class="col-lg-12 d-flex justify-content-end"><button class="btn btn-success" id="simpan_form_risk">Save</button></div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-12" id="data_revaluation">
		<div class="card card-warning">
			<div class="card-header">
				<h3 class="card-title" style="color: white;">Risk Re-evaluation</h3>
				<div class="card-tools">

				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-lg-12 d-flex justify-content-end">
						<button class="btn btn-primary mb-4" id="add_risk_reevaluation" data-toggle="modal" data-target="#modal-revaluation_risk">Add Risk Re-evaluation</button>
					</div>
					<div class="col-lg-12">
						<table class="table table-bordered" id="risk_revaluation_table">
							<thead>
								<tr>
									<th class="text-center">Evaluasi Ke-</th>
									<th class="text-center">Risk Level</th>
									<th class="text-center">Risk Status</th>
									<th class="text-center">Risk Owner</th>
									<th class="text-center">Option</th>
								</tr>
							</thead>
							<tbody></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
