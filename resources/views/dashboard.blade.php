<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Setting Color') }}
        </h2>
        <div class="preview-modal-color-selector d-flex">
            <a class="preview-modal-cv-template-color" data-color="2c69a5" href="javascript:void(0)">
                <div class="template-cv-colors" style="background-color: #2c69a5;"><i style="color: white; visibility: visible" class="fa fa-check checker" aria-hidden="true"></i></div>
            </a><a class="preview-modal-cv-template-color" data-color="c36839" href="javascript:void(0)">
                <div class="template-cv-colors" style="background-color: #c36839;"><i style="color: white; visibility: hidden" class="fa fa-check checker" aria-hidden="true"></i></div>
            </a><a class="preview-modal-cv-template-color" data-color="5e8b7e" href="javascript:void(0)">
                <div class="template-cv-colors" style="background-color: #5e8b7e;"><i style="color: white; visibility: hidden" class="fa fa-check checker" aria-hidden="true"></i></div>
            </a>
        </div>
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