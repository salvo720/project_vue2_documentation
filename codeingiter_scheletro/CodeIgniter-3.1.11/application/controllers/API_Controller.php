<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class API_Controller extends CI_Controller {

	public function __construct()
	{
        parent::__construct();
        // Your own constructor code
        // insert helper
        $this->load->helper(array('form', 'url','security'));
        // insert libray
        $this->load->library('form_validation');
        //inser model 
        $this->load->model(array('Element_Model' , 'Productor_Model' ),'',true);
			
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    //  index equivale a showtable 
	public function index()
	{
		$data=array();
		$this->template->show('show_elements' , $data , false);
	}

	public function index_injson()
	{
		$dati=$this->Element_Model->take_all_elements();
		echo $data='{"data":', json_encode($dati) , '}';
	}

	public function detail_element($id=0)
	{
		// if($id!=0){
		// $this->detail_element_injson($id);
		// }
		$data=array();
		// $result=$this->Element_Model->detail_element($id);
		$data['id']=$id;
		$this->template->show('detail_element' , $data , false);
	}
	public function detail_element_injson($id=0)
	{
		// TODO:la query non va 
		if($id!=0){
		$result=$this->Element_Model->detail_element($id);
		$result=json_encode($result);
		echo '{"data":', $result , '}';
		}
	}

    public function new_element()
	{
		$data=array();
		$this->template->show('new_element' , $data , false);
	}

	public function insert_new_element()
	{
        $array_validation_errors = array(
            'required' => sprintf('si e verificato un errore con riporva piu tardi ','{field}'),
            'trim' => sprintf('si e verificato un errore con riporva piu tardi ','{field}'),
            'xss_clean' => sprintf('si e verificato un errore con riprova piu tardi ' ,'{field}'),
        );
        
		$this->form_validation->set_rules('Nome_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Numero_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Tipologia', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Quantita', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Prezzo', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);

		if($this->form_validation->run() == TRUE){
			$nome_elemento=$this->input->post('Nome_elemento');
			$numero_elemento=$this->input->post('Numero_elemento');
			$tipologia_elemento=$this->input->post('Tipologia');
			$quantita_elemento=$this->input->post('Quantita');
			$prezzo_elemento=$this->input->post('Prezzo');
			
			$array_elemento=array(
				'Nome_elemento'=> $nome_elemento ,
				'Numero_elemento'=> $numero_elemento ,
				'Tipologia'=> $tipologia_elemento ,
				'Quantita'=> $quantita_elemento ,
				'Prezzo'=> $prezzo_elemento ,
			);

			$result=$this->Element_Model->new_element($array_elemento);

        }else{
			echo validation_errors();
		}



		// TODO:fare la query nel model e provare il new element
	}

    public function update_element($id=0)
	{
		$data=array();
		// pass id to view
		$data['id']=$id;
		$result=$this->Element_Model->take_element_by_id($id);
		$data['result']=$result;
		$this->template->show('update_element' , $data , false);
	}

	public function execute_update($id)
	{
		// $data=array();

		// TODO:FINIRE LA VALIDAZIONE 

        $array_validation_errors = array(
            'required' => sprintf('si e verificato un errore con riporva piu tardi ','{field}'),
            'trim' => sprintf('si e verificato un errore con riporva piu tardi ','{field}'),
            'xss_clean' => sprintf('si e verificato un errore con riprova piu tardi ' ,'{field}'),
        );

		$this->form_validation->set_rules('id_element', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Nome_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Numero_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Tipologia', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Quantita', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Prezzo', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);

		if ($this->form_validation->run() == TRUE)
		{
			$id_elemento        = 	$this->input->post('id_element');
			$nome_elemento      = 	$this->input->post('Nome_elemento');
			$numero_elemento    =   $this->input->post('Numero_elemento');
			$tipologia_elemento =   $this->input->post('Tipologia');
			$quantita_elemento  =   $this->input->post('Quantita');
			$prezzo_elemento    =   $this->input->post('Prezzo');
			
			$elemento=array(
				'id' => $id_elemento,
				'nome' => $nome_elemento,
				'numero' => $numero_elemento,
				'tipologia' => $tipologia_elemento,
				'quantita' => $quantita_elemento,
				'prezzo' => $prezzo_elemento,
			);
			$result=$this->Element_Model->update_element($elemento);

			// echo "update eseguito con successo ";
			redirect(site_url('Crud_Controller/index'));
		}else{
			echo validation_errors();
		}
		
		
	}
    public function delete_element($id)
	{
		$this->Element_Model->delete_element_by_id($id);
		redirect(site_url('Crud_Controller/index'));
	}

	// produttore (seconda tabella)

	public function new_element_productor($id)
	{
		// $this->Element_Model->delete_element_by_id($id);
		redirect(site_url('Crud_Controller/index'));
	}

	public function  update_element_productor($id)
	{
		// $this->Element_Model->delete_element_by_id($id);
		redirect(site_url('Crud_Controller/index'));
	}

	public function delete_element_productor( $id_elelemt=0 , $id_productor=0)
	{
		if(($id_elelemt != 0) && ($id_productor != 0 )){
		$this->Productor_Model->delete_element_inproductor_by_id( $id_elelemt ,$id_productor);
		redirect(site_url('Crud_Controller/detail_element/'. $id_elelemt . '/' . $id_productor ));
		}
	}

}
