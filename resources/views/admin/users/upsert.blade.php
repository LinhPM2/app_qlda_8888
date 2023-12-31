@extends('admin.main')
@section('content')
    <a href="{{ url()->previous() }}" class="mt-3 ml-3"><span><i class="fa fa-chevron-left"></i> Go Back</span></a>
    <div class="mx-3 my-2">
        <form action="{{ $form_target }}" method="POST">
            @method($method)
            <div>
                <div class="px-4">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="field_name" class="">Tên người dùng:</label>
                            <input type="text" id="field_name" name="name" class="form-control"
                                @if (!empty($user)) value="{{ $user->name }}" @endif required>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="editRole" class="">Role người dùng:</label>
                            <select class="form-select custom-select" id="editRole" name="roles"
                                aria-label="User's role">
                                @foreach ($roles as $key => $value)
                                    <option value="{{ $key }}"
                                        @if (url()->current() == route('users.create') && $key == __('roles.user')) selected="selected"
                                        @else
                                            @if (!empty($user) && $key == $user->roles)
                                            selected="selected" @endif
                                        @endif>{!! $value !!}
                                    </option>
                                @endforeach
                            </select>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <label for="field_email" class="">Email người dùng: </label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="email" id="field_email" name="email" class="form-control"
                        @if (!empty($user)) value="{{ $user->email }}" @endif required>
                    @if (url()->current() == route('users.create'))
                        <label for="password" class="">Set password for this account:</label>
                        <input type="password" id="password" name="password" class="form-control" required>
                        <label for="confirm_password" class="">Password confirmation</label>
                        <input type="password" id="confirm_password" name="password_confirmation"
                            class="form-control @error('password') is-invalid @enderror" required>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    @endif
                    <div class="justify-content-between mt-3 mb-4">
                        <a href="{{ route('users.list') }}" class="btn btn-danger text-white">Close</a>
                        <input type="submit" class="btn btn-outline-dark" value="Save"></input>
                    </div>
                </div>
            </div>
            @csrf
        </form>
    </div>
@endsection

