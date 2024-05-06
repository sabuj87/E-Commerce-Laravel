

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECOM</title>
    <!-- Bootstrap CDN -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- font-awesome -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <!-- Line awesome -->
   <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/font-awesome-line-awesome/css/all.min.css">
   <!-- Google Font -->

   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

  

<!--    
    <link rel="stylesheet" href="{{asset('css/extra/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/extra/demo.css')}}">
    <link rel="stylesheet" href="{{asset('css/extra/skin.css')}}"> -->

    
    <!-- Plugin -->
   
    <link rel="stylesheet" href="{{asset('css/extra/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('magnific-popup/magnific-popup.css')}}">

</head>
<body>

<div  class="container-fluid ">
 <div  class="row " >
     <div style="height:1000px" class="col-md-6 mainColorBg">
      <!-- Logo -->
      <h3 class="text-white mt-3 text-center " style="font-weight: 700;" >ECOM</h3>

        

     </div>
     <div style="height:1000px " class="col-md-6 p-5 ">
      <h3>Register</h3>
      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" >

@csrf
<div class="whitebg radius5 p-3 mt-3 " >

   <label>First Name</label>
   <input class="inputCommon @error('first_name') errorinput @enderror "  name="first_name" type="text">
   
   @error('first_name')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror
   <label>Last Name</label>
   <input class="inputCommon @error('first_name') errorinput @enderror "  name="last_name" type="text">
   
   @error('first_name')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror
   <label>Phone No</label>
   <input class="inputCommon @error('phone_no') errorinput @enderror "  name="phone_no" type="number">
   
   @error('phone_no')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror

   <label>Street address</label>
   <input class="inputCommon @error('street_address') errorinput @enderror "  name="street_address" type="text">
   
   @error('street_address')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror
   <label>Email</label>
   <input class="inputCommon @error('email') errorinput @enderror "  name="email" type="email">
   
   @error('email')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror
   <label>Password</label>
   <input class="inputCommon @error('password') errorinput @enderror "  name="password" type="password">
   
   @error('password')

       <p class="mainColor" >{{ $message }}</p>
   
   @enderror
   
   <label>Confirm Password</label>
   <input class="inputCommon "  name="password_confirmation" type="password">


</div>

<div class="whitebg radius5 p-3 mt-3"  >

 <h5>Avater</h5>

 <label for="pimage1">
   <div style="position: relative; display: inline-block">
       <img id="pimg1"  onerror="this.src='{{asset('image/other/default.png')}}'" style="border: 1px solid #FF6E40 ;"  height="100px" width="100px" src="" alt="">

     <div style="width: 100px;text-align: center;font-size: 200%;position: absolute;top: 20px;" class="mainColor" >
      <i class="fa-solid fa-folder-open"></i>
     </div>
     <input onchange="pimg1.src=window.URL.createObjectURL(this.files[0])" name="image" id="pimage1" style="display:none" type="file">

   </div>

 </label>


 

</div>
<input type="submit" class="theme-btn mt-3 w-100 mx-2" value="Register"  >

</form>

      
      
      
    



        

     </div>


 </div>

</div>








<!-- Script with CDN -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.4/datatables.min.js"></script>
<!-- Main CSS -->

<script src="{{asset('js/extra/main.js')}}"></script>
<script src="{{asset('js/extra/demo.js')}}"></script>

 <!-- Plugin -->
 <script src="{{asset('js/extra/plugin/jquery.magnific-popup.min.js')}}"></script>
 <script src="{{asset('js/extra/plugin/owl.carousel.min.js')}}"></script>

</body>
</html>
