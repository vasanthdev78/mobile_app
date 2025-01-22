<!-- Billing Form -->
<form id="billingForm" class="border p-3 mb-5 bg-light">
      <h4>Billing Form</h4>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="customerName" class="form-label">Customer Name</label>
          <input type="text" id="customerName" class="form-control" placeholder="Enter Customer Name" required>
        </div>
        <div class="col-md-6">
          <label for="customerMobile" class="form-label">Customer Mobile</label>
          <input type="text" id="customerMobile" class="form-control" placeholder="Enter Mobile Number" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="productName" class="form-label">Product Name</label>
          <input type="text" id="productName" class="form-control" placeholder="Enter Product Name" required>
        </div>
        <div class="col-md-3">
          <label for="quantity" class="form-label">Quantity</label>
          <input type="number" id="quantity" class="form-control" min="1" required>
        </div>
        <div class="col-md-3">
          <label for="price" class="form-label">Price (₹)</label>
          <input type="number" id="price" class="form-control" min="0" required>
        </div>
      </div>
      <button type="button" class="btn btn-primary" id="addToTable">Add to Bill</button>
    </form>