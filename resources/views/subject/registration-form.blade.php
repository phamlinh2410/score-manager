<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject Registration Form</title>
</head>
<body>
    <form action="{{ route('subject.register.confirm') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <table>
            <tr>
                <td>Tên môn học</td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td>Khóa học</td>
                <td>
                    <select name="school_year" id="school_year">
                        <option value=""></option>
                        <option value="Năm 1">Năm 1</option>
                        <option value="Năm 2">Năm 2</option>
                        <option value="Năm 3">Năm 3</option>
                        <option value="Năm 4">Năm 4</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mô tả chi tiết</td>
                <td><textarea name="description" id="description" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td>
                    <input type="file" name="avatar" id="avatar" accept="image/*" class="form-control-file">
                </td>
            </tr>
        </table>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>