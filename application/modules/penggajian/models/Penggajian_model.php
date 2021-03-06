<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Penggajian_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    // Get From Databases
    function get($params = array()) {

        if (isset($params['id'])) {
            $this->db->where('employee.employee_id', $params['id']);
        }
        if (isset($params['employee_id'])) {
            $this->db->where('employee.employee_id', $params['employee_id']);
        }

        if (isset($params['multiple_id'])) {
            $this->db->where_in('employee.employee_id', $params['employee_id']);
        }

        if(isset($params['employee_search']))
        {
            $this->db->where('employee_nip', $params['employee_search']);
            $this->db->or_like('employee_name', $params['employee_search']);
        }

        if (isset($params['employee_nip'])) {
            $this->db->where('employee.employee_nip', $params['employee_nip']);
        }

        if (isset($params['nip'])) {
            $this->db->like('employee_nip', $params['nip']);
        }

        if (isset($params['password'])) {
            $this->db->like('employee_password', $params['password']);
        }

        if (isset($params['employee_name'])) {
            $this->db->where('employee.employee_name', $params['employee_name']);
        }

        if (isset($params['status'])) {
            $this->db->where('employee.employee_status', $params['status']);
        }

        if (isset($params['majors_id'])) {
            $this->db->where('employee.majors_majors_id', $params['majors_id']);
        }
        
        if($this->session->userdata('umajorsid') != '0')
        {
            $this->db->where('majors_id', $this->session->userdata('umajorsid'));
        }

        if(isset($params['group']))
        {

            $this->db->group_by('majors.majors_id'); 

        }


        if (isset($params['limit'])) {
            if (!isset($params['offset'])) {
                $params['offset'] = NULL;
            }

            $this->db->limit($params['limit'], $params['offset']);
        }

        if (isset($params['order_by'])) {
            $this->db->order_by($params['order_by'], 'desc');
        } else {
            $this->db->order_by('employee_nip', 'asc');
        }

        $this->db->where('majors_status', '1');

        $this->db->select('employee_id, employee_nip, employee_name, employee_strata, employee_category, employee_start, employee_end, employee_photo');
        $this->db->select('position.position_majors_id, majors.majors_id, majors.majors_name, majors_short_name, majors_status');
        $this->db->select('employee.employee_position_id, position.position_id, position.position_code, position_name, majors_status');
        
        $this->db->select('akun.akun_employee_id, akun.akun_id, akun.akun_account_id');
        
        $this->db->select('premier_id, premier.premier_employee_id, premier_pokok, premier_fungsional, premier_tambahan');
        $this->db->select('sekunder_id, sekunder.sekunder_employee_id, sekunder_transport, sekunder_hr, sekunder_penyesuaian, sekunder_kepala_keluarga, sekunder_piket, sekunder_kurleb, sekunder_koreksi, sekunder_lain');
        $this->db->select('potongan_id, potongan.potongan_employee_id, potongan_absen, potongan_infak, potongan_bmt, potongan_koperasi, potongan_qurban, potongan_lain, potongan_spp_anak');
        
        $this->db->join('position', 'position.position_id = employee.employee_position_id', 'left');
        $this->db->join('majors', 'majors.majors_id = employee.employee_majors_id', 'left');
        
        $this->db->join('akun', 'akun.akun_employee_id = employee.employee_id', 'left');
        
        $this->db->join('premier', 'premier.premier_employee_id = employee.employee_id', 'left');
        $this->db->join('sekunder', 'sekunder.sekunder_employee_id = employee.employee_id', 'left');
        $this->db->join('potongan', 'potongan.potongan_employee_id = employee.employee_id', 'left');

        $res = $this->db->get('employee');

        if (isset($params['id'])) {
            return $res->row_array();
        } else if (isset($params['employee_nis'])) {
            return $res->row_array();
        } else {
            return $res->result_array();
        }

    }

    function set_premier($data = array()) {

        if (isset($data['employee_id'])) {
            $this->db->set('premier_employee_id', $data['employee_id']);
        }

        if (isset($data['premier_id'])) {
            $this->db->set('premier_id', $data['premier_id']);
        }

        if (isset($data['premier_pokok'])) {
            $this->db->set('premier_pokok', $data['premier_pokok']);
        }

        if (isset($data['premier_fungsional'])) {
            $this->db->set('premier_fungsional', $data['premier_fungsional']);
        }

        if (isset($data['premier_tambahan'])) {
            $this->db->set('premier_tambahan', $data['premier_tambahan']);
        }
        
        $ie = $data['employee_id'];
        
        $query = $this->db->query("SELECT COUNT(premier_id) as numData FROM premier WHERE premier_employee_id = '$ie'")->row_array();

        if ($query['numData'] != 0) {
            $this->db->where('premier_employee_id', $data['employee_id']);
            $this->db->update('premier');
            $id = $data['employee_id'];
        } else {
            $this->db->insert('premier');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }

    function set_sekunder($data = array()) {

        if (isset($data['employee_id'])) {
            $this->db->set('sekunder_employee_id', $data['employee_id']);
        }

        if (isset($data['sekunder_id'])) {
            $this->db->set('sekunder_id', $data['sekunder_id']);
        }

        if (isset($data['sekunder_transport'])) {
            $this->db->set('sekunder_transport', $data['sekunder_transport']);
        }

        if (isset($data['sekunder_hr'])) {
            $this->db->set('sekunder_hr', $data['sekunder_hr']);
        }

        if (isset($data['sekunder_penyesuaian'])) {
            $this->db->set('sekunder_penyesuaian', $data['sekunder_penyesuaian']);
        }

        if (isset($data['sekunder_kepala_keluarga'])) {
            $this->db->set('sekunder_kepala_keluarga', $data['sekunder_kepala_keluarga']);
        }

        if (isset($data['sekunder_piket'])) {
            $this->db->set('sekunder_piket', $data['sekunder_piket']);
        }

        if (isset($data['sekunder_kurleb'])) {
            $this->db->set('sekunder_kurleb', $data['sekunder_kurleb']);
        }

        if (isset($data['sekunder_koreksi'])) {
            $this->db->set('sekunder_koreksi', $data['sekunder_koreksi']);
        }

        if (isset($data['sekunder_lain'])) {
            $this->db->set('sekunder_lain', $data['sekunder_lain']);
        }
        
        $ie = $data['employee_id'];
        
        $query = $this->db->query("SELECT COUNT(sekunder_id) as numData FROM sekunder WHERE sekunder_employee_id = '$ie'")->row_array();

        if ($query['numData'] != 0) {
            $this->db->where('sekunder_employee_id', $data['employee_id']);
            $this->db->update('sekunder');
            $id = $data['employee_id'];
        } else {
            $this->db->insert('sekunder');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function set_potongan($data = array()) {

        if (isset($data['employee_id'])) {
            $this->db->set('potongan_employee_id', $data['employee_id']);
        }

        if (isset($data['potongan_id'])) {
            $this->db->set('potongan_id', $data['potongan_id']);
        }

        if (isset($data['potongan_absen'])) {
            $this->db->set('potongan_absen', $data['potongan_absen']);
        }

        if (isset($data['potongan_infak'])) {
            $this->db->set('potongan_infak', $data['potongan_infak']);
        }
        
        if (isset($data['potongan_bmt'])) {
            $this->db->set('potongan_bmt', $data['potongan_bmt']);
        }
        
        if (isset($data['potongan_koperasi'])) {
            $this->db->set('potongan_koperasi', $data['potongan_koperasi']);
        }

        if (isset($data['potongan_qurban'])) {
            $this->db->set('potongan_qurban', $data['potongan_qurban']);
        }

        if (isset($data['potongan_lain'])) {
            $this->db->set('potongan_lain', $data['potongan_lain']);
        }

        if (isset($data['potongan_spp_anak'])) {
            $this->db->set('potongan_spp_anak', $data['potongan_spp_anak']);
        }
        
        $ie = $data['employee_id'];
        
        $query = $this->db->query("SELECT COUNT(potongan_id) as numData FROM potongan WHERE potongan_employee_id = '$ie'")->row_array();

        if ($query['numData'] != 0) {
            $this->db->where('potongan_employee_id', $data['employee_id']);
            $this->db->update('potongan');
            $id = $data['employee_id'];
        } else {
            $this->db->insert('potongan');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function set_akun($data = array()) {

        if (isset($data['employee_id'])) {
            $this->db->set('akun_employee_id', $data['employee_id']);
        }

        if (isset($data['akun_id'])) {
            $this->db->set('akun_id', $data['akun_id']);
        }

        if (isset($data['account_id'])) {
            $this->db->set('akun_account_id', $data['account_id']);
        }
        
        $ie = $data['employee_id'];
        
        $query = $this->db->query("SELECT COUNT(akun_id) as numData FROM akun WHERE akun_employee_id = '$ie'")->row_array();

        if ($query['numData'] != 0) {
            $this->db->where('akun_employee_id', $data['employee_id']);
            $this->db->update('akun');
            $id = $data['employee_id'];
        } else {
            $this->db->insert('akun');
            $id = $this->db->insert_id();
        }

        $status = $this->db->affected_rows();
        return ($status == 0) ? FALSE : $id;
    }
    
    function get_report($params = array()){
        
        if(isset($params['month_id']))
        {
            $this->db->where('month_id', $params['month_id']);
        }
        
        if(isset($params['period_id']))
        {
            $this->db->where('period_id', $params['period_id']);
        }
        
        if(isset($params['majors_id']))
        {
            $this->db->where('majors_id', $params['majors_id']);
        }

        $this->db->select('employee.employee_id, employee_nip, employee_name, employee_strata, employee_category, employee_start, employee_end');
        $this->db->select('position.position_majors_id, majors.majors_id, majors.majors_name, majors_short_name, majors_status');
        $this->db->select('employee.employee_position_id, position.position_id, position.position_code, position_name, majors_status');
        
        $this->db->select('akun.akun_employee_id, akun.akun_id, akun.akun_account_id');
        
		$this->db->select('gaji_id, gaji_period_id, gaji_month_id, gaji_pokok, gaji_potongan, gaji_jumlah, gaji_tanggal');
		
        $this->db->select('subsatu_id, subsatu.subsatu_gaji_id, subsatu_pokok, subsatu_lain');
        $this->db->select('subtiga_id, subtiga.subtiga_gaji_id, subtiga_simpanan, subtiga_bpjstk, subtiga_sumbangan, subtiga_koperasi, subtiga_bpjs, subtiga_pinjaman, subtiga_lain');
        
        $this->db->select('account_description');
        $this->db->select('month_id, month_name');
		$this->db->select('period_id, period_start, period_end');
        $this->db->select('kredit_gaji_id, kredit_kas_noref');
        
        $this->db->join('position', 'position.position_id = employee.employee_position_id', 'left');
        $this->db->join('majors', 'majors.majors_id = employee.employee_majors_id', 'left');
        
        $this->db->join('akun', 'akun.akun_employee_id = employee.employee_id', 'left');
        
        $this->db->join('gaji', 'gaji.gaji_employee_id = employee.employee_id', 'left');
        
        $this->db->join('subsatu', 'subsatu.subsatu_gaji_id = gaji.gaji_id', 'left');
        $this->db->join('subtiga', 'subtiga.subtiga_gaji_id = gaji.gaji_id', 'left');
        
		$this->db->join('month','gaji.gaji_month_id = month.month_id', 'left');
		$this->db->join('period','gaji.gaji_period_id = period.period_id', 'left');
		$this->db->join('kredit','gaji.gaji_id = kredit.kredit_gaji_id', 'left');
		$this->db->join('kas','kredit.kredit_kas_noref = kas.kas_noref', 'left');
		$this->db->join('account','account.account_id = kas.kas_account_id', 'left');

        $res = $this->db->get('employee');
        
        return $res->result_array();
        
    }
    
    function get_report_employee($params = array()){
        
        if(isset($params['month_id']))
        {
            $this->db->where('month_id', $params['month_id']);
        }
        
        if(isset($params['period_id']))
        {
            $this->db->where('period_id', $params['period_id']);
        }
        
        if(isset($params['majors_id']))
        {
            $this->db->where('majors_id', $params['majors_id']);
        }
        
        if(isset($params['employee_id']))
        {
            $this->db->where('employee_id', $params['employee_id']);
        }

        $this->db->select('employee.employee_id, employee_nip, employee_name, employee_strata, employee_category, employee_start, employee_end');
        $this->db->select('position.position_majors_id, majors.majors_id, majors.majors_name, majors_short_name, majors_status');
        $this->db->select('employee.employee_position_id, position.position_id, position.position_code, position_name, majors_status');
        
        $this->db->select('akun.akun_employee_id, akun.akun_id, akun.akun_account_id');
        
		$this->db->select('gaji_id, gaji_period_id, gaji_month_id, gaji_pokok, gaji_potongan, gaji_jumlah, gaji_tanggal');
		
        $this->db->select('subsatu_id, subsatu.subsatu_gaji_id, subsatu_pokok, subsatu_lain');
        $this->db->select('subtiga_id, subtiga.subtiga_gaji_id, subtiga_simpanan, subtiga_bpjstk, subtiga_sumbangan, subtiga_koperasi, subtiga_bpjs, subtiga_pinjaman, subtiga_lain');
        
        $this->db->select('account_description');
        $this->db->select('month_id, month_name');
		$this->db->select('period_id, period_start, period_end');
        $this->db->select('kredit_gaji_id, kredit_kas_noref');
        
        $this->db->join('position', 'position.position_id = employee.employee_position_id', 'left');
        $this->db->join('majors', 'majors.majors_id = employee.employee_majors_id', 'left');
        
        $this->db->join('akun', 'akun.akun_employee_id = employee.employee_id', 'left');
        
        $this->db->join('gaji', 'gaji.gaji_employee_id = employee.employee_id', 'left');
        
        $this->db->join('subsatu', 'subsatu.subsatu_gaji_id = gaji.gaji_id', 'left');
        $this->db->join('subtiga', 'subtiga.subtiga_gaji_id = gaji.gaji_id', 'left');
        
		$this->db->join('month','gaji.gaji_month_id = month.month_id', 'left');
		$this->db->join('period','gaji.gaji_period_id = period.period_id', 'left');
		$this->db->join('kredit','gaji.gaji_id = kredit.kredit_gaji_id', 'left');
		$this->db->join('kas','kredit.kredit_kas_noref = kas.kas_noref', 'left');
		$this->db->join('account','account.account_id = kas.kas_account_id', 'left');

        $res = $this->db->get('employee');
        
        return $res->row_array();
        
    }

}
