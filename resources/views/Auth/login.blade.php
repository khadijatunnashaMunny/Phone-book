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
        height: 400px;
        width: 350px;
        padding-top:20px;
        margin-top:5%;
        border-radius:6px;
      }
      </STYLE>
<form  method="POST" action="/loginhere">
    @csrf
 
    <div class="container center loginBox">
      <h2 class="text-center pt-3">SIGN IN</h2>
          <div class="mb-3 pt-5">
            <input  placeholder="Email address"  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror    
           </div>
          <div class="mb-3  ">
            <input placeholder="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div> 
         
          <div class="mb-1 pt-3 text-center">
            <button type="submit" class="btn btn-outline-dark">
              {{ __('Login') }}
            </button>          </div>
          <div class="text-center">
          <a  href="/signup">SIGNUP</a>
          </div>

    </div>
   </form>


	</body>
</html>













