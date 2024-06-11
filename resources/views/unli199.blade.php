
<div id="samgyup199" class="menu-section container mt-5">
  <!-- Dishes for Unli Samgyup 199 go here -->
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/lettuce.jpg')}}" class="order-image" alt="Lettuce">
      </div>
      <div class="order-details">
          <h5>Lettuce</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity1')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity1" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity1')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/corn.jpg')}}" class="order-image" alt="Buttered Corn">
      </div>
      <div class="order-details">
          <h5>Buttered Corn</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity2')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity2" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity2')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/rice.jpg')}}" class="order-image" alt="Rice">
      </div>
      <div class="order-details">
          <h5>Rice</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity3')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity3" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity3')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/fishcake.jpg')}}" class="order-image" alt="Fish Cake">
      </div>
      <div class="order-details">
          <h5>Fish Cake</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity4')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity4" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity4')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/kimchi.jpg')}}" class="order-image" alt="Kimchi">
      </div>
      <div class="order-details">
          <h5>Kimchi</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity5')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity5" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity5')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/porkplain.jpg')}}" class="order-image" alt="Pork Plain">
      </div>
      <div class="order-details">
          <h5>Pork Plain</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity6')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity6" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity6')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <div class="order-section">
      <div class="order-image-container">
          <img src="{{asset('images/saltandpepper.jpg')}}" class="order-image" alt="Pork Salt and Pepper">
      </div>
      <div class="order-details">
          <h5>Pork Salt and Pepper</h5>
          <div class="quantity-controls">
              <button class="quantity-btn minus-btn" onclick="decrementQuantity('quantity7')">-</button>
              <div class="quantity-input-container">
                  <input type="number" id="quantity7" class="form-control" value="0" min="0" onchange="updateOrders()">
              </div>
              <button class="quantity-btn plus-btn" onclick="incrementQuantity('quantity7')">+</button>
          </div>
          <h6>Unlimited</h6>
      </div>
  </div>
  <!-- Add more dishes here for Unli Samgyup 199 -->
</div>