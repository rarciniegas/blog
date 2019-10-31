<?php
	class Category_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function get_categories(){
			$this->db->order_by('name');
			$query = $this->db->get('category');
			return $query->result_array();
		}
		public function create_category(){
			$data = array(
				'name' => $this->input->post('name'),
			);
			return $this->db->insert('category', $data);
		}
		public function get_category($id){
			$query = $this->db->get_where('category', array('id' => $id));
			return $query->row();
		}

		public function get_posts_by_category($category_id){
			$this->db->order_by('post.id', 'DESC');
			$this->db->join('category', 'category.id = post.category_id');
				$query = $this->db->get_where('post', array('category_id' => $category_id));
			return $query->result_array();
		}

		public function delete_category($id){
			$this->db->where('id', $id);
			$this->db->delete('category');
			return true;
		}
	}