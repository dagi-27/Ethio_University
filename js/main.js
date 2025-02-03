document.addEventListener("DOMContentLoaded", function () {
    // Sample data for top universities
    const topUniversities = [
      {
        name: "Addis Ababa University",
        description:
          "The oldest and largest higher education institution in Ethiopia.",
        image: "./images/addis-ababa.jpg",
      },
      {
        name: "Jimma University",
        description:
          "One of Ethiopia's premier public universities known for medical sciences.",
        image: "./images/jimma.jpg",
      },
      {
        name: "Bahir Dar University",
        description:
          "A distinguished institution known for engineering and technology.",
        image: "./images/bahir-dar.jpg",
      },
      {
        name: "Mekelle University",
        description:
          "Leading university in northern Ethiopia with diverse programs.",
        image: "./images/mekelle.jpg",
      },
      {
        name: "Hawassa University",
        description: "Renowned for agriculture and natural sciences studies.",
        image: "./images/hawassa.jpg",
      },
    ];
  
    // Function to load top universities
    function loadTopUniversities() {
      const grid = document.querySelector(".universities-grid");
  
      topUniversities.forEach((uni) => {
        const card = document.createElement("div");
        card.className = "university-card";
        card.innerHTML = `
                  <img src="${uni.image}" alt="${uni.name}">
                  <h3>${uni.name}</h3>
                  <p>${uni.description}</p>
                  <button onclick="window.location.href='/university/${uni.name
                    .toLowerCase()
                    .replace(/ /g, "-")}'">
                      Read More
                  </button>
              `;
        grid.appendChild(card);
      });
    }
  
    // Search functionality
    const searchBar = document.getElementById("searchBar");
    const searchBtn = document.getElementById("searchBtn");
  
    searchBtn.addEventListener("click", performSearch);
    searchBar.addEventListener("keypress", (e) => {
      if (e.key === "Enter") {
        performSearch();
      }
    });
  
    function performSearch() {
      const searchTerm = searchBar.value.trim();
      if (searchTerm) {
        // This will be replaced with actual backend call
        window.location.href = `/search?q=${encodeURIComponent(searchTerm)}`;
      }
    }
  
    // Load universities when page loads
    loadTopUniversities();
  
    // University data by region
    const universitiesByRegion = {
      oromia: [
        {
          name: "Jimma University",
          location: "Jimma",
          established: 1999,
          description:
            "One of Ethiopia's premier public universities known for medical sciences and research.",
          image: "./images/jimma.jpg",
          students: 45000,
          programs: 120,
        },
        {
          name: "Adama Science and Technology University",
          location: "Adama",
          established: 1993,
          description: "Specialized in technology and engineering education.",
          image: "./images/adama.jpg",
          students: 30000,
          programs: 85,
        },
        {
          name: "Haramaya University",
          location: "Haramaya",
          established: 1954,
          description: "Known for agriculture and veterinary sciences.",
          image: "./images/haramaya.jpg",
          students: 35000,
          programs: 95,
        },
        // Add more universities
      ],
      amhara: [
        {
          name: "Bahir Dar University",
          location: "Bahir Dar",
          established: 1963,
          description: "Leading institution in engineering and technology.",
          image: "./images/bahir-dar.jpg",
          students: 40000,
          programs: 110,
        },
        // Add more universities
      ],
      // Add other regions...
    };
  
    // Add event listeners for region cards
    document.querySelectorAll(".region-card").forEach((card) => {
      card.addEventListener("click", () => {
        const region = card.dataset.region;
        showUniversities(region);
      });
    });
  
    // Function to show universities for selected region
    function showUniversities(region) {
      const listings = document.querySelector(".university-listings");
      const overlay = document.querySelector(".overlay");
      const regionName = document.querySelector(".region-name");
      const listingsContent = document.querySelector(".listings-content");
  
      // Update region name
      regionName.textContent = region.charAt(0).toUpperCase() + region.slice(1);
  
      // Clear previous listings
      listingsContent.innerHTML = "";
  
      // Add universities for selected region
      universitiesByRegion[region]?.forEach((uni) => {
        const uniElement = document.createElement("div");
        uniElement.className = "university-item-detailed";
        uniElement.innerHTML = `
          <div class="university-image">
            <img src="${uni.image}" alt="${uni.name}">
          </div>
          <div class="university-details">
            <h4>${uni.name}</h4>
            <p>${uni.description}</p>
            <div class="stats">
              <div class="stat-item">
                <span class="material-icons">school</span>
                <span>${uni.students.toLocaleString()} Students</span>
              </div>
              <div class="stat-item">
                <span class="material-icons">book</span>
                <span>${uni.programs} Programs</span>
              </div>
              <div class="stat-item">
                <span class="material-icons">calendar_today</span>
                <span>Est. ${uni.established}</span>
              </div>
            </div>
          </div>
        `;
        listingsContent.appendChild(uniElement);
      });
  
      // Show overlay and listings
      overlay.style.display = "block";
      listings.style.display = "block";
    }
  
    // Close listings when clicking close button or overlay
    document
      .querySelector(".close-listings")
      ?.addEventListener("click", closeListings);
    document.querySelector(".overlay")?.addEventListener("click", closeListings);
  
    function closeListings() {
      document.querySelector(".university-listings").style.display = "none";
      document.querySelector(".overlay").style.display = "none";
    }
  
    // Add overlay div to your HTML
    if (!document.querySelector(".overlay")) {
      const overlay = document.createElement("div");
      overlay.className = "overlay";
      document.body.appendChild(overlay);
    }
  });
  