<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: aurelio
 * Date: 26/02/16
 * Time: 21:27
 */
class NEAA_Controller extends CI_Controller {

    protected $settings;

    protected $isAjax;
    private $now;
    public $errorMessageInFrench = array(
        'required' => 'Le champ %s est obligatoire.',
        'min_length' => 'le champ {field} doit contenir au moins {param} carateres.',
        'max_length' => 'le champ {field} doit contenir au plus {param} carateres.',
        'exact_length' => 'le champ {field} doit contenir exactement {param} carateres.',
        'matches' => 'le champ {field} doit correspondre au champ {param}.',
        'matches' => 'le champ {field} doit etre different du champ {param}.',
        'is_unique' => 'le champ {field} est deja ete enregistré avec cette valeur.',
        'valid_email' => " l'%s entré doit etre valide.",
        'numeric' => "le champ %s doit avoir seulement des carecteres numerique."
    );

    /**
     * NEAA_Controller constructor.
     */
    public function __construct() {
        parent::__construct();

        $this->loadConfig();
        $this->load->library('form_validation');
        $this->form_validation->set_message($this->errorMessageInFrench);
        $this->form_validation();
    }


    protected function isAjaxRequest() {
        return $this->isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
    }
    public function now() {
        return $this->now = date('Y-m-d');
    }
    
    protected function loadConfig() {
        // chargement des configurations
        $this->load->config('neaa/users', true);
        $this->config->load('neaa/site', true);
        $userConfig = $this->config->item('neaa/users');
        $siteConfig = $this->config->item('neaa/site');
        $this->settings = array_merge($siteConfig , $userConfig);
        
    }

    public function input_post($data = null, $f = TRUE){
        return $this->input->post($data, $f);
    }


    public function input_get($data = null, $f = TRUE){
        return $this->input->get($data, $f);
    }

    public function make_mdp_md5($mdp){
        return md5($this->settings['salt_prefixe'].''.trim($mdp).''.$this->settings['salt_suffixe']);
    }

    protected function layout($file, $data = null, $ob = true) {
        return $this->load->view('layouts/'. $file, $data, $ob);
    }
    
    protected function load_head($title, $file = null) {
        if (isset($title)) {
            $this->settings['title'] = trim(isset($title) && !empty($title) ? $title : 'no name');
        }
        $head = isset($file) && ($file != '') ? $file : 'head';
        return $this->load->view('partials/'.$head, $this->settings, true);
    }
    
    protected function load_script($scripts, $file = 'scripts', $ob = TRUE) {
        return $this->load->view('partials/'.$file, $scripts, $ob);
    }
    public function make_view($view, $data = NULL, $ob = FALSE , $template = NULL) {

        $title = isset($data['title']) && ($data['title'] != '') ? $data['title'] : null;
        $header = isset($data['header']) && ($data['header'] != '') ? $data['header'] : 'header';
        $footer = isset($data['footer']) && ($data['footer'] != '') ? $data['footer'] : 'footer';
        $scripts = isset($data['scripts']) && ($data['scripts'] != '') ? $data['scripts'] : null;

        //die($this->layout($header , $data));
        $layout = array(
            'head' => $this->load_head($title),
            'banner' => $this->layout($header , $data),
            'content' => $this->layout($view , $data),
            'footer' => $this->layout($footer, $data),
            'scripts' => $this->load_script($scripts),
        );
        $layout = isset($data) && !empty($data) ? array_merge($layout, $data) : $layout; 

        //var_dump($layout); die('end');
        if(is_null($template)){
            $template = $this->settings['default_template'];
        }
        $this->load->view('templates/'.$template.'/index.php', $layout, $ob);
    }

    public function parse_view($view, $data = NULL, $ob = FALSE , $template = NULL) {

        $this->load->library('parser');

        $layout = array(
            'head' => $this->load_head(isset($data['title']) && !empty($data['title']) ? $data['title'] : NULL),
            'header' => $this->layout(isset($data['header']) && !empty($data['header']) ? $data['title'] : 'header'),
            'content' => $this->layout($view , $data),
            'footer' => $this->layout(isset($data['footer']) && !empty($data['footer']) ? $data['footer'] : 'footer'),
            'scripts' => $this->load_script(isset($data['scripts']) && !empty($data['scripts']) ? $data['scripts'] : NULL),
        );
        $layout = isset($data) && is_array($data) && !empty($data) ? array_merge($layout, $data) : $layout;

        //var_dump($data); die('end');
        if(is_null($template)){
            $template = $this->settings['default_template'];
        }
        //$this->load->view('templates/'.$template.'/index.php', $layout, $ob);
        $this->parser->parse('templates/'.$template.'/index.php', $layout, $ob);
    }

    public function form_validation(){
        $prefix_delimiter = '<div style="padding:2px 4px 2px 20px; margin: 2px" class="alert alert-warning text-left ">'
            .'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
            .'<b class="text-danger text-shadow"><span style="vertical-align: baseline" class="mif-warning mif-2x mif-ani-flash"></span>&nbsp;&nbsp;Erreurs survenues :&nbsp;</b>';
        $sufix_delimiter = '</div>';
        $this->form_validation->set_error_delimiters( $prefix_delimiter, $sufix_delimiter );
    }

    public function do_upload($fieldName)
    {
        $config['file_name']          = sha1(date('Y-m-d H:i:s:u'));
        $config['upload_path']          = 'uploads';
        $config['allowed_types']        = 'gif|jpg|png|jpge';
        $config['max_size']             = 2048;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload($fieldName))
        {
            $error = array('error' => $this->upload->display_errors());
            //var_dump($error); die('error');
            $_SESSION['error']['upload'] = array('error' => $this->upload->display_errors('<span class="has-error">', '</span>'));

            return false;
        }
        else
        {
            $img_detail = array('upload_data' => $this->upload->data());
            //var_dump($img_detail); die('detail');
            return $img_detail;
        }
    }

}
