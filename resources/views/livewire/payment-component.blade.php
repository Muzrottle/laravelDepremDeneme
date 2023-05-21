
  
  <!-- Add the following CSS in the head of your HTML file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Add the following JavaScript in the head of your HTML file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
  $(function () {
    $('#expiration').datepicker({
      format: 'mm/yyyy',
      autoclose: true,
      startView: 'year',
      minViewMode: 'months'
    });
  });
</script>

<div class="form-container">
    <div class="form-wrapper">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form method="POST" action="">
            <div class="form-group">
              <label for="cardnumber">Credit Card Number:</label>
              <input type="text" class="form-control" id="cardnumber" name="cardnumber" placeholder="Enter your credit card number" aria-describedby="cardnumber-description" required maxlength="19" onkeypress="return isNumeric(event)">
              <small id="cardnumber-description" class="form-text text-muted">Please enter your 16-digit credit card number.</small>
            </div>
            <div class="form-group">
              <label for="cardname">Cardholder Name:</label>
              <input type="text" class="form-control" id="cardholder" name="cardholder" placeholder="Enter cardholder name" aria-describedby="cardholder-description" required onkeypress="return isLetter(event)">
              <small id="cardname-description" class="form-text text-muted">Please enter the name on your credit card.</small>
            </div>
            <div class="form-group row">
                <div class="col-6">
                  <label for="cvv">CVV:</label>
                  <input type="text" class="form-control" id="cvv" name="cvv" pattern="[0-9]{3}" placeholder="Enter the 3-digit CVV code" aria-describedby="cvv-description" required maxlength="3" onkeypress="return isNumeric(event)">
                  <small id="cvv-description" class="form-text text-muted">Please enter the 3-digit CVV code on the back of your credit card.</small>
                </div>
                <div class="col-6">
                  <label for="expiration">Expiration Date:</label>
                  <input type="month" class="form-control" id="expiration" name="expiration" placeholder="MM / YYYY" aria-describedby="expiration-description" required>
                  <small id="expiration-description" class="form-text text-muted">Please enter the expiration date in MM / YYYY format.</small>
                </div>
              </div>
            <div class="form-group">
              <label for="amount">Amount:</label>
              <div class="input-group">
                <input type="text" name="amount" id="amount" class="form-control" placeholder="0.00" maxlength="5" required>
                <div class="input-group-prepend">
                  <span class="input-group-text">₺</span>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @php
              // Retrieve the value of the myVariable parameter from the URL
              $myVariable = isset($_GET['myVariable']) ? urldecode($_GET['myVariable']) : 'undefined';
              
              // Use the value of the variable
              echo "The value of myVariable is: " . $myVariable;
          @endphp
        </div>
      </div>
    </div>
  </div>
  
  <script>
    // Get the credit card number input element
    const creditCardNumberInput = document.getElementById('cardnumber');
  
    // Add an event listener for when the user types in the credit card number input
    creditCardNumberInput.addEventListener('input', (event) => {
      // Remove all non-digit characters from the input value
      const inputValue = event.target.value.replace(/\D/g, '');
  
      // Add hyphens to the input value
      const formattedValue = inputValue.replace(/(\d{4})/g, '$1 ').trim();
  
      // Set the formatted value as the input value
      event.target.value = formattedValue;
    });
  </script>
  