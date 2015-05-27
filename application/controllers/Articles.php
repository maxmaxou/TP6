<?php
class articles extends CI_Controller {
public function __construct()
{
parent::__construct();
$this->load->model('articles_modele');
}
public function index()
{
echo "Bonjour";
$data['articles'] = $this->articles_modele->get_articles();
$data['title'] = 'Liste des articles';
$this->load->view('templates/header', $data);
$this->load->view('articles/index', $data);
$this->load->view('templates/footer');

}
public function view($slug)
{
$data['articles'] = $this->articles_modele->get_articles($slug);
}
public function create()
{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a news item';

    $this->form_validation->set_rules('titre', 'Titre', 'required');
    $this->form_validation->set_rules('texte', 'texte', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);
        $this->load->view('articles/create');
        $this->load->view('templates/footer');

    }
    else
    {
        $this->articles_modele->set_articles();
        $this->load->view('articles/success');
    }

}
}