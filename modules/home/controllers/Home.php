<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->cname = 'home';
		$this->table = 'product';
		$this->load->library('datatables');
		$this->load->model('M_global', 'global');
    }

  	public function index()
 	{
 		$pegawai = $this->db->get('pegawai')->result();

 		foreach ($pegawai as $key => $v) {
 			$data[$key]['foto'] 	= $v->foto;
 			$data[$key]['pegawai'] 	= $v->nama;

 			$kategori = $this->db->get('kategori')->result();

 			foreach ($kategori as $keyk => $k) {

 				$data[$key]['kategori'][$keyk] = $k;

 				$sub_kategori = $this->db->get('sub_kategori')->result();

 				foreach ($sub_kategori as $keys => $s) {

 					if($s->id_kategori == $k->id_kategori){

 						$data[$key]['kategori'][$keyk]->sub_kategori[$keys]['sub'] = $s->sub_kategori;

 						$this->db->where('id_pegawai', $v->id_pegawai);
 						$this->db->where('id_sub_kategori', $s->id_sub_kategori);
 						$nilai = $this->db->get('penilaian')->row();

						if(!empty($nilai)){
							$data[$key]['kategori'][$keyk]->sub_kategori[$keys]['nilai'] = $nilai->nilai;
						}else{
							$data[$key]['kategori'][$keyk]->sub_kategori[$keys]['nilai'] = 0;
						}
				
 					}
 				}
 			}
 		}

 		foreach ($data as $key => $v) {

 			$datafix[$key]['foto'] = $v['foto'];
 			$datafix[$key]['pegawai'] = $v['pegawai'];

 			foreach ($v['kategori'] as $keyk => $k) {

 				$datafix[$key]['kategori'][$keyk]['nama'] = $k->kategori;

 				$jml = 0;
 				foreach ($k->sub_kategori as $keys => $s) {

 					$jml += $s['nilai'];

 					$datafix[$key]['kategori'][$keyk]['jml_fix'] = round($jml/count($k->sub_kategori));
 				}
 			}

 		}

 		foreach ($datafix as $key => $v) {

 			$datapaten[$key]['foto'] = $v['foto'];
 			$datapaten[$key]['pegawai'] = $v['pegawai'];

 			$jml = 0;
 			foreach ($v['kategori'] as $keyk => $k) {

 				$jml += $k['jml_fix'];

 				$datapaten[$key]['kategori'][$keyk] = $k;
 				$datapaten[$key]['jml_paten'] = $jml;
 				// $jml_paten[$key] = $jml;
 			}
 		}

 		$sort = array();
		foreach($datapaten as $k => $v) {
		   $sort['juara'][$k] = $v['jml_paten'];
		}

		array_multisort($sort['juara'], SORT_DESC, $datapaten);


		$param['data']	=  array_slice($datapaten, 0, 3);

		$this->templates->depan($this->cname.'/index', @$param);
  	}

  	public function get_Chart()
  	{

  		// $a = "[{name: 'Baik',data: [100, 90, 85]}, {name: 'Kurang',data: [100, 2, 3]}, {name: 'Jelek',data: [100, 4, 4]}]";
        		


        $pegawai = $this->db->get('pegawai')->result();

        foreach ($pegawai as $key => $v) {

        	$data[$key]['foto'] 	= $v->foto;
        	$data[$key]['pegawai'] 	= $v->nama;

        	$sub_kategori = $this->db->get('sub_kategori')->result();

        	foreach ($sub_kategori as $keys => $s) {

        		$data[$key]['sub_kategori'][$keys]['sub'] = $s->sub_kategori;

        		$this->db->where('id_pegawai', $v->id_pegawai);
				$this->db->where('id_sub_kategori', $s->id_sub_kategori);
				$nilai = $this->db->get('penilaian')->row();

				if(!empty($nilai)){
					$data[$key]['sub_kategori'][$keys]['jml'] = $nilai->nilai;
				}else{
					$data[$key]['sub_kategori'][$keys]['jml'] = 0;
				}
        	}
        }


        $sub_kategori = $this->db->get('sub_kategori')->result();

        foreach ($sub_kategori as $keys => $s) {
        	$datafix[$keys]['name'] = $s->sub_kategori;

        	foreach ($data as $key => $v) {
        		foreach ($v['sub_kategori'] as $keyss => $ss) {
        			if($s->sub_kategori == $ss['sub']){
        				$datafix[$keys]['data'][$key] = round($ss['jml']);
        			}
        		}
        	}
        	
        }

        echo json_encode(array('pegawai' => $data, 'data' => $datafix));

        // echo "<pre>";
        // print_r ($data);
        // echo "</pre>";
  	}

}
