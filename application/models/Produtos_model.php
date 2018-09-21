<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Produtos_model extends CI_Model{
    
    public function getProdutos(){
        $query = $this->db->get('produtos');
        return $query->result();
    }

    public function addProduto($dados = NULL){
        if($dados) $this->db->insert("produtos", $dados);
    }

    public function getProdutoByID($id = NULL){

        if($id){
            /* Condição do id */
            $this->db->where("id", $id);

            /* Definindo um limite */
            $this->db->limit(1);

            /* Requisitando e retornando */
            $query = $this->db->get("produtos");
            return $query->row();
        }

    }

    public function editarProduto($dados = NULL, $id = NULL){
        if($dados && $id) $this->db->update("produtos", $dados, array("id" => $id));
    }
    
    public function apagarProduto($id = NULL){

        /* verifica se existe id */
        if(!$id) return false;
        
        /* faz a consulta no bd para verificar se existe */
		$query = $this->getProdutoByID($id);

		/* verifica se foi encontrado algum registro */
		if($query){

            /* verifica se o registro foi apagado */
            if($this->db->delete("produtos", array("id" => $id))){
                $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-success'>Produto apagado com sucesso</div>");
            }
            return true;
        }
        $this->session->set_flashdata('msg_listar_produtos', "<div class = 'alert alert-danger'>Não foi possível excluir o produto</div>");
		return false;

    }


}


?>