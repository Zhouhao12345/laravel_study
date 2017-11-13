<html>
<head>
    My first blade page
</head>
<body>
<h1>Create Post</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="/hello_from_form">
    <input name="name" type="text" placeholder="Name"/>
    <input name="email" type="text" placeholder="Email"/>
    <button type="submit">提交</button>
</form>

</body>
</html>