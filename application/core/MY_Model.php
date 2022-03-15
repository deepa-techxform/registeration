<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * MY_Model
 */
class MY_Model extends CI_Model {

    public $table_name;

    public function __construct() {
        parent::__construct();
    }

    /**
     * Fetch all records.
     * 
     * @return type 
     */
    // public function findedit($id) {
    //     if (!is_array($id)) {
    //         $id = array('id' => $id);
    //     }
    //     $q = $this->db->get_where($this->table_name, $id);
    //     return $q->row();
    // }
    // DELETE Main Multiple Offer
    public function findlist($id) {
        $data = array();
        $where = [];
        $where['offer.status'] = '0';
        $where['offer.is_multiple'] = '0';
        $where['offer.parent_id'] = $id;
       
        $q = $this->db->get_where($this->table_name, $where);
        $count=$q->num_rows();
        return $count;
    }
    // important view public function lists($offid) {
    //     $data = array();
    //     $where = [];
    //     $where['offer.status'] = '0';
    //     $where['offer.is_multiple'] = '0';
    //     $where['offer.parent_id'] = $offid;
       
    //     $this->db->select('offer.*,shops.shop_name');
    //     $this->db->join('shops', 'offer.shop_id=shops.id', 'left');
    //     $this->db->from('offer');
    //     $this->db->where($where);
    //     $q = $this->db->get();
    //     if ($q->num_rows() > 0) {
    //         foreach ($q->result_array() as $row) {
    //             $data[] = $row;
    //         }
    //     }
    //     return $data;
    // }
    public function lists($offid) {
        $data = array();
        // $where = [];
        // $where['offer.status'] = '0';
        // $where['offer.is_multiple'] = '0';
        // $where['offer.parent_id'] = $offid;
       
        $this->db->select('offer.*,shops.shop_name');
        $this->db->join('shops', 'offer.shop_id=shops.id', 'left');
        $this->db->from('offer');
        // $this->db->where($where);
        $this->db->where("offer.is_multiple=0 AND offer.parent_id=$offid AND ( offer.status=0 OR offer.status=2 )");
        $q = $this->db->get();
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function findeditmain($id) {
        if (!is_array($id)) {
            $id = array('offer.id' => $id);
        }
        $q = $this->db->get_where($this->table_name, $id);
        return $q->row();
    }
    public function fetch_offers_count($id) {
        // $where = [];
        // $where['offer.status'] = '0';
        // $where['categorychild.parent_id'] = $id;
        $this->db->where("offer.status=0 AND ( categorychild.parent_id='$id' OR categorychild.id='$id' )");
        $this->db->select('offer.*,categoryparent.name');
        $this->db->join('offer', 'offer.sub_category_id=categorychild.id', 'left');
        $this->db->join('category as categoryparent','categorychild.parent_id=categoryparent.id','left');
        $this->db->from('category as categorychild');
        // $this->db->where($where);
        // $this->db->limit('6');
        $q = $this->db->get();
        $count=$q->num_rows();
        return $count;
    }
    public function fetch_count() {
        $where = [];
        $where['status'] = '0';
        $q = $this->db->get_where($this->table_name, $where);
        $count=$q->num_rows();
        return $count;
    }
    public function findofferdetail($id) {
         $data = array();
        if (!is_array($id)) {
            $id = array('shop_id' => $id);
        }

        $q = $this->db->get_where($this->table_name, $id);
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }
        return $data;
    }
    public function fetch_all($is_count = FALSE) {
        $q = $this->db->get($this->table_name);
        if ($is_count) {
            return $q->num_rows();
        }
        return $q->result();
    }
    public function fetch_all_cat($is_count = FALSE) {
        $where = [];
        $where['parent_id'] = 0;
        $q = $this->db->get_where($this->table_name, $where);
        if ($is_count) {
            return $q->num_rows();
        }
        return $q->result();
    }
    public function fetch_all_order($is_count = FALSE,$order_var=FALSE) {
        // $q = $this->db->get($this->table_name);
        $this->db->from($this->table_name);
        $this->db->order_by($order_var, "asc");
        $q = $this->db->get(); 
        if ($is_count) {
            return $q->num_rows();
        }
        return $q->result();
    }

    /**
     * Fetch all records as array.
     * 
     * @return type 
     */

