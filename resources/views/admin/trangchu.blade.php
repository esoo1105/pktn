@extends('admin.index')
@section('content')
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h4>Hoạt động hôm nay</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col bg-success text-white text-center">
                <p>Số lượng tài khoản bác sĩ đã thêm</p>
                <p> {{ $bacsisAddedToday }} </p>
            </div>
            <div class="col bg-warning text-white text-center">
                <p>Số lượng tài khoản y tá đã thêm</p>
                <p> {{ $ytasAddedToday }} </p>
            </div>
            <div class="col bg-danger text-white text-center">
                <p>Số lượng bài viết đã thêm</p>
                <p> {{ $postsAddedToday }} </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mb-3">
            <div class="col">
                <h4>Thống kê</h4>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col border border-primary rounded">
                <p>Bác sĩ</p>
                <p>Số lượng: {{ $soluongbs }}</p>
            </div>
            <div class="col border border-secondary rounded">
                <p>Y tá </p>
                <p>Số lượng: {{ $soluongyt }} </p>
            </div>
            <div class="col border border-success rounded">
                <p>Bài viết</p>
                <p>Số lượng: {{ $soluongbv }} </p>
            </div>
        </div>
    </div>
@endsection
