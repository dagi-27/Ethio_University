<?php
require_once('university.php');

// Get the university ID from the URL
$university_id = isset($_GET['id']) ? $_GET['id'] : '';

// Get university details
$university = getUniversityBySlug($university_id);

// If university not found, redirect to home page
if (!$university) {
    header('Location: ../index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $university['name']; ?> - Ethiopian Universities Info</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/university.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <h1><a href="../index.php" style="text-decoration: none; color: inherit;">Ethiopian Universities Info</a></h1>
            </div>
        </nav>
    </header>

    <main class="university-detail">
        <div class="university-header">
            <img src="../<?php echo $university['image']; ?>" alt="<?php echo $university['name']; ?>" class="university-banner">
            <h1><?php echo $university['name']; ?></h1>
        </div>

        <div class="university-content">
            <section class="overview">
                <h2>Overview</h2>
                <div class="overview-grid">
                    <?php foreach ($university['overview'] as $key => $value): ?>
                    <div class="overview-item">
                        <strong><?php echo $key; ?>:</strong>
                        <span><?php echo $value; ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="description">
                <h2>About</h2>
                <p><?php echo $university['description']; ?></p>
            </section>

            <section class="details">
                <h2>Key Information</h2>
                <ul>
                    <li><strong>Location:</strong> <?php echo $university['location']; ?></li>
                    <li><strong>Established:</strong> <?php echo $university['established']; ?></li>
                    <li><strong>Type:</strong> <?php echo $university['type']; ?></li>
                    <li><strong>President:</strong> <?php echo $university['president']; ?></li>
                    <li><strong>Student Population:</strong> <?php echo number_format($university['students']); ?></li>
                    <li><strong>Website:</strong> <a href="https://<?php echo $university['website']; ?>" target="_blank"><?php echo $university['website']; ?></a></li>
                </ul>
            </section>

            <section class="colleges">
                <h2>Colleges and Schools</h2>
                <ul>
                    <?php foreach ($university['colleges'] as $college): ?>
                    <li><?php echo $college; ?></li>
                    <?php endforeach; ?>
                </ul>
            </section>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Ethiopian Universities Info. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 