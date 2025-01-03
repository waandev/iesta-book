<!DOCTYPE html>
<html>

<head>
    <title>Membership Request</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; color: #333333;">
    <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #ffffff;">
        <h1 style="color: #333333;">Membership Request</h1>

        <p style="color: #666666;">Below is the membership request submitted by <strong>{{ $data['name'] }}</strong>:</p>

        <ul style="color: #666666;">
            <li><strong>Title:</strong>{{ $data['title'] }}</li>
            <li><strong>Highest Degree:</strong>{{ $data['degree'] }}</li>
            <li><strong>Current Institution:</strong>{{ $data['institution'] }}</li>
            <li><strong>Field of Work/Study:</strong>{{ $data['field'] }}</li>
            <li><strong>Name:</strong>{{ $data['name'] }}</li>
            <li><strong>Name of Current Institution:</strong>{{ $data['current_institution'] }}</li>
            <li><strong>Current Job Position:</strong>{{ $data['position'] }}</li>
            <li><strong>Email Address:</strong>{{ $data['email'] }}</li>
            <li><strong>Membership Type:</strong>{{ $data['membership_type'] }}</li>
        </ul>

        <p style="color: #666666;">Regards,<br>Muhammad Aswan</p>
    </div>
</body>

</html>
