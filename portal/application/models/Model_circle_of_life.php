<?php

class Model_Circle_Of_Life extends CI_Model
{
    private $db;

    public function __construct(){
        parent::__construct();
        $this->load->library('routerhelper');
        $choiceRoute = $this->routerhelper->whichsubroute();
        $db_group = $choiceRoute[0];
        $this->db = $this->load->database($db_group, TRUE);
    }

    /**
     * @param bool $isToGetOnlyActive
     * @return array
     */
    public function fetchAll($isToGetOnlyActive=true)
    {
        if ($isToGetOnlyActive) {
            $this->db->where('active', 1);
        }
        return $this->db->get('circle_of_life')->result();
    }
}
