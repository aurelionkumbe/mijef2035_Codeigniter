<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'app/helpers/Utils.php';
require_once 'app/libraries/Carbon/Carbon.php';

use Carbon\Carbon;

class User extends MY_Controller {

	public function __construct()
	{
		parent::__construct();


		if (session_status() != PHP_SESSION_ACTIVE) {
		    session_start();
		}
		if (!isset($_SESSION['is_logged_in']) || $_SESSION['is_logged_in'] != 1 || !isset($_SESSION['user']) || empty($_SESSION['user']) ) {
			redirect('/');
		}else{
			$this->initRapport();
		}

		$this->get_todo_task_of_one_week_past();
	}
//------------------------------------------------------------------------		
//------------------------------------------------------------------------		
	public function index()
	{	
/*
		if(isset($_GET['rapport_num']) && !empty($_GET['rapport_num'])){
			$_SESSION['rapport_num'] = $_GET['rapport_num'];
		}else{
			$_SESSION['rapport_num'] = $_SESSION['rapport']->num;
		}
		*/
		$this->watch_posting();

		

		$data = [
			'fonctions' => $this->db->get('fonctions')->result_object(),
			'user' => $_SESSION['user'],
			'personnes' => $this->db->get('personnes')->result_object(),
			'actions' => $this->db->get_where('actions', ['rapport_num' => $_SESSION['rapport']->num])->result_object(),
			'travaux' => $this->db->get_where('travaux', ['rapport_num' => $_SESSION['rapport']->num])->result_object(),
			
		];
		//var_dump($data); die;
		//$this->template('index'); 	
		$this->load->view('desktop', $data);
		//$this->load->view('index');
	}
//------------------------------------------------------------------------		
//------------------------------------------------------------------------		
	public function logout()
	{
		$_SESSION = [];
		unset($_SESSION);
		$this->db->cache_delete_all();
		$this->db->close();
		redirect(site_url());
	}

//------------------------------------------------------------------------		
//------------------------------------------------------------------------		
	public function initRapport()
	{

//------------------------------------------------------------------------
		$user = $_SESSION['user'];
		$_SESSION['user'] = $this->db->from('personnes')->join('fonctions', 'id_fonc = fonction_id', 'left')->where('id_pers', $user->id_pers)->limit(1)->get()->result_object()[0];
		$numero = md5( $user->id_pers.date("Y-m-d"));
		$rapport = $this->db->get_where("rapports",["num"=>$numero], 1)->result_object();
		//var_dump($rapport); die;
		if(!empty($rapport)){
			$_SESSION["rapport"] = $rapport[0];
			//$_SESSION["alert"]["type"] = "info";
			//$_SESSION["alert"]["msg"] = "remplir le rapport svp";
		}else{
			$inserted = $this->db->insert('rapports',["num"=>$numero, 'personne_id'=>$user->id_pers, 'date_rap' => date('Y-m-d')]);
			if ($inserted) {
				$rapport = $this->db->get_where("rapports",["num"=>$numero], 1)->result_object();
				$_SESSION["rapport"] = $rapport[0];
				$_SESSION["alert"]["type"] = "success";
				$_SESSION["alert"]["msg"] = "Rapport crée pensez a le remplir svp";
			
			}
		}
	}

//------------------------------------------------------------------------		
//------------------------------------------------------------------------
	public function watch_posting()
	{

//------------------------------------------------------------------------
		if (isset($_POST['postAction'])) {
			unset($_POST['postAction']);
			//var_dump($_POST); die;
			if (!isset($_POST['action']['nom_act']) || empty($_POST['action']['nom_act'])) {
				$_SESSION['alert']['type'] = 'error';
				$_SESSION['alert']['msg'] = 'le nom de l\'action est obligatoire';
			} else {
				$_POST['action']['date_act'] = date('Y-m-d');
				$_POST['action']['deleted'] = 0;
				$_POST['action']['resolue'] = 0;

				$inserted = $this->db->insert('actions', $_POST['action']);

				if ($inserted) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'une nouvelle action a été enregistrée';
					redirect($_SERVER['HTTP_REFERER'].'#');
				}
			}
		}

//------------------------------------------------------------------------
		if (isset($_POST['postTravail'])) {
			unset($_POST['postTravail']);
			//var_dump($_POST); die;
			if (!isset($_POST['travail']['nom_trav']) || empty($_POST['travail']['nom_trav'])) {
				$_SESSION['alert']['type'] = 'error';
				$_SESSION['alert']['msg'] = 'le nom du travail est obligatoire';
			} else {
				$_POST['travail']['date_trav'] = date('Y-m-d');
				$_POST['travail']['deleted'] = 0;

				$inserted = $this->db->insert('travaux', $_POST['travail']);

				if ($inserted) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'un travail a été enregistrée';
					redirect($_SERVER['HTTP_REFERER'].'#');
				}
			}
		}
