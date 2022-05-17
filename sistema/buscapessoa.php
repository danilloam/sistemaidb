


<?php
$id = isset($_GET['id']) ? $_GET['id'] : '';
$servername = "50.62.137.49";
$username = "sistemaidb";
$password = "@K3f7b9h1T7a3k9w2y";
$dbname = "sistemaidb";

$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

/* check connection */
if (mysqli_connect_errno()) {
  printf("Connect failed: %s\n", mysqli_connect_error());
  exit();
}

// initilize all variable
$params = $columns = $totalRecords = $data = array();
$params = $_REQUEST;
//define index of column name
$columns = array(
    0 =>'nome',
    1 =>'idade',
    2 =>'telefone',
);

$where = $sqlTot = $sqlRec = "";

// check search value exist
if( !empty($params['search']['value']) ) {
    $where .=" WHERE igreja_id=".$id." and ";
    $where .=" ( id LIKE '".$params['search']['value']."%' ";
    $where .=" OR name LIKE '".$params['search']['value']."%' ";
    $where .=" OR salery LIKE '".$params['search']['value']."%' )";
}

// getting total number records without any search
$sql = "SELECT id, CONCAT( nome, ' ', sobrenome ) AS nome, FLOOR(DATEDIFF(NOW(), data_nascimento) / 365) AS idade, celular1  ";
$sqlTot .= $sql;
$sqlRec .= $sql;

//concatenate search sql if value exist
if(isset($where) && $where != '') {
    $sqlTot .= $where;
    $sqlRec .= $where;
}

 $sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."   ".$params['order'][0]['dir']."  LIMIT ".$params['start']." ,".$params['length']." ";

$queryTot = mysqli_query($conn, $sqlTot) or die("database error:". mysqli_error($conn));

$totalRecords = mysqli_num_rows($queryTot);

$queryRecords = mysqli_query($conn, $sqlRec) or die("error to fetch employees data");

while( $row = mysqli_fetch_row($queryRecords) ) {
    $data[] = $row;
}

$json_data = array(
        "draw"            => intval( $params['draw'] ),
        "recordsTotal"    => intval( $totalRecords ),
        "recordsFiltered" => intval($totalRecords),
        "data"            => $data   // total data array
        );

echo json_encode($json_data);  // send data as json format
?>