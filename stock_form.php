<div class="modal fade" id="stockModal" tabindex="-1" aria-labelledby="stockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="stockModalLabel">Add/Edit Stock</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Stock Form -->
          <form id="stockForm">
            <input type="hidden" id="editRowIndex" value="">
            <div class="mb-3">
              <label for="productType" class="form-label">Product Type</label>
              <select class="form-select" id="productType" required>
                <option value="">Select Product Type</option>
                <option value="mobile">Mobile</option>
                <option value="accessory">Accessory</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control" id="productName" required>
            </div>
            <div class="mb-3">
              <label for="brand" class="form-label">Brand</label>
              <input type="text" class="form-control" id="brand">
            </div>
            <div class="mb-3">
              <label for="color" class="form-label">Color</label>
              <input type="text" class="form-control" id="color">
            </div>
            <div class="mb-3">
              <label for="storage" class="form-label">Storage</label>
              <input type="text" class="form-control" id="storage">
            </div>
            <div class="mb-3">
              <label for="quantity" class="form-label">Quantity</label>
              <input type="number" class="form-control" id="quantity" required>
            </div>
            <div class="mb-3">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" required>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
          </form>
        </div>
      </div>
    </div>
  </div>

