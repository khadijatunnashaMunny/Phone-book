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
    <h2 class="text-center p-3">PHONE BOOK</h2>
    @php
      $total=DB::table('shortlists')->count();
    @endphp

    <div class="p-5 float-sm-start float-lg-start ">
      <form action="/search" class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" name="query" class="form-control search-box" placeholder="Search">
          </div>
      </form>
    </div>
    <div class="p-5 float-sm-start float-lg-end ">

       <a href="/add_contact"> <button type="submit" class="btn btn-outline-dark">Add Contact</button></a>
       <a href="/shortList"> <button type="submit" class="btn btn-outline-dark">Short List({{$total}})</button></a>
       <a class="btn btn-outline-dark" href="{{url('/pdf_convert')}}">Convert PDF</a>

    </div>
    <div class=" p-5 float-lg-end ">
      @if(Session::has('user'))
        <div><a href="/logout">Logout({{Session::get('user')['name']}})</a></div>
      @else
        <div><a href="/signin">Login</a></div>
        <div><a href="/signup">Register</a></div>
      @endif
    </div>
    <div class="pt-5">
        

      <table class="table ">
      <thead>
          <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Photo</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php
              $contact_lists=DB::table('contacts')->get();
            @endphp

            @if($contact_lists)
            @foreach($contact_lists as $contact)
          <tr>
          <td>{{$contact->id}}</td>
            <td>{{$contact->name}}</td>
            <td>{{$contact->email}}</td>
            <td>{{$contact->phone}}</td>

            <td><img href="" height="60px" width="60px" src="{{ asset('uploads/images/'.$contact->photo) }}" alt=""></td>
            <td>
              <a href="/edit/{{$contact->id}}"><button  class="btn btn-success">Edit</button></a>
              <a href="/delete/{{$contact->id}}"><button  class="btn btn-danger">Delete</button></a>
              <a href="/contact_detail/{{$contact->id}}"><button  class="btn btn-primary">View</button></a>
            
            </td>
          </tr>
          @endforeach
              @endif
        </tbody>
      </table>
  
    </div>
   

</div>
@endsection()
