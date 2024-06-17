<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSS Technologies</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>
    <header>
        <img src="pictures/logo.png" alt="SSS Technologies Logo" class="logo">
        <h1>SSS Technologies</h1>
        <nav>
            <a href="#" onclick="showSection('about')">About Us</a>
            <a href="#" onclick="showSection('services')">Services</a>
            <a href="#" onclick="showSection('login')">Login</a>
            <a href="#" onclick="showSection('signup')">Sign Up</a>
            <a href="#" onclick="showSection('cart')">Cart</a>
        </nav>
    </header>
    <main>
        <section id="about" style="display: none;">
            <h2>About Us</h2>
            <img src="pictures/about-us.png" alt="About Us" class="about-img">
            <p>Welcome to SSS Technologies, your partner in innovative technology solutions. We specialize in providing top-notch services to help your business thrive in the digital era.</p>
        </section>
        <section id="services">
            <h2>Our Services</h2>
            <ul id="services-list">
                <?php
                $services = [
                    ["id" => "1", "title" => "Web Development", "description" => "Custom web development solutions.", "price" => "728.07"],
                    ["id" => "2", "title" => "Mobile App Development", "description" => "Native and hybrid mobile app development.", "price" => "1461.63"],
                    ["id" => "3", "title" => "Digital Marketing", "description" => "SEO, SEM, and social media marketing services.", "price" => "1223.91"],
                    ["id" => "4", "title" => "Cloud Services", "description" => "Cloud infrastructure setup and management.", "price" => "1034.66"],
                    ["id" => "5", "title" => "Data Analytics", "description" => "Data analysis and business intelligence solutions.", "price" => "801.59"],
                    ["id" => "6", "title" => "Cybersecurity", "description" => "Security audits and cybersecurity solutions.", "price" => "1003.97"],
                    ["id" => "7", "title" => "UI/UX Design", "description" => "User interface and user experience design services.", "price" => "1115.09"],
                ];

                foreach ($services as $service) {
                    if ($service['title']) {
                        echo "<li>";
                        echo "<h3>" . $service['title'] . "</h3>";
                        echo "<p>" . $service['description'] . "</p>";
                        echo "<p>Price: $" . $service['price'] . "</p>";
                        echo "<button onclick=\"addToCart(" . $service['id'] . ")\">Add to Cart</button>";
                        echo "</li>";
                    }
                }
                ?>
            </ul>
        </section>
        <section id="login" style="display: none;">
            <h2>Login</h2>
            <form id="login-form" method="POST" action="">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Login</button>
            </form>
        </section>
        <section id="signup" style="display: none;">
            <h2>Sign Up</h2>
            <form id="signup-form" method="POST" action="">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Sign Up</button>
            </form>
        </section>
        <section id="cart" style="display: none;">
            <h2>Your Cart</h2>
            <ul id="cart-items"></ul>
            <button id="checkout-button" style="display: none;">Checkout</button>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 SSS Technologies. All rights reserved.</p>
    </footer>
    <script>
        function showSection(sectionId) {
            document.querySelectorAll('main section').forEach(section => {
                section.style.display = 'none';
            });
            document.getElementById(sectionId).style.display = 'block';
        }

        document.addEventListener("DOMContentLoaded", function() {
            const cartItems = document.getElementById("cart-items");
            const checkoutButton = document.getElementById("checkout-button");
            let cart = JSON.parse(localStorage.getItem("cart")) || [];

            if (cart.length === 0) {
                cartItems.innerHTML = "<p>Your cart is empty.</p>";
                checkoutButton.style.display = "none";
            } else {
                <?php
                // Convert the PHP array to a JSON object
                $services_json = json_encode($services);
                echo "let services = $services_json;";
                ?>

                cart.forEach(serviceId => {
                    const service = services.find(s => s.id == serviceId);
                    if (service) {
                        const li = document.createElement("li");
                        li.innerHTML = `
                            <h3>${service.title}</h3>
                            <p>${service.description}</p>
                            <p>Price: $${service.price}</p>
                        `;
                        cartItems.appendChild(li);
                    }
                });
                checkoutButton.style.display = "block";
            }

            checkoutButton.addEventListener("click", function() {
                alert("Checkout functionality not implemented yet.");
            });
        });

        function addToCart(serviceId) {
            if (!isLoggedIn()) {
                alert("Please log in to add items to the cart.");
                return;
            }
            let cart = JSON.parse(localStorage.getItem("cart")) || [];
            cart.push(serviceId);
            localStorage.setItem("cart", JSON.stringify(cart));
            alert("Service added to cart!");
        }

        function isLoggedIn() {
            // Dummy login check
            return localStorage.getItem("loggedIn") === "true";
        }

        document.getElementById("login-form").addEventListener("submit", function(e) {
            e.preventDefault();
            // Dummy login process
            localStorage.setItem("loggedIn", "true");
            alert("Logged in successfully!");
            showSection('services');
        });

        document.getElementById("signup-form").addEventListener("submit", function(e) {
            e.preventDefault();
            // Dummy signup process
            localStorage.setItem("loggedIn", "true");
            alert("Signed up successfully!");
            showSection('services');
        });
    </script>
</body>
</html>
