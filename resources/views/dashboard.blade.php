<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <!-- <a class="inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">Template</a> -->
    </x-slot>

    <form method="POST" enctype="multipart/form-data" action="{{ route('createCv', $templateId) }}">
        @csrf

        @if (empty($templateId) || $templateId == 1)
            @include('user.cv1')
        @endif
        @if (!empty($templateId) && $templateId == 2)
            @include('user.cv2')
        @endif
    
        @if ($createCv)
        <div class="btn-wrapper">
            <button class="generate-btn">Use this template</button>
        </div>
        @endif
    </form>
</x-app-layout>