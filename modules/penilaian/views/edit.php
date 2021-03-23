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
							<div class="form-group">
								<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'pegawai'))?></label>
								<div class="col-md-4">
									<input type="hidden" name="id_pegawai_hid" value="<?=@$item->id_pegawai?>"/>
									<select name="id_pegawai" class="form-control select2">
										<option>Pilih Pegawai</option>
										<?php foreach ($pegawai as $key => $v) { ?>
											<?php
												$selected='';
												if($item->id_pegawai == $v->id_pegawai){
													$selected = 'selected';
												}
											?>
											<option value="<?=$v->id_pegawai?>" <?=@$selected?>><?=$v->nama?></option>
										<?php } ?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-2 fw-600"><?=ucwords(str_replace('_', ' ', 'Penilaian'))?></label>
							<div class="col-md-6">
								<table class="table table-bordered table-condensed table-striped">
									<thead>
										<tr>
											<th>Penilaian</th>
											<th>Nilai</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($detail_nilai as $key => $v) { ?>
											<tr>
												<td><input name="id_sub_kategori[]" value="<?=$v->id_sub_kategori?>" type="hidden"><?=$v->sub_kategori?></td>
												<td><input name="nilai[]" type="text" class="form-control" placeholder="Persentase Nilai" value="<?=$v->nilai?>" /></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
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