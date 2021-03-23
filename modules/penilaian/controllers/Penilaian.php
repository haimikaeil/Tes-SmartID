<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends ADMIN_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->cname = 'penilaian';
		$this->table = 'penilaian';
		$this->load->library('datatables');
		$this->load->model('M_global', 'global');
    }

  	public function index()
 	{

		$this->templates->display($this->cname.'/index', @$data);
  	}

  	function get_data()
  	{
		$this->datatables->select("id_penilaian, pegawai.id_pegawai as id_pegawai, nama, sub_kategori, group_concat(concat('Penilaian ', sub_kategori, ' : ', nilai,'%') separator '<br/>') as nilai ")
			->join('sub_kategori', 'sub_kategori.id_sub_kategori = penilaian.id_sub_kategori', 'left')
			->join('pegawai', 'pegawai.id_pegawai = penilaian.id_pegawai', 'left')
			->order_by('id_penilaian', 'desc')
			->group_by('pegawai.id_pegawai')
	   		->add_column('action', $this->button('$1'), 'id_pegawai') 
	   		->from($this->table);

		echo $this->datatables->generate();
  	}

   	function button($param)
   	{
		$html = "<a class='btn btn-success btn-sm tombolEdit' data-toggle='tooltip' data-placement='top' title='Edit' href='" . site_url($this->cname . '/edit/') . "' data-id='" . $param . "'><i class='icon-pencil'></i> Edit</a>&nbsp;";
		$html .= "<a class='btn btn-danger btn-sm tombolHapus' data-toggle='tooltip' data-placement='top' title='Hapus' href='#' data-id='" . $param . "' ><i class=' icon-trash'></i> Hapus</a>";
		
		return $html;
   	}

  	function tambah()
  	{	

  		$data['sub_kategori'] = $this->db->get('sub_kategori')->result();
  		$data['pegawai'] = $this->db->get('pegawai')->result();

		$this->templates->display($this->cname.'/add', @$data);
  	}

  	function do_tambah()
  	{
		$data = @$this->input->post();

		if($data)
		{
	
			$this->form_validation->set_rules('id_pegawai', ucwords(str_replace('_', ' ', 'id_pegawai')), 'trim|required');
			
	  		if ($this->form_validation->run() == FALSE){   
	      		$this->session->set_flashdata('postdata', (object)$this->input->post());
	      		$this->session->set_flashdata('msg', warn_msg(validation_errors()));
	      		redirect($_SERVER['HTTP_REFERER']);
	  		}
	  		else{

	  			foreach ($data['id_sub_kategori'] as $key => $v) {

	  				$param['id_pegawai'] = $data['id_pegawai'];
	  				$param['id_sub_kategori'] = $v;
	  				$param['nilai']	= $data['nilai'][$key];

	  				$proses = $this->db->insert($this->table,@$param);
	  			}
  				

				if($proses >= 0){
					
		  			$this->session->set_flashdata('msg', succ_msg('Data Berhasil ditambahkan.'));
				}
				else{
		  			$this->session->set_flashdata('msg', err_msg('Gagal menambahkan data.'));
				}

				redirect($this->cname);
	  		}
		}
		else{
	  		show_404();
		}
  	}

  	function edit($id=NULL)
  	{
    	if(!$id) show_404();
  		
  		$data['sub_kategori'] 	= $this->db->get('sub_kategori')->result();
  		$data['pegawai'] 		= $this->db->get('pegawai')->result();

    	$data['item'] = @$this->session->flashdata('postdata') ? @$this->session->flashdata('postdata') : $this->global->getData('pegawai',array('id_pegawai' => decode($id)));

    	$this->db->where('id_pegawai', $data['item']->id_pegawai);
    	$this->db->join('sub_kategori', 'sub_kategori.id_sub_kategori = penilaian.id_sub_kategori', 'left');
    	$data['detail_nilai'] = $this->db->get('penilaian')->result();

    	$this->templates->display($this->cname.'/edit',$data);
  	}

  	function do_ubah()
  	{
    	$data = @$this->input->post();

    	if($data){ 
			$this->form_validation->set_rules('id_pegawai', ucwords(str_replace('_', ' ', 'id_pegawai')), 'trim|required');

      		if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('postdata', (object)$this->input->post());
				$this->session->set_flashdata('msg', warn_msg(validation_errors()));
				redirect($_SERVER['HTTP_REFERER']);
      		}
      		else{
		        
				if(!empty($data)){

					$this->db->where('id_pegawai', $data['id_pegawai_hid']);
					$this->db->delete('penilaian');

					unset($data['id_pegawai_hid']);

					foreach ($data['id_sub_kategori'] as $key => $v) {

		  				$param['id_pegawai'] = $data['id_pegawai'];
		  				$param['id_sub_kategori'] = $v;
		  				$param['nilai']	= $data['nilai'][$key];

		  				$this->db->insert($this->table,@$param);
		  			}

		  			$this->session->set_flashdata('msg', succ_msg('Data berhasil diubah.'));
				}
				else{
		  			$this->session->set_flashdata('msg', err_msg('Gagal merubah data.'));
				}
				redirect($this->cname);
      		}
    	}
    	else{
      		show_404();
    	}
  	}

  	function hapus($id=NULL)
  	{
    	if(!$id) show_404();
    	$data = $this->global->getData($this->table,array('id_pegawai' => decode($id)));
    	if (empty($data)) {
    		show_404();
    	}

    	$hapus = $this->global->hapusData($this->table,array('id_pegawai' => decode($id)));

    	if($hapus)
    	{
        	$this->session->set_flashdata('msg', succ_msg('Data Berhasil dihapus.'));
    	}
    	else{
        	$this->session->set_flashdata('msg', err_msg('Gagal menghapus.'));
    	}

    	redirect($this->cname);
	}

}

// Mikaeilar