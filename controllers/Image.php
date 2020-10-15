<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Image extends MY_service{
	
 	function __construct(){
        parent::__construct();
    }

	function upload_post(){
		// Nanti kalau tydack butuh di buang saja Controllernya...
		// File Path
		$path= "./public/";

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size'] = '20480';

		$this->load->library('upload', $config);

		// Image dibawah ini key name input file di view/postman
		if(!$this->upload->do_upload('image')){
			$output['message'] = $this->upload->display_errors();
			$output['status'] = "false";
			$this->response($output, 502);
		}else{
			$data['image'] = $this->upload->data('file_name');

			$output['message'] = "success upload file !";
			$output['status'] = "true";
			exec('chmod 0777 '.$path.$data['image']);
			
			$this->response($output, 200);

		}
	}

	public function upload_multi_post()
	{
		// File Path
		$path= "./public/";

		$config['upload_path'] = $path;
		$config['allowed_types'] = 'png|jpg|jpeg';
		$config['max_size'] = '20480';
		$this->load->library('upload', $config);
		$errors = $uploadData = [];
		for ($i=0; $i < count($_FILES['image']['name']) ; $i++) { 
            if(!empty($_FILES['image']['name'][$i])){
				$_FILES['file']['name'] = $_FILES['image']['name'][$i];
				$_FILES['file']['type'] = $_FILES['image']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['image']['error'][$i];
				$_FILES['file']['size'] = $_FILES['image']['size'][$i];
	   
				if($this->upload->do_upload('file')){
					
					$uploadData[] = $this->upload->data();
				}else{
					$errors[] = $this->upload->display_errors();
				}
            }else{
				debug("File yang $i tidak dapat terupload");
			}
		}

		if ($errors) {
			$output['message'] = $errors;
			$output['status'] = "false";
			$this->set_response($output, 502);
		}else{
			$output['message'] = $uploadData;
			$output['status'] = "true";
			
			$this->set_response($output, 200);
		}

	}


}