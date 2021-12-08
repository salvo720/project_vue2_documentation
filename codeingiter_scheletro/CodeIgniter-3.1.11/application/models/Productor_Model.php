<?php 

class Productor_Model extends CI_Model {

    public function new_productor($array_produttore){
        $result=$this->db->insert('produttori', $array_produttore);
        return $result;
    }

    public function update_productor($array_produttore,$id){
        $this->db->where('id', $id);
        $result=$this->db->update('produttori', $array_produttore);
        return $result;
    }

    public function take_productor_by_id($id){
        $this->db->select('*');
        $this->db->from('produttori');
        $this->db->where('id', $id );
        $result = $this->db->get()->result();
        return $result;       
    }

    public function take_all_productors(){
        $this->db->select('*');
        $this->db->from('produttori');
        $result=$this->db->get()->result();
        return $result;        
    }

    public function delete_productor_by_id_and_element_id( $id_element , $id_productor){
        $this->db->where(array('id' => $id_productor , 'id_element' => $id_element ));
        $this->db->delete('produttori');
        $result=$this->db->affected_rows();
        return $result;
    }
}

?>