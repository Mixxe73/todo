<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center']) }}>
    @if($filled)
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-600 transition duration-150 ease-in-out hover:text-white active:text-white" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 16.585l-4.293 2.292a1 1 0 0 1-1.414-1.118l.82-4.796-3.472-3.38a1 1 0 0 1 .558-1.701l4.802-.696L9.29 2.522a1 1 0 0 1 1.42 0l2.39 2.45 4.802.696a1 1 0 0 1 .558 1.701l-3.472 3.38.82 4.796a1 1 0 0 1-1.414 1.118L10 16.585z" clip-rule="evenodd" />
        </svg>
    @else
    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white transition duration-150 ease-in-out hover:text-orange-500 active:text-orange-700" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M10 16.585l-4.293 2.292a1 1 0 0 1-1.414-1.118l.82-4.796-3.472-3.38a1 1 0 0 1 .558-1.701l4.802-.696L9.29 2.522a1 1 0 0 1 1.42 0l2.39 2.45 4.802.696a1 1 0 0 1 .558 1.701l-3.472 3.38.82 4.796a1 1 0 0 1-1.414 1.118L10 16.585z" clip-rule="evenodd" />
    </svg>
    @endif
</button>