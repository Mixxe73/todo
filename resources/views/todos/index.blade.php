<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                @if (session('status') === 'success')
                    <x-alert title="{{ __('Action completed successfully!') }}"
                        description="{{ __('Your request has been successfully processed and the changes have been made in the system.') }}" />
                @elseif (session('status') === 'error')
                    <x-alert-danger title="{{ __('The action was not completed!') }}"
                        description="{{ __('Check if your actions are correct') }}" />
                @endif
                <div class="p-4 mx-auto bg-white rounded shadow ">
                    <div class="flex items-center justify-between pb-2 mb-4 overflow-hidden border-b">
                        <h1 class="mb-4 text-2xl font-bold">{{ __('My ToDo list') }}</h1>
                        <x-button-link :href="route('todos.create')">
                            {{ __('Create new') }}
                        </x-button-link>
                    </div>
                    <ul class="overflow-y-auto max-h-96">
                        @forelse  ($todos as $todo)
                            <li class="px-4 py-2 mb-2 bg-gray-200 rounded">
                                <div class="flex flex-col sm:items-center sm:flex-row sm:justify-between">
                                    <div>
                                        <div class="flex items-center gap-2"><span
                                                class="text-xl font-bold {{ $todo->is_closed ? 'line-through' : '' }}">{{ $todo->title }}</span>
                                            <form action="{{ route('todos.toggle-favorite', $todo->id) }}"
                                                method="post">
                                                @csrf
                                                @method('put')
                                                <x-star-button :filled="$todo->is_favorited" />
                                            </form>
                                            @if ($todo->is_closed)
                                                <span
                                                    class="px-2 py-1 ml-2 text-white bg-green-500 rounded">{{ __('Completed') }}</span>
                                            @endif
                                        </div>
                                        <div><span class="font-bold">{{ $todo->subtitle }}</span></div>
                                        <div class="max-w-96"><span>{{ $todo->description }}</span></div>
                                        @if ($todo->updated_at != $todo->created_at)
                                            <div class="text-sm text-gray-500">{{ __('Updated at:') }}
                                                {{ $todo->updated_at }}</div>
                                        @endif
                                    </div>
                                    <div class="flex gap-2">
                                        <form action="{{ route('todos.toggle-status', $todo->id) }}" method="post">
                                            @csrf
                                            @method('put')
                                            <x-primary-button type="submit">
                                                {{ $todo->is_closed ? __('Restore') : __('To Complete') }}
                                            </x-primary-button>
                                        </form>
                                        <x-button-link :href="route('todos.edit', $todo->id)" color="warning">
                                            {{ __('Edit') }}
                                        </x-button-link>
                                        <form action="{{ route('todos.destroy', $todo->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @empty
                            {{ __('You haven\'t created any tasks yet') }}
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
