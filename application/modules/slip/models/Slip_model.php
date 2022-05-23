<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Slip_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	function get_noref($like, $id_majors){
        
        $query = $this->db->query("SELECT MAX(RIGHT(kas_noref,2)) AS no_max FROM kas WHERE DATE(kas_input_date)=CURDATE() AND kas_majors_id = '$id_majors' AND kas_noref LIKE '$like%' AND kas_category = '2'")->row();
        
        if (count($query)>0){
            $tmp = ((int)$query->no_max)+1;
            $noref = sprintf("%02s", $tmp);
        } else {
            $noref = "01";
        }
        
        return date('dmy').$noref;
    }
    
    function get_bcode($kas=array()){
        
        if(isset($kas['date'])){
            $this->db->where('kas_date', $kas['date']);
        }
        
        if(isset($kas['noref'])){
            $this->db->where('kas_date', $kas['date']);
        }
        
        $this->db->select('kas_noref, kas_date, account_code, account_description');

        $this->db->join('account', 'account.account_id = kas.kas_account_id', 'left');

        $res = $this->db->get('kas');
        
        return $res->row_array();
        
    }

    function get_print($id){
        
        $this->db->where('gaji.gaji_id', $id);
        
        $this->db->where('majors_status', '1');

        $this->db->select('employee.employee_id, employee_nip, employee_name, employee_strata, employee_category, employee_start, employee_end');
        $this->db->select('position.position_majors_id, majors.majors_id, majors.majors_name, majors_short_name, majors_status');
        $this->db->select('employee.employee_position_id, position.position_id, position.position_code, position_name, majors_status');
        
        $this->db->select('akun.akun_employee_id, akun.akun_id, akun.akun_account_id');
        
		$this->db->select('gaji_id, gaji_period_id, gaji_month_id, gaji_utama, gaji_status, gaji_tunjangan, gaji_induk, gaji_non_induk, gaji_standart, gaji_jam, gaji_potongan, gaji_jumlah, gaji_tanggal');
		
        $this->db->select('subsatu_id, subsatu.subsatu_gaji_id, subsatu_pokok, subsatu_fungsional, subsatu_tambahan');
        $this->db->select('subdua_id, subdua.subdua_gaji_id, subdua_transport, subdua_hr, subdua_penyesuaian, subdua_kepala_keluarga, subdua_piket, subdua_kurleb, subdua_koreksi, subdua_lain');
        $this->db->select('subtiga_id, subtiga.subtiga_gaji_id, subtiga_absen, subtiga_infak, subtiga_bmt, subtiga_koperasi, subtiga_qurban, subtiga_lain, subtiga_spp_anak');
        
        $this->db->select('account_description');
        $this->db->select('month_id, month_name');
		$this->db->select('period_id, period_start, period_end');
        $this->db->select('kredit_gaji_id, kredit_kas_noref');
        
        $this->db->join('position', 'position.position_id = employee.employee_position_id', 'left');
        $this->db->join('majors', 'majors.majors_id = employee.employee_majors_id', 'left');
        
        $this->db->join('akun', 'akun.akun_employee_id = employee.employee_id', 'left');
        
        $this->db->join('gaji', 'gaji.gaji_employee_id = employee.employee_id', 'left');
        
        $this->db->join('subsatu', 'subsatu.subsatu_gaji_id = gaji.gaji_id', 'left');
        $this->db->join('subdua', 'subdua.subdua_gaji_id = gaji.gaji_id', 'left');
        $this->db->join('subtiga', 'subtiga.subtiga_gaji_id = gaji.gaji_id', 'left');
        
		$this->db->join('month','gaji.gaji_month_id = month.month_id', 'left');
		$this->db->join('period','gaji.gaji_period_id = period.period_id', 'left');
		$this->db->join('kredit','gaji.gaji_id = kredit.kredit_gaji_id', 'left');
		$this->db->join('kas','kredit.kredit_kas_noref = kas.kas_noref', 'left');
		$this->db->join('account','account.account_id = kas.kas_account_id', 'left');

        $res = $this->db->get('employee');
        
        return $res->row_array();
        
    }
    
    
	function get_history($data = array())
	{
		if(isset($data['gaji_month_id'])) {
			$this->db->where('gaji_month_id', $data['gaji_month_id']);
		}

		if(isset($data['gaji_period_id'])) {
			$this->db->where('gaji_period_id', $data['gaji_period_id']);
		}

		if(isset($data['gaji_employee_id'])) {
			$this->db->where('gaji_employee_id', $data['gaji_employee_id']);
		}
		
		$this->db->order_by('period.period_start', 'desc');
		$this->db->order_by('month.month_id', 'desc');
		
		$this->db->select('gaji_id, gaji_period_id, gaji_month_id, gaji_utama, gaji_status, gaji_tunjangan, gaji_induk, gaji_non_induk, gaji_standart, gaji_jam, gaji_potongan, gaji_jumlah, gaji_tanggal');
		$this->db->select('kredit_gaji_id, kredit_kas_noref');
		$this->db->select('month_id, month_name');
		$this->db->select('account_description');
		$this->db->select('period_id, period_start, period_end');
		$this->db->join('month','gaji.gaji_month_id = month.month_id', 'left');
		$this->db->join('period','gaji.gaji_period_id = period.period_id', 'left');
		$this->db->join('kredit','gaji.gaji_id = kredit.kredit_gaji_id', 'left');
		$this->db->join('kas','kredit.kredit_kas_noref = kas.kas_noref', 'left');
		$this->db->join('account','account.account_id = kas.kas_account_id', 'left');
		
		$res = $this->db->get('gaji');

		if(isset($data['id']))
		{
			return $res->row_array();
		}
		else
		{
			return $res->result_array();
		}
	}
	
	function delete_history($id, $noref){
		$this->db->where('gaji_id', $id);
		$this->db->delete('gaji');
		$this->db->where('subsatu_gaji_id', $id);
		$this->db->delete('subsatu');
		$this->db->where('subtiga_gaji_id', $id);
		$this->db->delete('subtiga');
		$this->db->where('kredit_gaji_id', $id);
		$this->db->delete('kredit');
		$this->db->where('kas_noref', $noref);
		$this->db->delete('kas');
	}
	
	function add($data = array()) {

		if(isset($data['gaji_id'])) {
			$this->db->set('gaji_id', $data['gaji_id']);
		}

		if(isset($data['gaji_utama'])) {
			$this->db->set('gaji_utama', $data['gaji_utama']);
		}

		if(isset($data['gaji_status'])) {
			$this->db->set('gaji_status', $data['gaji_status']);
		}

		if(isset($data['gaji_tunjangan'])) {
			$this->db->set('gaji_tunjangan', $data['gaji_tunjangan']);
		}

		if(isset($data['gaji_induk'])) {
			$this->db->set('gaji_induk', $data['gaji_induk']);
		}

		if(isset($data['gaji_non_induk'])) {
			$this->db->set('gaji_non_induk', $data['gaji_non_induk']);
		}

		if(isset($data['gaji_standart'])) {
			$this->db->set('gaji_standart', $data['gaji_standart']);
		}

		if(isset($data['gaji_jam'])) {
			$this->db->set('gaji_jam', $data['gaji_jam']);
		}

		if(isset($data['gaji_potongan'])) {
			$this->db->set('gaji_potongan', $data['gaji_potongan']);
		}

		if(isset($data['gaji_jumlah'])) {
			$this->db->set('gaji_jumlah', $data['gaji_jumlah']);
		}

		if(isset($data['gaji_month_id'])) {
			$this->db->set('gaji_month_id', $data['gaji_month_id']);
		}

		if(isset($data['gaji_period_id'])) {
			$this->db->set('gaji_period_id', $data['gaji_period_id']);
		}
		if(isset($data['gaji_employee_id'])) {
			$this->db->set('gaji_employee_id', $data['gaji_employee_id']);
		}

		if(isset($data['gaji_tanggal'])) {
			$this->db->set('gaji_tanggal', $data['gaji_tanggal']);
		}

		if(isset($data['user_user_id'])) {
			$this->db->set('user_user_id', $data['user_user_id']);
		}

		if (isset($data['gaji_id'])) {
			$this->db->where('gaji_id', $data['gaji_id']);
			$this->db->update('gaji');
			$id = $data['gaji_id'];
		} else {
			$this->db->insert('gaji');
			$id = $this->db->insert_id();
		}

		$status = $this->db->affected_rows();
		return ($status == 0) ? FALSE : $id;
	}
	
	function set_subsatu($data = array()) {

        if (isset($data['subsatu_gaji_id'])) {
            $this->db->set('subsatu_gaji_id', $data['subsatu_gaji_id']);
        }

        if (isset($data['subsatu_id'])) {
            $this->db->set('subsatu_id', $data['subsatu_id']);
        }

        if (isset($data['subsatu_pokok'])) {
            $this->db->set('subsatu_pokok', $data['subsatu_pokok']);
        }

        if (isset($data['subsatu_fungsional'])) {
            $this->db->set('subsatu_fungsional', $data['subsatu_fungsional']);
        }

        if (isset($data['subsatu_tambahan'])) {
            $this->db->set('subsatu_tambahan', $data['subsatu_tambahan']);
        }
        
        $this->db->insert('subsatu');
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
	
	function set_subdua($data = array()) {

        if (isset($data['subdua_gaji_id'])) {
            $this->db->set('subdua_gaji_id', $data['subdua_gaji_id']);
        }

        if (isset($data['subdua_id'])) {
            $this->db->set('subdua_id', $data['subdua_id']);
        }
        
        if (isset($data['subdua_transport'])) {
            $this->db->set('subdua_transport', $data['subdua_transport']);
        }

        if (isset($data['subdua_hr'])) {
            $this->db->set('subdua_hr', $data['subdua_hr']);
        }

        if (isset($data['subdua_penyesuaian'])) {
            $this->db->set('subdua_penyesuaian', $data['subdua_penyesuaian']);
        }

        if (isset($data['subdua_kepala_keluarga'])) {
            $this->db->set('subdua_kepala_keluarga', $data['subdua_kepala_keluarga']);
        }

        if (isset($data['subdua_piket'])) {
            $this->db->set('subdua_piket', $data['subdua_piket']);
        }

        if (isset($data['subdua_kurleb'])) {
            $this->db->set('subdua_kurleb', $data['subdua_kurleb']);
        }

        if (isset($data['subdua_koreksi'])) {
            $this->db->set('subdua_koreksi', $data['subdua_koreksi']);
        }

        if (isset($data['subdua_lain'])) {
            $this->db->set('subdua_lain', $data['subdua_lain']);
        }
        
        $this->db->insert('subdua');
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function set_subtiga($data = array()) {

        if (isset($data['subtiga_gaji_id'])) {
            $this->db->set('subtiga_gaji_id', $data['subtiga_gaji_id']);
        }

        if (isset($data['subtiga_id'])) {
            $this->db->set('subtiga_id', $data['subtiga_id']);
        }

        if (isset($data['subtiga_absen'])) {
            $this->db->set('subtiga_absen', $data['subtiga_absen']);
        }

        if (isset($data['subtiga_infak'])) {
            $this->db->set('subtiga_infak', $data['subtiga_infak']);
        }
        
        if (isset($data['subtiga_bmt'])) {
            $this->db->set('subtiga_bmt', $data['subtiga_bmt']);
        }
        
        if (isset($data['subtiga_koperasi'])) {
            $this->db->set('subtiga_koperasi', $data['subtiga_koperasi']);
        }

        if (isset($data['subtiga_qurban'])) {
            $this->db->set('subtiga_qurban', $data['subtiga_qurban']);
        }

        if (isset($data['subtiga_lain'])) {
            $this->db->set('subtiga_lain', $data['subtiga_lain']);
        }

        if (isset($data['subtiga_spp_anak'])) {
            $this->db->set('subtiga_spp_anak', $data['subtiga_spp_anak']);
        }
        
        $this->db->insert('subtiga');
        $id = $this->db->insert_id();

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function save($paramskas){
	    
		$this->db->insert('kas', $paramskas);
		
	}
	
}