<?php
namespace App\Controllers;
use \CodeIgniter\View\Table;

class Data extends BaseController {
    public function index() {
        $table = new Table();
        //To pass the data array.
        $data = [
            ['Name', 'City', 'State'],
            ['Rahul', 'Hyderabad', 'TS'],
            ['Anmol', 'Mandi', 'HP'],
            ['Girija', 'Dharampur', 'HP'],
            ['Vishnu', 'Kochi', 'Kerela'],
            ['Ashish', 'Ambala', 'Haryana'],
            ['Divya', 'Dharamshala', 'HP'],
        ];

        //Or we can seperately pass like this.
        // $table->setHeading(['Name', 'City', 'State']);
        // $table->addRow(['Anmol', 'Mandi', 'Himachal Pradesh']);
        $template = [
            'table_open' => '<table border="4" cellpadding="10" cellspacing="10" class="table">',
        
            'thead_open'  => '<thead>',
            'thead_close' => '</thead>',
        
            'heading_row_start'  => '<tr>',
            'heading_row_end'    => '</tr>',
            'heading_cell_start' => '<th>',
            'heading_cell_end'   => '</th>',
        
            'tfoot_open'  => '<tfoot>',
            'tfoot_close' => '</tfoot>',
        
            'footing_row_start'  => '<tr>',
            'footing_row_end'    => '</tr>',
            'footing_cell_start' => '<td>',
            'footing_cell_end'   => '</td>',
        
            'tbody_open'  => '<tbody>',
            'tbody_close' => '</tbody>',
        
            'row_start'  => '<tr>',
            'row_end'    => '</tr>',
            'cell_start' => '<td>',
            'cell_end'   => '</td>',
        
            'row_alt_start'  => '<tr>',
            'row_alt_end'    => '</tr>',
            'cell_alt_start' => '<td>',
            'cell_alt_end'   => '</td>',
        
            'table_close' => '</table>',
        ];
        
        $table->setTemplate($template);
        //$data = $db->query("select * from users");
        // $records['users'] = $table->generate();
        //If we will use $data array then pass $data
        $records['users'] = $table->generate($data);
        echo view("dataview", $records);
    }
}