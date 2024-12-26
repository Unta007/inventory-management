<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-link" id="sidebar-toggle" onclick="toggleSidebar()">
                <i class="bi bi-list"></i>
            </button>
            <a href="{{ route('home') }}" class="navbar-brand"><i class="bi bi-box2-fill me-2"></i> Eskrimo Inventory</a>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <span>Welcome, fifi!{{--{{ Auth::user()->name }}--}}</span>
            </ul>
        </div>
    </div>
</nav>

@extends('layouts.sidebar')

<script>
    function toggleSidebar() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('active');
    }
</script>
