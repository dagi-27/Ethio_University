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
    <style>
        .colleges-list {
            list-style: none;
            padding: 0;
        }
        
        .college-item {
            margin-bottom: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        
        .college-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #f5f5f5;
            cursor: pointer;
        }
        
        .toggle-courses {
            background: none;
            border: 1px solid #666;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .courses-list {
            margin: 0;
            padding: 1rem;
            background-color: white;
        }
        
        .course-item {
            margin: 0.5rem 0;
            padding-left: 1rem;
        }

        .colleges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            padding: 1rem 0;
        }

        .college-card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .college-button {
            width: 100%;
            padding: 1rem;
            background: #2c3e50;
            color: white;
            border: none;
            font-size: 1rem;
            text-align: left;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .college-button:hover {
            background: #34495e;
        }

        .college-button[aria-expanded="true"] {
            background: #3498db;
        }

        .departments-list {
            padding: 1rem;
            background: #f8f9fa;
        }

        .departments-list h3 {
            margin: 0 0 0.5rem 0;
            color: #2c3e50;
            font-size: 1.1rem;
        }

        .departments-list ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .departments-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #e9ecef;
        }

        .departments-list li:last-child {
            border-bottom: none;
        }

        .no-departments {
            background: #95a5a6;
            cursor: default;
        }

        .no-departments:hover {
            background: #95a5a6;
        }

        .additional-info {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-top: 2rem;
        }

        .info-container {
            margin-top: 1rem;
        }

        .info-textarea {
            width: 100%;
            min-height: 150px;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-family: inherit;
            font-size: 1rem;
            line-height: 1.5;
            resize: vertical;
            margin-bottom: 1rem;
        }

        .info-textarea:focus {
            outline: none;
            border-color: #3498db;
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
        }

        .save-button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .save-button:hover {
            background-color: #2980b9;
        }

        .save-status {
            color: #27ae60;
            margin-top: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .info-prompt {
            text-align: center;
            margin: 2rem 0;
        }

        .prompt-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 1rem;
        }

        .btn-primary, .btn-secondary {
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background-color: #2980b9;
        }

        .btn-secondary {
            background-color: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
        }

        .login-form, .info-form {
            max-width: 500px;
            margin: 2rem auto;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
        }

        .form-group input {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 1rem;
        }
    </style>
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
                <div class="colleges-grid">
                    <?php foreach ($university['colleges'] as $college => $departments): ?>
                        <?php 
                        // Handle case where college is not an associative array key
                        if (is_numeric($college)): 
                        ?>
                            <div class="college-card">
                                <button class="college-button no-departments">
                                    <?php echo $departments; ?>
                                </button>
                            </div>
                        <?php 
                        // Handle case where college has departments
                        else: 
                        ?>
                            <div class="college-card">
                                <button class="college-button" aria-expanded="false">
                                    <?php echo $college; ?>
                                </button>
                                <div class="departments-list" style="display: none;">
                                    <h3>Departments</h3>
                                    <ul>
                                        <?php foreach ($departments as $department): ?>
                                            <li><?php echo $department; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </section>

            <section class="additional-info">
                <h2>Additional Information</h2>
                <div class="info-prompt">
                    <p>Do you want to add some additional information about this university?</p>
                    <div class="prompt-buttons">
                        <button id="show-login-btn" class="btn-primary">Yes</button>
                        <button id="no-info-btn" class="btn-secondary">No</button>
                    </div>
                </div>

                <!-- Login Form (Initially Hidden) -->
                <div id="login-form" class="login-form" style="display: none;">
                    <h3>Please provide your details</h3>
                    <form id="user-details-form">
                        <div class="form-group">
                            <label for="full-name">Full Name:</label>
                            <input type="text" id="full-name" name="full_name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <button type="submit" class="btn-primary">Continue</button>
                    </form>
                </div>

                <!-- Information Form (Initially Hidden) -->
                <div id="info-form" class="info-form" style="display: none;">
                    <div class="info-container">
                        <textarea 
                            id="additional-info" 
                            class="info-textarea" 
                            name="additional_info"
                            placeholder="Add any additional notes or information about this university..."
                            required
                        ></textarea>
                        <button id="save-info" class="save-button">Save Notes</button>
                        <p id="save-status" class="save-status"></p>
                    </div>
                </div>
            </section>

            <script>
                document.querySelectorAll('.college-button').forEach(button => {
                    if (!button.classList.contains('no-departments')) {
                        button.addEventListener('click', () => {
                            const departmentsList = button.nextElementSibling;
                            const isExpanded = button.getAttribute('aria-expanded') === 'true';
                            
                            button.setAttribute('aria-expanded', !isExpanded);
                            departmentsList.style.display = isExpanded ? 'none' : 'block';
                            
                            // Close other open departments
                            document.querySelectorAll('.departments-list').forEach(list => {
                                if (list !== departmentsList) {
                                    list.style.display = 'none';
                                    list.previousElementSibling.setAttribute('aria-expanded', 'false');
                                }
                            });
                        });
                    }
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const showLoginBtn = document.getElementById('show-login-btn');
                    const noInfoBtn = document.getElementById('no-info-btn');
                    const loginForm = document.getElementById('login-form');
                    const userDetailsForm = document.getElementById('user-details-form');
                    const infoForm = document.getElementById('info-form');
                    const saveButton = document.getElementById('save-info');
                    const saveStatus = document.getElementById('save-status');
                    const universityId = '<?php echo $university_id; ?>';

                    // Show login form when clicking Yes
                    showLoginBtn.addEventListener('click', () => {
                        loginForm.style.display = 'block';
                        showLoginBtn.parentElement.style.display = 'none';
                    });

                    // Hide section when clicking No
                    noInfoBtn.addEventListener('click', () => {
                        noInfoBtn.parentElement.parentElement.style.display = 'none';
                    });

                    // Handle user details form submission
                    userDetailsForm.addEventListener('submit', function(e) {
                        e.preventDefault();
                        const fullName = document.getElementById('full-name').value;
                        const email = document.getElementById('email').value;

                        // Store user details (you might want to send these to server)
                        localStorage.setItem('user_full_name', fullName);
                        localStorage.setItem('user_email', email);

                        // Hide login form and show info form
                        loginForm.style.display = 'none';
                        infoForm.style.display = 'block';
                    });

                    // Handle saving the information
                    saveButton.addEventListener('click', async function() {
                        const notes = document.getElementById('additional-info').value;
                        const fullName = localStorage.getItem('user_full_name');
                        const email = localStorage.getItem('user_email');

                        if (!notes.trim()) {
                            saveStatus.textContent = 'Please enter some notes';
                            saveStatus.style.color = '#e74c3c';
                            saveStatus.style.opacity = '1';
                            return;
                        }

                        try {
                            const response = await fetch('save_comment.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                },
                                body: JSON.stringify({
                                    university_id: universityId,
                                    full_name: fullName,
                                    email: email,
                                    comment_text: notes
                                })
                            });

                            const data = await response.json();

                            if (response.ok) {
                                saveStatus.textContent = 'Comment saved successfully!';
                                saveStatus.style.color = '#27ae60';
                                saveStatus.style.opacity = '1';
                                
                                // Clear the form
                                document.getElementById('additional-info').value = '';
                                
                                setTimeout(() => {
                                    saveStatus.style.opacity = '0';
                                }, 2000);
                            } else {
                                throw new Error(data.error || 'Failed to save comment');
                            }
                        } catch (error) {
                            saveStatus.textContent = error.message || 'Failed to save comment. Please try again.';
                            saveStatus.style.color = '#e74c3c';
                            saveStatus.style.opacity = '1';
                        }
                    });
                });
            </script>
        </div>
    </main>

    <footer>
        <div class="footer-content">
            <p>&copy; <?php echo date('Y'); ?> Ethiopian Universities Info. All rights reserved.</p>
        </div>
    </footer>
</body>
</html> 