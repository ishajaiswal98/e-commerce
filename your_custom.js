$(document).ready(function() {
    // Function to add a product to the cart
    function addToCart(productId) {
        $.ajax({
            url: 'addToCart.php',
            method: 'POST',
            data: { id: productId },
            dataType: 'json', 
            success: function(response) {
                if (response.status === 'success') {
                   
                    loadCart();
                } else {
                
                    alert(response.message);
                }
            },
            error: function(error) {
                console.error('Error adding to cart: ' + error);
            }
        });
    }

    // Function to remove a product from the cart
    function removeFromCart(productId) {
        $.ajax({
            url: 'removeFromCart.php',
            method: 'POST',
            data: { id: productId },
            dataType: 'json', 
            success: function(response) {
                if (response.status === 'success') {
                  
                    loadCart();
                } else {
                   
                    alert(response.message);
                }
            },
            error: function(error) {
                console.error('Error removing from cart: ' + error);
            }
        });
    }

    // Function to load and display the cart
    function loadCart() {
        $.ajax({
            url: 'cart.php',
            dataType: 'html', 
            success: function(response) {
                $('#cart').html(response);
            },
            error: function(error) {
                console.error('Error loading cart: ' + error);
            }
        });
    }

    $('.btn-add-to-cart').click(function() {
        const productId = $(this).data('id');
        addToCart(productId);
    });

    $('#cart').on('click', '.btn-remove-from-cart', function() {
        const productId = $(this).data('id');
        removeFromCart(productId);
    });

    loadCart();
});
