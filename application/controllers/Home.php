<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');
class Home extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $query = $this->db->query("select  max(ticket) as hasil  from daftar_kendaraan where day= '" . date('y-m-d') . "' ");
        $p = $query->row();


        $ticket = $p->hasil;
        if ($query->num_rows() > 0) {
            $nkode =  substr($ticket, 1);
            $kode = (int) $nkode;
            $kode = $kode + 1;

            $result = "P" . str_pad($kode, 4, "0", STR_PAD_LEFT);
            $data['ticket'] = date('Ymd') . $result;
            $data['no_ticket'] = $result;
        } else {
            $data['ticket'] = date('Ymd') . "P0001";
            $data['no_ticket'] = "P0001";
        }
        $data['mobil']  = $this->db->get_where("daftar_kendaraan", ["jenis" => 'Mobil'])->num_rows();
        $data['motor']  = $this->db->get_where("daftar_kendaraan", ["jenis" => 'Motor'])->num_rows();
        $data['kendaraan'] = $this->db->get("daftar_kendaraan")->result();
        $this->template->load("template", "home", $data);
    }


    public function input()
    {
        $notikect  = $this->input->post('no_ticket');
        $tikect    = $this->input->post('ticket');
        $nopolisi  = $this->input->post('no_polisi');
        $jenis     = $this->input->post('jenis');
        $tarif     = $this->input->post('tarif');

        $this->form_validation->set_rules('no_polisi', 'no_polisi', 'required', [
            'required' => 'no polisi kosong'
        ]);
        $this->form_validation->set_rules('tarif', 'tarif', 'required', [
            'required' => 'biaya parkir kosong'
        ]);

        if ($this->form_validation->run() == False) {
            $this->index();
        } else {
            $data = array(
                'ticket'         => $notikect,
                'no_ticket'      => $tikect,
                'jenis'          => $jenis,
                'no_polisi'      => $nopolisi,
                'jam_masuk'      => date('H:i:s'),
                'jam_keluar'     => null,
                'tanggal_masuk'  => date('y-m-d'),
                'tanggal_keluar' => null,
                'status'         => 'parkir',
                'day'            => date('y-m-d'),
                'bayar'          => $tarif

            );

            $save      = $this->db->insert("daftar_kendaraan", $data);
            if ($save) {
                $this->session->set_flashdata('ok', 'data kendaraan tersimpan');
                redirect('Home');
            }
        }
    }

    public function keluar($tikect)
    {
        $backup = $this->db->get_where("daftar_kendaraan", ['no_ticket' => $tikect])->row();
        $masuk   = strtotime($backup->tanggal_masuk . " " . $backup->jam_masuk);
        $keluar  = strtotime(date('y-m-d H:i:s'));
        $diff   = $keluar  - $masuk;
        $jam   = floor($diff / (60 * 60));

        if ($jam <= 1) {
            $bayar =  $backup->bayar;
        } else {
            $bayar =  $jam * (int) $backup->bayar;
        }

        $data   = [
            'no_ticket'      => $backup->no_ticket,
            'jenis'          => $backup->jenis,
            'no_polisi'      => $backup->no_polisi,
            'jam_masuk'      => $backup->jam_masuk,
            'jam_keluar'     => date('H:i:s'),
            'tanggal_masuk'  => $backup->tanggal_masuk,
            'tanggal_keluar' => date('y-m-d'),
            'status'         => 'keluar',
            'ticket'         => $backup->ticket,
            'day'            => $backup->day,
            'bayar'          => $bayar
        ];
        $this->db->insert("histori", $data);
        if ($this->db->affected_rows()) {
            $this->db->delete("daftar_kendaraan", ['no_ticket' => $tikect]);
            $this->session->set_flashdata('pulang', 'Kendaraan selesai parkir');
            redirect("Home");
        }
    }
}
