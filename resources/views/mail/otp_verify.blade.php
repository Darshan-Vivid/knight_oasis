<!DOCTYPE html>
<html>
<head>
    <title>Your OTP for Email Verification</title>
</head>
<body>
    <table>
        <tr>
            <td>username</td>
            <td>:</td>
            <td>{{ $mailData['user_name'] }}</td>
        </tr>
        <tr>
            <td>email</td>
            <td>:</td>
            <td>{{ $mailData['email'] }}</td>
        </tr>
        <tr>
            <td>otp</td>
            <td>:</td>
            <td>{{ $mailData['otp'] }}</td>
        </tr>
    </table>
</body>
</html>
