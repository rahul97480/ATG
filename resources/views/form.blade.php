<!DOCTYPE html>
<html>
<head>
<title>Form </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

<h3>Form</h3>

<div class="container">
  <form id="contact_us" method ='get' action="javascript:void(0)">
  <div class="alert alert-sucess d-none" id="msg_div">
  <span id ="res_message"></span>
  </div>
  @csrf
    <label for="fname">Name</label><br>
    <input type="text" id="name" name="name" required="" placeholder="Your name..">

    <label for="lname"><br>Email</label><br>
    <input type="email" id="email" name="email" required="" placeholder="email">
    <span class="error"> {{session('msg')}}	</span>
              

    <label for="lname" ><br>Pincode</label><br>
    <input type="text" id="pincode" name="pincode" required="" minlength=6 maxlength=6 placeholder="pincode">
    <br>
    <input type="submit" id ="send_form" value="Submit">
    <span class="sucess"> {{session('sucess')}}	</span>
    
  </form>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
  <script>
  $(document).ready(function(){
    $('#send_form').click(function(e){
      e.preventDefault();
 $.ajaxSetup({

      headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

      }

  });

  $('#send_form').html('Sending..');

  $.ajax({

    url: '/submit' ,
    type: "POST",
    data: $('#contact_us').serialize(),
    sucess: function(response){
      $('#send_form').html('Submit');
      $('#res_message').show();
      $('#res_message').html(response.msg);
      $('#msg_div').removeClass('d-none');

      document.getElementById("#contact_us").reset();
      setTimeout(function(){
        $('#res_message').hide();
        $('#msg_div').hide();
      },10000);
    }

  });

});
  });
  </script>
</body>
</html>