<?php

class Element_Model extends CI_Model
{

    public function take_all_elements()
    {
        $this->db->select('*');
        $this->db->from('elemento');
        $result = $this->db->get()->result();
        return $result;
    }

    public function delete_element_by_id($id)
    {
        // $this->db->where('id', 1 );
        $this->db->delete('elemento', array('id' => $id));
        $result = $this->db->affected_rows();
        return $result;
    }
    public function take_element_by_id($id)
    {
        $this->db->select('*');
        $this->db->from('elemento');
        $this->db->where('id', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    public function update_element($elemento)
    {
        $data = array(
            'nome' => $elemento['nome'],
            'descrizione' => $elemento['descrizione'],
            'tipologia' => $elemento['tipologia'],
            'quantita' => $elemento['quantita'],
            'prezzo' => $elemento['prezzo'],
        );

        $this->db->where('id', $elemento['id']);
        $result = $this->db->update('elemento', $data);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function detail_element($id)
    {
        $this->db->select('elemento.id , elemento.nome , elemento.descrizione , elemento.tipologia ,  elemento.quantita ,  elemento.prezzo ,  produttori.id as id_produttore , ,  produttori.nome_produttore ,  produttori.partita_iva_produttore');
        $this->db->from('elemento');
        $this->db->join('produttori', 'elemento.id = produttori.id_element');
        $this->db->where('elemento.id', $id);
        $result = $this->db->get()->result();
        // echo    $this->db->last_query();die;
        return $result;
    }

    public function new_element($array_elemento)
    {
        $result = $this->db->insert('elemento', $array_elemento);
        return $result;
    }
}
