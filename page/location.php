
<?php
    include('../layouts/head.php');
    include('../layouts/nav.php');

?>

<body>
    <link rel="stylesheet" href="../styles/location.css">


    <div class="container-fluid row d-flex justify-content-between border border-1">
        <div class="col-4 border border-1">
            <div class="input-group rounded mt-2">
                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                <span class="input-group-text border-0" id="search-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
        <div class="col-7 border border-1" id="map"></div>
    </div>


    <script src="../javascript/location.js"></script>

    <!-- Include the Google Maps JavaScript API -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg4xQAbqenXrwk02ASXXWdXGdQs1LQ43o&callback=initMap" async defer></script>
</body>
</html>
