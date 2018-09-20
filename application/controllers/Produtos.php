<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador padrão da aplicação, é o primeiro a ser chamado */
class Produtos extends CI_Controller {
	
	public function index(){

		/* Carregando o model (nome e apelido) */
		$this->load->model("produtos_model", "produtos");

		/* guardando os dados da requisição */
		$data['produtos'] = $this->produtos->getProdutos();

		/* Carregando a view */
		$this->load->view('listarProdutos', $data);
	}

	/* Página adicionar produto */
	public function add(){


		/* Carrega o model produtos */
		$this->load->model("produtos_model", "produtos");

		/* Carrega a view */
		$this->load->view("addProdutos");

	}

	public function salvar(){

		/* Valida o campo */

		if($this->input->post("nome") == NULL){
			echo "O Componente nome é obrigatório";
			echo "<a href = 'add' title = 'Voltar'>Voltar</a>";
		}else{

			/* carrega o model */
			$this->load->model("produtos_model", "produtos");

			/* pega os dados do formulário e guarda em um array */
			$dados['nome'] = $this->input->post("nome");
			$dados['preco'] = $this->input->post("preco");
			$dados['ativo'] = $this->input->post("ativo");

			/* Executa a função de adicionar do model */
			$this->produtos->addProduto($dados);

			/* Redirecionando */
			redirect("/");

		}
	}
}
