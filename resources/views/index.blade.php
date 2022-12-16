@extends('base')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


<form action="">
<div class="row">
    <div class="col-sm-12">
      <h1 class="display-3"><!-- your title here --></h1>
      <div>
        <a style="margin: 19px;" href="{{route('create')}}" class="btn btn-primary">Add contact</a>
       </div>
       <div class="col-sm-12">
        <div class="alert alert-success">
          <!-- success message here -->
          @if(session() -> get('success'))
            <div class="alert alert-success">
                    {{ session() -> get('successs')}}
            </div>
        @endif
        </div>
      </div>

      <!-- table -->

      <table class="table table-striped" border="1">
            <thead>
                <tr>
                <td>Id</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>Jobtitle</td>
                  <td>City</td>
                  <td>Country</td>
                <td colspan="2">Actions</td>
                </tr>
            </thead>
            <tbody>
                @foreach( $contacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->first_name}} {{$contact->last_name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->job_title}}</td>
                    <td>{{$contact->city}}</td>
                    <td>{{$contact->country}}</td>

                    <td>
                        <a href="{{url('/edite',['id' => $contact->id])}}" class="btn btn-primary">Edite</a>
                    </td>

                    <td>

                    <form action="{{url('delete',['id' => $contact->id])}}" method="post">
                    @csrf
                    @method("DELETE")

                    <BUTTON class="btn btn-danger" type="submit">Delete</BUTTON>
                        </form>
                      </td>

                </tr>
                @endforeach
            </tbody>
        </table>
 </div>
</div>
</form>
