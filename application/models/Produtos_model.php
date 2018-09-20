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
        if($id) $this->db->delete("produtos", array("id" => $id));

    }


}


?>