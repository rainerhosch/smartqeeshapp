<?php defined('BASEPATH') or exit('No direct script access allowed');

class MY_Profiler extends CI_Profiler {

    public function _compile_session() {    

        $output  = "\n\n";
        $output .= '<fieldset style="border:1px solid #009999;padding:6px 10px 10px 10px;margin:20px 0 20px 0;background-color:#eee">';
        $output .= "\n";
        $output .= '<legend style="color:#009999;">&nbsp;&nbsp;'.'SESSION DATA'.'&nbsp;&nbsp;</legend>';
        $output .= "\n";

        if (!is_object($this->CI->session))
        {
            $output .= "<div style='color:#009999;font-weight:normal;padding:4px 0 4px 0'>".'No SESSION data exists'."</div>";
        }
        else
        {
            $output .= "\n\n<table cellpadding='4' cellspacing='1' border='0' width='100%'>\n";

            $sess = get_object_vars($this->CI->session);

            foreach ($sess['userdata'] as $key => $val)
            {
                if ( ! is_numeric($key))
                {
                    $key = "'".$key."'";
                }

                $output .= "<tr><td width='50%' style='color:#000;background-color:#ddd;'>".$_SESSION[$key]."&nbsp;&nbsp; </td><td width='50%' style='color:#009999;font-weight:normal;background-color:#ddd;'>";

                if (is_array($val))
                {
                    $output .= "<pre>" . htmlspecialchars(stripslashes(print_r($val, true))) . "</pre>";
                }
                else
                {
                    $output .= htmlspecialchars(stripslashes($val));
                }

                $output .= "</td></tr>\n";
            }

            $output .= "</table>\n";
        }

        $output .= "</fieldset>";

        return $output;    
    }

    public function run()
    {
        $output = "<div id='codeigniter_profiler' style='clear:both;background-color:#fff;padding:10px;'>";
        $output .= $this->_compile_uri_string();
        $output .= $this->_compile_controller_info();
        $output .= $this->_compile_memory_usage();
        $output .= $this->_compile_benchmarks();
        $output .= $this->_compile_get();
        $output .= $this->_compile_post();
        $output .= $this->_compile_queries();
        $output .= $this->_compile_session();
        $output .= '</div>';

        return $output;
    }
}