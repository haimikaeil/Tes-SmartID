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
							<label class="control-label col-md-3 fw-600"><?=ucwords(str_replace('_', ' ', 'sub_kategori Penilaian'))?></label>
							<div class="col-md-4">
								<input class="form-control" type="hidden" name="id_sub_kategori" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi id_sub_kategori'))?>" value="<?=@$item->id_sub_kategori?>" required/>
								<input class="form-control" type="text" name="sub_kategori" placeholder="<?=ucwords(str_replace('_', ' ', 'Isi sub_kategori'))?>" value="<?=@$item->sub_kategori?>" required/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 fw-600"><?=ucwords(str_replace('_', ' ', 'Kategori'))?></label>
							<div class="col-md-4">
								<select name="id_kategori" class="form-control">
									<option>Pilih Kategori</option>
									<?php foreach ($kategori as $key => $v) { ?>
										<?php
											$selected = '';
											if($v->id_kategori == $item->id_kategori){
												$selected = 'selected';
											}
										?>
										<option value="<?=$v->id_kategori?>" <?=@$selected?>><?=$v->kategori?></option>
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					<div class="form-actions">
						<div class="row">
							<div class="col-md-offset-3 col-md-9">
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