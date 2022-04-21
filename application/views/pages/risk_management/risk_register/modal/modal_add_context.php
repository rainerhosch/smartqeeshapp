<div class="modal fade" id="modal-add_context">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Context Risk</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" id="button_close_context">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="">Context Risk</label>
					<textarea id="txtNamaContext" class="form-control" cols="30" rows="15" autocomplete="false"> </textarea>
				</div>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary" id="tombol_simpan_add_context">Save</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<script>
	$(document).ready(function() {
		$('#txtNamaContext').summernote({
			height: 300,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph', 'height']],				
				['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
			]
		})
	});
</script>
