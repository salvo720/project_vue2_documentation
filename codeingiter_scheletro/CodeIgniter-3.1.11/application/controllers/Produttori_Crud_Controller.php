<?php

// use phpDocumentor\Reflection\Types\This;

defined('BASEPATH') OR exit('No direct script access allowed');

class Produttori_Crud_Controller extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			// Your own constructor code
			// insert helper
			$this->load->helper(array('form', 'url','security'));
			// insert libray
			$this->load->library('form_validation');
			//inser model 
			$this->load->model(array('Productor_Model' ),'',true);			
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
		$this->template->show('show_productors' , $data , false);
	}

	public function index_injson()
	{
		$dati=$this->Productor_Model->take_all_productors();
		echo $data='{"data":', json_encode($dati) , '}';
	}

	public function new_productor()
	{
		$data=array();
		$this->template->show('new_productor' , $data , false);
	}

	public function insert_new_productor()
	{
		$array_validation_errors = array(
            'required' => sprintf('%s e un campo richiesto ','{field}'),
            'trim' => sprintf(' %s si e verificato un errore con riporva piu tardi ','{field}'),
            'xss_clean' => sprintf('%s si e verificato un errore con riprova piu tardi ' ,'{field}'),
        );

		$this->form_validation->set_rules('Nome_Produttore', 'NOME PRODUTTORE ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Numero_Partita_Iva_Produttore', 'NUMERO PARTITA IVA PRODUTTORE ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Id_Elemento', 'ID ELEMENTO', 'required|trim|xss_clean', $array_validation_errors);

		if($this->form_validation->run() == TRUE){
			$nome_poduttore=$this->input->post('Nome_Produttore');
			$numero_partita_iva_produttore=$this->input->post('Numero_Partita_Iva_Produttore');
			$id_elemento=$this->input->post('Id_Elemento');
			
			$array_produttore=array(
				'nome_produttore'=> $nome_poduttore ,
				'partita_iva_produttore'=> $numero_partita_iva_produttore ,
				'id_element'=> $id_elemento ,
			);

			$result=$this->Productor_Model->new_productor($array_produttore);

			if($result){
				// echo 'elemento inserito con successo ';
				$this->session->set_flashdata('successo', 'elemento inserito con successo');
				redirect(site_url('Produttori_Crud_Controller/index'));
			}else{
				// echo 'errore nell\' inserire il nuovo elemento';
				$this->session->set_flashdata('errore', 'errore nell\' inserire il nuovo elemento');
				redirect(site_url('Produttori_Crud_Controller/index'));
			}

		}else{
			echo validation_errors();
		}

	}

	public function  update_productor($id)
	{	
		$data=array();
		$data['id']=$id;
		$result=$this->Productor_Model->take_productor_by_id($id);
		$data['result']=$result;
		$this->template->show('update_productor' , $data , false);
	}

	public function  execute_update($id)
	{
		$array_validation_errors = array(
            'required' => sprintf('%s e un campo richiesto ','{field}'),
            'trim' => sprintf(' %s si e verificato un errore con riporva piu tardi ','{field}'),
            'xss_clean' => sprintf('%s si e verificato un errore con riprova piu tardi ' ,'{field}'),
        );

		$this->form_validation->set_rules('Nome_Produttore', 'NOME PRODUTTORE ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Numero_Partita_Iva_Produttore', 'PARTITA IVA PRODUTTORE ', 'required|trim|xss_clean', $array_validation_errors);
		$this->form_validation->set_rules('Id_Elemento', 'ID ELEMENTO ', 'required|trim|xss_clean', $array_validation_errors);

		if($this->form_validation->run() == TRUE){
			$nome_poduttore=$this->input->post('Nome_Produttore');
			$numero_partita_iva_produttore=$this->input->post('Numero_Partita_Iva_Produttore');
			$id_elemento=$this->input->post('Id_Elemento');
			
			$array_produttore=array(
				'nome_produttore'=> $nome_poduttore ,
				'partita_iva_produttore'=> $numero_partita_iva_produttore ,
				'id_element'=> $id_elemento ,
			);

			$result=$this->Productor_Model->update_productor($array_produttore, $id);

			if($result){
				// echo 'elemento inserito con successo ';
				$this->session->set_flashdata('successo', 'elemento aggiornato con successo');
				redirect(site_url('Produttori_Crud_Controller/index'));
			}else{
				// echo 'errore nell\' inserire il nuovo elemento';
				$this->session->set_flashdata('errore', 'errore nell\' aggiornare l\' elemento');
				redirect(site_url('Produttori_Crud_Controller/index'));
			}

		}else{
			echo validation_errors();
		}

	}	

	public function delete_productor( $id_elelemt=0 , $id_productor=0)
	{
		// if(($id_elelemt != 0) && ($id_productor != 0 )){
		// 	$this->Productor_Model->delete_productor_by_id_and_element_id( $id_elelemt ,$id_productor);
		// 	echo "eliminazione effettuata con successo";
		// 	redirect(site_url('Produttori_Crud_Controller/index' ));
		// }else{
		// 	echo "eliminazione fallita";
		// }
		$result=$this->Productor_Model->delete_productor_by_id_and_element_id( $id_elelemt ,$id_productor);
		if($result!=0){
			// echo 'elemento inserito con successo ';
			$this->session->set_flashdata('successo', 'produttore eliminato con successo');
			redirect(site_url('Produttori_Crud_Controller/index'));
		}else{
			// echo 'errore nell\' inserire il nuovo elemento';
			$this->session->set_flashdata('errore', 'errore nell\' eliminare il produttore');
			redirect(site_url('Produttori_Crud_Controller/index'));
		}
	}

}