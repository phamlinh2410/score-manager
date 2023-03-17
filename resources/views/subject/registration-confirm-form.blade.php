<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Subject Registration Confirm Form</title>
</head>
<body>
    <form action="{{ route('subject.register.submit') }}" method="POST">
        @csrf

        <table>
            <tr>
                <td>Tên môn học</td>
                <td><input type="text" name="name" value="{{ $datas['name'] }}" readonly></td>
            </tr>
            <tr>
                <td>Khóa học</td>
                <td>
                    <input type="text" name="school_year" value="{{ $datas['schoolYear'] }}" readonly>
                </td>
            </tr>
            <tr>
                <td>Mô tả chi tiết</td>
                <td><textarea name="description" id="description" cols="30" rows="10" readonly>{{ $datas['description'] }}</textarea></td>
            </tr>
            <tr>
                <td>Avatar</td>
                <td>
                    {{-- <input type="hidden" name="avatar" value="{{ asset('avatar/' . $datas['avatar']) }}"> --}}
                    <img name="avatar" src="{{ asset('avatar/' . $datas['avatar']) }}" alt="avatar">{{ $datas['avatar'] }}
                </td>
            </tr>
        </table>
        <button onclick="location.href='{{ route('subject.register') }}'">Sửa lại</button>
        <button type="submit">Xác nhận</button>
    </form>
</body>
</html>