//----------------------------- nouveau probleme -------------------------------------------
		if (isset($_POST['postPb'])) {
			unset($_POST['postPb']);
			//var_dump($_POST); die;
			if (!isset($_POST['travail']['nom_trav']) || empty($_POST['travail']['nom_trav'])) {
				$_SESSION['alert']['type'] = 'error';
				$_SESSION['alert']['msg'] = 'le nom du travail est obligatoire';
			} else {
				$_POST['travail']['date_trav'] = date('Y-m-d');
				$_POST['travail']['deleted'] = 0;

				$inserted = $this->db->insert('travaux', $_POST['travail']);

				if ($inserted) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'un travail a été enregistrée';
					redirect($_SERVER['HTTP_REFERER'].'#');
				}
			}
		}
//------------------------------------------------------------------------
		if (isset($_POST['postFonction'])) {
			unset($_POST['postFonction']);

			//$exist = 
			if (!isset($_POST['fonction']['nom_fonc']) || empty($_POST['fonction']['nom_fonc'])) {
				$_SESSION['alert']['type'] = 'error';
				$_SESSION['alert']['msg'] = 'le nom de la fonction est obligatoire';
			} else {
				$inserted = $this->db->insert('fonctions', $_POST['fonction']);

				if ($inserted) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'une nouvelle fonction a été enregistrée';
					redirect($_SERVER['HTTP_REFERER'].'#');
				}
			}
			
		}

//-------------------------------creation user-----------------------------------------		
		if (isset($_POST['postUser'])) {
			unset($_POST['postUser']);

			$exist_tel = $this->db->from('personnes')->where('tel_pers', $_POST['user']['tel_pers'])->get()->num_rows();
			$exist_email = $this->db->from('personnes')->where('email', $_POST['user']['email'])->get()->num_rows();
			if ($exist_tel > 0) {
				$_SESSION['alert']['type'] = 'warning';
				$_SESSION['alert']['msg'] = 'Ce numero de tel est déja pris, essayer un autre,<br> merci!';			
			} elseif ($exist_email > 0) {
				$_SESSION['alert']['type'] = 'warning';
				$_SESSION['alert']['msg'] = 'Cet email est déja pris, essayer un autre,<br> merci!';			
			} else {
				
				//$this->load->model('User_model', 'user');

				$_POST['user']['date_pers'] = date('Y-m-d');
				$_POST['user']['deleted'] = 0;
				$_POST['user']['pass'] = \NEAA\Utils::hash_mdp($_POST['user']['pass']);

				if(isset($_POST['user']['is_admin'])) $_POST['user']['is_admin'] = 1;

			    $inserted = $this->db->insert('personnes',$_POST['user']);
			    //$inserted = $this->user->insert($_POST['user']);

			    if ($inserted) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'une nouvelle personne a été enregistrée';
				}
			}
			//redirect(site_url('user/personnel'));


		}

//-------------------------------modication user-----------------------------------------		
		if (isset($_POST['pathUser'])) {
			unset($_POST['pathUser']);
			
			$user= $this->db->select('tel_pers, email')->from('personnes')->where('id_pers', $_POST['id_pers'])->get()->row();
			$exist_tel = $this->db->from('personnes')->where('tel_pers', $_POST['user']['tel_pers'])->where('tel_pers <> ', $user->tel_pers)->get()->num_rows();
			$exist_email = $this->db->from('personnes')->where('email', $_POST['user']['email'])->where('email <> ', $user->email)->get()->num_rows();
			if ($exist_tel > 0) {
				$_SESSION['alert']['type'] = 'warning';
				$_SESSION['alert']['msg'] = 'Ce numero de tel est déja pris, essayer un autre,<br> merci!';			
			} elseif ($exist_email) {
				$_SESSION['alert']['type'] = 'warning';
				$_SESSION['alert']['msg'] = 'Cet email est déja pris, essayer un autre,<br> merci!';			
			} else {
			//$this->load->model('User_model', 'user');

				$_POST['user']['date_pers'] = date('Y-m-d');
				if(isset($_POST['user']['is_admin'])) $_POST['user']['is_admin'] = 1;
				if (isset($_POST['user']['pass'])) {
					$_POST['user']['pass'] = \NEAA\Utils::hash_mdp($_POST['user']['pass']);
				}

			    $updated = $this->db->update('personnes',$_POST['user'],['id_pers' => $_POST['id_pers']]);

			    if ($updated) {
					$_SESSION['alert']['type'] = 'success';
					$_SESSION['alert']['msg'] = 'Les inforamtions de '.$_POST['user']['nom_pers'].'<br> ont été modifiées avec success';
				}else{
					$_SESSION['alert']['type'] = 'error';
					$_SESSION['alert']['msg'] = 'echec de modication';

				}
			}
			//redirect(site_url('user/personnel'));

		}
