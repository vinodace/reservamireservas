<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class My_account extends CI_Controller {

	public function __construct(){
        parent::__construct();

	}
	
	public function index()
	{

		if($this->session->userdata('logged_in') == null){
			
	            redirect(base_url('user_signup'));exit;
		}

		$id = $this->session->userdata('user_id');

		$whr['admin_user_id'] 	= $id;


		$edit_result 	= getAlldataById('tbl_admin_user',$whr);
		if(empty($edit_result)){
			
			redirect(base_url('user_signup'));exit; 
		}
		$edit_result[0]->admin_user_dob = date("m-d-Y", strtotime($edit_result[0]->admin_user_dob));
		$data['edit'] 			= $edit_result[0];
		$data['searchBlock'] 	= 1;
     	$data['main_content'] 	= 'front/user/my-account';
		$this->load->view('template',$data);
	}
	public function book_appointment()
	{
		$dr_id 			=  $this->input->post('dr_id');
		$usr_id 		=  $this->input->post('usr_id');
		$date 			=  $this->input->post('date');
		$date = date("Y-m-d", strtotime($date));
		$cur_date = date("Y-m-d");


		$whr['admin_user_id'] 	= $dr_id;
		$drProfile 				= getAlldataById('tbl_admin_user',$whr);
		$drEmail 				= $drProfile[0]->admin_user_email;

		$whr = array();
		$whr['admin_user_id'] 		= $usr_id;
		$getProfile 				= getAlldataById('tbl_admin_user',$whr);
		$email 						= $getProfile[0]->admin_user_email;

		if($email != null){
			if($date != '' && $date != '1970-01-01'){
				if($date > $cur_date){
					$whr = array();
					$whr['appointment_user_id'] 	= $usr_id;
					$whr['appointment_doctor_id'] 	= $dr_id;
					$whr['appointment_date'] 		= $date;
					$whr['appointment_active'] 		= 1;

					$appointmentExist=getAlldataById('tbl_appointment',$whr);
					if($appointmentExist == null){

						$current_datetime = date("Y-m-d H:i:s");

						$appointment_array = array(
				            'appointment_user_id'            				=> $usr_id,
				            'appointment_doctor_id'          				=> $dr_id,
				            'appointment_date'        						=> $date,
				            'appointment_created_by'    					=> $this->session->userdata('user_id'),
				            'appointment_created_time'    					=> $current_datetime
				        );

				        $appointment_insert_result = insert_data('tbl_appointment',$appointment_array);
				        
				        if($appointment_insert_result != ''){
				        	/////////////////////// SEND EMAIL ////////////////////

									$message = 'DATE -> '.$date.' Your appointment booked Successfully..!!!';
									$message2 = 'DATE -> '.$date.' Appointment Requested by someone..!!!';

							        if($email != ''){
							           require_once(APPPATH.'third_party/PHPMailer-master/src/PHPMailer.php');
							           require_once(APPPATH.'third_party/PHPMailer-master/src/SMTP.php');
							           require_once(APPPATH.'third_party/PHPMailer-master/src/Exception.php');
							           // print_r($email);exit;
							           $mail = new PHPMailer\PHPMailer\PHPMailer();
							           $mail->IsSMTP();

							           $mail->SMTPOptions = array(
							                   'ssl' => array(
							                       'verify_peer' => false,
							                       'verify_peer_name' => false,
							                       'allow_self_signed' => true
							                   )
							               ); 
							           $mail->CharSet="UTF-8";
							           $mail->Host = "netleafinfosoft.com";
							           $mail->SMTPDebug = 0;
							           $mail->Port = 465 ;

							           $mail->SMTPSecure = 'ssl';
							           $mail->SMTPAuth = TRUE;

							           $mail->IsHTML(true);

							           $mail->Username = "2tic@netleafinfosoft.com";
							           $mail->Password = "!Q2w3e4r5t";

							           $mail->SetFrom("2tic@netleafinfosoft.com", "2TIC");
							           $mail->AddAddress($email);
							           $mail->Subject = "Book Appointment";
							           $mail->Body = $message;
							           $mail->Send();
							           if($drEmail != ''){
								           $mail->ClearAllRecipients();
								           $mail->Body     =$message2;
								           $mail->Subject = "Appointment Request";
										   $mail->AddAddress($drEmail);
										   $mail->Send();
							           }
							       }

			       /////////////////// SEND EMAIL //////////////////

				        	echo "1";
				        }else{
				        	echo "0";
				        }
					}else{
						echo "2";
					}
				}else{
					echo "4";
				}
			}else{
				echo "3";
			}
		}else{
			echo "5";
		}
	}

	public function my_appointment()
	{	
		if($this->session->userdata('logged_in') == null){
	            redirect(base_url('user_signup'));exit;
		}

		$id 	= 	 $this->session->userdata('user_id');

		$this->load->model('user_model');
		$data['doctorList'] = $this->user_model->get_all_user_appointment($id);
     	$data['main_content'] 	= 'front/user/my-appointment';
		$this->load->view('template',$data);

	}

	public function edit_profile()
	{
		
		if($this->session->userdata('logged_in') == null){
			
	            redirect(base_url('user_signup'));exit;
		}

		$id 				= 	 $this->session->userdata('user_id');
		$name 				=    $this->input->post('name');
		$email 				=    $this->input->post('email');
		$gender 			=    $this->input->post('gender');
		$dob 				=    $this->input->post('dob'); 
		$dob 				= date("Y-m-d", strtotime($dob));
		$bloodgroup 		=    $this->input->post('bloodgroup');
		$colony 			=    $this->input->post('colony');
		$address 			=    $this->input->post('getAddress');
		$lat 				=    $this->input->post('lat');
		$lng 				=    $this->input->post('lng');
		$pincode 			=    $this->input->post('pincode');

		$update_array = array(
            'admin_user_name'     			=> $name,
            'admin_user_email'          	=> $email,
            'admin_user_gender'     		=> $gender, 
            'admin_user_dob'        		=> $dob,
            'admin_user_blood_group'   		=> $bloodgroup, 
            'admin_user_house_or_street'   	=> $colony, 
            'admin_user_address'   			=> $address, 
            'admin_user_latitude'  			=> $lat,
            'admin_user_longitude'        	=> $lng,
            'admin_user_pincode'       		=> $pincode
        );

		$whr['admin_user_id'] =  $id;

        $update_result = updaterow($update_array,'tbl_admin_user',$whr);

       	if($update_result == 'true'){

	       	$this->session->set_flashdata('update_success', 'Profile Updated Successfully .....!!!');

			redirect(base_url('my_account'));
       	}else{
	       	$this->session->set_flashdata('update_error', 'Something went wrong .....!!!');

			redirect(base_url('my_account'));
       	}

	}
	
}