<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_general extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function countdata($table, $where_array){
		$this->db->where($where_array);
		$total = $this->db->get($table)->num_rows();
		return $total;
	}
	
	public function view($table){
		return $this->db->get($table)->result();
	}
	
	public function view_order($table, $order){
		$this->db->order_by($order);
		return $this->db->get($table)->result();
	}
	
	public function view_join($table1, $table2, $field1, $field2){
		$this->db->join($table2,"$table1.$field1=$table2.$field2");
		return $this->db->get($table1)->result();
	}
	
	public function view_join_limit($table1, $table2, $field1, $field2, $limit){
		$this->db->join($table2,"$table1.$field1=$table2.$field2");
		$this->db->limit($limit);
		return $this->db->get($table1)->result();
	}
	
	public function view_by($table, $where){
		$this->db->where($where);
		return $this->db->get($table)->row();
	}
	
	public function view_join1_by($table1, $table2, $where, $field1){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->where($where);
		return $this->db->get($table1)->row();
	}
	
	public function view_joind_by($table1, $table2, $where, $field1, $fieldd){
		$this->db->join($table2,"$table1.$field1=$table2.$fieldd");
		$this->db->where($where);
		return $this->db->get($table1)->row();
	}
	
	public function view_join2_by($table1, $table2, $table3, $where, $field1, $field2){
		$this->db->join($table2,"$table1.$field1=$table2.$field1");
		$this->db->join($table3,"$table1.$field2=$table3.$field2");
		$this->db->where($where);
		return $this->db->get($table1)->row();
	}
	
	public function view_where($table, $where, $order){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->order_by($order);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function view_group($table, $where, $order, $group){
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($where);
		$this->db->group_by($group);
		$this->db->order_by($order);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function declarevariable($table, $order, $search){
        $this->table = $table;
        $this->order = $order;
        $this->column_order = $order;
        $this->column_search = $search;
    }
	
	public function declarevariable_where($table, $order, $where, $search){
        $this->table = $table;
        $this->where = $where;
        $this->value = $search;
        $this->order = $order;
        $this->column_order = $order;
        $this->column_search = $search;
    }
	
	public function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function get_datatables_where()
	{
		$this->_get_datatables_query_where();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	
	public function _get_datatables_query()
	{
		
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end(); 
			}
			$i++;
		}
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	
	public function _get_datatables_query_where()
	{
		$this->db->where($this->where);
		$this->db->from($this->table);
		$i = 0;
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				if($i===0)
				{
					$this->db->group_start(); 
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end(); 
			}
			$i++;
		}
		if(isset($_POST['order'])) 
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	public function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
	
	public function count_filtered_where()
	{
		$this->_get_datatables_query_where();
		$query = $this->db->get();
		return $query->num_rows();
	}
	
	public function count_all_where()
	{
		$this->db->where($this->where,$this->value);
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}
  
	public function add($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}
  
	function edit($table, $where, $data)
	{
		$this->db->where($where);
		$this->db->update($table, $data); 
		return $this->db->affected_rows();
	}
  
	function hapus($table, $where)
	{
		foreach ($where as $key => $value) {
			$this->db->where($key, $value);
		}
		$this->db->delete($table);
		return $this->db->affected_rows();
	}
	
	function hapuswherein($table, $where, $value)
	{
		$this->db->where_in($where, $value);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}
	
	//////////////////////////////////////////////////////////////////////////////////
	public function file_upload($file_upload, $folder)
    {
				$files = $file_upload;
				$_FILES['userfile']['name'] = $files['name'];
				$_FILES['userfile']['type'] = $files['type'];
				$_FILES['userfile']['error'] = $files['error'];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'];
				$_FILES['userfile']['size'] = $files['size'];
				$new_name = time().md5($files['name']);
				
				// File upload configuration
                $uploadPath = './assets/dist/img/'.$folder.'/';
                $config=array(); 
				$config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'pdf|doc|docx|jpg|jpeg|png|gif';
                $config['max_size'] = '3000000';
                $config['max_width'] = '2000000';
                $config['max_height'] = '2000000';
                $config['file_name'] = $new_name;
				
				// Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload userfile to server
                if($this->upload->do_upload()){
                    // Uploaded userfile data
                    $nama_fileupload = $this->upload->data('file_name');
                }
				
				return $nama_fileupload;
	}
	
	public function file_upload_admin($file_upload, $folder)
    {
				$files = $file_upload;
				$_FILES['userfile']['name'] = $files['name'];
				$_FILES['userfile']['type'] = $files['type'];
				$_FILES['userfile']['error'] = $files['error'];
				$_FILES['userfile']['tmp_name'] = $files['tmp_name'];
				$_FILES['userfile']['size'] = $files['size'];
				$new_name = time().md5($files['name']);
				
				// File upload configuration
                $uploadPath = './upload/'.$folder.'/';
                $config=array(); 
				$config['max_size'] = 0;
				$config['upload_path'] = $uploadPath;
                $config['allowed_types'] = '*';
                $config['file_name'] = $new_name;
				
				// Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload userfile to server
                if($this->upload->do_upload()){
                    // Uploaded userfile data
                    $nama_fileupload = $this->upload->data('file_name');
                }
				
				return $nama_fileupload;
	}
	
	public function getRomawi($bln){
        switch ($bln){
            case 1: return "I"; break;
            case 2: return "II"; break;
            case 3: return "III"; break;            
			case 4: return "IV"; break;
			case 5: return "V"; break;
            case 6: return "VI"; break;
            case 7: return "VII"; break;
            case 8: return "VIII"; break;
            case 9: return "IX"; break;
            case 10: return "X"; break;
            case 11: return "XI"; break;
            case 12: return "XII"; break;
        }
	}
	
	public function getTanggalIndo($tanggal){
		if($tanggal!=NULL OR $tanggal!="0000-00-00"){
			$bulan = array ( 1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
			$pecahkan = explode('-', $tanggal); 
			// variabel pecahkan 0 = tanggal
			// variabel pecahkan 1 = bulan
			// variabel pecahkan 2 = tahun
			
			return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
		}else{
			return "";
		}
	}
	
	public function getBulanTahun($tanggal){
		$bulan = array ( 1 =>   'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
		$pecahkan = explode('-', $tanggal); 
		// variabel pecahkan 0 = tanggal
		// variabel pecahkan 1 = bulan
		// variabel pecahkan 2 = tahun
		return $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
	}
	
	public function getBulan($bulan){
		switch ($bulan){
            case 1: return "Januari"; break;
            case 2: return "Februari"; break;
            case 3: return "Maret"; break;            
			case 4: return "April"; break;
			case 5: return "Mei"; break;
            case 6: return "Juni"; break;
            case 7: return "Juli"; break;
            case 8: return "Agustus"; break;
            case 9: return "September"; break;
            case 10: return "Oktober"; break;
            case 11: return "November"; break;
            case 12: return "Desember"; break;
        }
	}
	
	public function random($karakter,$panjang){
		$string = '';
		for($i = 0; $i<$panjang; $i++){
			$pos = rand(0,strlen($karakter)-1);
			$string .= $karakter{$pos};
		}
		return $string;
	}
	
	public function hari_ini(){
		$hari = date ("D");
	 
		switch($hari){
			case 'Sun':
				$hari_ini = "Minggu";
			break;
	 
			case 'Mon':			
				$hari_ini = "Senin";
			break;
	 
			case 'Tue':
				$hari_ini = "Selasa";
			break;
	 
			case 'Wed':
				$hari_ini = "Rabu";
			break;
	 
			case 'Thu':
				$hari_ini = "Kamis";
			break;
	 
			case 'Fri':
				$hari_ini = "Jumat";
			break;
	 
			case 'Sat':
				$hari_ini = "Sabtu";
			break;
			
			default:
				$hari_ini = "Tidak di ketahui";		
			break;
		}
	 
		return $hari_ini;
	 
	}
	
}