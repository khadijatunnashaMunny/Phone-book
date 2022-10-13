<!DOCTYPE html>
<html lang="en">
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Hello, world!</title>
    <link rel="stylesheet" href="{{url('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">

   
  </head>
	<body>
    <STYLE>
      .loginBox {
        background: #f9f9f9;
        box-shadow:2px 10px 15px #dee0e1;
        height: 500px;
        width: 350px;
        padding-top:10px;
        margin-top:5%;
        border-radius:6px;
      }
      </STYLE>
  <form method="POST" action="/register" >
    @csrf
 
    <div class="container center loginBox">
      <h2 class="text-center ">SIGN UP</h2>
          <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Full Name</label>
            <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" required aria-describedby="emailHelp">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div>
          <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Email address</label>
            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" required aria-describedby="emailHelp">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div> 
          <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Password</label>
            <input name="password" type="text" class="form-control @error('password') is-invalid @enderror" id="exampleInputEmail1" required aria-describedby="emailHelp">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div>
          <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Confirm Password</label>
            <input name="confirm_password" type="text" class="form-control @error('confirm_password') is-invalid @enderror" required id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror 
          </div>
         
          <div class="mb-1 pt-3 text-center">
            <button type="submit" class="btn btn-outline-dark">SUBMIT</button>
          </div>
          <div class="text-center">
          <a  href="/signin">SIGNIN</a>
          </div>

    </div>
   </form>


	</body>
</html>

