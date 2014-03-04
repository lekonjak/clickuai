<?php

// DB TABLE Exporter
//
// How to use:
//
// Place this file in a safe place, edit the info just below here
// browse to the file, enjoy!

// CHANGE THIS STUFF FOR WHAT YOU NEED TO DO
// END CHANGING STUFF


// first thing that we are going to do is make some functions for writing out
// and excel file. These functions do some hex writing and to be honest I got 
// them from some where else but hey it works so I am not going to question it 
// just reuse
/*if(include('class.mysqli.php')){
}else{
    echo '<script type="text/javascript">alert("Erro ao tentar carregar classe")</script>';
}*/
include 'class.mysqli.php';

$mysqli = new MysqliDatabase('',true);

$rdata = $_POST['rdata'];
$gid   = $_POST['gid'];

// This one makes the beginning of the xls file
function xlsBOF() {
    echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
    return;
}

// This one makes the end of the xls file
function xlsEOF() {
    echo pack("ss", 0x0A, 0x00);
    return;
}

// this will write text in the cell you specify
function xlsWriteLabel($Row, $Col, $Value ) {
    $L = strlen($Value);
    echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
    echo $Value;
    return;
}

function getUserDataByFields($fields, $gid=null){
        $query = "select ";
        $table = " us_m.uid as us_m_uid from `users_more` us_m ";
        foreach($fields as $field){
            switch($field){
                case 'type':
                    $query .= 'acc.'.$field.' as acc_'.$field.', ';
                    $table .= "left join ".$sys_prefix."acctype acc on(us_m.acctype_id = acc.id) ";
                    break;
                case 'group_id':
                    $query .= 'gp.title as gp_group, ';
                    $table .= "left join `".$sys_prefix."group` as gp on(us_m.group_id = gp.id) ";
                    break;
                case 'master_id':
                    $query .= 'ms.title as ms_master_title, ';
                    $table .= "LEFT JOIN ".$sys_prefix."master ms on(gp.master_id = ms.id) ";
                    break;
                case 'slave_id':
                    $query .= 'sl.title as sl_slave_title, ';
                    $table .= "LEFT JOIN ".$sys_prefix."slave sl on(gp.slave_id = sl.id) ";
                    break;
                case 'address':
                case 'number' :
                case 'neighborhood':
                case 'cep':
                case 'complement':
                    $query .= 'adr.'.$field.' as adr_'.$field.', ';
                    if($address!=1){
                        $table .= "left join ".$sys_prefix."address adr on(us_m.address_id = adr.id) ";
                        $address = 1;
                    }
                    break;
                case 'city':
                    $query .= 'ct.name as ct_'.$field.', ';
                    if($address==1){
                        $table .= "LEFT JOIN ".$sys_prefix."city ct ON ( adr.city_id = ct.city_id ) ";
                    }else{
                        $address = 1;
                        $table .= "left join ".$sys_prefix."address adr on(us_m.address_id = adr.id) LEFT JOIN ".$sys_prefix."city ct on( adr.city_id = ct.city_id ) ";
                    }
                    break;
                case 'state':
                    $query .= 'stt.zone_name as stt_'.$field.', ';
                    if($address==1){
                        $table .= "LEFT JOIN ".$sys_prefix."states stt on(adr.state_id = stt.zone_id) ";
                    }else{
                        $address = 1;
                        $table .= "left join ".$sys_prefix."address adr on(us_m.address_id = adr.id) LEFT JOIN ".$sys_prefix."states stt on(adr.state_id = stt.zone_id) ";
                    }
                    break;
                case 'country':
                case 'countries_name':
                    $query .= 'ctt.countries_name as ctt_'.$field.', ';
                    if($address==1){
                        $table .= "LEFT JOIN ".$sys_prefix."countries ctt on(adr.country_id = ctt.countries_id) ";
                    }else{
                        $address = 1;
                         $table .= "LEFT JOIN ".$sys_prefix."address adr on(us_m.address_id = adr.id) LEFT JOIN ".$sys_prefix."countries ctt on(adr.country_id = ctt.countries_id) ";
                    }
                default:
                    if($field!='country'){
                        $query .= 'us_m.'.$field.' as us_m_'.$field.', ';
                        if($field=='firstname'){
                            $filter = " order by us_m.firstname asc";
                        }
                    }
            }
        }
        
        $query .= $table;
        if($gid){
            $query .= " where us_m.group_id = '".$gid."'";
        }
        $query .= $filter;
        return $query;
}

// make the connection an DB query
$q = getUserDataByFields($rdata,$gid);
$q_exec = $mysqli->query($q);
// Ok now we are going to send some headers so that this 
// thing that we are going make comes out of browser
// as an xls file.
//
header("Pragma: public");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Content-Type: application/force-download");
header("Content-Type: application/octet-stream");
header("Content-Type: application/download");

//this line is important its makes the file name
header("Content-Disposition: attachment;filename=export_nano.xls ");

header("Content-Transfer-Encoding: binary ");

// start the file
xlsBOF();

// these will be used for keeping things in order.
$col = 0;
$row = 0;

// This tells us that we are on the first row
$first = true;
while( $qrow = $q_exec->fetch_assoc())
{
    // Ok we are on the first row
    // lets make some headers of sorts
    if( $first )
    {
        foreach( $qrow as $k => $v )
        {
            // take the key and make label
            // make it uppper case and replace _ with ' '
            xlsWriteLabel( $row, $col, strtoupper( ereg_replace( "_" , " " , $k ) ) );
            $col++;
        }

        // prepare for the first real data row
        $col = 0;
        $row++;
        $first = false;
    }

    // go through the data
    foreach( $qrow as $k => $v )
    {
        // write it out
        xlsWriteLabel( $row, $col, $v );
        $col++;
    }
    // reset col and goto next row
    $col = 0;
    $row++;
}

xlsEOF();
exit();
?>
