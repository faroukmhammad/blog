<?php
$query=$this->db->query('select * from setups where id=
'.$id.'

');
echo "<select name='country'  style='color:black' >";
foreach ($query->result() as $row)
{
    echo " <option value=".$row->name_en.">".$row->name_en."</option>";
}
 ?>
 </select>
