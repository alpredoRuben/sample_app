<?php defined('BASEPATH') OR exit('No direct script access allowed');


/** Admin Root Control */
$route['admin']                     = 'admin/AdminController';
$route['admin/keluar']              = 'admin/AdminController/logout';
$route['admin/produk']              = 'admin/AdminController/view_produk';
$route['admin/mesin']               = 'admin/AdminController/view_mesin';
$route['admin/sparepart']           = 'admin/AdminController/view_sparepart';
$route['admin/aktivitas_pesanan']   = 'admin/AdminController/view_aktivitas_pesanan';


/** Service Admin Product */
$route['admin/produk/tambah/produk']       = 'service/ProductController/tambah_produk';
$route['admin/produk/list/produk']         = 'service/ProductController/datatable_produk';
$route['admin/produk/show/produk/(:any)']  = 'service/ProductController/show_produk/$1';
$route['admin/produk/ubah/produk']         = 'service/ProductController/ubah_produk';
$route['admin/produk/hapus/produk/(:any)'] = 'service/ProductController/hapus_produk/$1';

/** Service Admin Machine */
$route['admin/mesin/tambah/mesin']         = 'service/MachineController/tambah_mesin';
$route['admin/mesin/list/mesin']           = 'service/MachineController/datatable_mesin';
$route['admin/mesin/show/mesin/(:any)']    = 'service/MachineController/show_mesin/$1';
$route['admin/mesin/ubah/mesin']           = 'service/MachineController/ubah_mesin';
$route['admin/mesin/hapus/mesin/(:any)']   = 'service/MachineController/hapus_mesin/$1';


/** Service Sparepart Machine */
$route['admin/sparepart/tambah/sparepart']         = 'service/SparepartController/tambah_sparepart';
$route['admin/sparepart/list/sparepart']           = 'service/SparepartController/datatable_sparepart';
$route['admin/sparepart/show/sparepart/(:any)']    = 'service/SparepartController/show_sparepart/$1';
$route['admin/sparepart/ubah/sparepart']           = 'service/SparepartController/ubah_sparepart';
$route['admin/sparepart/hapus/sparepart/(:any)']   = 'service/SparepartController/hapus_sparepart/$1';



/** SALES ROOT CONTROL */
$route['sales']                     = 'sales/SalesController';
$route['sales/keluar']              = 'sales/SalesController/logout';
$route['sales/form_penawaran']      = 'sales/SalesController/view_form_penawaran';
$route['sales/load_form_produk']    = 'sales/SalesController/load_form_produk';
$route['sales/load_form_mesin']     = 'sales/SalesController/load_form_mesin';
$route['sales/load_form_sparepart']     = 'sales/SalesController/load_form_sparepart';

/** Service Sales */
$route['sales/penawaran/tambah/produk/kopi']     = 'service/OfferController/tambah_penawaran_produk';
$route['sales/penawaran/datatable/produk/kopi']  = 'service/OfferController/datatable_penawaran_produk';
$route['sales/penawaran/hapus/produk/kopi/(:any)'] = 'service/OfferController/hapus_penawaran_produk/$1';
$route['sales/penawaran/set/wait/active/(:any)/(:any)'] = 'service/OfferController/set_wait_active/$1/$2';

/** Machine Offer Route */
$route['sales/penawaran/tambah/mesin'] = 'service/OfferController/tambah_penawaran_mesin';
$route['sales/penawaran/datatable/mesin'] = 'service/OfferController/datatable_penawaran_mesin';
$route['sales/penawaran/hapus/mesin/(:any)'] = 'service/OfferController/hapus_penawaran_mesin/$1';

/** Sparepart Offer Route */ 
$route['sales/penawaran/tambah/sparepart'] = 'service/OfferController/tambah_penawaran_sparepart';
$route['sales/penawaran/datatable/sparepart'] = 'service/OfferController/datatable_penawaran_sparepart';
$route['sales/penawaran/hapus/sparepart/(:any)'] = 'service/OfferController/hapus_penawaran_sparepart/$1';
//sales/penawaran/tampil/item/produk/by/1
$route['sales/penawaran/tampil/item/(:any)/by/(:any)'] = 'service/OfferController/tampil_items/$1/$2';

$route['sales/tampil/data/produk'] = 'service/ProductController/tampil_produk';

/** Login Validation */
$route['user/login/validate'] = 'AuthController/login_validate';
$route['pages/login']         = 'AuthController/view_login';

$route['default_controller'] = $route['pages/login'];
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
