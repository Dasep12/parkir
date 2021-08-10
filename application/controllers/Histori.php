<?php


class Histori extends CI_Controller
{

    public function index()
    {
        $data['histori']   = $this->db->get("histori")->result();
        $this->template->load('template', 'histori', $data);
    }
}
