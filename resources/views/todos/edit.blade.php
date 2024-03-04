<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Todos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Change selected task') }}
                    </h2>
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Enter the required information to change task.') }}
                    </p>
                    <form method="post" action="{{ route('todos.update') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('put')
                        <x-text-input name="todo_id" type="hidden" value="{{ $todo->id }}" />
                        <div>
                            <x-input-label for="edit_todo_title" :value="__('Todo title')" />
                            <x-text-input id="edit_todo_title" name="todo_title" type="text"
                                class="block w-full mt-1" value="{{ $todo->title }}" minlength="3" required
                                autocomplete="todo_title" />
                            <x-input-error :messages="$errors->get('todo_title')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="edit_todo_subtitle" :value="__('Todo subtitle (Not required)')" />
                            <x-text-input id="edit_todo_subtitle" name="todo_subtitle" type="text"
                                class="block w-full mt-1" value="{{ $todo->subtitle }}" autocomplete="todo_subtitle" />
                            <x-input-error :messages="$errors->get('todo_subtitle')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="edit_todo_description" :value="__('Todo description')" />
                            <x-textarea id="edit_todo_description" name="todo_description" class="block w-full mt-1"
                                required minlength="3" value="{{ $todo->description }}" />
                            <x-input-error :messages="$errors->get('todo_description')" class="mt-2" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Edit') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
