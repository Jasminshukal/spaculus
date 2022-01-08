@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="text-center">{{ __('Profile') }}</h1>
            <div class="card div_login">

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
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
                                <a href='#' class='btn btn-danger' id='NAME' onclick="clone_input('#phone_base','#phone_container');">Add Phone</a>
                                {{-- @foreach ($user->phone_number as $item)
                                    <div class="col-md-12" id="phone_base">
                                        <label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label>
                                        <input  type="number" class="form-control" name="phone[]">
                                    </div>
                                @endforeach --}}

                                @forelse ($user->phone_number as $item)
                                    <div class="col-md-12" id="phone_base">
                                        <label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label>
                                        <input  type="text" class="form-control" name="phone[]" value="{{ $item->number }}">
                                    </div>
                                @empty
                                    <div class="col-md-12" id="phone_base">
                                        <label for="phone" class="col-form-label text-md-end">{{ __('Phone No') }}</label>
                                        <input  type="number" class="form-control" name="phone[]">
                                    </div>
                                @endforelse

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
