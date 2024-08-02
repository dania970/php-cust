<?php
$phones = [
    [
        'name' => 'Samsung Galaxy Note 20 Ultra',
        'img_url' => 'p1.webp',
        'rate' => '5',
        'brand' => 'Samsung',
        'price' => 'JOD 759.00',
        'is_out_of_stock' => '1'
    ],
    [
        'name' => 'INFINIX Zero 8',
        'img_url' => 'p3.webp',
        'rate' => '0',
        'brand' => 'Infinix',
        'price' => 'JOD 205.00',
        'is_out_of_stock' => '1'
    ],
    [
        'name' => 'Apple iPhone 12 Pro',
        'img_url' => 'p4.webp',
        'rate' => '0',
        'brand' => 'Apple',
        'price' => 'JOD 973.00',
        'is_out_of_stock' => '1'
    ],
    [
        'name' => 'ITEL A48',
        'img_url' => 'p6.webp',
        'rate' => '0',
        'brand' => 'iTel',
        'price' => 'JOD 66.00'
    ],
    [
        'name' => 'Samsung Galaxy S21 Ultra',
        'img_url' => 'p7.webp',
        'rate' => '0',
        'brand' => 'Samsung',
        'price' => 'JOD 799.00'
    ],
    [
        'name' => 'Galaxy A52',
        'img_url' => 'p10.webp',
        'rate' => '0',
        'brand' => 'Samsung',
        'price' => 'JOD 267.00'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Phone | Orange Jordan E shop</title>
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/orange-helvetica.min.css" rel="stylesheet" integrity="sha384-ARRzqgHDBP0PQzxQoJtvyNn7Q8QQYr0XT+RXUFEPkQqkTB6gi43ZiL035dKWdkZe" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/css/boosted.min.css" rel="stylesheet" integrity="sha384-Di/KMIVcO9Z2MJO3EsrZebWTNrgJTrzEDwAplhM5XnCFQ1aDhRNWrp6CWvVcn00c" crossorigin="anonymous">
    <style>
        .mainContainer {
            display: flex;
            width: 100%;
            margin: 0 auto;
        }

        .category {
            width: 20%;
            background-color: #f8f9fa;
            padding: 1rem;
            border-right: 1px solid #ddd;
        }

        .Container {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            width: 80%;
            padding: 1rem;
        }

        .card {
            width: 32%;
            border: 1px solid #ddd;
            padding: 1rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .card img {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="Orange_logo.svg.png" width="50" height="50" role="img" alt="Boosted" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="mainContainer">
        <div class="category">
            <div class="title">
                <strong>Categories</strong>
            </div>
            <div class="listbox">
                <ul class="list">
                    <li class="inactive"><a href="/en/devices-accessories">All</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/devices-with-installment">Device & Mobile Phone Installment</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/5g-phones">5G Phones</a></li>
                    <li class="active last"><a href="/en/devices-accessories/mobile-phone">Mobile Phones</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/mobile-accessories">Mobile Accessories</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/smart-watches">Smart Watches</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/headphones-earbuds">Headphones and Speakers</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/tv">Smart TV and Screens</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/smart-audio-video">Smart Audio and Video</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/gaming-accessories">Gaming accessories</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/tablets-laptops">Tablets & Laptops</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/internet-devices">Internet Devices</a></li>
                    <li class="inactive"><a href="/en/devices-accessories/fixed-phones">Fixed phones devices</a></li>
                </ul>
            </div>
        </div>
        <div class="Container">
            <?php
            foreach ($phones as $phone) {
                echo "
                <div class='card'>
                    <div class='card-body'>
                        <p class='brandName'> {$phone['brand']}</p>
                        <p class='card-title name'> {$phone['name']}</p>
                        <p class='rate'> {$phone['rate']}</p>
                        <img class='card-img-top' alt='Phone Image' src='{$phone['img_url']}'>
                        <p class='price'> {$phone['price']}</p>";
                if (isset($phone['is_out_of_stock'])) {
                    echo "Out Of Stock!";
                    echo "<br>";
                }
                echo "<button class='btn btn-primary'>View details</button>";
                echo "</div></div>";
            }
            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/boosted@5.1.3/dist/js/boosted.bundle.min.js" integrity="sha384-5thbp4uNEqKgkl5m+rMBhqR+ZCs+3iAaLIghPWAgOv0VKvzGlYKR408MMbmCjmZF" crossorigin="anonymous"></script>
</body>

</html>