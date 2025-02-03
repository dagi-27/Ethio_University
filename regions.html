<?php
require_once 'universities/university.php';

// Get the selected region from URL parameter
$selected_region = isset($_GET['region']) ? $_GET['region'] : '';

// Filter universities by selected region
$region_universities = array_filter($ethiopian_universities, function($uni) use ($selected_region) {
    return strcasecmp($uni['region'], $selected_region) === 0;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Universities in <?php echo htmlspecialchars($selected_region); ?> Region</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #3498db;
            --primary-dark: #2980b9;
            --text-dark: #2c3e50;
            --text-light: #666;
            --background-light: #f8f9fa;
            --border-radius: 12px;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition-speed: 0.3s;
        }

        body {
            background-color: #f5f7fa;
            font-family: 'Poppins', sans-serif;
            color: var(--text-dark);
            line-height: 1.6;
        }

        .region-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .region-header {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--card-shadow);
        }

        .region-header h1 {
            color: var(--text-dark);
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .university-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .university-card {
            background: white;
            border-radius: var(--border-radius);
            overflow: hidden;
            box-shadow: var(--card-shadow);
            transition: transform var(--transition-speed) ease,
                      box-shadow var(--transition-speed) ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .university-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .university-image {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform var(--transition-speed) ease;
        }

        .university-card:hover .university-image {
            transform: scale(1.05);
        }

        .university-info {
            padding: 1.8rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .university-info h3 {
            margin: 0 0 1rem 0;
            color: var(--text-dark);
            font-size: 1.4rem;
            font-weight: 600;
            line-height: 1.3;
        }

        .university-info p {
            margin: 0.7rem 0;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        .university-link {
            text-decoration: none;
            color: inherit;
            display: block;
            height: 100%;
        }

        .back-button {
            display: inline-flex;
            align-items: center;
            padding: 0.8rem 1.5rem;
            background-color: var(--primary-color);
            color: white;
            text-decoration: none;
            border-radius: var(--border-radius);
            margin-bottom: 2rem;
            font-weight: 500;
            transition: background-color var(--transition-speed);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .back-button:hover {
            background-color: var(--primary-dark);
        }

        .stats {
            background: var(--background-light);
            padding: 1.2rem;
            border-radius: var(--border-radius);
            margin: 1.5rem 0;
            font-size: 1.1rem;
            color: var(--text-light);
            border: 1px solid rgba(0, 0, 0, 0.05);
        }

        .no-universities {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: var(--border-radius);
            margin: 2rem 0;
            box-shadow: var(--card-shadow);
        }

        .no-universities h2 {
            color: var(--text-dark);
            margin-bottom: 1rem;
        }

        .university-meta {
            display: flex;
            justify-content: space-between;
            padding: 1rem 1.8rem;
            background: var(--background-light);
            border-top: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.9rem;
        }

        .university-meta span {
            color: var(--text-light);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .university-meta span i {
            color: var(--primary-color);
        }

        .location-badge {
            display: inline-flex;
            align-items: center;
            background: var(--background-light);
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.9rem;
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .description-text {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            margin-top: auto;
            color: var(--text-light);
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .region-container {
                padding: 0 1rem;
            }

            .university-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }

            .region-header h1 {
                font-size: 2rem;
            }

            .university-info {
                padding: 1.5rem;
            }

            .university-meta {
                padding: 1rem 1.5rem;
            }
        }

        /* Add smooth scrolling */
        html {
            scroll-behavior: smooth;
        }

        /* Add loading animation */
        .loading {
            text-align: center;
            padding: 2rem;
        }

        .loading::after {
            content: '';
            display: inline-block;
            width: 30px;
            height: 30px;
            border: 3px solid #f3f3f3;
            border-top: 3px solid var(--primary-color);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="region-container">
        <a href="index.php" class="back-button">
            ← Back to Home
        </a>
        
        <div class="region-header">
            <h1>Universities in <?php echo htmlspecialchars($selected_region); ?> Region</h1>
            <?php if (!empty($region_universities)): ?>
                <div class="stats">
                    <p>Found <?php echo count($region_universities); ?> universities in this region</p>
                </div>
            <?php endif; ?>
        </div>

        <?php if (empty($region_universities)): ?>
            <div class="no-universities">
                <h2>No Universities Found</h2>
                <p>There are no universities listed for the selected region.</p>
            </div>
        <?php else: ?>
            <div class="university-grid">
                <?php foreach ($region_universities as $id => $university): ?>
                    <a href="universities/university-details.php?id=<?php echo htmlspecialchars($id); ?>" class="university-link">
                        <div class="university-card">
                            <img 
                                src="<?php echo htmlspecialchars($university['image']); ?>" 
                                alt="<?php echo htmlspecialchars($university['name']); ?>"
                                class="university-image"
                            >
                            <div class="university-info">
                                <h3><?php echo htmlspecialchars($university['name']); ?></h3>
                                <div class="location-badge">
                                    📍 <?php echo htmlspecialchars($university['location']); ?>
                                </div>
                                <p class="description-text"><?php echo htmlspecialchars($university['description']); ?></p>
                            </div>
                            <div class="university-meta">
                                <span>👥 <?php echo number_format($university['students']); ?> Students</span>
                                <span>📅 Est. <?php echo htmlspecialchars($university['established']); ?></span>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html> 