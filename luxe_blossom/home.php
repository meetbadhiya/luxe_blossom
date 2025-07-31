<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luxe Blossom - Luxury Perfumes</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">Luxe Blossom</div>
        <nav>
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Gift</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registration.php">Register</a></li>
                <li><a href="#" class="cart-icon" id="cart-icon">🛒 Cart (<span id="cart-count">0</span>)</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <!-- <h1>Luxe Blossom</h1>
            <p>Discover the essence of luxury with our exquisite collection of perfumes, curated for the discerning individual</p>
            <a href="#shop" class="btn">Shop Now</a> -->
        </div>
    </section>

    <section class="products" id="shop">
        <h2>Featured Perfumes</h2>
        <div class="product-grid">
            <?php
            // Product data array - in a real app this would come from a database
            $products = [
                [
                    'id' => 1,
                    'name' => 'Capri',
                    'price' => 220,
                    'image' => 'imgs/capri.png',
                    'category' => 'men'
                    
                ],
                [
                    'id' => 2,
                    'name' => 'Aventus Anniversary',
                    'price' => 180,
                    'image' => 'imgs/aventus.png',
                    'category' => 'men'
                ],
                [
                    'id' => 3,
                    'name' => 'Seductive Blue',
                    'price' => 250,
                    'image' => 'imgs/sed_blue.png',
                    'category' => 'women'
                ],
                [
                    'id' => 4,
                    'name' => 'Tuscan Leather',
                    'price' => 150,
                    'image' => 'imgs/leather.png',
                    'category' => 'unisex'
                ],
                [
                    'id' => 5,
                    'name' => 'Ultra Male',
                    'price' => 280,
                    'image' => 'imgs/ultra.png',
                    'category' => 'men'
                ],
                [
                    'id' => 6,
                    'name' => 'Velvet Bloom',
                    'price' => 200,
                    'image' => 'imgs/velvet.png',
                    'category' => 'women'
                ],
                [
                    'id' => 7,
                    'name' => 'Rich Soul',
                    'price' => 170,
                    'image' => 'imgs/soul.png',
                    'category' => 'male'
                ],
                [
                    'id' => 8,
                    'name' => 'Guerlain Paris',
                    'price' => 230,
                    'image' => 'imgs/guerlain.png',
                    'category' => 'women'
                ],
                [
                    'id' => 9,
                    'name' => 'Luxe EROS',
                    'price' => 260,
                    'image' => 'imgs/eros.png',
                    'category' => 'men'
                ],
                [
                    'id' => 10,
                    'name' => 'Blooming Bouquet',
                    'price' => 240,
                    'image' => 'imgs/miss.png',
                    'category' => 'women'
                ],
                [
                    'id' => 11,
                    'name' => 'Urban Odyssey Female',
                    'price' => 300,
                    'image' => 'imgs/urban.png',
                    'category' => 'women'
                ],
                [
                    'id' => 12,
                    'name' => 'Mens Urban Odyssey',
                    'price' => 320,
                    'image' => 'imgs/urbn_ml.png',
                    'category' => 'men'
                ],
                [
                    'id' => 13,
                    'name' => 'Oudh Wood',
                    'price' => 190,
                    'image' => 'imgs/oudh_wood.png',
                    'category' => 'men'
                ],
                [
                    'id' => 14,
                    'name' => 'CHERRY by Luxe Blossom',
                    'price' => 210,
                    'image' => 'imgs/cherry.png',
                    'category' => 'women'
                ],
                [
                    'id' => 15,
                    'name' => 'Sport Body Spray',
                    'price' => 175,
                    'image' => 'imgs/bd_sprt.png',
                    'category' => 'unisex'
                ]
            ];

            // Display products
            foreach ($products as $product) {
                echo '
                <div class="product-card">
                    <div class="product-image" style="background-image: url(\''.$product['image'].'\')"></div>
                    <div class="product-info">
                        <h3 class="product-title">'.$product['name'].'</h3>
                        <p class="product-price">$'.$product['price'].'</p>
                        <button class="add-to-cart" data-id="'.$product['id'].'" data-name="'.$product['name'].'" data-price="'.$product['price'].'">Add to Cart</button>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <footer>
        <div class="footer-links">
            <a href="#">About Us</a>
            <a href="#">Contact</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Service</a>
            <a href="#">Shipping Information</a>
        </div>
        <p class="copyright">© 2023 Luxe Blossom. All rights reserved.</p>
    </footer>

    <!-- Cart Modal -->
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Your Shopping Cart</h2>
            <div id="cart-items" class="cart-items">
                <!-- Cart items will be added here -->
            </div>
            <p id="cart-total">Total: $0</p>
            <button class="checkout-btn">Proceed to Checkout</button>
        </div>
    </div>

    <script>
        // Cart functionality
        let cart = [];
        let total = 0;
        
        // Get modal elements
        const modal = document.getElementById('cart-modal');
        const cartIcon = document.getElementById('cart-icon');
        const closeBtn = document.querySelector('.close');
        const cartItemsContainer = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const cartCount = document.getElementById('cart-count');
        
        // Show modal when cart icon is clicked
        cartIcon.addEventListener('click', function(e) {
            e.preventDefault();
            modal.style.display = 'block';
            updateCartDisplay();
        });
        
        // Hide modal when close button is clicked
        closeBtn.addEventListener('click', function() {
            modal.style.display = 'none';
        });
        
        // Hide modal when clicking outside of it
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        });
        
        // Add to cart functionality
        const addToCartButtons = document.querySelectorAll('.add-to-cart');
        addToCartButtons.forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const price = parseFloat(this.getAttribute('data-price'));
                
                // Check if item already exists in cart
                const existingItem = cart.find(item => item.id === id);
                
                if (existingItem) {
                    existingItem.quantity++;
                } else {
                    cart.push({
                        id,
                        name,
                        price,
                        quantity: 1
                    });
                }
                
                total += price;
                cartCount.textContent = cart.reduce((sum, item) => sum + item.quantity, 0);
                
                // UI feedback
                const originalText = this.textContent;
                this.textContent = 'Added!';
                setTimeout(() => {
                    this.textContent = originalText;
                }, 1000);
            });
        });
        
        // Update cart display
        function updateCartDisplay() {
            cartItemsContainer.innerHTML = '';
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '<p>Your cart is empty</p>';
                cartTotal.textContent = 'Total: $0';
                return;
            }
            
            cart.forEach(item => {
                const cartItemDiv = document.createElement('div');
                cartItemDiv.className = 'cart-item';
                cartItemDiv.innerHTML = `
                    <span>${item.name} (x${item.quantity})</span>
                    <span>$${(item.price * item.quantity).toFixed(2)}</span>
                `;
                cartItemsContainer.appendChild(cartItemDiv);
            });
            
            cartTotal.textContent = `Total: $${total.toFixed(2)}`;
        }
    </script>
</body>
</html>
