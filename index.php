<?php
require_once 'universities/university.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ethiopian Universities Info</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>

  <body>
    <header>
      <nav class="navbar">
        <a class="logo" href="/">
          <h1>Ethiopian Universities Info</h1>
          <p>Your Gateway to Ethiopian Higher Education</p>
        </a>
        <div class="search-box">
          <form action="ranking.php" method="GET" class="search-form">
            <input 
              type="text" 
              id="university-search" 
              name="search" 
              placeholder="Search universities..." 
              autocomplete="off"
            />
            <button type="submit" id="search-button">Search</button>
          </form>
          <div id="search-results" class="search-results" style="display: none;">
            <!-- Quick search results will appear here -->
          </div>
        </div>
        <div class="social-links">
          <a href="#"
            ><img
              src="https://cdn-icons-png.flaticon.com/128/5968/5968764.png"
              alt="Facebook"
          /></a>
          <a href="#"
            ><img
              src="https://cdn-icons-png.flaticon.com/128/3256/3256013.png"
              alt="Twitter"
          /></a>
          <a href="#"
            ><img
              src="https://cdn-icons-png.flaticon.com/128/3536/3536505.png"
              alt="LinkedIn"
          /></a>
        </div>
      </nav>
    </header>

    <main>


      <section class="top-universities">
        <div class="section-header">
            <h2>Top Ethiopian Universities</h2>
            <a href="ranking.php" class="view-all-btn">View All Rankings</a>
        </div>
        <p>Below, you'll find a selection of leading institutions in Ethiopia. Click on a university to access detailed information.</p>

        <div class="university-list">
          <div class="university-item">
            <img src="./image/addis_main.png" alt="Addis Ababa University" />
            <div class="university-info">
              <span class="rank">#1</span>
              <a href="universities/university-details.php?id=addis-ababa"
                >Addis Ababa University</a
              >
            </div>
          </div>
          <div class="university-item">
            <img src="./image/jimma_main.png" alt="Jimma University" />
            <div class="university-info">
              <span class="rank">#2</span>
              <a href="universities/university-details.php?id=jimma"
                >Jimma University</a
              >
            </div>
          </div>
          <div class="university-item">
            <img src="./image/bahir-dar.png" alt="Bahir Dar University" />
            <div class="university-info">
              <span class="rank">#3</span>
              <a href="universities/university-details.php?id=bahir-dar"
                >Bahir Dar University</a
              >
            </div>
          </div>
          <div class="university-item">
            <img src="./image/mekelle.png" alt="Mekelle University" />
            <div class="university-info">
              <span class="rank">#4</span>
              <a href="universities/university-details.php?id=mekelle"
                >Mekelle University</a
              >
            </div>
          </div>
          <div class="university-item">
            <img src="./image/hawassa.png" alt="Hawassa University" />
            <div class="university-info">
              <span class="rank">#5</span>
              <a href="universities/university-details.php?id=hawassa"
                >Hawassa University</a
              >
            </div>
          </div>
        </div>
      </section>

      <section class="latest-articles">
        <h2>Latest Articles on Ethiopian Higher Education</h2>
        <div class="articles-grid">
          <article class="article-card">
            <img src="images/article1.jpg" alt="Article image" />
            <h3>Guide to University Admission in Ethiopia</h3>
            <p>
              Comprehensive guide to the admission process, requirements, and
              important dates for Ethiopian universities.
            </p>
            <a href="#" class="read-more">Read More</a>
          </article>
          <article class="article-card">
            <img src="images/article2.jpg" alt="Article image" />
            <h3>Scholarship Opportunities in Ethiopia</h3>
            <p>
              Explore various scholarship opportunities available for Ethiopian
              university students.
            </p>
            <a href="#" class="read-more">Read More</a>
          </article>
        </div>
      </section>

      <section class="regions">
        <h2>Explore Universities by Region</h2>
        <div class="region-grid">
            <?php
            // Get unique regions and count universities in each region
            $regions = [];
            foreach ($ethiopian_universities as $uni) {
                $region = $uni['region'];
                if (!isset($regions[$region])) {
                    $regions[$region] = 0;
                }
                $regions[$region]++;
            }
            
            // Display region cards with actual counts
            foreach ($regions as $region => $count) {
            ?>
                <a href="regions.php?region=<?php echo urlencode($region); ?>" class="region-card">
                    <h3><?php echo htmlspecialchars($region); ?> Region</h3>
                    <p><?php echo $count; ?> Universities</p>
                </a>
            <?php } ?>
        </div>

        <div class="university-listings" style="display: none">
            <div class="listings-header">
                <h3>Universities in <span class="region-name">Region</span></h3>
                <button class="close-listings">&times;</button>
            </div>
            <div class="listings-content">
                <?php foreach ($regions as $region => $count): ?>
                    <div class="region-universities" data-region="<?php echo htmlspecialchars($region); ?>" style="display: none;">
                        <?php
                        foreach ($ethiopian_universities as $id => $uni) {
                            if ($uni['region'] === $region) {
                        ?>
                            <div class="university-listing">
                                <img src="<?php echo htmlspecialchars($uni['image']); ?>" alt="<?php echo htmlspecialchars($uni['name']); ?>" class="university-thumbnail">
                                <div class="university-details">
                                    <h4><a href="universities/university-details.php?id=<?php echo htmlspecialchars($id); ?>"><?php echo htmlspecialchars($uni['name']); ?></a></h4>
                                    <p class="location"><?php echo htmlspecialchars($uni['location']); ?></p>
                                    <p class="students">Students: <?php echo number_format($uni['students']); ?></p>
                                    <p class="description"><?php echo htmlspecialchars($uni['description']); ?></p>
                                </div>
                            </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
      </section>
    </main>

    <footer>
      <div class="footer-content">
        <div class="footer-section">
          <h3>About Us</h3>
          <p>
            Ethiopian Universities Info is your comprehensive guide to higher
            education in Ethiopia.
          </p>
        </div>
        <div class="footer-section">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="#">Top Universities</a></li>
            <li><a href="#">Admission Guide</a></li>
            <li><a href="#">Scholarships</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="footer-section">
          <h3>Follow Us</h3>
          <div class="social-icons">
            <a href="#"
              ><img
                src="https://cdn-icons-png.flaticon.com/128/5968/5968764.png"
                alt="Facebook"
            /></a>
            <a href="#"
              ><img
                src="https://cdn-icons-png.flaticon.com/128/3256/3256013.png"
                alt="Twitter"
            /></a>
            <a href="#"
              ><img
                src="https://cdn-icons-png.flaticon.com/128/3536/3536505.png"
                alt="LinkedIn"
            /></a>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; 2025 Ethiopian Universities Info. All rights reserved.</p>
      </div>
    </footer>
  </body>

  <script>
    document.querySelectorAll(".nav-link").forEach((link) => {
      link.addEventListener("click", function (e) {
        // Remove active class from all links
        document
          .querySelectorAll(".nav-link")
          .forEach((l) => l.classList.remove("active"));
        // Add active class to clicked link
        this.classList.add("active");
      });
    });

    // Add mobile menu functionality
    document
      .querySelector(".mobile-menu-btn")
      .addEventListener("click", function () {
        const navLinks = document.querySelector(".nav-links");
        navLinks.classList.toggle("show");
      });

    // Close mobile menu when clicking outside
    document.addEventListener("click", function (e) {
      const navLinks = document.querySelector(".nav-links");
      const mobileBtn = document.querySelector(".mobile-menu-btn");

      if (!navLinks.contains(e.target) && !mobileBtn.contains(e.target)) {
        navLinks.classList.remove("show");
      }
    });

    // Close mobile menu when window is resized above mobile breakpoint
    window.addEventListener("resize", function () {
      if (window.innerWidth > 768) {
        document.querySelector(".nav-links").classList.remove("show");
      }
    });

    // Region functionality
    document.querySelectorAll('.region-card').forEach(button => {
        button.addEventListener('click', function() {
            const region = this.dataset.region;
            const listingsSection = document.querySelector('.university-listings');
            const regionNameSpan = document.querySelector('.region-name');
            
            // Hide all region universities first
            document.querySelectorAll('.region-universities').forEach(div => {
                div.style.display = 'none';
            });
            
            // Show the selected region's universities
            const selectedRegionDiv = document.querySelector(`.region-universities[data-region="${region}"]`);
            if (selectedRegionDiv) {
                selectedRegionDiv.style.display = 'block';
            }
            
            // Update region name and show listings section
            regionNameSpan.textContent = region;
            listingsSection.style.display = 'block';
        });
    });

    // Close listings
    document.querySelector('.close-listings').addEventListener('click', function() {
        document.querySelector('.university-listings').style.display = 'none';
    });

    const searchInput = document.getElementById('university-search');
    const searchButton = document.getElementById('search-button');
    const searchResults = document.getElementById('search-results');
    const searchForm = document.querySelector('.search-form');

    // Quick search as user types
    function performQuickSearch() {
        const query = searchInput.value.trim().toLowerCase();
        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }

        // Get universities data
        const universities = <?php echo json_encode($ethiopian_universities); ?>;

        // Filter universities based on search query
        const results = Object.entries(universities)
            .filter(([id, uni]) => {
                return uni.name.toLowerCase().includes(query) ||
                       uni.location.toLowerCase().includes(query) ||
                       uni.description.toLowerCase().includes(query);
            })
            .slice(0, 5); // Limit to 5 results

        if (results.length > 0) {
            const resultsHTML = results.map(([id, uni]) => `
                <div class="search-result-item">
                    <img src="${uni.image}" alt="${uni.name}" class="search-result-thumbnail">
                    <div class="search-result-details">
                        <h4><a href="universities/university-details.php?id=${id}">${uni.name}</a></h4>
                        <p class="location">${uni.location}</p>
                        <p class="students">Students: ${uni.students.toLocaleString()}</p>
                    </div>
                </div>
            `).join('');

            searchResults.innerHTML = resultsHTML + `
                <div class="search-result-item view-all">
                    <a href="ranking.php?search=${encodeURIComponent(query)}">View all results</a>
                </div>
            `;
            searchResults.style.display = 'block';
        } else {
            searchResults.innerHTML = '<div class="no-results">No universities found</div>';
            searchResults.style.display = 'block';
        }
    }

    // Search on input with debounce
    let debounceTimeout;
    searchInput.addEventListener('input', () => {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(performQuickSearch, 300);
    });

    // Handle form submission
    searchForm.addEventListener('submit', (e) => {
        const query = searchInput.value.trim();
        if (query.length < 2) {
            e.preventDefault();
            return;
        }
    });

    // Close search results when clicking outside
    document.addEventListener('click', (e) => {
        if (!searchInput.contains(e.target) && 
            !searchButton.contains(e.target) && 
            !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    // Add these styles to your existing styles
  </script>

  <style>
    .university-listings {
      margin-top: 2rem;
      background: white;
      padding: 2rem;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .listings-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
    }

    .close-listings {
      background: none;
      border: none;
      font-size: 1.5rem;
      cursor: pointer;
      padding: 0.5rem;
    }

    .university-listing {
      display: flex;
      gap: 1.5rem;
      padding: 1.5rem;
      border-bottom: 1px solid #eee;
    }

    .university-listing:last-child {
      border-bottom: none;
    }

    .university-thumbnail {
      width: 200px;
      height: 150px;
      object-fit: cover;
      border-radius: 4px;
    }

    .university-details h4 {
      margin: 0 0 0.5rem 0;
      font-size: 1.2rem;
    }

    .university-details a {
      color: #2c3e50;
      text-decoration: none;
    }

    .university-details a:hover {
      color: #3498db;
    }

    .university-details .location {
      color: #666;
      margin-bottom: 0.5rem;
    }

    .university-details .students {
      color: #666;
      margin-bottom: 0.5rem;
    }

    .university-details .description {
      color: #444;
      line-height: 1.5;
    }

    .loading, .error {
      text-align: center;
      padding: 2rem;
      color: #666;
    }

    .error {
      color: #e74c3c;
    }

    @media (max-width: 768px) {
      .university-listing {
        flex-direction: column;
      }

      .university-thumbnail {
        width: 100%;
        height: 200px;
      }
    }

    .search-form {
      display: flex;
      gap: 0.5rem;
    }

    .view-all {
      text-align: center;
      background-color: #f8f9fa;
      padding: 10px !important;
    }

    .view-all a {
      color: #3498db;
      text-decoration: none;
      font-weight: 500;
    }

    .view-all a:hover {
      text-decoration: underline;
    }

    .search-box {
      position: relative;
    }

    .search-results {
      position: absolute;
      top: 100%;
      left: 0;
      right: 0;
      background: white;
      border-radius: 4px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      max-height: 400px;
      overflow-y: auto;
      z-index: 1000;
      margin-top: 5px;
    }

    .search-result-item {
      display: flex;
      padding: 10px;
      border-bottom: 1px solid #eee;
      transition: background-color 0.2s;
    }

    .search-result-item:last-child {
      border-bottom: none;
    }

    .search-result-item:hover {
      background-color: #f5f5f5;
    }

    .search-result-thumbnail {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 4px;
      margin-right: 10px;
    }

    .search-result-details {
      flex: 1;
    }

    .search-result-details h4 {
      margin: 0 0 5px 0;
    }

    .search-result-details h4 a {
      color: #2c3e50;
      text-decoration: none;
    }

    .search-result-details h4 a:hover {
      color: #3498db;
    }

    .search-result-details p {
      margin: 0;
      color: #666;
      font-size: 0.9em;
    }

    .no-results {
      padding: 15px;
      text-align: center;
      color: #666;
    }

    #university-search {
      padding: 8px 15px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 200px;
      font-size: 14px;
    }

    #search-button {
      padding: 8px 15px;
      background-color: #3498db;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    #search-button:hover {
      background-color: #2980b9;
    }

    .section-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }

    .view-all-btn {
        background-color: #3498db;
        color: white;
        padding: 8px 16px;
        border-radius: 4px;
        text-decoration: none;
        font-weight: 500;
        transition: background-color 0.3s;
    }

    .view-all-btn:hover {
        background-color: #2980b9;
    }
  </style>
</html>
