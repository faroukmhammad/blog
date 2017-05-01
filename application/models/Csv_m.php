<?php
class Csv_m extends CI_Model {
function getCSV() {
    $sql = "SELECT * FROM users";
    return $this->db->query($sql);



}
}
?>
