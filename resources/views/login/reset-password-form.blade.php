<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset Password</title>
</head>
<body>
    <form action="#" method="post">
        @csrf
        <table>
            <tr>
                <td>Người dùng</td>
                <td><input type="text"></td>
            </tr>
        </table>
        <button type="submit">Gửi yêu cầu reset password</button>
    </form>
</body>
</html>