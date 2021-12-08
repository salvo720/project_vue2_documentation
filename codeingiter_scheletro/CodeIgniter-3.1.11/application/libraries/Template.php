<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
	
    private $data;
    private $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function show( $page, $data=null, $menu=false , $tpl='template/template.php' )
    {

        // $tpl='template/template.php';
             
        $header = 'template/header.php';
        $navbar = 'template/navbar.php ' ;
        $footer = 'template/footer.php ' ;
        $alert_flashdata = 'template/flashdata_alert.php ' ;

        if ( ! file_exists('application/views/'.$page.'.php' ) )
        {
            show_404();
        }
        else
        {
            $this->data['page_var'] = $data;

            // if ($menu)
            //     $this->data['content'] = $this->CI->load->view('template/menu.php', $this->data, true);
            // else
            //     $this->data['content'] = '';

            // $this->data['content'] .= $this->CI->load->view($page, $this->data, true);
            $this->CI->load->view($header, $this->data);
            $this->CI->load->view($navbar, $this->data);
            $this->CI->load->view($alert_flashdata);
            $this->CI->load->view($page, $this->data);
            $this->CI->load->view($footer, $this->data);
        }
    }

}