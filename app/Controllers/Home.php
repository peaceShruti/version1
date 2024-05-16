<?php

namespace App\Controllers;

use App\Models\pdf_model;
use App\Models\loanModel;
use CodeIgniter\HTTP\Request;
use Config\Session;


class Home extends BaseController
{
    protected $session, $validation, $database;
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->validation = \Config\Services::validation();
        $this->database = \Config\Services::database();
    }

    public function index(): string
    {
        return view('index');
        // return view('emi-calculator');
        // $this->load->view('emi-calculator');
    }

    public function About()
    {
        return view('about');
    }

    public function Enquire()
    {
        return view('enquire');
    }

    public function Contact()
    {
        return view('contact');
    }

    public function emiCalculator()
    {
        return view('emi-calculator');
    }

    public function documentsChecklist()
    {
        $request = \Config\Services::request();
        $loanModel = new loanModel();
        // $constitution = $loanModel->getIdValue('condition2');
        $data = $request->getPost('title');

        return view('documents-checklist');
    }
    public function getValues()
    {
        return view('get');
    }
    public function eligibilityCalculator()
    {
        return view('eligibility-calculator');
    }

    public function bankProducts()
    {
        return view('bank-products');
    }

    public function Invoice()
    {
        return view('invoice');
    }

    public function insertInvoice()
    {

        $this->validation->setRules([
            'owner_name' => 'required',
            'email' => 'required|valid_email',
            'mobile_no' => 'required|numeric|min_length[10]|max_length[10]',
            'logo' => 'uploaded[logo]|max_size[logo,1024]|mime_in[logo,image/jpeg,image/png,image/gif]',
            'bill_date' => 'required',
            'bill_no' => 'required',
            'bank_name' => 'required',
            'contact_person' => 'required',
            'contact_email' => 'required|valid_email',
            'case_name' => 'required',
            'loan_amount' => 'required',
            'comm_amount' => 'required',
            'gst' => 'required',
            'gross_total' => 'required',
            'partner_gst' => 'required',
            'partner_pan' => 'required',
            'signature' => 'uploaded[signature]|max_size[signature,1024]|mime_in[signature,image/jpeg,image/png,image/gif]',
            'partner_bank' => 'required',
        ]);

        $logo = $this->request->getFile('logo');
        $signature = $this->request->getFile('signature');

        $data = [
            'owner_name' => $this->request->getPost('owner_name'),
            'email' => $this->request->getPost('email'),
            'mobile_no' => $this->request->getPost('mobile_no'),
            'logo' => $this->request->getFile('logo'),
            'bill_date' => $this->request->getPost('bill_date'),
            'bill_no' => $this->request->getPost('bill_no'),
            'bank_name' => $this->request->getPost('bank_name'),
            'contact_person' => $this->request->getPost('contact_person'),
            'contact_email' => $this->request->getPost('contact_email'),
            'case_name' => $this->request->getPost('case_name'),
            'loan_amount' => $this->request->getPost('loan_amount'),
            'comm_amount' => $this->request->getPost('comm_amount'),
            'subvention' => $this->request->getPost('subvention'),
            'gst' => $this->request->getPost('gst'),
            'gross_total' => $this->request->getPost('gross_total'),
            'partner_gst' => $this->request->getPost('partner_gst'),
            'partner_pan' => $this->request->getPost('partner_pan'),
            'signature' => $this->request->getFile('signature'),
            'partner_bank' => $this->request->getPost('partner_bank'),
        ];

        if ($this->validation->run($data)) {

            if ($logo->isValid() && !$logo->hasMoved()) {
                $logo_name = $logo->getRandomName();
                $logo->move('public/uploads', $logo_name);
            };
            if ($signature->isValid() && !$signature->hasMoved()) {
                $sig_name = $signature->getRandomName();
                $signature->move('public/uploads', $sig_name);
            };

            $data1 = [
                'owner_name' => $this->request->getPost('owner_name'),
                'email' => $this->request->getPost('email'),
                'mobile_no' => $this->request->getPost('mobile_no'),
                'logo' => $logo_name,
                'bill_date' => $this->request->getPost('bill_date'),
                'bill_no' => $this->request->getPost('bill_no'),
                'bank_name' => $this->request->getPost('bank_name'),
                'contact_person' => $this->request->getPost('contact_person'),
                'contact_email' => $this->request->getPost('contact_email'),
                'case_name' => $this->request->getPost('case_name'),
                'loan_amount' => $this->request->getPost('loan_amount'),
                'comm_amount' => $this->request->getPost('comm_amount'),
                'subvention' => $this->request->getPost('subvention'),
                'gst' => $this->request->getPost('gst'),
                'gross_total' => $this->request->getPost('gross_total'),
                'partner_gst' => $this->request->getPost('partner_gst'),
                'partner_pan' => $this->request->getPost('partner_pan'),
                'signature' => $sig_name,
                'partner_bank' => $this->request->getPost('partner_bank'),
            ];

            // echo '<pre>'; print_r($data); exit;
            $this->session->set('invoice_data', $data1);
            return redirect()->to('/invoice_view');
        } else {
            return view('invoice', ['validation' => $this->validation]);
        }
    }

    public function invoiceView()
    {
        $data['data'] = $this->session->get('invoice_data');
        // echo '<pre>'; print_r($data); exit;
        return view('view-invoice', $data);
    }
    public function eligibility()
    {
        return view('eligibility');
    }
    // Method to handle PDF upload and WhatsApp sharing
    // public function upload_pdf()
    // {
    //     // Handle form submission
    //     if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //         // Upload the PDF file
    //         $pdf_model = new pdf_model();
    //         $pdf_url = $pdf_model->upload_pdf($_FILES['pdf_file']);

    //         if (is_array($pdf_url) && isset($pdf_url['error'])) {
    //             // Handle upload error
    //             echo $pdf_url['error'];
    //         } else {
    //             // Construct the WhatsApp message
    //             $whatsapp_message = "Hey! Check out this PDF: $pdf_url";
    //             // For simplicity, you can just echo the message
    //             echo $whatsapp_message;
    //             // You can also redirect to a success page or do something else
    //         }
    //     }
    // }
}
