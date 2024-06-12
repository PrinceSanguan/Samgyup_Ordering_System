<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dads Burger & House of Unlimited</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url("{{ asset('images/dadsburger.jpg') }}");
            background-repeat: repeat;
            background-size: auto;
            color: #0b0b0b;  
        }   
        h1, h2, h3 {
            color: #f4f3f9;
            font-family: 'Times New Roman', Times, serif
        }
        h4 {
            color: #dde5db;
            font-family: 'Times New Roman', Times, serif
        }
        .order-section {
            background-color: #ffffff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
        .order-image-container {
            width: 150px;
            height: 150px;
            overflow: hidden;
            border-radius: 8px;
            margin-right: 20px;
        }
        .order-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .order-details {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .order-details input[type="number"] {
            width: 100px;
            margin-top: 10px;
        }
        .order-list {
            margin-top: 20px;
        }
        .btn-order {
            margin-top: 20px;
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
        .list-group-item {
            background-color: #242321;
            color: #dff1d7;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .quantity-input-container {
            flex: 1;
            margin: 0 10px;
        }
        /* Added styles for the select dropdown */
        #category-select {
            max-width: 300px;
            margin: 0 auto;
            padding: 5px;
            border-radius: 5px;
            border: 2px solid #0b0b0b;
            font-size: 16px;
            background-color: #c9f40c;
            color: #0b0b0b;
        }
        #category-select:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
        /* Styles for table number and remaining balance */
        .table-info {
            text-align: center;
            color: #54f509;
            font-family: 'Times New Roman', Times, serif;
            background-color: #0d0e0e;
        }
        .table-info span {
            display: block;
            font-size: 20px;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1 class="text-center mt-5">Dads Burger & House of Unlimited</h1>

        <!-- Table Number and Remaining Balance Section -->
        <div class="table-info">
            <span>Table #5</span>
            <span>Running Balance: &#8369;{{$runningBalance}}.00</span>
        </div>

    <div class="text-center mt-5">
        <select id="category-select" class="form-control" onchange="showCategory()">
            <option value="">Select a category</option>
            <option value="samgyup199">Unli Samgyup 199</option>
            <option value="samgyup219">Unli Samgyup 219</option>
            <option value="samgyup299">Unli Samgyup 299</option>
            <option value="wings289">Unli Wings 289</option>
            <option value="beverage">Beverage</option>
            <option value="chickenWings">Chicken Wings</option>
            <option value="burger">Burger</option>
        </select>
    </div>

    @if ($unli199)
        @foreach ($unli199 as $index => $data)
        <div id="samgyup199" class="menu-section container mt-5">
            <!-- Dishes for Unli Samgyup 199 go here -->
            <div class="order-section">
                <div class="order-image-container">
                    <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
                </div>
                <div class="order-details">
                    <h5>{{ $data->name }}</h5>
                    <div class="quantity-controls">
                        <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity199-{{ $index }}')">-</button>
                        <div class="quantity-input-container">
                            <input type="number" id="quantity199-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount }}" data-category="Unli Samgyup 199" onchange="updateOrders()">
                        </div>
                        <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity199-{{ $index }}')">+</button>
                    </div>
                    <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
                </div>
            </div>
        </div>
        @endforeach  
    @endif

    @if ($unli219)
    @foreach ($unli219 as $index => $data)
    <div id="samgyup219" class="menu-section container mt-5">
        <!-- Dishes for Unli Samgyup 219 go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity219-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="quantity219-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount }}" data-category="Unli Samgyup 219" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity219-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    @if ($unli299)
    @foreach ($unli299 as $index => $data)
    <div id="samgyup299" class="menu-section container mt-5">
        <!-- Dishes for Unli Samgyup 299 go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity299-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="quantity299-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount }}" data-category="Unli Samgyup 299" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity299-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    @if ($unli289)
    @foreach ($unli289 as $index => $data)
    <div id="wings289" class="menu-section container mt-5">
        <!-- Dishes for Unli Wings 289 go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity289-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="quantity289-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount }}" data-category="Unli Wings 289" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity289-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    @if ($beverage)
    @foreach ($beverage as $index => $data)
    <div id="beverage" class="menu-section container mt-5">
        <!-- Dishes for Beverage go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('beverage-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="beverage-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount }}" data-category="Beverage" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('beverage-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    @if ($chickenWings)
    @foreach ($chickenWings as $index => $data)
    <div id="chickenWings" class="menu-section container mt-5">
        <!-- Dishes for Chicken Wings go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('chickenWings-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="chickenWings-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount ?? 'Unlimited' }}" data-category="Chicken Wings" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('chickenWings-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    @if ($burger)
    @foreach ($burger as $index => $data)
    <div id="burger" class="menu-section container mt-5">
        <!-- Dishes for Burgers go here -->
        <div class="order-section">
            <div class="order-image-container">
                <img src="{{ asset('upload-image/' . $data->image) }}" class="order-image" alt="Featured Image">
            </div>
            <div class="order-details">
                <h5>{{ $data->name }}</h5>
                <div class="quantity-controls">
                    <button class="quantity-btn minus-btn" onclick="decrementQuantity('burger-{{ $index }}')">-</button>
                    <div class="quantity-input-container">
                        <input type="number" id="burger-{{ $index }}" class="form-control" value="0" min="0" data-name="{{ $data->name }}" data-amount="{{ $data->amount ?? 'Unlimited' }}" data-category="Burger" onchange="updateOrders()">
                    </div>
                    <button class="quantity-btn plus-btn" onclick="incrementQuantity('burger-{{ $index }}')">+</button>
                </div>
                <h6>{{ $data->amount ?? 'Unlimited' }}</h6>
            </div>
        </div>
    </div>
    @endforeach  
    @endif

    <!-- Repeat for other sections... -->

    <div class="order-list container mt-5">
        <h3>Your Orders</h3>
        <ul id="order-list" class="list-group">
            <!-- Orders will be listed here -->
        </ul>
    </div>

    <div class="container mt-5 text-center">
        <button class="btn btn-primary btn-order" onclick="makeOrder()">Make an Order</button>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function updateOrders() {
        const orderList = document.getElementById('order-list');
        orderList.innerHTML = ''; // Clear previous orders

        const inputs = document.querySelectorAll('.menu-section input[type="number"]');
        inputs.forEach(input => {
            const quantity = parseInt(input.value);
            if (quantity > 0) {
                const name = input.getAttribute('data-name');
                let amount = input.getAttribute('data-amount');
                const category = input.getAttribute('data-category');
                
                // Check if amount is null or an empty string and set it to "Unlimited"
                if (!amount) {
                    amount = 'Unlimited';
                }
                
                const listItem = document.createElement('li');
                listItem.className = 'list-group-item';
                listItem.textContent = `${category} - ${name} - Quantity: ${quantity} - Price: ${amount}.`;
                orderList.appendChild(listItem);
            }
        });
    }

    function makeOrder() {
        // Check if the user has placed an order
        if (!hasExistingOrder()) {
            alert("You haven't placed an order yet. Please make an order first.");
            return; // Exit the function if no existing order
        }

        // Scroll to the top
        window.scrollTo(0, 0);

        // Define table number
        const tableNumber = 5;

        // Send the order data to the backend
        sendOrderToBackend(tableNumber);
    }
    
    function sendOrderToBackend(tableNumber) {
    // Check if the user is sure about the order
    if (!confirm("Are you sure with your order?")) {
        return; // If the user cancels, exit the function
    }

    // Retrieve order data
    const orders = getOrders();

    // Make an AJAX request to send orders to the backend
    fetch('/', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}' // Ensure you include your CSRF token here
        },
        body: JSON.stringify({ orders: orders, table: tableNumber }) // Include the table number and orders in the data object
    })
    .then(response => {
        if (response.ok) {
            alert("Your order has been placed for Table " + tableNumber + ". Please allow 5 to 10 minutes for your food to arrive.");
            location.reload(); // Reload the page after successful order placement
        } else {
            alert("Failed to place order. Please try again later.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Failed to place order. Please try again later.");
    });
    
    }

    function hasExistingOrder() {
        // Implement logic to check if the user has an existing order
        // For example, you might check if there are any items in the order list
        const orderList = document.getElementById('order-list');
        return orderList.children.length > 0;
    }

    function getOrders() {
        // Retrieve and format order data
        const inputs = document.querySelectorAll('.menu-section input[type="number"]');
        const orders = [];
        inputs.forEach(input => {
            const quantity = parseInt(input.value);
            if (quantity > 0) {
                const name = input.getAttribute('data-name');
                let amount = input.getAttribute('data-amount');
                const category = input.getAttribute('data-category');


                const order = {
                    name: name,
                    amount: amount,
                    quantity: quantity,
                    category: category // Include category in the order object
                };
                orders.push(order);
            }
        });
        return orders;
    }

    function incrementQuantity(inputId) {
        const inputElement = document.getElementById(inputId);
        inputElement.value = parseInt(inputElement.value) + 1;
        updateOrders();
    }

    function decrementQuantity(inputId) {
        const inputElement = document.getElementById(inputId);
        if (parseInt(inputElement.value) > 0) {
            inputElement.value = parseInt(inputElement.value) - 1;
            updateOrders();
        }
    }

    function showCategory() {
        const selectedCategory = document.getElementById('category-select').value;
        const sections = document.querySelectorAll('.menu-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });
        if (selectedCategory) {
            document.querySelectorAll(`#${selectedCategory}`).forEach(section => {
                section.style.display = 'block';
            });
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        // Hide all sections initially
        const sections = document.querySelectorAll('.menu-section');
        sections.forEach(section => {
            section.style.display = 'none';
        });
    });
</script>
</body>
</html>