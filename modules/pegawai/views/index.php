<!-- BEGIN PAGE BASE CONTENT -->
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="col-md-12"></div>
            <div class="portlet-title">
                <div class="caption font-dark font-green-sharp">
                    <i class="<?=$this->icon?> font-green-sharp font-dark"></i>
                    <span class="caption-subject bold uppercase"> Data <?=$this->title?></span>
                </div>
                <div class="actions">
                    <a class="btn sbold btn-default" href="<?=site_url($this->cname.'/tambah')?>"><i class="fa fa-plus"></i> Tambah</a>
                </div>
                
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered table-hover" id="tabel">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Pegawai</th>
                            <th style="text-align: center;">No Telepon</th>
                            <th style="text-align: center;">Alamat</th>
                            <th style="width:125px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
<!-- END PAGE BASE CONTENT -->
<script type="text/javascript">
    $(document).ready(function(){
        var oTable = $('#tabel').dataTable( {
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": '<?php echo site_url($this->cname . "/get_data");?>', //mengambil data ke controller datatable fungsi getdata
            "sPaginationType": "full_numbers",
            "aLengthMenu": [[15, 30, 75, -1], [15, 30, 75, "All"]],
            "iDisplayStart ":15,
            "columns": [
                {"data": "foto", 
                    "render": function(data, type, row) {
                        if(data){
                            return '<img src="<?=base_url('uploads').'/'?>'+data+'" width=" 100px"/>';
                        }else{
                            return '<img src="<?=base_url('assets/img_not_available.png')?>" width=" 100px"/>';
                        }
                        
                    }
                },
                { "data": "nama"},
                { "data": "no_telp"},
                { "data": "alamat"},
                { "data": "action"}
            ],
             "oLanguage": {
                "sProcessing": '<img src="<?php echo base_url("assets/loading2.gif");?>"><br><p style="margin-top:-5px;">Loading</p>'
            },
            "fnInitComplete": function() {
                     //oTable.fnAdjustColumnSizing();
            },
            'fnServerData': function(sSource, aoData, fnCallback)
            {
              $.ajax
              ({
                'dataType': 'json',
                'type'    : 'POST',
                'url'     : sSource,
                'data'    : aoData,
                'success' : fnCallback
              });
            }

        });
        $('#tabel').on('draw.dt',function(){
            reloadbutton();
        });

    });

</script>