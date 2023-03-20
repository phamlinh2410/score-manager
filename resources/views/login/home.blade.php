<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <a href="{{ route('logout') }}">Đăng xuất</a>
    <br>
    Tên login: {{ $email }}
    <br>
    Thời gian login: {{ $loginTime }}
    <br>
    <table border="1">
        <tr>
            <th>Phòng học</th>
            <th>Giáo viên</th>
            <th>Môn học</th>
            <th>Sinh viên</th>
            <th>Điểm</th>
        </tr>
        <tr>
            <td><a href="#">Tìm kiếm</a></td>
            <td><a href="{{ route('teacher.index') }}">Tìm kiếm</a></td>
            <td><a href="{{ route('subject.index') }}">Tìm kiếm</a></td>
            <td><a href="#">Tìm kiếm</a></td>
            <td><a href="#">Tìm kiếm</a></td>
        </tr>
        <tr>
            <td><a href="#">Thêm mới</a></td>
            <td><a href="#">Thêm mới</a></td>
            <td><a href="#">Thêm mới</a></td>
            <td><a href="#">Thêm mới</a></td>
            <td><a href="#">Thêm mới</a></td>
        </tr>
    </table>
</body>
</html>