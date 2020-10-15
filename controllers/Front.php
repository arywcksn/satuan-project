<?php 
class Front extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        // $this->load->model(array('Tipe_model')); //untuk meload model pada kategori
        // $this->load->model('Room_model', 'room_model'); //untuk meload model pada produk
    }
    
    public function index()
    {
        //load view admin/overview.php 
        $this->load->view("templatefront/header");
        $this->load->view("front/index");
        $this->load->view("templatefront/footer");
    }
}