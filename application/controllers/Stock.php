<?php

	class Stock extends CI_Controller{

		
		public function __construct()
		{
			/*fonction d'office :
			Appel du modèle et d'un helper de base*/
			parent::__construct();
			$this->load->model('items_model');
			$this->load->helper('url_helper');
		}

		public function form_validation()
		{
			//Valide les champs du formulaire
			$this->form_validation->set_rules('item_name', 'name', 'required');
	    	$this->form_validation->set_rules('item_inventory_nb', 'nb of iventory', 'required');
	    	$this->form_validation->set_rules('item_buying_date', 'buying date', 'required');
	   		$this->form_validation->set_rules('item_warranty_duration', 'warranty duration', 'required');
		}

		public function items_list()
		{
			//Lien entre la récupération des items et l'affichage de la liste
			$data['items'] = $this->items_model->get_items();
			$data['title'] = 'Stock des items';

			$this->load->view('templates/header', $data);
			$this->load->view('items/list', $data);
			$this->load->view('templates/footer');
		}

		public function save($item_id = 0) 
		{

			
			if($item_id === 0)
			{
				//Lien entre l'ajout d'un item et le formulaire vide
				$this->load->helper('form');
	    		$this->load->library('form_validation');

	    		$data['title'] = 'Ajouter un objet';

	    		$this->form_validation();

	    		if($this->form_validation->run() === FALSE)
	    		{ 
	    			//Champs vides : affichage du formulaire
	    			$this->load->view('templates/header', $data);
			        $this->load->view('items/form');
			        $this->load->view('templates/footer');      
	    		}
	    		else
	    		{
	    			//Formulaire complété : Affichage de la liste
	    			$this->items_model->set_item();
					redirect('/stock/items_list/');


	    		}
    		}
    		else
    		{
    			//Lien entre la modification d'un item et l'affichage de la liste
    			$this->load->helper('form');
	    		$this->load->library('form_validation');

	    		$this->form_validation();
    			
    			$this->items_model->set_item($item_id);
    			redirect('/stock/items_list/');
    		}

		}

		public function update($item_id)
		{
			//Récupère l'ID et affiche le formulaire de l'item en question
			$this->load->helper('form');
    		$this->load->library('form_validation');


			$data['item'] = $this->items_model->get_items($item_id);
			$data['title'] = "Modifier : " . ucfirst($data['item']['item_name']);
			

			$this->load->view('templates/header', $data);
			$this->load->view('items/form', $data);
			$this->load->view('templates/footer');
		}

		public function delete($item_id, $del)
		{
				
			if($del === 'quest')
			{
				//Demande une vérification de la demande de supprimer un item
				$this->load->helper('form');
	    		$this->load->library('form_validation');

	    		$data['item'] = $this->items_model->get_items($item_id);
	    		$data['title'] = "Supprimer : " . ucfirst($data['item']['item_name']);

				$this->load->view('templates/header', $data);
				$this->load->view('items/confirm_del', $data);
				$this->load->view('templates/footer');
			}
			else
			{
				//Appel de la fonction qui supprimera l'item
				$this->items_model->del_item($item_id);
				//Affiche la liste
				redirect('/stock/items_list/');
			}
		}
	}

?>