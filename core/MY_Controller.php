<?php if (!defined('BASEPATH')) exit('No Direct Script Access Allowed');

class MY_Controller extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
    }
    function get_enum($table = '', $field = '')
    {
        $enums = array();
        if ($table == '' || $field == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$table} LIKE '{$field}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$value] = $value; 
        }
        return $enums;
    }
}
