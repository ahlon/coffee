<?php
require_once BASEPATH . '/core/Model.php';
/**
 * @author ahlon
 */
class Base_model extends CI_Model {
    public $table_name;
    
    public function __construct($table_name = '') {
        $this->table_name = $table_name;
        $this->load->database();
    }
    
    public function _set_table($name) {
        $this->table_name = $name;
    }
    
    public function load($id) {
        return $this->db->from($this->table_name)->where(array('id' => $id))->get()->row_array();
    }
    
    public function find_one($params) {
        return $this->db->from($this->table_name)->where($params)->get()->row_array();
    }
    
    public function find_all($params = array(), $orderby = null, $page_size = 0, $page = 1) {
        $this->db->from($this->table_name);
        $this->db->where($params);
        if ($orderby) {
            if (is_array($orderby)) {
                $this->db->order_by($orderby['column'], $orderby['sort']);
            }
            if (is_string($orderby)) {
                $this->db->order_by($orderby);
            }
        }
        if ($page_size && $page) {
            $start = $page_size * ($page - 1);
            $this->db->limit($page_size, $start);
        }
        return $this->db->get()->result_array();
    }
    
    public function count($params = array()) {
        return $this->db->from($this->table_name)->where($params)->count_all_results();
    }
    
    public function exist($params = array()) {
        return $this->count($params) > 0;
    }
    
    public function save($entity) { // &$entity
        $flag = $this->db->insert($this->table_name, $entity);
        $entity['id'] = $this->db->insert_id();
        return $entity;
    }
    
    public function update($params, $data) {
        if (is_int($params)) {
            $params = array('id' => $params);
        }
        return $this->db->where($params)->update($this->table_name, $data);
    }
    
    public function save_or_update($entity) {
        $params = array();
        $has_keyvalues = true;
        if (is_array($this->primary_key)) {
            foreach ($this->primary_key as $each_key) {
                if (isset($entity[$each_key])) {
                    $params[$each_key] = $entity[$each_key];
                } else {
                    $has_keyvalues = false;
                    break;
                }
            }
        } else {
            if (isset($entity[$this->primary_key])) {
                $params[$this->primary_key] = $entity[$this->primary_key];
            } else {
                $has_keyvalues = false;
            }
        }
        if ($has_keyvalues) {
            return $this->update($params, $entity);
        } else {
            return $this->save($entity);
        }
    }
    
    function remove($params) {
        return $this->delete($params);
    }
    
    public function delete($params) {
        if (empty($params)) {
            return false;
        }
        if (!is_array($params)) {
            $params = array('id' => $params);
        }
        return $this->db->where($params)->delete($this->table_name);
    }
    
    //     function get_first() {
    //         return $this->db->from($this->table_name)->order_by('id asc')->limit(1, 0)->get()->row_array();
    //     }
    
    /**
     * should have order by condition
     */    
    function get_last() {
        return $this->db->from($this->table_name)->order_by('id desc')->limit(1, 0)->get()->row_array();
    }
    
    function get_columns_meta() {
        $QUERY_SQL = 'show columns from ' . $this->table_name;
        $exe = $this->db->query($QUERY_SQL);
        return $exe->result();
    }
} 