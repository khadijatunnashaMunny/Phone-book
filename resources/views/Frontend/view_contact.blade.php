
@extends('master')
@section('content')

<div class="container ">
    <h2 class="text-center p-3">PHONE BOOK</h2>
    <div class="p-5 float-sm-start float-lg-end ">

       <a href="/"> <button type="submit" class="btn btn-outline-dark">Back</button></a>

    </div>
    <div class="pt-5">
        <table class="table ">
            <thead>
                <tr>
                <th scope="col">Serial</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Photo</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td><img href="" height="100px" width="100px" src="{{ asset('uploads/images/'.$contact->photo) }}" alt=""></td>
                    <td>
                        <form action="/add_to_shortlist" method="POST">
                            @csrf
                            <input type="hidden" name="phone" value={{$contact['phone']}}>
                            <button class="btn btn-primary">Add to ShortList</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
  
    </div>
</div>

@endsection()










