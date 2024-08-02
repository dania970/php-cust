<?php
require '../connection_db 2.php';
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: GET');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id = isset($_GET['id']) ? intval( $_GET['id']) : "";
    $sql = "SELECT ss.student_id,students.name ,ss.subject_id , subjects.name , exams.exam_date from ss
INNER JOIN students ON ss.student_id = students.id
INNER JOIN subjects ON subjects.subject_id = ss.subject_id
INNER JOIN exams ON ss.subject_id = exams.subject_id
where ss.student_id ='$id'";
    $stmt =$conn-> query($sql);
    $result = $stmt ->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result,true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>