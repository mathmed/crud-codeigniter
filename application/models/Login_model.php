<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Login_model extends CI_Model{

    public function auth($dados){

        /* verifica se os dados foram recebidos */

        if($dados){
            
            /* Condição do usuario */
            $this->db->where("usuario", $dados["usuario"]);
            
            /* Condição da senha */
            $this->db->where("senha", $dados["senha"]);
            
            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando */
            $query = $this->db->get("contatos");

            /* verifica se encontrou algum usuário */
            if($query->row()){

                /* inserindo dados na sessão */
                $this->session->set_userdata("user", $query->result_array()[0]);

                /* retornando mensagem de sucesso */
                return true;
            }
            $this->session->set_flashdata('auth', "<div class = 'alert alert-danger'>Erro, usuário ou senha incorretos</div>");
            return false;
        }
    }
    

}


?>