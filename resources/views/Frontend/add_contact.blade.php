@extends('master')
@section('content')



<div class="container ">
    <STYLE>
      .loginBox {
        background: #f9f9f9;
        box-shadow:2px 10px 10px #dee0e1;
        height: 500px;
        width: 550px;
        padding-top:10px;
        margin-top:5%;
        margin-bottom:5%;
        border-radius:6px;
      }
      </STYLE>
    <h2 class="text-center pt-5">PHONE BOOK</h2>

    <div class="p-5 float-sm-start float-lg-end ">

       <a href="/"> <button type="submit" class="btn btn-outline-dark">Back</button></a>

    </div>
    <div >
    <form method="POST" action="/contactSubmit" enctype="multipart/form-data">
    @csrf
        <div class="container loginBox ">
            <div class="mb-3 pt-5">
                <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Full Name</label>
                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Email address</label>
                <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div> 
            <div class="mb-3 ">
                <label for="exampleInputEmail1" class="form-label text-black-50 fw-bolder">Phone No</label>
                <input name="phone" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="formFileMultiple" class="form-label text-black-50 fw-bolder">Image Upload</label>
                <input  name="photo" class="form-control" type="file" id="formFileMultiple" >
            </div>
            <div class="mb-1 pt-3 text-center">
                <button type="submit" class="btn btn-outline-dark">ADD CONTACT</button>
            </div>

           

        </div>
    </form>
    </div>
   

</div>
@endsection()
