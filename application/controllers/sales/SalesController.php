<?php  defined('BASEPATH') OR exit('No direct script access allowed');

class SalesController extends Web_Environment 
{

    private $root_sales;

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
    
        if($this->session->has_userdata('is_login') && $this->session->userdata('is_login') == TRUE) {
            $this->root_sales = $this->config->item(strtolower($this->session->userdata('nama_level_pengguna')).'_root');
        }
        else {
            redirect('pages/login','refresh');
        }

        $this->load->model(array(
            'items_model',
            'penawaran_model'
        ));   
    }
    
    public function get_default()
    {
        return array(
            'title'       => 'PT. COFFINDO',
            'subtitle'    => '',
            'login_level' => $this->session->userdata('nama_level_pengguna'),
            'login_name'  => $this->session->userdata('nama_pengguna'),
            'side_nav'    => $this->root_sales . 'pages/sales_side_nav',
        );
    }

    /** View Data */
    public function dashboard()
    {
        $data = $this->get_default();
        $data['subtitle'] = 'SALES - DASHBOARD';
        $data['content']  = $this->root_sales . 'pages/sales_dashboard';
        $data['scripts']  = 'assets/web/js/sales/aktivasi_penawaran.js';
        $this->render($this->root_sales . 'sales_layout', $data);

    }

    public function view_master_penawaran()
    {
        $data = $this->get_default(); 
        $data['subtitle'] = 'SALES - ITEM PENJUALAN';
        $data['content']  = $this->root_sales . 'pages/master_penawaran_template';
        $data['scripts']  = 'assets/web/js/sales/master_penawaran.js';
		$this->render($this->root_sales . 'sales_layout', $data);
    }

    public function load_master_penawaran($type_item)
    {
        $data = array(
            'title_form_order'  => 'MASTER PENAWARAN ITEM '. strtoupper($type_item),
            'title_table_order' => 'TABEL DETAIL PENAWARAN ITEM '. strtoupper($type_item),
            'data_items'   => $this->items_model->get_list_item_by(getCategoryId($type_item))
        );
        
        $this->load->view($this->root_sales . 'pages/sales_master_penawaran', $data);
    }


    public function load_aktivasi_penawaran()
    {
        $data = $this->get_default(); 
        $data['subtitle'] = 'DATA STATUS VALIDASI PENAWARAN';
        $data['content']  = $this->root_sales . 'pages/aktivasi_penawaran';
        $data['scripts']  = 'assets/web/js/sales/aktivasi_penawaran.js';
		$this->render($this->root_sales . 'sales_layout', $data);
    }

    public function logout()
	{
		$this->session->sess_destroy();
		redirect('pages/login','refresh');
	}
    


    
}

/* End of file AdminController.php */