    public function fetch_all_array($select = "") 
    {
        if (!empty($select)) {
            $this->db->select($select);
        }
        $q = $this->db->get($this->table_name);
        return $q->result_array();
    }

    /**
     * Paginate results.
     * 
     * @param type $offset
     * @param type $limit
     * @return type 
     */

    public function paginate($limit = 10, $offset = 0, $where = []) 
    {
        $data = array();
        $this->db->limit($limit, $offset);
        if (empty($where)) {
            $q = $this->db->get($this->table_name);
        } else {
            $q = $this->db->get_where($this->table_name, $where);
        }
 
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        return $data;
    }

  public function paginate_order($limit = 10, $offset = 0,$order_var=FALSE, $where = []) 
  {
        $data = array();
        $this->db->limit($limit, $offset);
        if (empty($where)) {
            $this->db->from($this->table_name);
        $this->db->order_by($order_var, "asc");
        $q = $this->db->get(); 
        } else {
             $this->db->from($this->table_name);
            $this->db->where($where);
            $this->db->order_by($order_var, "asc");
        $q = $this->db->get();
        }
 
        if ($q->num_rows() > 0) {
            foreach ($q->result_array() as $row) {
                $data[] = $row;
            }
        }

        return $data;
 }
    /**
     * Find record by id.
     * 
     * @param type $id
     * @return type 
     */
    public function find($id) {
        if (!is_array($id)) {
            $id = array('id' => $id);
        }
        $q = $this->db->get_where($this->table_name, $id);
        return $q->row();
    }
    public function finddetail($id) {
        if (!is_array($id)) {
            $id = array('id' => $id);
        }
        $q = $this->db->get_where($this->table_detail, $id);
        return $q->row();
    }
    /**
     * Find record by $where.
     * 
     * @param type $where
     * @return type 
     */
    public function find_by($where, $select = '')
    {
        if (!empty($select) && $select != 'count') {
            $this->db->select($select);
        }
        $q = $this->db->get_where($this->table_name, $where);
        if ($select == 'count') {
            return $q->num_rows();
        }
        return $q->result();
    }
    //     public function find_by_order($where, $select = '',$order_var) {
    //     if (!empty($select) && $select != 'count') {
    //         $this->db->select($select);
    //         $this->db->order_by($order_var, "asc");
    //     }
    //     $q = $this->db->get_where($this->table_name, $where);
    //     if ($select == 'count') {
    //         return $q->num_rows();
    //     }
    //     return $q->result();
    // }
    /**
     * Abstract record creation.
     * 
     * @param array $data
     * @return type 
     */
    public function create(array $data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

public function createdetail(array $data) {
        $this->db->insert($this->table_name, $data);
        return $this->db->insert_id();
    }

public function createpro(array $data,$id) {
     if (!is_array($id)) {
            $id = array('id' => $id);
        }
         $this->db->where('id', $id);
         $this->db->insert($this->table_detail, $data);
        return $this->db->insert_id();
    // foreach ($data as $key => $value) {

    //    $this->db->insert($this->table_detail,$value,$id);
    //         }
    //        return $this->db->insert_id();    
    } 




    /**
     * Abstract recort update.
     * 
     * @param array $data
     * @param type $id 
     */
    public function update(array $data, $id) 
    {
        if (!is_array($id)) 
        {
            $id = array('id' => $id);
        }
        $this->db->update($this->table_name, $data, $id);
    } 

    /**
     * Abstract record deletion.
     * 
     * @param type $id 
     */
    public function delete($id) {
        if (!is_array($id)) {
            $id = array('id' => $id);
        }
        // print_r($id);
        $this->db->set('status',1);
        $this->db->where($id);
        $this->db->update($this->table_name);

        // exit();
        // $this->db->delete($this->table_name, $id);
    }

    /**
     * Utiltiy method to create a UUID.
     * 
     * @return type 
     */
    protected function create_uuid() {
        $uuid_query = $this->db->query('SELECT UUID()');
        $uuid_rs = $uuid_query->result_array();
        return $uuid_rs[0]['UUID()'];
    }
     public function update_section(array $data, $id) {
        if (!is_array($id)) {
            $id = array('id' => $id);
        }
        $this->db->update($this->table_names, $data, $id);
    }

}
