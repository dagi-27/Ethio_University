<?php
function getUniversityComments($university_id) {
    global $pdo;
    
    try {
        $stmt = $pdo->prepare("
            SELECT * FROM university_comments 
            WHERE university_id = :university_id 
            ORDER BY created_at DESC
        ");
        
        $stmt->execute(['university_id' => $university_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}
?> 