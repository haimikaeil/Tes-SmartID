<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends ADMIN_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->cname = 'pegawai';
		$this->table = 'pegawai';
		$this->load->library('datatables');
		$this->load->model('M_global', 'global');
    }

  	public function index()
 	{

		$this->templates->display($this->cname.'/index', @$data);
  	}

  	function get_data()
  	{
		$this->datatables->select("id_pegawai, nama, alamat, no_telp, foto")
			->order_by('id_pegawai', 'desc')
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

		$this->templates->display($this->cname.'/add', @$data);
  	}

  	function do_tambah()
  	{
		$data = @$this->input->post();

		if($data)
		{
	
			$this->form_validation->set_rules('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');
			
	  		if ($this->form_validation->run() == FALSE){   
	      		$this->session->set_flashdata('postdata', (object)$this->input->post());
	      		$this->session->set_flashdata('msg', warn_msg(validation_errors()));
	      		redirect($_SERVER['HTTP_REFERER']);
	  		}
	  		else{

	  			$file_name = $_FILES['foto']['name'];

				if($file_name){
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = '*';
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (!$this->upload->do_upload('foto')){

						$this->session->set_flashdata('msg', warn_msg($this->upload->display_errors()));

						redirect($_SERVER['HTTP_REFERER']);

					}else{

						$dataFile  = $this->upload->data();
						$file_name = $dataFile['file_name'];

						$data['foto'] = $file_name;
					}
				}

  				$proses = $this->global->saveData($this->table,@$data);

				if($proses){
					
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
  		
    	$data['item'] = @$this->session->flashdata('postdata') ? @$this->session->flashdata('postdata') : $this->global->getData($this->table,array('id_pegawai' => decode($id)));

    	$this->templates->display($this->cname.'/edit',$data);
  	}

  	function do_ubah()
  	{
    	$data = @$this->input->post();

    	if($data){ 
			$this->form_validation->set_rules('nama', ucwords(str_replace('_', ' ', 'nama')), 'trim|required');

      		if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('postdata', (object)$this->input->post());
				$this->session->set_flashdata('msg', warn_msg(validation_errors()));
				redirect($_SERVER['HTTP_REFERER']);
      		}
      		else{

      			$file_name = $_FILES['foto']['name'];

				if($file_name){
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = '*';
					
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (!$this->upload->do_upload('foto')){

						$this->session->set_flashdata('msg', warn_msg($this->upload->display_errors()));

						redirect($_SERVER['HTTP_REFERER']);

					}else{

						$dataFile  = $this->upload->data();
						$file_name = $dataFile['file_name'];

						$data['foto'] = $file_name;
					}
				}
		        
				$proses = $this->global->updateData($this->table,$data,array('id_pegawai' => $data['id_pegawai']));

				if($proses){

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