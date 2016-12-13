<?php 
require APPPATH . '/libraries/REST_Controller.php';
class Buku_tamu_api extends Rest_Controller{

	public function index_get(){
		//$bukutamu = $this->db->get('bukutamu')->result();
		//$this->response($bukutamu, REST_Controller::HTTP_OK); 
		$id = $this->get('id');
        if ($id == '') {
            $bukutamu = $this->db->get('bukutamu')->result();
        } else {
            $this->db->where('id', $id);
            $bukutamu = $this->db->get('bukutamu')->result();
        }
        $this->response($bukutamu, 200);
	}

	public function index_post(){
		$nama = $this->post('nama'); 
		$komentar = $this->post('komentar');  
		$data = array('nama'=>$nama, 'komentar'=>$komentar); 
		$this->db->insert('bukutamu',$data); 
		$this->response($data, REST_Controller::HTTP_CREATED); 
	}

	public function index_put(){
		$id = $this->put('id');
		$nama = $this->put('nama'); 
		$komentar = $this->put('komentar');  
		$data = array('nama'=>$nama, 'komentar'=>$komentar); 
		$this->db->where('id',$id); 
		$this->db->update('bukutamu',$data); 
		$this->response($data, REST_Controller::HTTP_OK); 
	}

	public function index_delete(){
		$id = $this->delete('id'); 
		$this->db->where('id',$id);
		$this->db->delete('bukutamu'); 
		$message = array('id'=>$id, 'message' => 'Data telah dihapus');
		$this->response($message, REST_Controller::HTTP_OK);
	}
}