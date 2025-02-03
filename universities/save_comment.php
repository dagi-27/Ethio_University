<?php
require_once '../includes/db_connection.php';

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Validate the data
if (!isset($data['university_id']) || !isset($data['full_name']) || 
    !isset($data['email']) || !isset($data['comment_text'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

try {
    // Prepare the SQL statement
    $stmt = $pdo->prepare("
        INSERT INTO university_comments (university_id, full_name, email, comment_text)
        VALUES (:university_id, :full_name, :email, :comment_text)
    ");

    // Execute the statement with the data
    $stmt->execute([
        'university_id' => $data['university_id'],
        'full_name' => $data['full_name'],
        'email' => $data['email'],
        'comment_text' => $data['comment_text']
    ]);

    // Send success response
    http_response_code(200);
    echo json_encode(['message' => 'Comment saved successfully']);

} catch (PDOException $e) {
    // Handle database errors
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?> 