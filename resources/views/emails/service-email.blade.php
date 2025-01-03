<!DOCTYPE html>
<html>

<head>
    <title>Message from {{ $data['name'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            padding: 20px;
            margin: 0;
        }

        h2 {
            font-size: 28px;
            margin-top: 0;
            color: #337ab7;
            border-bottom: 2px solid #337ab7;
            padding-bottom: 10px;
        }

        p {
            font-size: 18px;
            margin: 10px 0;
        }

        strong {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>{{ $data['name'] }} has sent you a message</h2>
    <p><strong>Name:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Institution:</strong> {{ $data['institution'] }}</p>
    <p><strong>Message:</strong></p>
    <p>{{ $data['messages'] }}</p>
</body>

</html>
