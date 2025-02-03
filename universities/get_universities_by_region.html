<?php
require_once('university.php');
header('Content-Type: application/json');

if (isset($_GET['region'])) {
    $region = $_GET['region'];
    $universities = getUniversitiesByRegion($region);
    
    // Format universities for display
    $formatted_universities = array_map(function($uni) {
        return [
            'name' => $uni['name'],
            'location' => $uni['location'],
            'image' => '../' . $uni['image'],
            'description' => $uni['description'],
            'students' => $uni['students'],
            'id' => array_search($uni, $GLOBALS['ethiopian_universities'])
        ];
    }, $universities);
    
    echo json_encode([
        'success' => true,
        'universities' => $formatted_universities
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Region parameter is required'
    ]);
}
?> 