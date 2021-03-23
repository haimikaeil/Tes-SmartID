<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Form Edit <?=ucwords(@$this->title)?>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="<?=site_url($this->cname.'/do_ubah')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-body">
						<div class="form-group">
							<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'Kategori Penilaian'))?></label>
							<div class="col-md-4">
								<input class="form-control" type="hidden" name="id_kategori" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi id_kategori'))?>" value="<?=@$item->id_kategori?>" required/>
								<input class="form-control" type="text" name="kategori" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi kategori Penilaian'))?>" value="<?=@$item->kategori?>" required/>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-2 col-md-9">
								<button type="submit" class="btn green">Simpan</button>
								<a href="<?=site_url($this->cname)?>" class="btn default">Kembali</a>
							</div>
						</div>
					</div>
				</form>
				<!-- END FORM-->
			</div>
		</div>
	</div>
</div>