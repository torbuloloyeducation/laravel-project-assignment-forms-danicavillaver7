<!DOCTYPE html>
<html>
<head>
    <title>Email Form</title>
</head>
<body>

<form method="POST" action="/emails">
    @csrf
    <input type="text" name="email" placeholder="Enter email">
    <button type="submit">Add</button>
</form>

<h3>Saved Emails:</h3>
<ul>
    @foreach($emails as $email)
        <li>{{ $email }}</li>
    @endforeach
</ul>

</body>
</html>