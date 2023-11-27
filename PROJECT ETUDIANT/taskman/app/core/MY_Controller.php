<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 26/02/16
 * Time: 21:27
 */
class MY_Controller extends CI_Controller {

    protected $settings;

    public $isAjax;
    public $now;
    public $errorMessageInFrench = array(
        'required' => 'Le champ %s est obligatoire.',
        'min_length' => 'le champ {field} doit contenir au moins {param} carateres.',
        'max_length' => 'le champ {field} doit contenir au plus {param} carateres.',
        'exact_length' => 'le champ {field} doit contenir exactement {param} carateres.',
        'matches' => 'le champ {field} doit correspondre au champ {param}.',
        'differs' => 'le champ {field} doit etre different du champ {param}.',
        'is_unique' => 'le champ {field} est deja ete enregistré avec cette valeur.',
        'valid_email' => " l'%s doit entre doit etre valide.",
        'numeric' => "le champ %s doit avoir seulement des carecteres numerique."
    );

    /**
     * NEAA_Controller constructor.
     */
    public function __construct() {
        parent::__construct();

        //$this->loadConfig();
        $this->now = date('Y-m-d');
        $this->form_validation->set_message($this->errorMessageInFrench);
        $this->form_validation();
    }

    public function isAuthenticated() {
        return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == 1;
    }
    protected function isAjaxRequest() {
        return $this->isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
    protected function load_head($title) {
        if (isset($title)) {
            $this->settings['title'] = trim($title);
        }
        return $this->load->view('partials/head', $this->settings, true);
    }
    
    protected function load_script($scripts, $file = 'scripts', $ob = TRUE) {
        return $this->load->view('partials/' . $file.'.php', $scripts, $ob);
    }

    protected function loadConfig() {
        // chargement des configurations
        $this->load->config('neaa/users', true);
        $this->config->load('neaa/site', true);
        $userConfig = $this->config->item('neaa/users');
        $siteConfig = $this->config->item('neaa/site');
        $this->settings = array_merge($siteConfig , $userConfig);
        
    }

    public function make_mdp_md5($mdp){
        return md5($this->settings['salt_prefixe'].''.$mdp.''.$this->settings['salt_suffixe']);
    }

    protected function layout($file, $data = NULL, $ob = TRUE) {
        return $this->load->view('layouts/' . $file, $data, $ob);
    }
    
    public function make_view($view, $data = NULL, $ob = FALSE , $template = NULL) {
        $layout = array(
            'head' => $this->load_head(isset($data['titre']) && !empty($data['titre']) ? $data['titre'] : NULL),
            'header' => $this->layout(isset($data['header']) && !empty($data['header']) ? $data['header'] : 'header'),
            'content' => $this->layout($view , $data),
            'footer' => $this->layout(isset($data['footer']) && !empty($data['footer']) ? $data['footer'] : 'footer'),
            'scripts' => $this->load_script(isset($data['scripts']) && !empty($data['scripts']) ? $data['scripts'] : NULL),
        );
        $layout = isset($data) && is_array($data) && !empty($data) ? array_merge($layout, $data) : $layout;

        if(is_null($template)){
            $template = $this->settings['default_template'];
        }
        $this->load->view('templates/'.$template.'/index.php', $layout, $ob);
    }

    public function form_validation(){
        $prefix_delimiter = '<div style="padding:2px 4px 2px 20px; margin: 2px" class="alert alert-warning text-left ">'
            .'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            .'<b class="text-danger text-shadow"><span style="vertical-align: baseline" class="mif-warning mif-2x mif-ani-flash"></span>&nbsp;&nbsp;Erreurs survenues :&nbsp;</b>';
        $sufix_delimiter = '</div>';
        $this->form_validation->set_error_delimiters( $prefix_delimiter, $sufix_delimiter );
    }
}
