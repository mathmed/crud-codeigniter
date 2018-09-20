<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador padrão da aplicação, é o primeiro a ser chamado */
class Produtos extends CI_Controller {
	
	/* primeira função que é chamada */
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

	/* Função alterar produto */
	public function salvar(){

		/* Valida o campo */
		if($this->input->post("nome") == NULL){
			echo "O Componente nome é obrigatório";
			echo "<a href = '/crud-codeigniter/' title = 'Voltar'>Voltar</a>";
		}else{

			/* carrega o model */
			$this->load->model("produtos_model", "produtos");

			/* pega os dados do formulário e guarda em um array */
			$dados['nome'] = $this->input->post("nome");
			$dados['preco'] = $this->input->post("preco");
			$dados['ativo'] = $this->input->post("ativo");

			/* Verifica se é um novo input ou uma att */
			/* Executa a função de atualizar do model */
			if($this->input->post("id")) $this->produtos->editarProduto($dados, $this->input->post("id"));

			/* Executa a função de adicionar do model */
			else $this->produtos->addProduto($dados);

			/* Redirecionando */
			redirect("/");

		}
	}

	/* Página editar produto */
	public function editar($id = NULL){

		/* verifica se foi passado um id */
		if(!$id) redirect("/");

		/* Carregando o model produtos */
		$this->load->model("produtos_model", "produtos");

		/* fazendo consulta no bd para verificar se existe o registro */
		$query = $this->produtos->getProdutoByID($id);

		/* verifica se existe */
		if(!$query) redirect("/");

		/* criando array onde será guardado os dados (será passado para view) */
		$dados["produto"] = $query;

		/* carregando a view */
		$this->load->view("editarProdutos", $dados);

	}
	
	/* Função excluir produto */
	public function apagar($id = NULL){

		/* verifica se foi passado um id */
		if($id == NULL) redirect("/");

		/* carrega o model produtos */
		$this->load->model("produtos_model", "produtos");

		/* faz a consulta no bd para verificar se existe */
		$query = $this->produtos->getProdutoByID($id);

		/* verifica se foi encontrado algum registro */
		if($query){
			$this->produtos->apagarProduto($query->id);
			redirect("/");
		}
		else redirect("/");

	}

	/* Função para mudar o status do produto */
	public function status($id = NULL){
		/* verifica se foi passado um id */
		if(!$id) redirect("/");

		/* carregando o model produtos */
		$this->load->model("produtos_model", "produtos");

		/* fazendo uma consulta no BD para verificar se existe o registro */
		$query = $this->produtos->getProdutoByID($id);

		/* verifica se existe */
		if(!$query) redirect("/");

		else{
			/* adicionando o novo status */
			if($query->ativo == 1) $dados['ativo'] = 0;
			else $dados['ativo'] = 1;

			/* chamando a função que altera o status */
			$this->produtos->editarProduto($dados, $query->id);

			/* redirecionando */
			redirect("/");

		}
		
		/* criando array onde será guardado os dados */
	}


}
