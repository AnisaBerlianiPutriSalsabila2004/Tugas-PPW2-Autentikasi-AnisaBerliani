<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Confirmation</title>
</head>
<body>
    <h1>Register Confirmation</h1>
    <p>Hii!, {{ $data->name }},</p>
    <p>Thankyou for register account</p>
    <p>Your account successfully created.</p>
    <p>Details :</p>
    <ul>
        <li><strong>Name :</strong> {{ $data->name }}</li>
        <li><strong>Email :</strong> {{ $data->email }}</li>
        <li><strong>Phone Number :</strong> {{ $data->phone }}</li>
    </ul>
    <p>Now, you can access our website with your account.</p>
</body>
</html>