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
  <form method ='POST' action="{{url('submit')}}">
  @csrf
    <label for="fname">Name</label><br>
    <input type="text" id="name" name="name" required="" placeholder="Your name..">

    <label for="lname"><br>Email</label><br>
    <input type="email" id="email" name="email" required="" placeholder="email">
    <span class="error"> {{session('msg')}}	</span>
              

    <label for="lname" ><br>Pincode</label><br>
    <input type="text" id="pincode" name="pincode" required="" minlength=6 maxlength=6 placeholder="pincode">
    <br>
    <input type="submit" value="Submit">
    <span class="sucess"> {{session('sucess')}}	</span>
    
  </form>
</div>

</body>
</html>