<div class="modal fade" id="modal-default">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Activity</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="button_close_activity">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<!-- <div class="form-group">
					<label for="">Activity</label>
					<select name="" class="form-control" id="intIdActivityModalAdd">
						<option value="">Silahkan Pilih Activity</option>
						<?php foreach($activity as $data): ?>
							<option value="<?= $data["intIdActivity"] ?>"><?= $data["txtNamaActivity"] ?></option>
						<?php endforeach; ?>
					</select>					
				</div> -->
				<div class="form-group">
					<label for="">Activity</label>
					<input list="listActivity" id="txtActivityAdd" class="form-control" autocomplete="false" />
					<datalist id="listActivity" class="actList">						
					</datalist>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="tombol_simpan_add_activity">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	
</script>
