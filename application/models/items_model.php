<?php

	class Items_model extends CI_Model{
		
		public function __construct()
        {
        	/*fonction d'office :
			Appel de la base de donnée*/
            $this->load->database();
        }

		public function get_items($item_id = -1)
		{
			if($item_id === -1)
			{
				//Récupère la table 'tbitem'
				$query = $this->db->get('tbitem');
				return $query->result_array();
			}
			else
			{
				//Récupère l'item en question
				$this->load->helper('url');

				$query = $this->db->select('item_id, item_name, item_inventory_nb, item_buying_date, item_warranty_duration ')
						->where('item_id', $item_id)
						->get('tbitem');
				
				return $query->result_array()[0];
			}
		}

		public function set_item($item_id = -1)
		{
			if($item_id === -1)
			{
				//Insère un nouvel item dans la table
				$this->load->helper('url');

				$data = array(

					'item_name' => $this->input->post('item_name'),
					'item_inventory_nb' => $this->input->post('item_inventory_nb'),			
					'item_buying_date' => $this->input->post('item_buying_date'),
					'item_warranty_duration' => $this->input->post('item_warranty_duration')
					);

				return $this->db->insert('tbitem', $data);
			}
			else
			{
				//Modifiie l'item en question
				$data = array(

					'item_name' => $this->input->post('item_name'),
					'item_inventory_nb' => $this->input->post('item_inventory_nb'),			
					'item_buying_date' => $this->input->post('item_buying_date'),
					'item_warranty_duration' => $this->input->post('item_warranty_duration')
					);

					$this->db->update('tbitem', $data, array('item_id' => $item_id));
				
			}
		}

		public function del_item($item_id)
		{
			//Supprime l'item de la table
			$this->db->delete('tbitem', array('item_id' => $item_id));
		}
	}

?>