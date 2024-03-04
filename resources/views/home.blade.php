<x-guest-layout>
    <div class="flex flex-col w-full text-center">
        <h1 class="mb-4 text-2xl font-medium text-gray-900 sm:text-3xl title-font">
            {{ __('Internship task at FWT company') }}</h1>
        <p class="mx-auto text-base leading-relaxed lg:w-2/3">
            {{ __('The task was completed in a few hours. This page is a simple footnote available to all') }}</p>

        <div class="flex flex-col gap-2 mt-2">
            @auth
                <x-button-link :href="route('todos.index')" color="success">
                    {{ __('Go to controll') }}
                </x-button-link>
            @else
                <x-button-link :href="route('register')" color="danger">
                    {{ __('Go to registration') }}
                </x-button-link>
                <x-button-link :href="route('login')" color="warning">
                    {{ __('Go to authorization') }}
                </x-button-link>
            @endauth
        </div>
    </div>
</x-guest-layout>
