@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Profile') }}</h1>
            <div class="card div_login">

                <div class="card-body">
                    <form method="POST" action="{{ route('UpdateProfile',$user->id) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="first_name" class="col-form-label text-md-end">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" required autocomplete="name" autofocus>

                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="last_name" class="col-form-label text-md-end">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" required autocomplete="name" autofocus>

                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">

                            <div class="col-md-12">
                                <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12" id="phone_container">
                                @forelse ($user->phone_number as $item)
                                    <div class="col-md-12" id="phone_base_{{ $item }}" style="display: flex; align-items: flex-end;">
                                        <div class="col-md-9">
                                            <label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label>
                                            <input type="text" class="form-control" name="phone[]" value="{{ $item }}">
                                        </div>
                                        <div class="col-md-3" style="display: flex; justify-content: space-around;">
                                            <a href='#' class='btn btn-info' id='NAME' onclick="clone_input('phone','#phone_container');">Add Phone</a>
                                            <a href="#" class="btn btn-danger" onclick="remove_el('phone_base_{{ $item }}');">Remove</a>
                                        </div>
                                    </div>
                                @empty
                                <div class="col-md-12" id="phone_base" style="display: flex; align-items: flex-end;">
                                        <div class="col-md-9">
                                            <label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label>
                                            <input  type="number" class="form-control" name="phone[]">
                                        </div>
                                        <div class="col-md-3" style="display: flex; justify-content: space-around;">
                                            <a href='#' class='btn btn-info' id='NAME' onclick="clone_input('phone','#phone_container');">Add Phone</a>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-12 mb-2" id="image_container">
                                    <div class="col-md-12" id="image_base" style="display: flex; align-items: flex-end;">
                                        <div class="col-md-9">
                                            <label for="phone" class="col-form-label text-md-end">{{ __('Image') }}</label>
                                            <input  type="file" class="form-control" name="image[]">
                                        </div>
                                        <div class="col-md-3" style="display: flex; justify-content: space-around;">
                                            <a href='#' class='btn btn-info' id='NAME' onclick="clone_input('image','#image_container');">Add Image</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="div" style="display: flex;
                                justify-content: flex-start;
                                align-content: space-between;
                                align-items: center;
                                flex-wrap: nowrap;">
                                    @foreach ($user->image as $item)
                                    <div class="remove" id="remove_el_{{ $loop->index }}" style="margin: 1%;">
                                        <img src="{{ asset($item) }}" alt="" style="width:150px;">
                                        <a href='#' class='btn btn-danger' id='NAME' style="position: absolute; border-radius: 30%; margin-left: -23px; margin-top: -14px;" onclick="remove_el('remove_el_{{ $loop->index }}');">-</a>
                                        <input type="hidden" name="old_file[]" value="{{ $item }}">
                                    </div>
                                    @endforeach
                                </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
<script>
    function clone_input(type,to){
        if(type=="phone")
        {
            $(to).append('<div class="col-md-12" id="phone_base"><label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label><input  type="number" class="form-control" name="phone[]"></div>');
        }
        else
        {

            $(to).append('<div class="col-md-12" id="image_base"><label for="phone" class="col-form-label text-md-end">{{ __('Image') }}</label><input type="file" class="form-control" name="image[]"></div>');
        }
        alert('clon');
    }

    function remove_el(value)
    {
        $("#"+value).remove();
    }
</script>
@endsection
