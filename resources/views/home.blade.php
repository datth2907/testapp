@extends('layout.master')
@section('content')
<main class="container">
    <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
    8. Nguyên tắc khi sử dụng IAM
Không được sử dụng root account trừ khi dùng cho việc setup account đó
1 Người dùng vật lý = 1 AWS user
Gán user vào groups và gán permissions vào groups.
Tạo 1 chính sách mật khẩu mạnh
Bắt buộc sử dụng MFA
Tạo và sử dụng Roles khi cấp các quyền cho các dịch vụ AWS
Sử dụng Access Keys khi truy cập IAM (CLI/SDK)
Kiểm tra permissions cho account thông qua IAM Credential Report
Không được phép share IAM users & Access Keys
    </div>

    <div class="row mt-5">
        @foreach ($collection as $item)
            @if ($item['public'])
            <div class="col-md-4">                  
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">{{$item['content']}}</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-md-4">                  
                <div class="card" style="background-color:gray; width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">{{ $item['title'] }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    <p class="card-text">{{$item['content']}}</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                    </div>
                </div>
            </div>    
            @endif            
        @endforeach
    </div>

</main>
@endsection