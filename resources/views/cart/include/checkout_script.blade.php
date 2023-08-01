@push('js')
<script>
    $(document).ready(function(){
      $('.card-section').hide();
    });
  </script>
  <script src="https://js.stripe.com/v3/"></script>
  <script>
    // just for the demos, avoids form submit
    jQuery.validator.setDefaults({
      debug: true,
      success: "valid"
    });
  
    var form = $( "#regForm" );
    $( ".btn_3" ).click(function() {
      $('.card-section').hide();
      var form_valid = form.valid();
      if(form_valid)
      {
          if($("#agree-option").is(':checked'))
          {
            $('#form_submit').hide();
            $('.card-section').show();
            open_card();
          }
          else
          {
            toastr.error('Accept the terms & Condition to proceed');
          }
      }
      else
      {
        toastr.error('Fill all the billing details required fields');
      }
    });
  
    $("#agree-option").change(function(){
        var form_valid = form.valid();
        if($("#agree-option").is(':checked'))
        {
          $('#form_submit').show();
          //$('.card-section').show();
        }
        else
        {
            $('.card-section').hide();
            toastr.error('Accept the terms & Condition to proceed');
        }
    })
    </script>
    <script>
      function open_card()
      {
       
        const stripe = Stripe('{{ env('STRIPE_KEY') }}')
    
        const elements = stripe.elements()
        const cardElement = elements.create('card')
  
        cardElement.mount('#card-element')
  
        const form = document.getElementById('regForm')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')
  
        form.addEventListener('submit', async (e) => {
            e.preventDefault()
  
            // cardBtn.disabled = true
            const { setupIntent, error }  = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }   
                    }
                }
            )
  
            if(error) {
                console.log(error);
                // cardBtn.disable = false
            } else {
                let token = document.createElement('input')
                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)
                form.appendChild(token)
                form.submit();
            }
  
        })
  
      }
    </script>
    <script> 
        $("#regForm").validate({
            rules: {
                first_name: "required",
                last_name: "required",
                mobile_number: "required",
                email: "required",
                addr1: "required",
                city: "required",
                // zip: "required",
            },
            messages : {
                first_name : "First Name is required",
                last_name : "Last Name is required",
                mobile_number : "Mobile Number is required",
                email : "Email is required",
                addr1 : "Address is required",
                city : "City is required",
                // zip : "ZipCode is required",
            }
        });    
  </script>
  @endpush