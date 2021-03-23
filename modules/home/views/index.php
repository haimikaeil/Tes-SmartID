<!--====== PORTFOLIO PART START ======-->

<section id="portfolio" class="portfolio-area portfolio-four pb-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="section-title text-center pb-10">
                    <h3 class="title" style="font-size: 30px;">PRESTASI TERBAIK SAAT INI</h3>
                    <p class="text" style="color: #868282;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row" style="margin-top:40px;">
            <?php foreach ($data as $key => $v) { ?>
                <?php if($key == 0) { ?>
                    <div class="col-md-4">
                        <div style="background-color: #1d427c;height: 190px;">
                            <center>
                                <p style="color: white;font-size: 26px;font-weight: 500;letter-spacing: 2px;padding-top: 46px;padding-bottom: 37px;"><?=strtoupper($v['pegawai'])?></p>
                                <img src="<?=base_url('uploads').'/'.$v['foto']?>" alt="" class="rounded-circle" style="height: 150px;width: 154px;border: #0000001c 12px solid;">
                            </center>
                        </div>
                        <div style="background-color: #f5c328;height: 400px;">
                            <center>
                                <p style="padding-top: 122px;font-size: 50px;font-weight: 800;"><?=$key+1?></p>
                                <p style="padding-top: 35px;"></p>
                                <?php foreach ($v['kategori'] as $keyk => $k) { ?>
	                                <p style="padding-top: 12px;"><?=$k['nama'].' : '.$k['jml_fix'].'%'?></p>
                                <?php } ?>
                                <a class="btn btn-md btn-primary page-scroll" href="#pricing" style="margin-top:32px;border-radius:0px;">DETAIL PRESTASI</a>
                            </center>
                        </div>
                    </div>
                <?php }else{ ?>
                    <div class="col-md-4">
                        <div style="background-color: #606163;height: 190px;">
                            <center>
                                <p style="color: white;font-size: 26px;font-weight: 500;letter-spacing: 2px;padding-top: 46px;padding-bottom: 37px;"><?=strtoupper($v['pegawai'])?></p>
                                <img src="<?=base_url('uploads').'/'.$v['foto']?>" alt="" class="rounded-circle" style="height: 150px;width: 154px;border: #0000001c 12px solid;">
                            </center>
                        </div>
                        <div style="background-color: #eaebed;height: 400px;">
                            <center>
                                <p style="padding-top: 122px;font-size: 50px;font-weight: 800;"><?=$key+1?></p>
                                <p style="padding-top: 35px;"></p>
                                <?php foreach ($v['kategori'] as $keyk => $k) { ?>
	                                <p style="padding-top: 12px;"><?=$k['nama'].' : '.$k['jml_fix'].'%'?></p>
                                <?php } ?>
                                <a class="btn btn-md btn-primary page-scroll" href="#pricing" style="margin-top:32px;border-radius:0px;">DETAIL PRESTASI</a>
                            </center>
                        </div>
                    </div>
                <?php } ?>
                
            <?php } ?>
            
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== PORTFOLIO PART ENDS ======-->

<!--====== PRINICNG START ======-->

<section id="pricing" class="pricing-area ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="section-title text-center pb-25">
                   <h3 class="title" style="font-size: 30px;">PRESTASI PROFESIONALITAS</h3>
                    <p class="text" style="color: #868282;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row" style="margin-top:40px;">
            <div class="col-md-12">
                <div id="chart"></div>
            </div>
        </div>
    </div> <!-- container -->
</section>

<!--====== PRINICNG ENDS ======-->


 <script>
    get_chart();
    function get_chart() {
        $.ajax({
            url: "<?php echo site_url($this->cname.'/get_chart');?>",
                dataType: 'json',
            }).done(function(res) {
            	// console.log(res.pegawai);
            	var pegawai = [];
            	for (var i = 0; i < res.pegawai.length; i++) {
            		pegawai.push(res.pegawai[i].pegawai);
            		
            	}
            	
                $('#chart').highcharts({
                    chart: {
                        type: 'column',
                        height: '500',
                    },
                    title: {
                        text: ''
                    },
                    xAxis: {
                        categories: pegawai,
                        labels: {
                            useHTML: true,
                            formatter: function() {
                            	for (var f = 0; f < res.pegawai.length; f++) {

                            		var peg = res.pegawai[f].pegawai;
                            		var foto = res.pegawai[f].foto;

                            		if(this.value == peg){
                            			return '<div style="height:100px;width:100px;"><img src="<?=base_url("uploads").'/'?>'+foto+'" alt="" class="rounded-circle" style="border: #7cb4eb 4px solid;height: 98px;width: 100%;vertical-align: middle;"></div>';
                            		}
				            		
				            	}
                                
                            }
                        }
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: ''
                        }
                    },
                    tooltip: {
                        pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
                        shared: true
                    },
                    plotOptions: {
                        column: {
                            stacking: 'percent'
                        }
                    },
                    credits: {
                        enabled: false
                    },
                    series: res.data
          
                });
            })
    }
</script>