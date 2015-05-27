<?php

class articles_modele extends CI_Model {
public function __construct()
{
$this->load->database();
}
public function get_articles($slug = FALSE)
{
if ($slug === FALSE)
{
//Pour récupérer tous les articles
$query = $this->db->get('articles');
return $query->result_array();
}
//Pour récupérer un article en fonction de son slug
$query = $this->db->get_where('articles', array('titre_article'=>$slug));
return $query->row_array();
}
public function set_articles()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('titre'), 'dash', TRUE);

    $data = array(
        'titre' => $this->input->post('titre'),
        'titre_article' => $slug,
        'texte' => $this->input->post('texte')
    );

    return $this->db->insert('articles', $data);
}


}
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Articles_modele
 *
 * @author maxou
 */
