<?php
$ethiopian_universities = [
    'addis-ababa' => [
        'name' => 'Addis Ababa University',
        'established' => 1950,
        'location' => 'Addis Ababa',
        'type' => 'Public',
        'president' => 'Prof. Tassew Woldehanna',
        'students' => 50000,
        'website' => 'www.aau.edu.et',
        'region' => 'Addis Ababa',
        'image' => 'images/universities/addis-ababa.jpg',
        'description' => 'Addis Ababa University (AAU) is the oldest and largest higher education institution in Ethiopia. Founded in 1950, it has been the leading center in teaching-learning, research and community services.',
        'overview' => [
            'World Ranking' => '#1501-2000',
            'Country Rank' => '#1 in Ethiopia',
            'Founded' => '1950',
            'Motto' => 'Seek Wisdom, Elevate Your Intellect and Serve Humanity',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'College of Business and Economics',
            'College of Education and Behavioral Studies',
            'College of Health Sciences',
            'College of Law and Governance Studies',
            'College of Natural and Computational Sciences',
            'College of Social Sciences',
            'College of Veterinary Medicine and Agriculture',
            'Institute of Technology'
        ]
    ],
    
    'jimma' => [
        'name' => 'Jimma University',
        'established' => 1999,
        'location' => 'Jimma, Oromia',
        'type' => 'Public',
        'president' => 'Prof. Jemal Abafita',
        'students' => 45000,
        'website' => 'www.ju.edu.et',
        'region' => 'Oromia',
        'image' => 'images/universities/jimma.jpg',
        'description' => 'Jimma University is one of the largest public universities in Ethiopia, known for its excellence in health sciences and innovative community-based education.',
        'overview' => [
            'World Ranking' => '#2501-3000',
            'Country Rank' => '#2 in Ethiopia',
            'Founded' => '1999',
            'Motto' => 'We are in the Community',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'College of Agriculture and Veterinary Medicine',
            'College of Business and Economics',
            'College of Health Sciences',
            'College of Natural Sciences',
            'College of Social Sciences and Humanities',
            'Institute of Technology'
        ]
    ],

    'bahir-dar' => [
        'name' => 'Bahir Dar University',
        'established' => 1963,
        'location' => 'Bahir Dar, Amhara',
        'type' => 'Public',
        'president' => 'Dr. Firew Tegegne',
        'students' => 40000,
        'website' => 'www.bdu.edu.et',
        'region' => 'Amhara',
        'image' => 'images/universities/bahir-dar.jpg',
        'description' => 'Bahir Dar University is a preeminent public university located in the historic city of Bahir Dar. It is known for its engineering programs and beautiful campus by Lake Tana.',
        'overview' => [
            'World Ranking' => '#3001-3500',
            'Country Rank' => '#3 in Ethiopia',
            'Founded' => '1963',
            'Motto' => 'Wisdom at the Source of the Blue Nile',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'College of Science',
            'College of Agriculture & Environmental Sciences',
            'College of Business & Economics',
            'College of Education & Behavioral Sciences',
            'Ethiopian Institute of Textile & Fashion Technology',
            'Institute of Technology'
        ]
    ],

    'mekelle' => [
        'name' => 'Mekelle University',
        'established' => 1991,
        'location' => 'Mekelle, Tigray',
        'type' => 'Public',
        'president' => 'Prof. Fetien Abay',
        'students' => 35000,
        'website' => 'www.mu.edu.et',
        'region' => 'Tigray',
        'image' => 'images/universities/mekelle.jpg',
        'description' => 'Mekelle University is a prominent institution in northern Ethiopia, recognized for its research contributions and community engagement.',
        'overview' => [
            'World Ranking' => '#3501-4000',
            'Country Rank' => '#4 in Ethiopia',
            'Founded' => '1991',
            'Motto' => 'Excellence in Knowledge and Service',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'College of Business and Economics',
            'College of Dryland Agriculture',
            'College of Health Sciences',
            'College of Natural and Computational Sciences',
            'College of Social Sciences and Languages',
            'Ethiopian Institute of Technology'
        ]
    ],

    'hawassa' => [
        'name' => 'Hawassa University',
        'established' => 1976,
        'location' => 'Hawassa, SNNPR',
        'type' => 'Public',
        'president' => 'Prof. Ayano Beraso',
        'students' => 38000,
        'website' => 'www.hu.edu.et',
        'region' => 'SNNPR',
        'image' => 'images/universities/hawassa.jpg',
        'description' => 'Hawassa University is a comprehensive public university known for its agricultural sciences and technology programs.',
        'overview' => [
            'World Ranking' => '#4001-4500',
            'Country Rank' => '#5 in Ethiopia',
            'Founded' => '1976',
            'Motto' => 'Committed to Excellence',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'College of Agriculture',
            'College of Business and Economics',
            'College of Health Sciences',
            'College of Natural Sciences',
            'College of Social Sciences and Humanities',
            'Institute of Technology'
        ]
    ],

    'adama' => [
        'name' => 'Adama Science and Technology University',
        'established' => 1993,
        'location' => 'Adama, Oromia',
        'type' => 'Public',
        'president' => 'Prof. Lemi Guta',
        'students' => 30000,
        'website' => 'www.astu.edu.et',
        'region' => 'Oromia',
        'image' => 'images/universities/adama.jpg',
        'description' => 'Adama Science and Technology University is a specialized institution focusing on science, technology, and engineering education.',
        'overview' => [
            'World Ranking' => '#4501-5000',
            'Country Rank' => '#6 in Ethiopia',
            'Founded' => '1993',
            'Motto' => 'Technology for Development',
            'Institution Type' => 'Public University'
        ],
        'colleges' => [
            'School of Civil Engineering and Architecture',
            'School of Electrical Engineering and Computing',
            'School of Mechanical Engineering',
            'School of Applied Natural Sciences',
            'School of Humanities and Social Sciences'
        ]
    ]
];

// Function to get universities by region
function getUniversitiesByRegion($region) {
    global $ethiopian_universities;
    $universities = [];
    
    foreach ($ethiopian_universities as $uni) {
        if (strtolower($uni['region']) === strtolower($region)) {
            $universities[] = $uni;
        }
    }
    
    return $universities;
}

// Function to get university by slug
function getUniversityBySlug($slug) {
    global $ethiopian_universities;
    return isset($ethiopian_universities[$slug]) ? $ethiopian_universities[$slug] : null;
}

// Function to get top universities (by ranking)
function getTopUniversities($limit = 5) {
    global $ethiopian_universities;
    $universities = array_values($ethiopian_universities);
    usort($universities, function($a, $b) {
        return $a['overview']['Country Rank'][1] - $b['overview']['Country Rank'][1];
    });
    return array_slice($universities, 0, $limit);
}

// Function to search universities
function searchUniversities($query) {
    global $ethiopian_universities;
    $results = [];
    
    foreach ($ethiopian_universities as $uni) {
        if (stripos($uni['name'], $query) !== false || 
            stripos($uni['description'], $query) !== false ||
            stripos($uni['location'], $query) !== false) {
            $results[] = $uni;
        }
    }
    
    return $results;
}
?> 