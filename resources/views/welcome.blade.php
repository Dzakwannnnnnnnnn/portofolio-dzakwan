@extends('layouts.layout')

@section('content')

@php
$waRaw = $profile->whatsapp ?? null;
$waNumber = $waRaw ? preg_replace('/\D+/', '', $waRaw) : null;
if ($waNumber && \Illuminate\Support\Str::startsWith($waNumber, '0')) {
$waNumber = '62' . substr($waNumber, 1);
}
$waUrl = $waNumber ? 'https://wa.me/' . $waNumber : null;

$githubRaw = $profile->github ?? null;
$githubUrl = null;
if (!empty($githubRaw)) {
$githubUrl = \Illuminate\Support\Str::startsWith($githubRaw, ['http://', 'https://'])
? $githubRaw
: 'https://github.com/' . ltrim($githubRaw, '@/');
}

$instagramRaw = $profile->instagram ?? null;
$instagramUrl = null;
if (!empty($instagramRaw)) {
$instagramUrl = \Illuminate\Support\Str::startsWith($instagramRaw, ['http://', 'https://'])
? $instagramRaw
: 'https://instagram.com/' . ltrim($instagramRaw, '@/');
}
@endphp

{{-- HERO --}}
<section class="hero-section scroll-animate" data-animate="fadeIn">

    <div class="hero-bg"></div>

    <div class="hero-container">

        <span class="hero-badge">
            Available for new projects
        </span>

        <h1 class="hero-title">
            Design simple. <br>
            <span>Build beautiful.</span>
        </h1>

        <p class="hero-desc">
            Saya <b>{{ $profile->name ?? 'Muhammad Dzakwan' }}</b>,
            seorang {{ $profile->title ?? 'Full-stack Developer' }}
            yang sedang menempuh pendidikan di SMK TI Airlangga. Saya memiliki minat dalam membangun website yang modern, cepat, dan rapi, serta terus mengembangkan kemampuan saya melalui berbagai proyek pengembangan web
        </p>

        <div class="hero-skills" aria-label="Programming Skills">
            <span class="hero-skill-box">PHP</span>
            <span class="hero-skill-box">Laravel</span>
        </div>

        <div class="hero-buttons">
            <a href="#about" class="btn-primary">Lihat Portfolio</a>
            <a href="#contact" class="btn-secondary">Hubungi Saya</a>
        </div>

    </div>

</section>


