<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="relative rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/10">
                    <form action="{{ route('orders.store') }}" method="post">
                        @csrf

                        <div class="mb-4">
                            <label for="user_id" class="block text gray-700 text-sm font-bold mb-2 dark:text-gray-200">User</label>
                            <select name="user_id" id="user_id"
                                    class="form-select rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                                @foreach ($users as $id => $email)
                                    <option value="{{ $id }}">{{ $email }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="total" class="block text gray-700 text-sm font-bold mb-2 dark:text-gray-200">Total</label>
                            <input type="number" name="total" id="total"
                                   step="0.01"
                                   class="form-input rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full">
                            @error('total')
                            <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
