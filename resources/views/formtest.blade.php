@extends('layouts.app')

@section('content')
<h1>Email Form Test</h1>

<form action="/emails" method="POST">
    @csrf
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email') }}" required>
    <button type="submit">Save</button>
</form>

@if(session('success'))
    <p style="color:green;">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color:red;">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <ul style="color:red;">
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h3>Saved Emails:</h3>
<ul>
@foreach(session('emails', []) as $i => $email)
    <li>
        {{ $email }}
        <form action="/emails/{{ $i }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" style="background-color:#dc3545;">Delete</button>
        </form>
    </li>
@endforeach
</ul>
@endsection