{{-- ABOUT --}}
<section id="about" class="ios-about-section scroll-animate" data-animate="slideUp">

    <div class="container">

        <h2 class="section-title">About Me</h2>

        @if($profile)

        <div class="ktp-card">

            {{-- KTP Header --}}
            <div class="ktp-header">
                <div class="ktp-header-left">
                    <span class="ktp-badge">PROFIL</span>
                </div>
                <div class="ktp-header-right">
                    <span class="ktp-number">#{{ str_pad($profile->id, 4, '0', STR_PAD_LEFT) }}</span>
                </div>
            </div>

            {{-- KTP Content --}}
            <div class="ktp-content">

                {{-- Left Side (Photo) --}}
                <div class="ktp-left">
                    <div class="ktp-photo">
                        <img src="{{ $profile->photo 
                        ? asset('storage/'.$profile->photo) 
                        : 'https://via.placeholder.com/120x150' }}" alt="{{ $profile->name }}">
                    </div>
                </div>

                {{-- Right Side (Info) --}}
                <div class="ktp-right">

                    {{-- Name --}}
                    <div class="ktp-row">
                        <span class="ktp-label">NAMA</span>
                        <span class="ktp-value">{{ $profile->name }}</span>
                    </div>

                    {{-- Role --}}
                    @if($profile->role)
                    <div class="ktp-row">
                        <span class="ktp-label">POSISI</span>
                        <span class="ktp-value">{{ $profile->role }}</span>
                    </div>
                    @endif

                    {{-- Birth Info --}}
                    @if($profile->birth_place || $profile->birth_date)
                    <div class="ktp-row">
                        <span class="ktp-label">LAHIR</span>
                        <span class="ktp-value">
                            {{ $profile->birth_place }}
                            @if($profile->birth_date)
                            , {{ \Carbon\Carbon::parse($profile->birth_date)->format('d/m/Y') }}
                            @endif
                        </span>
                    </div>
                    @endif

                    {{-- Address --}}
                    @if($profile->address)
                    <div class="ktp-row">
                        <span class="ktp-label">ALAMAT</span>
                        <span class="ktp-value">{{ $profile->address }}</span>
                    </div>
                    @endif

                    {{-- Education --}}
                    @if($profile->last_education)
                    <div class="ktp-row">
                        <span class="ktp-label">PENDIDIKAN</span>
                        <span class="ktp-value">{{ $profile->last_education }}</span>
                    </div>
                    @endif

                </div>

            </div>

            {{-- DividerLine --}}
            <div class="ktp-divider"></div>

            {{-- Stats Section --}}
            <div class="ktp-stats">
                <div class="ktp-stat-item">
                    <span class="ktp-stat-number">{{ $profile->experience_years ?? 0 }}</span>
                    <span class="ktp-stat-label">Tahun Pengalaman</span>
                </div>
                <div class="ktp-stat-item">
                    <span class="ktp-stat-number">{{ $profile->total_projects ?? 0 }}</span>
                    <span class="ktp-stat-label">Project</span>
                </div>
                <div class="ktp-stat-item">
                    <span class="ktp-stat-number">{{ $profile->total_certifications ?? 0 }}</span>
                    <span class="ktp-stat-label">Sertifikasi</span>
                </div>
            </div>

            {{-- Contact Section --}}
            <div class="ktp-contacts">

                @if(!empty($profile->email))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-envelope"></i></span>
                    <div>
                        <div class="ktp-contact-label">Email</div>
                        <div class="ktp-contact-value">{{ $profile->email }}</div>
                    </div>
                </div>
                @endif

                @if(!empty($profile->phone))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-telephone"></i></span>
                    <div>
                        <div class="ktp-contact-label">Telepon</div>
                        <div class="ktp-contact-value">{{ $profile->phone }}</div>
                    </div>
                </div>
                @endif

                @if(!empty($profile->location))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-geo-alt"></i></span>
                    <div>
                        <div class="ktp-contact-label">Lokasi</div>
                        <div class="ktp-contact-value">{{ $profile->location }}</div>
                    </div>
                </div>
                @endif

                @if(!empty($waUrl))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-whatsapp"></i></span>
                    <div>
                        <div class="ktp-contact-label">WhatsApp</div>
                        <div class="ktp-contact-value">
                            <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer">Chat WhatsApp</a>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($githubUrl))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-github"></i></span>
                    <div>
                        <div class="ktp-contact-label">GitHub</div>
                        <div class="ktp-contact-value">
                            <a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer">Lihat GitHub</a>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($instagramUrl))
                <div class="ktp-contact-item">
                    <span class="ktp-contact-icon"><i class="bi bi-instagram"></i></span>
                    <div>
                        <div class="ktp-contact-label">Instagram</div>
                        <div class="ktp-contact-value">
                            <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer">Lihat Instagram</a>
                        </div>
                    </div>
                </div>
                @endif

            </div>

            {{-- About Section --}}
            @if($profile->about)
            <div class="ktp-about">
                <div class="ktp-about-label">TENTANG SAYA</div>
                <div class="ktp-about-text">{{ $profile->about }}</div>
            </div>
            @endif

        </div>

        @else

        <div class="ios-empty-state">
            <span class="ios-empty-icon">📋</span>
            <p>Profile belum dibuat di dashboard admin.</p>
        </div>

        @endif

    </div>

    <style>
        .hero-skills {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 18px auto 26px;
        }

        .hero-skill-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 14px;
            border-radius: 10px;
            border: 1px solid rgba(99, 102, 241, 0.22);
            background: rgba(99, 102, 241, 0.08);
            color: #4338ca;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: 0.3px;
        }

        .dark .hero-skill-box {
            border-color: rgba(165, 180, 252, 0.32);
            background: rgba(99, 102, 241, 0.2);
            color: #c7d2fe;
        }

        .career-section {
            padding: 90px 20px 70px;
            background: linear-gradient(180deg, #ffffff 0%, #f8faff 100%);
        }

        .dark .career-section {
            background: linear-gradient(180deg, #111827 0%, #0b1020 100%);
        }

        .career-timeline {
            position: relative;
            max-width: 760px;
            margin: 0 auto;
            padding-top: 8px;
        }

        .career-timeline.has-line::before {
            content: "";
            position: absolute;
            top: 24px;
            bottom: 24px;
            left: 11px;
            width: 2px;
            background: linear-gradient(180deg, rgba(99, 102, 241, 0.45) 0%, rgba(99, 102, 241, 0.1) 100%);
        }

        .career-item {
            position: relative;
            display: grid;
            grid-template-columns: 24px 1fr;
            gap: 14px;
            margin-bottom: 18px;
        }

        .career-item:last-child {
            margin-bottom: 0;
        }

        .career-dot {
            width: 10px;
            height: 10px;
            border-radius: 999px;
            background: #4f46e5;
            margin-top: 11px;
            margin-left: 7px;
            box-shadow: 0 0 0 5px rgba(79, 70, 229, 0.12);
        }

        .career-card {
            border: 1px solid rgba(99, 102, 241, 0.12);
            background: rgba(255, 255, 255, 0.86);
            backdrop-filter: blur(6px);
            border-radius: 14px;
            padding: 14px 16px;
            box-shadow: 0 8px 26px rgba(15, 23, 42, 0.08);
        }

        .career-meta {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
            margin-bottom: 8px;
        }

        .career-year {
            font-size: 12px;
            font-weight: 700;
            color: #4338ca;
            background: rgba(99, 102, 241, 0.12);
            border-radius: 999px;
            padding: 5px 10px;
        }

        .career-type {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            color: #0f766e;
            background: rgba(20, 184, 166, 0.16);
            border-radius: 999px;
            padding: 4px 9px;
            letter-spacing: 0.4px;
        }

        .career-place {
            margin: 0;
            font-size: 17px;
            color: #111827;
        }

        .career-role {
            margin: 6px 0 0;
            color: #334155;
            font-weight: 600;
            font-size: 14px;
        }

        .career-desc {
            margin: 8px 0 0;
            color: #475569;
            font-size: 13px;
            line-height: 1.6;
        }

        .career-skills {
            margin-top: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 7px;
        }

        .career-skill-chip {
            font-size: 11px;
            font-weight: 700;
            color: #155e75;
            background: rgba(6, 182, 212, 0.14);
            border: 1px solid rgba(6, 182, 212, 0.26);
            border-radius: 999px;
            padding: 4px 9px;
        }

        .dark .career-dot {
            background: #a5b4fc;
            box-shadow: 0 0 0 5px rgba(165, 180, 252, 0.2);
        }

        .dark .career-card {
            border-color: rgba(165, 180, 252, 0.22);
            background: rgba(15, 23, 42, 0.82);
            box-shadow: 0 8px 26px rgba(2, 6, 23, 0.45);
        }

        .dark .career-place {
            color: #e2e8f0;
        }

        .dark .career-role {
            color: #cbd5e1;
        }

        .dark .career-desc {
            color: #94a3b8;
        }

        .dark .career-skill-chip {
            color: #67e8f9;
            background: rgba(8, 145, 178, 0.22);
            border-color: rgba(103, 232, 249, 0.35);
        }

        .capability-section {
            padding: 90px 20px;
            background: linear-gradient(180deg, #f8faff 0%, #ffffff 100%);
        }

        .dark .capability-section {
            background: linear-gradient(180deg, #0b1020 0%, #111827 100%);
        }

        .capability-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
            max-width: 900px;
            margin: 0 auto;
        }

        .capability-card {
            border: 1px solid rgba(99, 102, 241, 0.15);
            border-radius: 14px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.88);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
        }

        .capability-title {
            margin: 0 0 12px;
            font-size: 18px;
            color: #111827;
        }

        .capability-tags {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 8px;
        }

        .capability-tag {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            box-sizing: border-box;
            padding: 11px 18px;
            border-radius: 12px;
            border: 1px solid rgba(99, 102, 241, 0.22);
            background: rgba(99, 102, 241, 0.08);
            color: #4338ca;
            font-weight: 700;
            font-size: 14px;
        }

        .dark .capability-card {
            border-color: rgba(165, 180, 252, 0.22);
            background: rgba(15, 23, 42, 0.82);
        }

        .dark .capability-title {
            color: #e2e8f0;
        }

        .dark .capability-tag {
            border-color: rgba(165, 180, 252, 0.32);
            background: rgba(99, 102, 241, 0.2);
            color: #c7d2fe;
        }

        .certification-section {
            padding: 90px 20px;
            background: linear-gradient(180deg, #ffffff 0%, #f8faff 100%);
        }

        .dark .certification-section {
            background: linear-gradient(180deg, #111827 0%, #0b1020 100%);
        }

        .certification-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 16px;
        }

        .certification-card {
            border: 1px solid rgba(99, 102, 241, 0.14);
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.08);
            padding: 16px;
        }

        .certification-year {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 999px;
            background: rgba(99, 102, 241, 0.12);
            color: #4338ca;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .certification-achievement {
            margin: 0 0 8px;
            font-size: 16px;
            color: #111827;
        }

        .certification-institution {
            margin: 0;
            font-size: 14px;
            color: #475569;
            font-weight: 600;
        }

        .dark .certification-card {
            border-color: rgba(165, 180, 252, 0.22);
            background: rgba(15, 23, 42, 0.84);
        }

        .dark .certification-year {
            background: rgba(165, 180, 252, 0.16);
            color: #c7d2fe;
        }

        .dark .certification-achievement {
            color: #e2e8f0;
        }

        .dark .certification-institution {
            color: #94a3b8;
        }


        .ios-about-section {
            padding: 100px 20px;
            background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);
        }

        .dark .ios-about-section {
            background: linear-gradient(135deg, #0a0a0a 0%, #1a1a1a 100%);
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        /* KTP Card */
        .ktp-card {
            max-width: 700px;
            margin: 0 auto;
            background: linear-gradient(135deg, #ffffff 0%, #f8f9ff 100%);
            border-radius: 20px;
            padding: 0;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
            border: 1px solid rgba(99, 102, 241, 0.1);
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        .dark .ktp-card {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
            border-color: rgba(99, 102, 241, 0.2);
        }

        /* Header */
        .ktp-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: linear-gradient(90deg, #6366f1 0%, #4f46e5 100%);
            color: white;
        }

        .ktp-badge {
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 2px;
        }

        .ktp-number {
            font-size: 12px;
            opacity: 0.8;
            letter-spacing: 1px;
        }

        /* Content */
        .ktp-content {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 30px;
            padding: 30px;
            align-items: start;
        }

        /* Photo */
        .ktp-photo {
            width: 120px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            border: 3px solid rgba(99, 102, 241, 0.2);
        }

        .ktp-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Info Rows */
        .ktp-right {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .ktp-row {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding-bottom: 12px;
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
        }

        .ktp-row:last-child {
            border-bottom: none;
        }

        .ktp-label {
            font-size: 11px;
            font-weight: 700;
            color: #6366f1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .ktp-value {
            font-size: 15px;
            color: #333;
            font-weight: 500;
            line-height: 1.4;
        }

        .dark .ktp-label {
            color: #a5b4fc;
        }

        .dark .ktp-value {
            color: #e0e0e0;
        }

        /* Divider */
        .ktp-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent 0%, rgba(99, 102, 241, 0.2) 50%, transparent 100%);
            margin: 0 30px;
        }

        /* Stats */
        .ktp-stats {
            padding: 18px 30px 10px;
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 12px;
        }

        .ktp-stat-item {
            border: 1px solid rgba(99, 102, 241, 0.14);
            border-radius: 12px;
            padding: 12px 10px;
            text-align: center;
            background: rgba(99, 102, 241, 0.04);
        }

        .ktp-stat-number {
            display: block;
            font-size: 22px;
            font-weight: 800;
            color: #4f46e5;
            line-height: 1.1;
        }

        .ktp-stat-label {
            display: block;
            margin-top: 6px;
            font-size: 11px;
            font-weight: 700;
            color: #6366f1;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }

        .dark .ktp-stat-item {
            background: rgba(99, 102, 241, 0.1);
            border-color: rgba(165, 180, 252, 0.2);
        }

        .dark .ktp-stat-number {
            color: #c7d2fe;
        }

        .dark .ktp-stat-label {
            color: #a5b4fc;
        }

        /* Contacts */
        .ktp-contacts {
            padding: 20px 30px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 14px;
        }

        .ktp-contact-item {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            padding: 12px 14px;
            border: 1px solid rgba(99, 102, 241, 0.14);
            border-radius: 12px;
            background: rgba(99, 102, 241, 0.04);
        }

        .ktp-contact-icon {
            width: 34px;
            height: 34px;
            border-radius: 10px;
            background: rgba(79, 70, 229, 0.12);
            color: #4f46e5;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 15px;
            flex-shrink: 0;
        }

        .ktp-contact-label {
            font-size: 11px;
            font-weight: 700;
            color: #6366f1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 2px;
        }

        .ktp-contact-value {
            font-size: 14px;
            color: #333;
            word-break: break-word;
        }

        .ktp-contact-value a {
            color: #1d4ed8;
            text-decoration: none;
            font-weight: 600;
        }

        .ktp-contact-value a:hover {
            text-decoration: underline;
        }

        .dark .ktp-contact-value {
            color: #e0e0e0;
        }

        .dark .ktp-contact-item {
            background: rgba(99, 102, 241, 0.08);
            border-color: rgba(165, 180, 252, 0.2);
        }

        .dark .ktp-contact-icon {
            background: rgba(165, 180, 252, 0.2);
            color: #c7d2fe;
        }

        /* About */
        .ktp-about {
            padding: 20px 30px;
            background: rgba(99, 102, 241, 0.05);
            border-top: 1px solid rgba(99, 102, 241, 0.1);
        }

        .dark .ktp-about {
            background: rgba(99, 102, 241, 0.1);
        }

        .ktp-about-label {
            font-size: 11px;
            font-weight: 700;
            color: #6366f1;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 10px;
            display: block;
        }

        .ktp-about-text {
            font-size: 14px;
            color: #555;
            line-height: 1.7;
        }

        .dark .ktp-about-text {
            color: #bbb;
        }

        /* Empty State */
        .ios-empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .ios-empty-icon {
            font-size: 56px;
            display: block;
            margin-bottom: 16px;
            opacity: 0.6;
        }

        .ios-empty-state p {
            font-size: 16px;
            color: #999;
            margin: 0;
        }

        .dark .ios-empty-state p {
            color: #777;
        }

        /* Animation */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-skills {
                gap: 8px;
                margin: 14px auto 20px;
            }

            .hero-skill-box {
                padding: 7px 12px;
                font-size: 12px;
            }

            .career-section {
                padding-top: 70px;
                padding-bottom: 50px;
            }

            .career-item {
                grid-template-columns: 20px 1fr;
                gap: 10px;
            }

            .career-dot {
                width: 8px;
                height: 8px;
                margin-top: 12px;
                margin-left: 6px;
            }

            .career-timeline.has-line::before {
                left: 9px;
            }

            .career-card {
                padding: 12px 12px;
            }

            .career-place {
                font-size: 16px;
            }

            .capability-section {
                padding: 70px 20px;
            }

            .capability-tag {
                font-size: 13px;
                padding: 10px 14px;
            }

            .capability-tags {
                grid-template-columns: 1fr;
            }

            .certification-section {
                padding: 70px 20px;
            }

            .ktp-card {
                margin: 0 15px;
                border-radius: 16px;
            }

            .ktp-header {
                padding: 15px 20px;
            }

            .ktp-content {
                grid-template-columns: 100px 1fr;
                gap: 20px;
                padding: 20px;
            }

            .ktp-photo {
                width: 100px;
                height: 130px;
            }

            .ktp-row {
                padding-bottom: 10px;
            }

            .ktp-label {
                font-size: 10px;
            }

            .ktp-value {
                font-size: 14px;
            }

            .ktp-divider,
            .ktp-stats,
            .ktp-contacts,
            .ktp-about {
                padding-left: 20px;
                padding-right: 20px;
            }

            .ktp-stats {
                grid-template-columns: 1fr;
                gap: 10px;
                padding-top: 14px;
                padding-bottom: 4px;
            }

            .ktp-contacts {
                grid-template-columns: 1fr;
                gap: 15px;
            }

            .contact-grid {
                grid-template-columns: 1fr;
            }

            .ktp-content {
                grid-template-columns: 1fr;
                text-align: center;
            }

            .ktp-left {
                width: 100%;
                display: flex;
            }
        }

        /* ========== SCROLL ANIMATIONS ========== */

        .scroll-animate {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        /* Slide Up Animation */
        .scroll-animate[data-animate="slideUp"] {
            opacity: 0;
            transform: translateY(40px);
        }

        .scroll-animate[data-animate="slideUp"].is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Fade In Animation */
        .scroll-animate[data-animate="fadeIn"] {
            opacity: 0;
            transform: scale(0.95);
        }

        .scroll-animate[data-animate="fadeIn"].is-visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Slide Left Animation */
        .scroll-animate[data-animate="slideLeft"] {
            opacity: 0;
            transform: translateX(-40px);
        }

        .scroll-animate[data-animate="slideLeft"].is-visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Slide Right Animation */
        .scroll-animate[data-animate="slideRight"] {
            opacity: 0;
            transform: translateX(40px);
        }

        .scroll-animate[data-animate="slideRight"].is-visible {
            opacity: 1;
            transform: translateX(0);
        }

        /* Stagger animation untuk children elements */
        .scroll-animate .edu-card,
        .scroll-animate .project-card {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            transition-delay: calc(var(--item-index, 0) * 0.1s);
        }

        .scroll-animate.is-visible .edu-card,
        .scroll-animate.is-visible .project-card {
            opacity: 1;
            transform: translateY(0);
        }
    </style>

</section>




{{-- CAREER JOURNEY --}}
<section id="career" class="career-section scroll-animate" data-animate="slideUp">

    <div class="container">
        <h2 class="section-title">Perjalanan Karir</h2>

        @php
        $careerItems = $educations ?? collect();
        @endphp

        @if($careerItems->count())
        <div class="career-timeline {{ $careerItems->count() > 1 ? 'has-line' : '' }}">
            @foreach($careerItems as $item)
            <article class="career-item">
                <div class="career-dot"></div>
                <div class="career-card">
                    <div class="career-meta">
                        <span class="career-year">{{ $item->start_year }} - {{ $item->end_year ?? 'Sekarang' }}</span>
                        <span class="career-type">{{ $item->activity_type ?? 'Pendidikan' }}</span>
                    </div>
                    <h3 class="career-place">{{ $item->school }}</h3>
                    @if(!empty($item->major))
                    <p class="career-role">{{ $item->major }}</p>
                    @endif
                    @if(!empty($item->description))
                    <p class="career-desc">{{ $item->description }}</p>
                    @endif
                    @if(!empty($item->developed_skills))
                    <div class="career-skills">
                        @foreach(array_filter(array_map('trim', explode(',', $item->developed_skills))) as $skill)
                        <span class="career-skill-chip">{{ $skill }}</span>
                        @endforeach
                    </div>
                    @endif
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="ios-empty-state">
            <span class="ios-empty-icon">🧭</span>
            <p>Belum ada data perjalanan karir.</p>
        </div>
        @endif
    </div>

</section>



{{-- PROJECTS --}}
<section class="projects-area scroll-animate" data-animate="fadeIn">

    <div class="container">

        <h2 class="section-title">My Projects</h2>

        <div class="projects-grid">

            @forelse($projects ?? [] as $project)

            <div class="project-card">

                <img src="{{ !empty($project->image)
                ? asset('storage/'.$project->image)
                : 'https://via.placeholder.com/400x250' }}">

                <div class="project-body">

                    <h4>{{ $project->title ?? 'Untitled Project' }}</h4>

                    <p>
                        {{ $project->description ?? 'Belum ada deskripsi project.' }}
                    </p>

                    @if(!empty($project->link))
                    <a href="{{ $project->link }}" target="_blank">
                        View Project
                    </a>
                    @endif

                </div>

            </div>

            @empty

            <p class="empty-text">
                Belum ada project ditambahkan.
            </p>

            @endforelse

        </div>

    </div>

</section>


{{-- CAPABILITIES --}}
<section class="capability-section scroll-animate" data-animate="slideUp">

    <div class="container">
        <h2 class="section-title">Kemampuan</h2>

        @php
        $capabilityItems = ($capabilities ?? collect())->map(function ($item) {
        return [
        'title' => $item->title,
        'languages' => array_values(array_filter(array_map('trim', explode(',', (string) $item->languages)))),
        ];
        });
        @endphp

        @if($capabilityItems->count())
        <div class="capability-grid">
            @foreach($capabilityItems as $capability)
            <article class="capability-card">
                <h3 class="capability-title">{{ $capability['title'] }}</h3>
                <div class="capability-tags">
                    @forelse($capability['languages'] as $language)
                    <span class="capability-tag">{{ $language }}</span>
                    @empty
                    <span class="capability-tag">Belum diisi</span>
                    @endforelse
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="ios-empty-state">
            <span class="ios-empty-icon">🧠</span>
            <p>Belum ada data kemampuan.</p>
        </div>
        @endif
    </div>

</section>


{{-- CERTIFICATIONS --}}
<section class="certification-section scroll-animate" data-animate="slideUp">

    <div class="container">
        <h2 class="section-title">Sertifikasi</h2>

        @if(($certifications ?? collect())->count())
        <div class="certification-grid">
            @foreach($certifications as $certification)
            <article class="certification-card">
                <span class="certification-year">{{ $certification->year }}</span>
                <h3 class="certification-achievement">{{ $certification->achievement }}</h3>
                <p class="certification-institution">{{ $certification->institution }}</p>
            </article>
            @endforeach
        </div>
        @else
        <div class="ios-empty-state">
            <span class="ios-empty-icon">🏅</span>
            <p>Belum ada data sertifikasi.</p>
        </div>
        @endif
    </div>

</section>


{{-- CONTACT --}}
<section id="contact" class="contact-section scroll-animate" data-animate="slideUp">

    <div class="container">

        <h2 class="section-title">Hire Me</h2>

        <p class="section-sub">
            Tertarik bekerja sama atau membuat project? Kirim pesan saja.
        </p>

        <div class="contact-grid">

            {{-- INFO --}}
            <div class="contact-info">

                <h3>Contact Info</h3>

                <p>
                    Saya terbuka untuk freelance, project, atau kolaborasi.
                </p>

                <div class="contact-items">

                    @if(!empty($profile?->email))
                    <a href="mailto:{{ $profile->email }}" class="contact-item contact-item-link">
                        <i class="bi bi-envelope contact-item-icon"></i>
                        <div>
                            <span class="contact-item-label">Email</span>
                            <span class="contact-item-value">{{ $profile->email }}</span>
                        </div>
                    </a>
                    @endif

                    @if(!empty($profile?->phone))
                    <a href="tel:{{ preg_replace('/\D+/', '', $profile->phone) }}"
                        class="contact-item contact-item-link">
                        <i class="bi bi-telephone contact-item-icon"></i>
                        <div>
                            <span class="contact-item-label">Telepon</span>
                            <span class="contact-item-value">{{ $profile->phone }}</span>
                        </div>
                    </a>
                    @endif

                    @if(!empty($waUrl))
                    <a href="{{ $waUrl }}" target="_blank" rel="noopener noreferrer"
                        class="contact-item contact-item-link">
                        <i class="bi bi-whatsapp contact-item-icon"></i>
                        <div>
                            <span class="contact-item-label">WhatsApp</span>
                            <span class="contact-item-value">Chat WhatsApp</span>
                        </div>
                    </a>
                    @endif

                    @if(!empty($githubUrl))
                    <a href="{{ $githubUrl }}" target="_blank" rel="noopener noreferrer"
                        class="contact-item contact-item-link">
                        <i class="bi bi-github contact-item-icon"></i>
                        <div>
                            <span class="contact-item-label">GitHub</span>
                            <span class="contact-item-value">Lihat GitHub</span>
                        </div>
                    </a>
                    @endif

                    @if(!empty($instagramUrl))
                    <a href="{{ $instagramUrl }}" target="_blank" rel="noopener noreferrer"
                        class="contact-item contact-item-link">
                        <i class="bi bi-instagram contact-item-icon"></i>
                        <div>
                            <span class="contact-item-label">Instagram</span>
                            <span class="contact-item-value">Lihat Instagram</span>
                        </div>
                    </a>
                    @endif

                </div>
            </div>


            {{-- FORM --}}
            <div class="contact-form">

                <form>

                    <input type="text" placeholder="Nama" required>

                    <input type="email" placeholder="Email" required>

                    <textarea placeholder="Pesan..." rows="5"></textarea>

                    <button type="submit">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection

