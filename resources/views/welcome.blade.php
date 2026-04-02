@extends('layouts.app')

@section('content')
<h1>Welcome to My Laravel App</h1>
<p>This is the homepage. Save your email below and see it immediately!</p>

<form method="POST" action="/">
    @csrf
    <div>
        <label>First Name</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
    </div>
    <div>
        <label>Last Name</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
    </div>
    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>
    <button type="submit">Save</button>
</form>

@if(session('success'))
    <p style="color: lightgreen">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

@if ($errors->any())
    <ul style="color: red">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<h3>Saved Emails:</h3>
<ul>
    @foreach(session('emails', []) as $index => $email)
        <li>
            {{ $email }}
            <form method="POST" action="/emails/{{ $index }}" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" style="background:red;color:white;">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
@endsection