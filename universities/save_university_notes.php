<?php
require_once 'db_connection.php'; // Create this file with your database connection

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Validate the data
if (!isset($data['university_id']) || !isset($data['full_name']) || 
    !isset($data['email']) || !isset($data['notes'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

try {
    // Prepare the SQL statement
    $stmt = $pdo->prepare("
        INSERT INTO university_notes (university_id, full_name, email, notes, created_at)
        VALUES (:university_id, :full_name, :email, :notes, NOW())
    ");

    // Execute the statement with the data
    $stmt->execute([
        'university_id' => $data['university_id'],
        'full_name' => $data['full_name'],
        'email' => $data['email'],
        'notes' => $data['notes']
    ]);

    // Send success response
    http_response_code(200);
    echo json_encode(['message' => 'Notes saved successfully']);

} catch (PDOException $e) {
    // Handle database errors
    http_response_code(500);
    echo json_encode(['error' => 'Database error']);
}
?> 