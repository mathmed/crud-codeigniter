<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador padrão da aplicação, é o primeiro a ser chamado */
class ProdutoS extends CI_Controller {
	
	public function index(){
		$this->load->model("produtos_model", "produtos");
		$data['produtos'] = $this->produtos->getProdutos();
		$this->load->view('listarProdutos', $data);
	}
}
