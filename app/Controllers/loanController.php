<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class loanController extends Controller
{
    public function index()
    {
        $db = \Config\Database::connect();
        $query = $db->query('SELECT * FROM constitution');
        
        // Get the results as objects
        $results = $query->getResult();

        // Or get the results as associative arrays
        // $results = $query->getResultArray();

        // Iterate over the results using foreach
       
    }
}
<!-- <? echo form_open('get');?> -->
<?php echo form_submit(['name'=>'submit', 'value' =>'Generate Result'] );?>
<? echo form_close();?>