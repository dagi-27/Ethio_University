<?php
require_once 'universities/university.php';

// Sort universities by rank
$sorted_universities = $ethiopian_universities;
uasort($sorted_universities, function($a, $b) {
    // Extract just the number from the rank string
    $rank_a = intval(preg_replace('/[^0-9]/', '', $a['overview']['Country Rank']));
    $rank_b = intval(preg_replace('/[^0-9]/', '', $b['overview']['Country Rank']));
    return $rank_a - $rank_b;
});

// Handle search
$search_query = isset($_GET['search']) ? trim($_GET['search']) : '';
if (!empty($search_query)) {
    $sorted_universities = array_filter($sorted_universities, function($uni) use ($search_query) {
        return stripos($uni['name'], $search_query) !== false ||
               stripos($uni['location'], $search_query) !== false;
    });
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ethiopian Universities Rankings</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        .rankings-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .rankings-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .rankings-table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .rankings-table th,
        .rankings-table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        .rankings-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #2c3e50;
        }

        .rankings-table tr:hover {
            background-color: #f5f5f5;
        }

        .university-name {
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
        }

        .university-name:hover {
            color: #3498db;
        }

        .rank-cell {
            font-weight: 600;
            color: #3498db;
        }

        .university-row {
            transition: background-color 0.2s;
        }

        .university-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 4px;
        }

        .back-button {
            display: inline-block;
            padding: 8px 16px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 1rem;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #2980b9;
        }

        @media (max-width: 768px) {
            .rankings-table {
                font-size: 14px;
            }

            .rankings-table th,
            .rankings-table td {
                padding: 0.75rem;
            }

            .university-image {
                width: 40px;
                height: 40px;
            }
        }

        .search-form {
            margin: 2rem 0;
            display: flex;
            gap: 1rem;
            justify-content: center;
        }

        .search-input {
            padding: 10px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 300px;
            font-size: 16px;
        }

        .search-button {
            padding: 10px 20px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .search-button:hover {
            background-color: #2980b9;
        }

        .no-results {
            text-align: center;
            padding: 2rem;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 2rem 0;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="rankings-container">
        <a href="index.php" class="back-button">← Back to Home</a>
        
        <div class="rankings-header">
            <h1>Ethiopian Universities Rankings</h1>
            <p>Complete list of Ethiopian universities ranked by national standing</p>
        </div>

        <form class="search-form" method="GET" action="ranking.php">
            <input 
                type="text" 
                name="search" 
                class="search-input" 
                placeholder="Search universities..."
                value="<?php echo htmlspecialchars($search_query); ?>"
            >
            <button type="submit" class="search-button">Search</button>
            <?php if (!empty($search_query)): ?>
                <a href="ranking.php" class="search-button" style="text-decoration: none;">Clear</a>
            <?php endif; ?>
        </form>

        <?php if (empty($sorted_universities)): ?>
            <div class="no-results">
                <h3>No universities found matching "<?php echo htmlspecialchars($search_query); ?>"</h3>
                <p>Try different keywords or check the spelling</p>
            </div>
        <?php else: ?>
            <table class="rankings-table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>University</th>
                        <th>Location</th>
                        <th>Students</th>
                        <th>World Ranking</th>
                        <th>Established</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sorted_universities as $id => $university): ?>
                    <tr class="university-row">
                        <td class="rank-cell"><?php 
                            // Extract just the number from the rank string
                            echo preg_replace('/[^0-9]/', '', $university['overview']['Country Rank']); 
                        ?></td>
                        <td>
                            <a href="universities/university-details.php?id=<?php echo htmlspecialchars($id); ?>" class="university-name">
                                <div style="display: flex; align-items: center; gap: 1rem;">
                                    <img src="<?php echo htmlspecialchars($university['image']); ?>" alt="<?php echo htmlspecialchars($university['name']); ?>" class="university-image">
                                    <?php echo htmlspecialchars($university['name']); ?>
                                </div>
                            </a>
                        </td>
                        <td><?php echo htmlspecialchars($university['location']); ?></td>
                        <td><?php echo number_format($university['students']); ?></td>
                        <td><?php echo htmlspecialchars($university['overview']['World Ranking']); ?></td>
                        <td><?php echo htmlspecialchars($university['established']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html> 