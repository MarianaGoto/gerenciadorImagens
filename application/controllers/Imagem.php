<?php
class Imagem extends CI_Controller {

	/*public function index(){
		
		echo "OLA MARILENE :)";
	}*/

	public function index(){
		$this->load->helper('url');
		$this->load->view('cad_img/cadastro');
	}

	public function salvar(){
    $titulo = $this->input->post('titulo');
   	$descricao = $this->input->post('descricao');
    $curriculo = $_FILES['curriculo'];
    $configuracao = array(
        'upload_path'   => './imagens/',
        'allowed_types' => 'png',
        'file_name'     => date('Y-m-d').'.png',
        'max_size'      => '500',
        'max_width'     => '600',
        'max_height'    => '600'

    );      
    $this->load->library('upload');
    $this->upload->initialize($configuracao);
    if ($this->upload->do_upload('curriculo')){
       
    	echo 'Arquivo salvo com sucesso.<br>';
 		echo 'O titulo da imagem: '.$titulo.'<br>';
 		echo 'A descrição da imagem: '.$descricao.'<br>';
 		
    }else{
        echo $this->upload->display_errors();
    }

	}

}	