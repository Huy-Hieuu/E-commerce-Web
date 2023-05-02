<!DOCTYPE html>
<html>
<head>
    <title>Product Search</title>
    <!-- Include the jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Product Search Example</h1>
    <input type="text" id="searchInput" placeholder="Search for a product...">
    <select id="productDropdown"></select>

    <script>
        $(document).ready(function() {
            // Attach an event handler to the search input
            $('#searchInput').on('input', function() {
                var searchKeyword = $(this).val(); // Get the input value

                // Send an AJAX request to the server
                $.ajax({
                    url: '../handler/search_products.php', // URL of the server-side script to handle the search
                    type: 'POST',
                    data: { keyword: searchKeyword }, // Send the search keyword as POST data
                    dataType: 'json', // Expect JSON response
                    success: function(response) {
                        // Clear the dropdown and add the retrieved product names as options
                        $('#productDropdown').empty();
                        $.each(response, function(index, product) {
                            $('#productDropdown').append($('<option>').text(product.name));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('AJAX request error:', error);
                    }
                });
            });
        });
    </script>
</body>
</html>
