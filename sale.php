<!doctype html>
<html lang="en">

<?php include("head.php");?>
<?php include("bash/function.php");?>

<body>
    
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
			<?php include("left.php");?>
		<!--end sidebar wrapper -->
		<!--start header -->
			<?php include("top.php");?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				
            <!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Components</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="branch.php"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Cards</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#stockModal">Add</button>
							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->

                <!-- Selling Table -->

                <?php include "sale_form.php" ?>
    <h4>Bill Details</h4>
    <table id="sellingTable" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price (₹)</th>
          <th>Total (₹)</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <!-- Total Amount -->
    <div class="text-end">
      <h4 id="totalAmount">Total: ₹0.00</h4>
      <button class="btn btn-success" id="downloadBill">Download Bill</button>
    </div>
  </div>


		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		 <div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button-->
		  <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<?php include "footer.php" ?>
	</div>
	<!--end wrapper-->


	<!-- search modal -->
      <!-- end search modal -->




	<!--start switcher-->

	<!--end switcher-->
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
	
    <script>
    $(document).ready(function () {
      const table = $('#sellingTable').DataTable();
      let totalAmount = 0;

      // Add item to the table
      $('#addToTable').on('click', function () {
        const productName = $('#productName').val();
        const quantity = parseInt($('#quantity').val());
        const price = parseFloat($('#price').val());

        if (!productName || quantity <= 0 || price <= 0) {
          alert("Please fill out all fields correctly.");
          return;
        }

        const total = quantity * price;
        totalAmount += total;

        table.row.add([
          table.rows().count() + 1,
          productName,
          quantity,
          price.toFixed(2),
          total.toFixed(2),
          `<button class="btn btn-danger btn-sm delete-btn">Delete</button>`
        ]).draw();

        // Update total amount
        $('#totalAmount').text(`Total: ₹${totalAmount.toFixed(2)}`);

        // Clear form fields
        $('#productName').val('');
        $('#quantity').val('');
        $('#price').val('');
      });

      // Delete item from the table
      $('#sellingTable').on('click', '.delete-btn', function () {
        const row = table.row($(this).closest('tr'));
        const rowData = row.data();
        const total = parseFloat(rowData[4]);
        totalAmount -= total;

        row.remove().draw();
        $('#totalAmount').text(`Total: ₹${totalAmount.toFixed(2)}`);
      });

      // Download bill as text file
      $('#downloadBill').on('click', function () {
        let billContent = "Customer Bill\n\n";
        billContent += "Product Name\tQuantity\tPrice\tTotal\n";

        table.rows().every(function () {
          const rowData = this.data();
          billContent += `${rowData[1]}\t${rowData[2]}\t₹${rowData[3]}\t₹${rowData[4]}\n`;
        });

        billContent += `\nTotal Amount: ₹${totalAmount.toFixed(2)}`;

        // Create a downloadable file
        const blob = new Blob([billContent], { type: "text/plain" });
        const url = URL.createObjectURL(blob);
        const a = document.createElement('a');
        a.href = url;
        a.download = "bill.txt";
        a.click();
        URL.revokeObjectURL(url);
      });
    });
  </script>

    <script>
		$(document).ready(function() {
    var table = $('#stockTable').DataTable({
        //responsive: true, // Enable responsive mode
        lengthChange: false,
    });

	  // Handle Add/Edit form submission
      $('#stockForm').on('submit', function (e) {
        e.preventDefault();
        const productType = $('#productType').val();
        const productName = $('#productName').val();
        const brand = $('#brand').val();
        const color = $('#color').val();
        const storage = $('#storage').val();
        const quantity = $('#quantity').val();
        const price = $('#price').val();
        const editRowIndex = $('#editRowIndex').val();

        if (editRowIndex) {
          // Edit existing row
          const row = table.row(editRowIndex);
          row.data([
            editRowIndex + 1,
            productType,
            productName,
            brand,
            color,
            storage,
            quantity,
            price,
            `<button class="btn btn-warning btn-sm edit-btn">Edit</button>
             <button class="btn btn-danger btn-sm delete-btn">Delete</button>`
          ]).draw();
        } else {
          // Add new row
          table.row.add([
            table.rows().count() + 1,
            productType,
            productName,
            brand,
            color,
            storage,
            quantity,
            price,
            `<button class="btn btn-warning btn-sm edit-btn">Edit</button>
             <button class="btn btn-danger btn-sm delete-btn">Delete</button>`
          ]).draw();
        }

        $('#stockModal').modal('hide');
        $('#stockForm')[0].reset();
        $('#editRowIndex').val('');
      });

      // Handle Edit button click
      $('#stockTable').on('click', '.edit-btn', function () {
        const row = table.row($(this).closest('tr'));
        const rowData = row.data();
        $('#editRowIndex').val(row.index());
        $('#productType').val(rowData[1]);
        $('#productName').val(rowData[2]);
        $('#brand').val(rowData[3]);
        $('#color').val(rowData[4]);
        $('#storage').val(rowData[5]);
        $('#quantity').val(rowData[6]);
        $('#price').val(rowData[7]);
        $('#stockModal').modal('show');
      });

      // Handle Delete button click
      $('#stockTable').on('click', '.delete-btn', function () {
        table.row($(this).closest('tr')).remove().draw();
      });


});
	</script>

<!-- <script>
    // Handle form submission
    document.getElementById('stockForm').addEventListener('submit', function (e) {
      e.preventDefault(); // Prevent page reload

      // Collect form data
      const formData = new FormData(this);

      const stockData = {
        productType: formData.get('productType'),
        productName: formData.get('productName'),
        brand: formData.get('brand'),
        color: formData.get('color'),
        storage: formData.get('storage'),
        quantity: formData.get('quantity'),
        price: formData.get('price'),
        class: formData.get('class'),
        compatibleWith: formData.get('compatibleWith'),
      };

      // Display the collected data (simulating backend storage)
      console.log('Stock Data:', stockData);

      // Close the modal
      const modal = bootstrap.Modal.getInstance(document.getElementById('stockModal'));
      modal.hide();

      // Reset the form
      this.reset();
    });
  </script> -->

<script>
    $(document).ready(function () {
      const table = $('#stockTable').DataTable();

    
    });
  </script>


	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	
</body>

</html>