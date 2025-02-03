<?php
require_once 'universities/university.php';

header('Content-Type: application/json');

$region = isset($_GET['region']) ? $_GET['region'] : '';

if (empty($region)) {
    echo json_encode(['error' => 'Region parameter is required']);
    exit;
}

// Get universities for the specified region
$universities = [];
foreach ($ethiopian_universities as $id => $uni) {
    if (strcasecmp($uni['region'], $region) === 0) {
        $universities[] = array_merge(
            $uni,
            ['id' => $id] // Add the array key as id for the university
        );
    }
}

// Add debug information
$response = [
    'success' => true,
    'universities' => $universities,
    'debug' => [
        'region_requested' => $region,
        'universities_found' => count($universities)
    ]
];

echo json_encode($response);
?> 