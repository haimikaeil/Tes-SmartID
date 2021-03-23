<div class="row">
	<div class="col-md-12">
		<div class="portlet light">
			<div class="portlet-title">
				<div class="caption">
					Form Tambah <?=ucwords(@$this->title)?>
				</div>
			</div>
			<div class="portlet-body form">
				<!-- BEGIN FORM-->
				<form action="<?=site_url($this->cname.'/do_tambah')  ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
					<div class="form-body">
						<div class="form-group">
	                        <label class="control-label col-md-2 fw-600">Foto</label>
	                        <div class="col-md-8">
	                            <div class="fileinput fileinput-new" data-provides="fileinput">
	                                <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
	                                    <img src="<?=base_url('assets/img_not_available.png')?>" alt=""> </div>
	                                <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
	                                <div>
	                                    <span class="btn btn-default btn-file">
	                                        <span class="fileinput-new"> Pilih Gambar </span>
	                                        <span class="fileinput-exists"> Ubah </span>
	                                        <input type="file" value="" name="foto"></span>
	                                    <a href="javascript:;" class="btn btn-danger fileinput-exists" data-dismiss="fileinput"> Hapus </a>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
						<div class="form-group">
							<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'Nama Pegawai'))?></label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="nama" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi Nama Pegawai'))?>" value="<?=@$this->session->flashdata('postdata')->nama?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'No Telepon'))?></label>
							<div class="col-md-4">
								<input class="form-control" type="text" name="no_telp" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi no_telp'))?>" value="<?=@$this->session->flashdata('postdata')->no_telp?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'alamat'))?></label>
							<div class="col-md-6">
								<input class="form-control" type="text" name="alamat" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi alamat'))?>" value="<?=@$this->session->flashdata('postdata')->alamat?>" required/>
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