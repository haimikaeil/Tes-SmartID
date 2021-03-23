<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_kategori extends ADMIN_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->cname = 'sub_kategori';
		$this->table = 'sub_kategori';
		$this->load->library('datatables');
		$this->load->model('M_global', 'global');
    }

  	public function index()
 	{

		$this->templates->display($this->cname.'/index', @$data);
  	}

  	function get_data()
  	{
		$this->datatables->select("id_sub_kategori, sub_kategori, kategori")
			->join('kategori', 'kategori.id_kategori = sub_kategori.id_kategori', 'left')
			->order_by('id_sub_kategori', 'desc')
	   		->add_column('action', $this->button('$1'), 'id_sub_kategori') 
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

  		$data['kategori'] = $this->db->get('kategori')->result();

		$this->templates->display($this->cname.'/add', @$data);
  	}

  	function do_tambah()
  	{
		$data = @$this->input->post();

		if($data)
		{
	
			$this->form_validation->set_rules('sub_kategori', ucwords(str_replace('_', ' ', 'sub_kategori')), 'trim|required');
			
	  		if ($this->form_validation->run() == FALSE){   
	      		$this->session->set_flashdata('postdata', (object)$this->input->post());
	      		$this->session->set_flashdata('msg', warn_msg(validation_errors()));
	      		redirect($_SERVER['HTTP_REFERER']);
	  		}
	  		else{

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
  		
  		$data['kategori'] = $this->db->get('kategori')->result();

    	$data['item'] = @$this->session->flashdata('postdata') ? @$this->session->flashdata('postdata') : $this->global->getData($this->table,array('id_sub_kategori' => decode($id)));

    	$this->templates->display($this->cname.'/edit',$data);
  	}

  	function do_ubah()
  	{
    	$data = @$this->input->post();

    	if($data){ 
			$this->form_validation->set_rules('sub_kategori', ucwords(str_replace('_', ' ', 'sub_kategori')), 'trim|required');

      		if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('postdata', (object)$this->input->post());
				$this->session->set_flashdata('msg', warn_msg(validation_errors()));
				redirect($_SERVER['HTTP_REFERER']);
      		}
      		else{
		        
				$proses = $this->global->updateData($this->table,$data,array('id_sub_kategori' => $data['id_sub_kategori']));

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
    	$data = $this->global->getData($this->table,array('id_sub_kategori' => decode($id)));
    	if (empty($data)) {
    		show_404();
    	}

    	$hapus = $this->global->hapusData($this->table,array('id_sub_kategori' => decode($id)));

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