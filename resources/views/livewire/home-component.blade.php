<head>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/jquery-ui.js"></script>
</head>

<div class="site-section">
    <div class="container">

      <div class="row">
        @foreach ($donations as $donation)
    <div class="col-md-3">
        <div class="cause shadow-lg">
        
          <a href="#" class="cause-link d-flex">
            <span class="stock badge-warning py-1 small px-2 rounded mb-3">Stok: {{$donation->stock}}</span>
            <img src="{{ asset('images/'.$donation->image) }}" alt="Image" class="img-fluid">
            <div class="custom-progress-wrap">
                <span class="caption"></span>
                <div class="custom-progress-inner">
                    <div class="custom-progress bg-info" data-needed="{{ $donation->neededDonationMoney }}" data-donated="{{ $donation->donatedMoney }}"></div>
                </div>
            </div>
        </a>

          <div class="px-3 pt-3 border-top-0">
            <span class="state py-1 small px-2 rounded mb-3 d-inline-block" data-value="{{ $donation->stock }}"></span>
            <h3 class="mb-1"><a href="#">{{$donation->donationType}}</a></h3>
            <div class="donation py-2 d-flex" style="flex-direction: column;">
              <div class="ml-auto"><strong style="color:rgb(43, 205, 14)">{{$donation->donatedMoney}} / {{$donation->neededDonationMoney}} ₺</strong></div>
              <button class="btn py-1 small px-2 rounded mb-3 d-inline-block" data-toggle="modal" data-target="#{{$donation->donationType}}Modal">Bağış Yap</button>
            </div>
          </div>

            <!-- Modal -->
            <div class="modal fade" id="{{$donation->donationType}}Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle" style="font-weight: bold">{{ $donation->donationType }} Bağışı</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-container">
                      <div>
                        <form method="POST" action="">
                          @csrf
                          <input type="hidden" name="donationType" value="{{ $donation->donationType }}">
                          <div class="form-group">
                            <label for="cardnumber">Credit Card Number:</label>
                            <input type="text" class="form-control form-card-number" id="cardnumber" name="cardnumber" placeholder="Enter your credit card number" aria-describedby="cardnumber-description" required maxlength="19" onkeypress="return isNumeric(event)">
                            <small id="cardnumber-description" class="form-text text-muted">Please enter your 16-digit credit card number.</small>
                          </div>
                          <div class="form-group">
                            <label for="cardname">Cardholder Name:</label>
                            <input type="text" class="form-control" id="cardholder" name="cardholder" placeholder="Enter cardholder name" aria-describedby="cardholder-description" required>
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
                          <div class="modal-footer">
                            <button type="submit" class="btn small rounded d-inline-block">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        
        </div>
    </div>
@endforeach

      </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
        // Event listener for form submission
        $('.modal-content form').on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            // Extract form data
            var formData = $(this).serialize();
            var donationType = $(this).find('input[name="donationType"]').val();
            var amount = parseFloat($(this).find('input[name="amount"]').val());

            // Perform calculations
            var donatedMoney = parseFloat($(`.cause-link[data-donationtype="${donationType}"] .donatedMoney`).text());
            var neededDonationMoney = parseFloat($(`.cause-link[data-donationtype="${donationType}"] .neededDonationMoney`).text());
            var stock = parseInt($(`.cause-link[data-donationtype="${donationType}"] .stock`).text());
            
            donatedMoney += amount;
            var achievedTimes = Math.floor(donatedMoney / neededDonationMoney);
            var remainingDonatedMoney = donatedMoney % neededDonationMoney;
            stock += achievedTimes;

            // Send form data to the server using AJAX
            $.ajax({
                url: $(this).attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    // Update the UI or perform any necessary actions
                    $(`.cause-link[data-donationtype="${donationType}"] .donatedMoney`).text(donatedMoney.toFixed(2));
                    $(`.cause-link[data-donationtype="${donationType}"] .stock`).text(stock);
                    
                    alert(`Thank you for your donation!`);
                    location.reload();
                },
                error: function(xhr, status, error) {
                    // Handle the error, if any
                }
            });
        });
    });
</script>


  <script>
    var progressElements = document.getElementsByClassName("custom-progress");

Array.from(progressElements).forEach(function(progressElement) {
    var neededDonation = parseInt(progressElement.getAttribute('data-needed'));
    var donatedMoney = parseInt(progressElement.getAttribute('data-donated'));

    var fundRate = (donatedMoney / neededDonation) * 100;
    var captionElement = progressElement.closest('.cause-link').querySelector('.caption');

    progressElement.style.width = fundRate + '%';
    captionElement.textContent = fundRate.toFixed(0) + '% tamamlandı';
});
  </script>

<script>
  // Access each <span> element with the class 'your-span-class' and perform actions based on the data attribute value
    var spanElements = document.getElementsByClassName('state');

    Array.from(spanElements).forEach(function(spanElement) {
        var dataValue = parseInt(spanElement.getAttribute('data-value'));

        // Check the value and add a class based on the condition
        if (dataValue > 10) {
          spanElement.classList.add('badge-success');
          spanElement.textContent = 'Yüksek';
        }else if (dataValue < 4){
          spanElement.classList.add('badge-danger');
          spanElement.textContent = 'Kritik';
        }else{
          spanElement.classList.add('badge-warning');
          spanElement.textContent = 'Dengeli';
        }
    });
</script>

<script>
  // Add a delegated event listener for the 'input' event on the document
  document.addEventListener('input', function(event) {
    // Check if the event target has the 'form-card-number' class
    if (event.target.classList.contains('form-card-number')) {
      // Remove all non-digit characters from the input value
      const inputValue = event.target.value.replace(/\D/g, '');

      // Add hyphens to the input value
      const formattedValue = inputValue.replace(/(\d{4})/g, '$1 ').trim();

      // Set the formatted value as the input value
      event.target.value = formattedValue;
    }
  });
</script>