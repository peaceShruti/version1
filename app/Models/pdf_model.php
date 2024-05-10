<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Method to handle PDF upload
    public function upload_pdf($pdf_file) {
        // File upload configuration
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'pdf';
        $config['max_size'] = 10240; // 10MB max size, you can adjust this

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('pdf_file')) {
            // Handle upload failure
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            // File uploaded successfully, now get the file info
            $upload_data = $this->upload->data();
            $pdf_url = base_url('uploads/' . $upload_data['file_name']);
            return $pdf_url;
        }
    }
}
?>
