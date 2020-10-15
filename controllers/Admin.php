<?php 
class Admin extends MY_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Tipe_model')); //untuk meload model pada kategori
        $this->load->model('Room_model', 'room_model'); //untuk meload model pada produk
    }
    
    public function index()
    {
        //load view admin/overview.php 
        $this->load->view("template/header");
        $this->load->view("admin/index");
        $this->load->view("template/footer");
    }

    /*public function reservasi()
    {
        
        
        $data['reservasi'] = $this->db->get('reservasi')->result_array();
        $this->load->view("template/header");
        $this->load->view("admin/reservasi",$data);
        $this->load->view("template/footer");
    }*/

    public function konfirmasi()
    {
       
        $this->db->join('member', 'member.id_member = konfirmasi.id_member');

    $data['konfirmasi'] = $this->db->get('konfirmasi')->result_array();
    $this->form_validation->set_rules('id_konfirmasi', 'id_konfirmasi' , 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view("template/header");
    $this->load->view("admin/konfirmasi",$data);
    $this->load->view("template/footer");
    } else {
        $data = [
            'id_konfirmasi' => $this->input->post('id_konfirmasi')
    ];
    $this->db->insert('konfirmasi', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-sucess" role="alert">Konfirmasi telah ditambahkan!</div>');
    redirect('admin/konfirmasi');
    }
}


    public function Editkonfirmasi()
    {
        $this->form_validation->set_rules('id_konfirmasi', 'Id_konfirmasi', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/konfirmasi');
        } else {
            $id = $this->input->post('id_konfirmasi');
            $data = [
                'id_transaksi' => $this->input->post('id_transaksi'),
                'id_member' => $this->input->post('id_member'),
                'tgl_transfer' => $this->input->post('tgl_transfer'),
                'bank' => $this->input->post('bank'),
                'bukti_pembayaran' => $this->input->post('bukti_pembayaran'),
                'keterangan' => $this->input->post('keterangan'),
            ];
            $this->db->where('id_konfirmasi', $id);
            $this->db->update('konfirmasi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('admin/konfirmasi');
        }
    }
    public function Hapuskonfirmasi($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "konfirmasi Gagal Di Hapus");
            redirect('admin/konfirmasi');
        } else {
            $this->db->where('id_konfirmasi', $id);
            $this->db->delete('konfirmasi');
            $this->session->set_flashdata('message', "Konfirmasi Berhasil Dihapus");
            redirect('admin/konfirmasi');
        }
    }
    public function tipe() //controller untuk tipe berupa function untuk penambahan tipe
    {  
        $data['tipe'] = $this->db->get('tipe')->result_array();  
        $this->form_validation->set_rules('nama_tipe', 'Nama_tipe' , 'required');
        if ($this->form_validation->run() == false) {
            
            $this->load->view("template/header");
            $this->load->view("admin/tipe",$data);
            $this->load->view("template/footer");

        } else {
            $data = [
                'nama_tipe' => $this->input->post('nama_tipe')
            ];
            $this->db->insert('tipe', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">kendaraan telah di tambahkan!</div>');
            redirect('admin/tipe');
        }

    }

    public function Edittipe() //controller untuk tipe berupa function untuk pengeditan tipe
    {
        $this->form_validation->set_rules('id_tipe', 'Id_tipe', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('eror', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/tipe');

        } else {
            $id = $this->input->post('id_tipe');
            $data = [
                'nama_tipe' => $this->input->post('nama_tipe')
               
            ];
            $this->db->where('id_tipe', $id);
            $this->db->update('tipe', $data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            
            redirect('admin/tipe');
        }
    }

    public function Hapustipe($id) //controller untuk tipe berupa function untuk penghapusan tipe
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "Pesanan Gagal Di Hapus");
            redirect('admin/tipe');
        } else {
            $this->db->where('id_tipe', $id);
            $this->db->delete('tipe');
            // $this->session->set_flashdata('message', "tipe Berhasil Dihapus");
            redirect('admin/tipe');
        }
    }
    public function room() //controller untuk kategori berupa function untuk penambahan room
    {
        $data['tipe'] = $this->db->get('tipe')->result_array();
        $data['room'] = $this->db->get_where('room',['id_tipe<>' =>null])->result_array();
        $data['dataRoom'] = $this->Tipe_model->get_tipe();
        
        $this->form_validation->set_rules('nama_room', 'Nama_room' , 'required');
        if ($this->form_validation->run() == false) {
        $this->load->view("template/header");
        $this->load->view("admin/room",$data);
        $this->load->view("template/footer");

        } else {
            $data = array(
                'nama_room' => $this->input->post('nama_room'), // sql input ke Database
                'id_tipe' => $this->input->post('id_tipe'),
                'detail_room' => $this->input->post('detail_room'),
                'harga' => $this->input->post('harga'),
            );
            
            if  (!empty($_FILES['foto']['name'])) {
                $upload = $this->_do_upload();
                $data['foto'] = $upload;
            }
            
            $this->room_model->insert($data);
            redirect('admin/room');
        }
    }
	private function _do_upload() //function untuk upload gambar dan memindahkan file tersebut ke foler upload pada framework CI 3
	{
		$config['upload_path'] 		= './upload';
		$config['allowed_types'] 	= 'jpg|png|jpeg';
		$config['max_size'] 			= 3000;
		$config['max_widht'] 			= 3000;
		$config['max_height']  		= 3000;
		$config['file_name'] 			= round(microtime(true)*1000);
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('foto')) {
			$this->session->set_flashdata('msg', $this->upload->display_errors('',''));
			redirect('admin/room');
		}
		return $this->upload->data('file_name');
	}


    public function Editroom() //controller untuk tipe berupa function untuk pengeditan room
    {
        $this->form_validation->set_rules('id_room', 'Id_room', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/room');

        } else {
            $id = $this->input->post('id_room');
            $data = [
                'nama_room' => $this->input->post('nama_room'),
                'foto' => $this->input->post('foto'),
                'id_tipe' => $this->input->post('id_tipe'),
                'detail_room' => $this->input->post('detail_room'),
            ];
              
            if  (!empty($_FILES['foto']['name'])) {
                $upload = $this->_do_upload();
                $data['foto'] = $upload;
            }

            $this->db->where('id_room', $id);
            $update = $this->db->update('room', $data);
            if($update) $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('admin/room');
        }
    }

    public function Hapusroom($id) //controller untuk kategori berupa function untuk penghapusan room
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "Pesanan Gagal Di Hapus");
            redirect('admin/room');
        } else {
            $this->db->where('id_room', $id);
            $this->db->delete('room');
            // $this->session->set_flashdata('message', "room Berhasil Dihapus");
            redirect('admin/room');
        }
    }
    
    /*public function jadwal()
    {
        
        $data['jadwal'] = $this->db->get('jadwal')->result_array();
        $this->form_validation->set_rules('hari', 'Hari' , 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal' , 'required');
        $this->form_validation->set_rules('jam', 'Jam' , 'required');
        $this->form_validation->set_rules('harga', 'Harga' , 'required');
        $this->load->view("template/header");
        $this->load->view("admin/jadwal",$data);
        $this->load->view("template/footer");
    }

    public function Editjadwal()
    {
        $this->form_validation->set_rules('id_jadwal', 'Id_jadwal', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/jadwal');
        } else {
            $id = $this->input->post('id_jadwal');
            $data = [
                'hari' => $this->input->post('hari'),
                'tanggal' => $this->input->post('tanggal'),
                'jam' => $this->input->post('jam'),
                'harga' => $this->input->post('harga'),
            ];
            $this->db->where('id_jadwal', $id);
            $this->db->update('jadwal', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('admin/jadwal');
        }
    }
    public function Hapusjadwal($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "Jadwal Gagal Di Hapus");
            redirect('admin/jadwal');
        } else {
            $this->db->where('id_jadwal', $id);
            $this->db->delete('jadwal');
            $this->session->set_flashdata('message', "Jadwal Berhasil Dihapus");
            redirect('admin/jadwal');
        }
    }*/

    public function member()
    {
    $data['member'] = $this->db->get('member')->result_array();
    $this->form_validation->set_rules('nama_member', 'Nama_member' , 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view("template/header");
    $this->load->view("admin/member",$data);
    $this->load->view("template/footer");
    } else {
        $data = [
            'nama_member' => $this->input->post('nama_member'),
            'email' => $this->input->post('email'),
            'no_telepon' => $this->input->post('no_telepon'),
            'alamat' => $this->input->post('alamat'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
    ];
    $this->db->insert('member', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-sucess" role="alert">member telah ditambahkan!</div>');
    redirect('admin/member');
    }
}


    public function Editmember()
    {
        $this->form_validation->set_rules('id_member', 'Id_member', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/member');
        } else {
            $id = $this->input->post('id_member');
            $data = [
                'nama_member' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telepon' => $this->input->post('no_telepon'),
                'alamat' => $this->input->post('alamat'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                
            ];
            $this->db->where('id_member', $id);
            $this->db->update('member', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('admin/member');
        }
    }
    public function Hapusmember($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "member Gagal Di Hapus");
            redirect('admin/member');
        } else {
            $this->db->where('id_member', $id);
            $this->db->delete('member');
            $this->session->set_flashdata('message', "eservasi Berhasil Dihapus");
            redirect('admin/member');
        }
    }

    public function transaksi()
    {
        $this->db->join('room', 'room.id_room = transaksi.id_room');
        $this->db->join('member', 'member.id_member = transaksi.id_member');
    $data['transaksi'] = $this->db->get('transaksi')->result_array();
    $data['member'] = $this->db->get('member')->result_array();
    $data['room'] = $this->db->get('room')->result_array();
    // print_r($data['transaksi']);exit();
    $data['status'] = $this->get_enum('transaksi', 'status' );
    $this->form_validation->set_rules('id_member', 'Id Member' , 'required');
    $this->form_validation->set_rules('id_room', 'Id room' , 'required');
    if ($this->form_validation->run() == false) {
    $this->load->view("template/header");
    $this->load->view("admin/transaksi",$data);
    $this->load->view("template/footer");
    } else {
        $data = [
            'id_member' => $this->input->post('id_member'),
            'id_room' => $this->input->post('id_room'),
            'tanggal' => $this->input->post('tanggal'),
            'lama_pemesanan' => $this->input->post('lama_pemesanan'),
            'total_pembayaran' => $this->input->post('total_pembayaran'),
            'status' => $this->input->post('status'),
    ];
    
    $this->db->insert('transaksi', $data);
    $this->session->set_flashdata('massage', '<div class="alert alert-sucess" role="alert">transaksi telah ditambahkan!</div>');
    redirect('admin/transaksi');
    }
}


    public function Edittransaksi()
    {
        $this->form_validation->set_rules('id_transaksi', 'Id_transaksi', 'required');
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Gagal Di Edit</div>');
            redirect('admin/transaksi');
        } else {
            $id = $this->input->post('id_transaksi');
            $data = [
                'id_member' => $this->input->post('id_member'),
                'id_room' => $this->input->post('id_room'),
                'total_pembayaran' => $this->input->post('total_pembayaran'),
                'status' => $this->input->post('status'),
                
            ];
            $this->db->where('id_transaksi', $id);
            $this->db->update('transaksi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" align="center" role="alert">Data Berhasil Di Edit</div>');
            redirect('admin/transaksi');
        }
    }
    public function Hapustransaksi($id)
    {
        if ($id == "") {
            $this->session->set_flashdata('message', "transaksi Gagal Di Hapus");
            redirect('admin/transaksi');
        } else {
            $this->db->where('id_transaksi', $id);
            $this->db->delete('transaksi');
            $this->session->set_flashdata('message', "eservasi Berhasil Dihapus");
            redirect('admin/transaksi');
        }
    }

}