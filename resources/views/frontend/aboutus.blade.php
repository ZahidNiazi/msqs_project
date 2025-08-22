@extends('layouts.frontend.app')
@section('title', $about->meta_title ?? 'About Us')
@section('meta_description', $about->meta_description ?? '')
@section('meta_keywords', $about->meta_keywords ?? '')

@section('content')
<style>
    .about-header {
        background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),
                    url('{{ asset($about->image ?? "frontend/images/about-banner.jpg") }}') center/cover no-repeat;
        color: #fff;
        padding: 100px 0;
        text-align: center;
    }
    .about-header h1 {
        font-size: 3rem;
        font-weight: bold;
    }
    .about-section {
        padding: 60px 0;
    }
    .about-section .content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #555;
    }
    .about-card {
        background: #fff;
        border-radius: 12px;
        padding: 30px;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
        transition: transform 0.3s ease;
    }
    .about-card:hover {
        transform: translateY(-5px);
    }
</style>

<!-- Hero Section -->
<div class="about-header">
    <h1>{{ $about->title ?? 'About Us' }}</h1>
    <p class="mt-3">{{ $about->meta_description ?? 'Learn more about our journey and mission' }}</p>
</div>

<!-- About Content Section -->
<div class="container about-section">
    <div class="row align-items-center">
        <div class="col-md-6 mb-4">
            @if($about->image)
                <img src="{{ asset($about->image) }}" alt="{{ $about->title }}" class="img-fluid rounded shadow">
            @else
                <img src="{{ asset('frontend/images/about-default.jpg') }}" alt="About Us" class="img-fluid rounded shadow">
            @endif
        </div>
        <div class="col-md-6">
            <div class="about-card">
                <h2 class="mb-3">Who We Are</h2>
                <div class="content">
                    {!! $about->content !!}
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Mission / Vision / Values -->
<div class="container py-5">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="about-card h-100">
                <h4>🌍 Our Mission</h4>
                <p>To provide top-quality learning resources and empower students with knowledge.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="about-card h-100">
                <h4>🚀 Our Vision</h4>
                <p>To become the leading platform for mock tests and general knowledge worldwide.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="about-card h-100">
                <h4>💡 Our Values</h4>
                <p>Integrity, Innovation, and Impact in everything we do.</p>
            </div>
        </div>
    </div>
</div>
@endsection
