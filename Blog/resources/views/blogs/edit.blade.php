@extends('blogs.home')

<!-- @section('name', 'Cập nhật bài viết') -->

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2>Cập nhật công việc</h2>
        </div>

        <div class="col-md-12">
            <form method="post" action="{{ route('Blogs.update', $blog->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên công việc</label>
                    <input type="text" class="form-control" name="name" value="{{ $blog->name }}" required>
                </div>

                <div class="form-group">
                    <label>Ảnh</label>
                    <input type="file" name="image" class="form-control-file" >
                    <!-- <img src="{{ ('images/'.$blog->image) }}"> -->
                </div>

                <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" rows="3" name="content"  required>{{ $blog->content }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy</button>
            </form>
        </div>
    </div>
@endsection