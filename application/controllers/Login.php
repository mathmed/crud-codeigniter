<?php
/* Não permitindo que a URL seja acessada diretamente */
defined('BASEPATH') OR exit('No direct script access allowed');

/* Controlador padrão da aplicação, é o primeiro a ser chamado */
class Login extends CI_Controller {
	
	/* primeira função que é chamada */
	public function index(){

		/* Carregando o model (nome e apelido) */
		$this->load->model("login_model", "login");

		/* Carregando a view */
		$this->load->view('telaLogin', "");
    }
    
    /* função para fazer o login no sistema */
    public function auth(){

        /* Carregando o model (nome e apelido) */
        $this->load->model("login_model", "login");
        
        /* recuperando os dados do form */
        $dados['usuario'] = $this->input->post("usuario");
        $dados['senha'] = $this->input->post("senha");
        
        /* verifica se os campos estão preenchidos e chama a função de recuperação */
        if($dados['usuario'] && $dados['senha']) $auth = $this->login->auth($dados);

        /* verifica se o usuário logou */
        if($auth) redirect("/produtos");

        else{
            /* Caso o login não tenha sido efetuado, retornar com uma mensagem de erro */
            $this->session->set_flashdata('auth', "<div class = 'alert alert-danger'>Erro, usuário ou senha incorretos</div>");
            redirect("/");
        }
    }


}
