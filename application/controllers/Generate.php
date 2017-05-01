<?php
class Generate extends CI_Controller {
var $file_path;
public function __construct() {
    parent::__construct();
    $this->file_path = realpath(APPPATH . '../assets/csv');
}
function index() {
    $this->load->model('csv_m');
    $this->load->dbutil();
    $this->load->helper('file');
    //get the object
    $report = $this->csv_m->getCSV();

    $delimiter = ",";
    $newline = "\r\n";
    $new_report = $this->dbutil->csv_from_result($report, $delimiter, $newline);
    // write file
    write_file($this->file_path . '/csv_file.csv', $new_report);
    //force download from server
    $this->load->helper('download');
    $data = file_get_contents($this->file_path . '/csv_file.csv');
    echo $data;die;
    $name = 'name-'.date('d-m-Y').'.csv';
    force_download($name, $data);
}
}

?>
