@extends('layouts.template')

@section('title', 'Edit Profile')

@section('content')

<div class="container-fluid min-vh-100 d-flex flex-column align-items-center justify-content-center position-relative">

    <!-- 名前：左上に固定 -->
    <div class="position-absolute top-0 start-0 p-4 name-container">
        <div class="rounded p-3 d-flex align-items-center">
            <h2 class="fw-bold me-4">Hello, {{ Auth::user()->full_name }}!</h2>
            <p class="user-header pt-2">{{ Auth::user()->user_number }}</p>
        </div>
    </div>

    <!-- フォーム：中央に配置 -->
    <div class="p-4 bg-white rounded-4 shadow edit-container">
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            {{-- @method('PUT') --}}

            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-user fa-lg mb-3 me-2"></i>
                <h2 class="mb-3">Edit Personal Information</h2>
            </div>

            @php
                $fields = [
                    'full_name' => 'Full Name',
                    'address' => 'Address',
                    'phone_number' => 'Phone',
                    'email' => 'E-mail',
                    'passport_number' => 'Passport number',
                    'emergency_contact_name' => 'Emergency contact (name)',
                    'emergency_contact_phone' => 'Emergency contact (phone)',
                ];
            @endphp

            @foreach ($fields as $field => $label)
                <div class="mb-3">
                    <label for="{{ $field }}" class="form-label mb-0">{{ $label }}</label>
                    <input type="text" class="form-control d-none" id="{{ $field }}" name="{{ $field }}" value="{{ Auth::user()->$field }}">
                    <div class="form-text edit-text" id="{{ $field }}_display">{{ Auth::user()->$field }}</div>
                    <div class="border-bottom pb-2 d-flex justify-content-between align-items-center">
                        <span></span>
                        <a href="#" class="text-decoration-none text-reset" onclick="enableEdit('{{ $field }}')">
                            <i class="fa-solid fa-pen fa-lg"></i>
                        </a>
                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn d-block mx-auto px-4 py-2 rounded-pill fw-bold text-white save-btn">SAVE</button>
        </form>
    </div>
</div>

<!-- 編集切り替え用JS -->
<script>
function enableEdit(field) {
    const input = document.getElementById(field);
    const display = document.getElementById(`${field}_display`);
    if (input && display) {
        input.classList.remove('d-none');
        display.style.display = 'none';
        input.focus();
    }
}
</script>

@endsection



