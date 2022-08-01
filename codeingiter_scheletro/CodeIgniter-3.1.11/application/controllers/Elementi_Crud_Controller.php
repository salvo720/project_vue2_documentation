<?php

// use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') or exit('No direct script access allowed');

class Elementi_Crud_Controller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		// Your own constructor code
		// insert helper
		$this->load->helper(array('form', 'url', 'security'));
		// insert libray
		$this->load->library('form_validation');
		//inser model 
		$this->load->model(array('Element_Model'), '', true);
		// $this->load->model(array('Element_Model' , 'Productor_Model' ),'',true);

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
		$data = array();
		$this->template->show('show_elements', $data, false);
	}

	public function index_injson()
	{
		$dati = $this->Element_Model->take_all_elements();
		echo $data = '{"data":', json_encode($dati), '}';
	}

	public function detail_element($id = 0)
	{
		// if($id!=0){
		// $this->detail_element_injson($id);
		// }
		$data = array();
		// $result=$this->Element_Model->detail_element($id);
		$data['id'] = $id;
		$this->template->show('detail_element', $data, false);
	}
	public function detail_element_injson($id = 0)
	{
		if ($id != 0) {
			$result = $this->Element_Model->detail_element($id);
			$result = json_encode($result);
			echo '{"data":', $result, '}';
		}
	}

	public function new_element()
	{
		$data = array();
		$this->template->show('new_element', $data, false);
	}

	public function insert_new_element()
	{

		$array_validation_errors = array(
			'required' => sprintf('%s e un campo richiesto ', '{field}'),
			'trim' => sprintf(' %s si e verificato un errore con riporva piu tardi ', '{field}'),
			'xss_clean' => sprintf('%s si e verificato un errore con riprova piu tardi ', '{field}'),
		);

		$this->form_validation->set_rules('Nome_elemento', 'NOME ELEMENTO', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Descrizione_elemento', 'Descrizione ELEMENTO', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Tipologia', 'TIPOLOGIA ELEMENTO ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Quantita', 'QUANTITA ELEMENTO ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Prezzo', 'PREZZO ELEMENTO', 'required|trim|xss_clean', $array_validation_errors);

		if ($this->form_validation->run() == TRUE) {
			$nome_elemento = $this->input->post('Nome_elemento');
			$descrizione_elemento = $this->input->post('Descrizione_elemento');
			$tipologia_elemento = $this->input->post('Tipologia');
			$quantita_elemento = $this->input->post('Quantita');
			$prezzo_elemento = $this->input->post('Prezzo');

			$array_elemento = array(
				'nome' => $nome_elemento,
				'descrizione' => $descrizione_elemento,
				'tipologia' => $tipologia_elemento,
				'quantita' => $quantita_elemento,
				'prezzo' => $prezzo_elemento,
			);

			$result = $this->Element_Model->new_element($array_elemento);

			if ($result) {
				// echo 'elemento inserito con successo ';
				$this->session->set_flashdata('successo', 'elemento inserito con successo');
				redirect(site_url('Elementi_Crud_Controller/index'));
			} else {
				// echo 'errore nell\' inserire il nuovo elemento';
				$this->session->set_flashdata('errore', 'errore nell\' inserire il nuovo elemento');
				redirect(site_url('Elementi_Crud_Controller/index'));
			}
		} else {
			echo validation_errors();
		}
	}

	public function update_element($id = 0)
	{
		$data = array();
		// pass id to view
		$data['id'] = $id;
		$result = $this->Element_Model->take_element_by_id($id);
		$data['result'] = $result;
		$this->template->show('update_element', $data, false);
	}

	public function execute_update($id)
	{

		$array_validation_errors = array(
			'required' => sprintf('%s e un campo richiesto ', '{field}'),
			'trim' => sprintf(' %s si e verificato un errore con riporva piu tardi ', '{field}'),
			'xss_clean' => sprintf('%s si e verificato un errore con riprova piu tardi ', '{field}'),
		);

		$this->form_validation->set_rules('id_element', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Nome_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Numero_elemento', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Tipologia', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Quantita', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Prezzo', 'id elemento nascosto ', 'required|trim|xss_clean', $array_validation_errors);

		if ($this->form_validation->run() == TRUE) {
			$id_elemento        = 	$this->input->post('id_element');
			$nome_elemento      = 	$this->input->post('Nome_elemento');
			$numero_elemento    =   $this->input->post('Numero_elemento');
			$tipologia_elemento =   $this->input->post('Tipologia');
			$quantita_elemento  =   $this->input->post('Quantita');
			$prezzo_elemento    =   $this->input->post('Prezzo');

			$elemento = array(
				'id' => $id_elemento,
				'nome' => $nome_elemento,
				'numero' => $numero_elemento,
				'tipologia' => $tipologia_elemento,
				'quantita' => $quantita_elemento,
				'prezzo' => $prezzo_elemento,
			);
			$result = $this->Element_Model->update_element($elemento);

			if ($result) {
				// echo 'elemento inserito con successo ';
				$this->session->set_flashdata('successo', 'aggiornamento eseguito con successo');
				redirect(site_url('Elementi_Crud_Controller/index'));
			} else {
				// echo 'errore nell\' inserire il nuovo elemento';
				$this->session->set_flashdata('errore', 'errore nell\' aggiornare l\' elemento');
				redirect(site_url('Elementi_Crud_Controller/index'));
			}
		} else {
			echo validation_errors();
		}
	}
	public function delete_element($id)
	{
		$result = $this->Element_Model->delete_element_by_id($id);

		if ($result != 0) {
			// echo 'elemento inserito con successo ';
			$this->session->set_flashdata('successo', 'elemento eliminato con successo');
			redirect(site_url('Elementi_Crud_Controller/index'));
		} else {
			// echo 'errore nell\' inserire il nuovo elemento';
			$this->session->set_flashdata('errore', 'errore nell\' eliminare l\' elemento');
			redirect(site_url('Elementi_Crud_Controller/index'));
		}
	}
}
