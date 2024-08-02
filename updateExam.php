<?php 
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Method: PUT');
header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With');
require '../connection_db 2.php';
if ($_SERVER['REQUEST_METHOD'] == "PUT"){
    $input = file_get_contents('php://input');
    $result = json_decode($input,true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        echo json_encode(['error' => 'Invalid JSON: ' . json_last_error_msg()]);
        exit;
    }
    $id = isset($result['id']) ? $result['id'] : "";
    $subjectId = isset($result['subjectId']) ? $result['subjectId'] : "";
    $examDate = isset($result['examDate']) ? $result['examDate'] : "";
    $maxScore = isset($result['maxScore']) ? $result['maxScore'] : "";


    $sql = "UPDATE exams SET subject_id = '$subjectId' , exam_date ='$examDate' , max_score = '$maxScore' 
    WHERE exam_id = '$id'";
    $res = $conn -> exec($sql);
    $data = [
        'subjectId'=> $subjectId,
        'examDate' => $examDate,
        'maxScore' => $maxScore,
        'message' => ' data updated successfully'
    ];

    echo json_encode($data , true);
}else{
    $data = [
        'error' => 'Method Not Allowed',
        'status' => false
    ];
    echo json_encode($data , true);
}
?>