//------------------------------------------------------------------------		
		if (isset($_POST['postRapport'])) {
			unset($_POST['postRapport']);
			//var_dump($_POST); die;
			$this->db->update('rapports', $_POST['rapport'] , ['num' => $_POST['rapport']['num']]);
			$this->initRapport();
		}
	} // end index

	public function rapports()
	{

		$_SESSION['rapports'] = $this->db->select('rapports.*, nom_pers, prenom as prenom_pers')->from('rapports')->join('personnes', 'personne_id = id_pers')->get()->result_object();
		
		$data = [
			'user' => $_SESSION['user'],
		];
		$this->load->view('list_rapport', $data);
		
	}

	public function edit_rapport($num='')
	{

		if($num !== ''){


			$this->watch_posting();


			$rapport = $this->db->get_where('rapports', ['num' => $num], 1)->result_object();

			$data = [
				'rapport' => $rapport[0],
				'fonctions' => $this->db->get('fonctions')->result_object(),
				'user' => $_SESSION['user'],
				'personnes' => $this->db->get('personnes')->result_object(),
				'actions' => $this->db->get_where('actions', ['rapport_num' => $num])->result_object(),
				'travaux' => $this->db->get_where('travaux', ['rapport_num' => $num])->result_object(),
				
			];

			$this->load->view('edit_rapport', $data);
		}else{
			redirect(site_url());
		}
	}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------

	public function personnel()
	{

					$this->watch_posting();

					unset($_POST);

		$_SESSION['personnel'] = $this->db->from('personnes')->join('fonctions', 'id_fonc = fonction_id', 'left')->where('is_super_admin', '0')->get()->result_object();

		//$_SESSION['personnel'] = $this->db->from('personnes')->join('fonctions', 'id_fonc = fonction_id', 'left')->where('is_admin', '0')->where('is_super_admin', '0')->get()->result_object();
		//$_SESSION['admins'] = $this->db->from('personnes')->join('fonctions', 'id_fonc = fonction_id', 'left')->where('is_admin', '1')->get()->result_object();
			$data = [
				'fonctions' => $this->db->get('fonctions')->result_object(),
				'user' => $_SESSION['user'],
				'personnes' => $_SESSION['personnel'],
			];

		$this->load->view('list_personnel', $data);
	}

//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------

	public function del_user($id_pers)
	{
		$this->db->delete('personnes' , ['id_pers' => $id_pers]);
		redirect($_SERVER['HTTP_REFERER'].'#');
	}
	public function del_rapport($rapport_num)
	{
		$this->db->delete('rapports' , ['num' => $rapport_num]);
		redirect($_SERVER['HTTP_REFERER'].'#');
	}
	public function del_action($id_act)
	{
		$this->db->delete('actions' , ['id_act' => $id_act]);
		redirect($_SERVER['HTTP_REFERER'].'#');
	}
	public function del_travail($id_trav)
	{
		$this->db->delete('travaux' , ['id_trav' => $id_trav]);
		redirect($_SERVER['HTTP_REFERER'].'#');
	}
	public function del_pb($id_pb)
	{
		$this->db->delete('problemes' , ['id_pb' => $id_pb]);
		redirect($_SERVER['HTTP_REFERER'].'#');
	}
//------------------------------------------------------------------------------------------------------
//------------------------------------------------------------------------------------------------------


	public function print_rapport($num='')
	{
		unset($_SESSION['alert']);

		if($num !== ''){


			$this->watch_posting();


			$rapport = $this->db->get_where('rapports', ['num' => $num], 1)->result_object();
			$superviseur = $this->db->get_where('personnes', ['id_pers' => $rapport[0]->personne_id], 1)->result_object();
			$data = [
				'rapport' => $rapport[0],
				'superviseur' => $superviseur[0],
				//'fonctions' => $this->db->get('fonctions')->result_object(),
				'user' => $_SESSION['user'],
				//'personnes' => $this->db->get('personnes')->result_object(),
				'actions' => $this->db->get_where('actions', ['rapport_num' => $num])->result_object(),
				'travaux' => $this->db->get_where('travaux', ['rapport_num' => $num])->result_object(),
				
			];

			$this->load->view('print_rapport', $data);
		}else{
			redirect(site_url());
		}
	}


	public function get_todo_task_of_one_week_past()
	{
		$date_limit = Carbon::today()->subday(7);

		$_SESSION['unsolvedTask'] = $this->db->get_where('actions', [

				'date_act > ' => $date_limit, 
				'date_act <= ' => Carbon::today(), 
				'resolue <> ' => '1', 

			])->result_object();
	}
}


