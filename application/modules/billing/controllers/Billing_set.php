<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Billing_set extends CI_Controller {

    public function __construct() {
        parent::__construct(TRUE);
        if ($this->session->userdata('logged') == NULL) {
            header("Location:" . site_url('manage/auth/login') . "?location=" . urlencode($_SERVER['REQUEST_URI']));
        }
        $this->load->model(array('billing/Billing_model', 'student/Student_model', 'account/Account_model', 'pos/Pos_model', 'payment/Payment_model', 'period/Period_model', 'pos/Pos_model', 'bulan/Bulan_model', 'bebas/Bebas_model', 'bebas/Bebas_pay_model', 'setting/Setting_model', 'logs/Logs_model', 'report/Report_model', 'report/Detail_jurnal_model'));
        $this->load->library('upload');
    }

    // pos view in list
    public function index($offset = NULL) {
        $q = $this->input->get(NULL, TRUE);

		$data['q'] = $q;

		$params = array();

		if (isset($q['p']) && !empty($q['p']) && $q['p'] != '') {
			$params['period_id'] = $q['p'];
		}

		if (isset($q['c']) && !empty($q['c']) && $q['c'] != '') {
			$params['class_id']  = $q['c'];
		}

		if (isset($q['k']) && !empty($q['k']) && $q['k'] != '') {
			$params['majors_id'] = $q['k'];
		}

		if (isset($q['d']) && !empty($q['d']) && $q['d'] != '') {
			$params['month_start'] = $q['d'];
		}

		if (isset($q['s']) && !empty($q['s']) && $q['s'] != '') {
			$params['month_end'] = $q['s'];
		}
        
		$data['period']     = $this->Period_model->get($params);
		$data['class']      = $this->Student_model->get_class($params);
		$data['majors']     = $this->Student_model->get_majors($params);
		$data['from']       = $this->Bulan_model->get_month($params);
		$data['to']         = $this->Bulan_model->get_month($params);
		$data['student']    = $this->Student_model->get($params);
        
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        
        $data['title'] = 'Tagihan Santri';
        $data['main'] = 'billing/billing_list';
        $this->load->view('manage/layout', $data);
    }
    
    function class_searching(){
	    $id_majors = $this->input->post('id_majors');
        $dataKelas  = $this->db->query("SELECT * FROM class WHERE majors_majors_id = '$id_majors' ORDER BY class_name ASC")->result_array();
    
        echo '<div class="col-md-2">  
				<div class="form-group">
				    <label>Kelas</label>
		            <select name="c" id="class_id" class="form-control" required="">
                    <option value="">-- Pilih Kelas --</option>';
                      foreach($dataKelas as $row){ 
        
                        echo '<option value="'.$row['class_id'].'">';
                            
                        echo $row['class_name'];
                            
                        echo '</option>';
                    
                        }
            echo '</select>
				</div>
			</div>';
	}
	
	function print_bill(){
	    ob_start();
	    $id_periode             = $this->uri->segment('4');
        $month_start            = $this->uri->segment('5');
        $month_end              = $this->uri->segment('6');
	    $id_siswa               = $this->uri->segment('7');
        
        $student                = $this->Student_model->get(array('id' => $id_siswa));
        
        $params = array();
        
	    $params['student_id']   = $id_siswa;
	    $params['period_id']    = $id_periode;
	    $params['majors_id']    = $student['majors_id'];
	    $params['class_id']     = $student['class_id'];
	    $params['month_start']  = $month_start;
	    $params['month_end']    = $month_end;
        
        $data['period']         = $this->Period_model->get(array('id' => $id_periode));
		$data['from']           = $this->Bulan_model->get_month(array('id' => $month_start));
		$data['to']             = $this->Bulan_model->get_month(array('id' => $month_end));
		$data['student']        = $this->Student_model->get(array('id' => $id_siswa));
		
		$data['bulan']          = $this->Billing_model->get_tagihan_bulan($params);
		$data['bebas']          = $this->Billing_model->get_tagihan_bebas($params);
		
		$periodSekarang = $this->db->query("SELECT period_start FROM period WHERE period_id = '$id_periode'")->row_array();
		
		$periodLama = $this->db->query("SELECT period_id FROM period WHERE period_start < '" . $periodSekarang['period_start'] . "'")->result_array();
		
		$periode    = array();
		foreach ($periodLama as $row) {
		    $periode[] = $row['period_id'];
		}
		
		if (count($periode)>0){
		
	    $param['student_id']    = $id_siswa;
	    $param['period_id']     = $periode;
	    $param['majors_id']     = $student['majors_id'];
	    $param['class_id']      = $student['class_id'];
	    //$param['month_start']   = $month_start;
	    //$param['month_end']     = $month_end;
		    
		} else {
		    
	    $param['student_id']    = "";
	    $param['period_id']     = "";
	    $param['majors_id']     = "";
	    $param['class_id']      = "";
		}
		
		$data['bulanLama']      = $this->Billing_model->get_tagihan_bulan_lama($param);
		$data['bebasLama']      = $this->Billing_model->get_tagihan_bebas_lama($param);
		
		
		$data['setting_nip_kepsek']     = $this->Setting_model->get(array('id' => 11));
        $data['setting_nama_kepsek']    = $this->Setting_model->get(array('id' => 12));
		$data['setting_nip_katu']       = $this->Setting_model->get(array('id' => 13));
        $data['setting_nama_katu']      = $this->Setting_model->get(array('id' => 14));
		$data['setting_nip_bendahara']  = $this->Setting_model->get(array('id' => 15));
        $data['setting_nama_bendahara'] = $this->Setting_model->get(array('id' => 16));
        $data['setting_city']           = $this->Setting_model->get(array('id' => SCHOOL_CITY));
        $data['setting_district']       = $this->Setting_model->get(array('id' => SCHOOL_DISTRICT)); 
        $data['setting_school']         = $this->Setting_model->get(array('id' => SCHOOL_NAME)); 
        $data['setting_address']        = $this->Setting_model->get(array('id' => SCHOOL_ADRESS)); 
        $data['setting_phone']          = $this->Setting_model->get(array('id' => SCHOOL_PHONE));  
    
        $filename = 'Tagihan-Pembayaran-'.$student['student_full_name'].'-Kelas-'.$student['class_name'].'.pdf';
	    
	    $this->load->view('billing/billing_print', $data);
        
        $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en', false, 'ISO-8859-15',array(10, 10, 10, 10));
        $pdf->setDefaultFont('arial'); 
        $pdf->setTestTdInOnePage(false);
        $pdf->pdf->SetDisplayMode('fullpage');
        $pdf->WriteHTML($html);
        $pdf->Output($filename);
        
	}
	
	public function billing_excel() {
        $q = $this->input->get(NULL, TRUE);

		$data['q'] = $q;

		$params = array();

		if (isset($q['p']) && !empty($q['p']) && $q['p'] != '') {
			$params['period_id'] = $q['p'];
		}

		if (isset($q['c']) && !empty($q['c']) && $q['c'] != '') {
			$params['class_id']  = $q['c'];
		}

		if (isset($q['k']) && !empty($q['k']) && $q['k'] != '') {
			$params['majors_id'] = $q['k'];
		}

		if (isset($q['d']) && !empty($q['d']) && $q['d'] != '') {
			$params['month_start'] = $q['d'];
		}

		if (isset($q['s']) && !empty($q['s']) && $q['s'] != '') {
			$params['month_end'] = $q['s'];
		}
        
		$data['period']     = $this->Period_model->get($params);
		$data['class']      = $this->Student_model->get_class($params);
		$data['majors']     = $this->Student_model->get_majors($params);
		$data['from']       = $this->Bulan_model->get_month($params);
		$data['to']         = $this->Bulan_model->get_month($params);
		$data['student']    = $this->Student_model->get($params);
        
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        
        $this->load->view('billing/billing_xls', $data);
    }
	
	public function billing_excel_rekap() {
        $q = $this->input->get(NULL, TRUE);

		$data['q'] = $q;

		$params = array();

		if (isset($q['p']) && !empty($q['p']) && $q['p'] != '') {
			$params['period_id'] = $q['p'];
		}

		if (isset($q['c']) && !empty($q['c']) && $q['c'] != '') {
			$params['class_id']  = $q['c'];
		}

		if (isset($q['k']) && !empty($q['k']) && $q['k'] != '') {
			$params['majors_id'] = $q['k'];
		}

		if (isset($q['d']) && !empty($q['d']) && $q['d'] != '') {
			$params['month_start'] = $q['d'];
		}

		if (isset($q['s']) && !empty($q['s']) && $q['s'] != '') {
			$params['month_end'] = $q['s'];
		}
        
		$data['period']     = $this->Period_model->get($params);
		$data['class']      = $this->Student_model->get_class($params);
		$data['majors']     = $this->Student_model->get_majors($params);
		$data['from']       = $this->Bulan_model->get_month($params);
		$data['to']         = $this->Bulan_model->get_month($params);
		$data['student']    = $this->Student_model->get($params);
        
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        
        $this->load->view('billing/billing_xls_rekap', $data);
    }

    // pos view in list
    public function send_billing($offset = NULL) {
        $q = $this->input->get(NULL, TRUE);

		$data['q'] = $q;

		$params = array();

		if (isset($q['p']) && !empty($q['p']) && $q['p'] != '') {
			$params['period_id'] = $q['p'];
		}

		if (isset($q['c']) && !empty($q['c']) && $q['c'] != '') {
			$params['class_id']  = $q['c'];
		}

		if (isset($q['k']) && !empty($q['k']) && $q['k'] != '') {
			$params['majors_id'] = $q['k'];
		}

		if (isset($q['d']) && !empty($q['d']) && $q['d'] != '') {
			$params['month_start'] = $q['d'];
		}

		if (isset($q['s']) && !empty($q['s']) && $q['s'] != '') {
			$params['month_end'] = $q['s'];
		}
        
		$data['period']     = $this->Period_model->get($params);
		$data['class']      = $this->Student_model->get_class($params);
		$data['majors']     = $this->Student_model->get_majors($params);
		$data['from']       = $this->Bulan_model->get_month($params);
		$data['to']         = $this->Bulan_model->get_month($params);
		$data['student']    = $this->Student_model->get($params);
        
		$config['suffix'] = '?' . http_build_query($_GET, '', "&");
        
        $data['title'] = 'Kirim Tagihan Siswa';
        $data['main'] = 'billing/billing_send_list';
        $this->load->view('manage/layout', $data);
    }

    function get_form(){
      
        for($count = 0; $count < count($_POST["student_id"]); $count++)
        {
            $student = $this->db->query("SELECT student_id
                                        FROM student
                                        WHERE student_id IN (".$_POST['student_id'][$count].")")->result_array();
        
            foreach($student as $row){
    		    echo '<input type="hidden" name="student_id[]" id="student_id" value="'.$row['student_id'].'">';
    	    }
        }
    }
    
    public function send(){
        if ($_POST == TRUE) {
        
            $wa_center  = $this->Setting_model->get(array('id' => 17));
                
            $period_id      = $_POST['period_id'];
            $student_id     = $_POST['student_id'];
            $majors_id      = $_POST['majors_id'];
            $class_id       = $_POST['class_id'];
            
            $dateM = date('m');
            
            if($dateM == '01'){
                $till = '7';
            } else if($dateM == '02'){
                $till = '8';
            } else if($dateM == '03'){
                $till = '9';
            } else if($dateM == '04'){
                $till = '10';
            } else if($dateM == '05'){
                $till = '11';
            } else if($dateM == '06'){
                $till = '12';
            } else if($dateM == '07'){
                $till = '1';
            } else if($dateM == '08'){
                $till = '2';
            } else if($dateM == '09'){
                $till = '3';
            } else if($dateM == '10'){
                $till = '4';
            } else if($dateM == '11'){
                $till = '5';
            } else if($dateM == '12'){
                $till = '6';
            }
        
            $now = pretty_date(date('d-m-Y'), 'F', false);
            
            $month = $this->db->query("SELECT month_id FROM month WHERE month_name = '$now'")->row_array();
            
            $cpt = count($_POST['student_id']);
            for ($i = 0; $i < $cpt; $i++) {
            
            $params['student_id']   = $student_id[$i];
    	    $params['period_id']    = $period_id;
    	    $params['month_start']  = 1;
    	    $params['month_end']    = $till;
    		
    		$bulan          = $this->Billing_model->get_tagihan_bulan($params);
    		
    		$periodNow = $this->db->query("SELECT period_start FROM period WHERE period_id = '$period_id'")->row_array();
    		
    		$periodLama = $this->db->query("SELECT period_id FROM period WHERE period_start < '" . $periodNow['period_start'] . "'")->result_array();
    		
    		$periode    = array();
    		foreach ($periodLama as $row) {
    		    $periode[] = $row['period_id'];
    		}
    	    
    	    if (count($periode)>0){
        	    $param['student_id']    = $student_id[$i];
        	    $param['period_id']     = $periode;
    		} else {
        	    $param['student_id']    = "";
        	    $param['period_id']     = "";
    		}
    		
    		$sumBulan       = 0;
    		foreach ($bulan as $row) {
    		    $sumBulan += $row['bulan_bill'];
    		}
    	    
    	    if(isset($periode)){
    	        $bulanLama      = $this->Billing_model->get_tagihan_bulan_lama($param);    
        		$sumBulanLama   = 0;
        		foreach ($bulanLama as $row) {
        		    $sumBulanLama += $row['bulan_bill'];
        		}
    	    } else {
    	        $sumBulanLama   = 0;
    	    }
            
            $bulan = $sumBulan + $sumBulanLama;
            $bebas = $this->Bebas_model->get(array('student_id'=> $student_id[$i]));
            
            $sumBulan = $sumBulan + $sumBulanLama;
    
            $total_bebas = 0;
            foreach ($bebas as $row) {
                $total_bebas += $row['bebas_bill'];
            }
    
            $total_diskon = 0;
            foreach ($bebas as $row) {
                $total_diskon += $row['bebas_diskon'];
            }
    
            $total_bebas_pay = 0;
            foreach ($bebas as $row) {
                $total_bebas_pay += $row['bebas_total_pay'];
            }
            
            $sumBebas = $total_bebas - $total_diskon - $total_bebas_pay;
            
            $total    = $sumBulan + $sumBebas;
            
            $siswa = $this->db->query("SELECT student_id, student_full_name, majors_short_name, majors_school_name, class_name, student_parent_phone FROM student JOIN class ON class.class_id = student.class_class_id JOIN majors ON majors.majors_id = student.majors_majors_id WHERE student.student_id = '$student_id[$i]'")->row_array();
            
            if(isset($siswa['student_parent_phone']) AND $siswa['student_parent_phone'] != '+62' AND $total != 0){
            
            
                
        	    $no_wa = $siswa['student_parent_phone'];
    			//$no_wa='+6281335111174';
                $pesan = 'Assalamualaikum Warahmatullahi Wabarakatuh.' . "\n\n" . 'Alhamdulillah kegiatan siswa di sekolah berjalan dengan baik. Kami mengucapkan banyak terima kasih atas kerja sama Bapak/Ibu dalam menunaikan pembayaran.' . "\n\n" . 'Mohon maaf, berhubung saat ini sudah pertengahan bulan kami ingin memberitahukan tunggakan administrasi dari ananda ' . $siswa['student_full_name'] . ', Kelas ' .$siswa['class_name'] . ' ' . $siswa['majors_school_name'] . ', sejumlah Rp ' . number_format($total, 0, ",", ".") . '. Besar harapan kami kepada Bapak/Ibu untuk bisa menunaikan biaya pendidikan tersebut.' . "\n\n" . 'Atas perhatiannya kami ucapkan terimakasih. Semoga Allah SWT memudahkan segala urusan kita' . "\n\n" .
                    'Download Tagihan : ' . base_url() . 'billing/cetak?a=' . base64_encode($period_id) . '&b=' . base64_encode('1') . '&c=' . base64_encode($till) . '&d=' . base64_encode($siswa['student_id']) . "\n\n" .
                    'Nomor WA Sekolah : http://wa.me/' . $wa_center['setting_value'] . "\n\n" . '*) Silahkan simpan nomor ini jika link tidak aktif.';
            
                $key1='fce9862deac8554e58028c35011e14214b47496d05fbd61c'; //decareptil
                $url='http://116.203.92.59/api/send_message';
                
                	$data = array(
                	  "phone_no"    =>	$no_wa,
                	  "key"		    =>	$key1,
                	  "message"	    =>	$pesan
                	);
        
                	$data_string = json_encode($data);
                
                	$ch = curl_init($url);
                	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                	curl_setopt($ch, CURLOPT_VERBOSE, 0);
                	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
                	curl_setopt($ch, CURLOPT_TIMEOUT, 360);
                	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
                	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                	  'Content-Type: application/json',
                	  'Content-Length: ' . strlen($data_string))
                	);
                	$res=curl_exec($ch);
                	curl_close($ch);       
            }
            
            }
            
            
            $this->session->set_flashdata('success',' Tagihan Siswa Berhasil Dikirim');
            redirect('manage/billing/send_billing');
        }
    }
	
}