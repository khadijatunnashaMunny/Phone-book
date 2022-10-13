@extends('master')
@section('content')
<div class="container ">

    <div class="p-5 float-sm-start float-lg-end ">
        <a href="/"> <button type="submit" class="btn btn-outline-dark">Back</button></a>
        <a href="/add_contact"> <button type="submit" class="btn btn-outline-dark">Add Contact</button></a>
    </div>
    
    <div class="pt-5">
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Photo</th>
                </tr>
            </thead>
            <tbody>
            @foreach($contacts as $contact)

                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>

                    <td><img href="" height="60px" width="60px" src="{{ asset('uploads/images/'.$contact->photo) }}" alt=""></td>
                   
                </tr>
                @endforeach
            </tbody>
        </table>
  
    </div>

</div>

@endsection()
