<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<div class="main-content">
    <h1>Form điền thông tin</h1>
    <form method="post" action="{{ route('store') }}">
        {{ csrf_field() }}
        <label for="number">chỉ được nhập số</label>
        <input type="text" name="number">

        <button type="submit">Kiểm tra</button>
    </form>
</div>
</body>
</html> 