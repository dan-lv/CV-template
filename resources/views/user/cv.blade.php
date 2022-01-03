<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'CV Template' }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <script src="https://kit.fontawesome.com/3f5df386cb.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

</head>

<body class="font-sans antialiased">
    @if (!empty($isAdmin))
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>

                    <!-- Navigation Links -->
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <x-nav-link :href="route('userCv', [Str::slug($userName), 1])" :active="request()->routeIs('dashboard')">
                            {{ __('Template 1') }}
                        </x-nav-link>
                        <x-nav-link :href="route('userCv', [Str::slug($userName), 2])">
                            {{ __('Template 2') }}
                        </x-nav-link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <!-- Page Heading -->
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Setting Color') }}
            </h2>
            <div class="preview-modal-color-selector d-flex">
                <a class="preview-modal-cv-template-color" data-color="blue" href="javascript:void(0)">
                    <div class="template-cv-colors" style="background-color: #2c69a5;"><i style="color: white; visibility: hidden" class="fa fa-check checker" aria-hidden="true"></i></div>
                </a><a class="preview-modal-cv-template-color" data-color="brow" href="javascript:void(0)">
                    <div class="template-cv-colors" style="background-color: #c36839;"><i style="color: white; visibility: hidden" class="fa fa-check checker" aria-hidden="true"></i></div>
                </a><a class="preview-modal-cv-template-color" data-color="green" href="javascript:void(0)">
                    <div class="template-cv-colors" style="background-color: #5e8b7e;"><i style="color: white; visibility: hidden" class="fa fa-check checker" aria-hidden="true"></i></div>
                </a>
            </div>
        </div>
    </header>
    @endif


    <div class="min-h-screen bg-gray-100">

        <!-- Page Content -->
        <main class="full-wrapper">
            <form method="POST" enctype="multipart/form-data" @if (!empty($isAdmin)) action="{{ route('createCvFromAdmin', [Str::slug($userName), $templateId]) }}" @else action="{{ route('createCv', $templateId) }}" @endif>
                @csrf

                @if ($templateId == 1)
                @include('user.cv1')
                @endif
                @if ($templateId == 2)
                @include('user.cv2')
                @endif

                @if ($createCv)
                <div class="btn-wrapper">
                    <button class="generate-btn">Apply changes</button>
                </div>
                @endif
            </form>
        </main>
    </div>
</body>

</html>