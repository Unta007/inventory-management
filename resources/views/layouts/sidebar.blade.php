@php
$currentRouteName = Route::currentRouteName();
@endphp

<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"> <!-- Add Bootstrap Icons -->
</head>

<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link {{ $currentRouteName == 'home' ? 'active' : '' }}">
                <i class="bi bi-house"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('beverages.index') }}" class="nav-link {{ $currentRouteName == 'beverages.index' ? 'active' : '' }}">
                <i class="bi bi-cup-straw"></i> Beverage Section
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('kitchen.index') }}" class="nav-link {{ $currentRouteName == 'kitchen' ? 'active' : '' }}">
                <i class="bi bi-basket3"></i> Kitchen Section
            </a>
        </li>
    </ul>
</div>
