function restrictPreviousDate(inputId) {
    // Get the input element by ID
    var inputElement = document.getElementById(inputId);

    // Check if the input element exists and is of type "date"
    if (inputElement && inputElement.type === "date") {
        // Get today's date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0]; // Format: YYYY-MM-DD

        // Set the min attribute to today's date, restricting previous dates
        inputElement.setAttribute("min", today);
    } else {
        console.log("The input is not of type 'date' or does not exist.");
    }
}



