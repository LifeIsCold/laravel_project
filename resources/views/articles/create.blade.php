<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10 mt-8">

        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">

            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Create Article
            </h2>
            @if(session('success'))
            <div class="bg-green-50 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif
            <form action="/articles/store" method="POST" class="space-y-5">
                @csrf
                @if ($errors->any())
                <div class="bg-red-50 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Title
                    </label>
                    <input type="text" name="title" value="{{ old('title') }}" class="w-full rounded-md border-gray-300 px-4 py-2
                               focus:border-blue-500 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Body
                    </label>
                    <textarea name="body" rows="4"
                        class="w-full rounded-md border-gray-300 px-4 py-2
                               focus:border-blue-500 focus:ring-blue-500">{{ old('body') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">
                        Category ID
                    </label>
                    <input type="number" name="category_id" value="{{ old('category_id') }}" 
                        class="w-full rounded-md border-gray-300 px-4 py-2
                               focus:border-blue-500 focus:ring-blue-500">
                </div>

                <!-- Button -->
                <div class="pt-4">
                    <button type="submit"
                        class="w-32 bg-blue-600 text-white font-medium
                               p-2.5 rounded-lg
                               hover:bg-blue-700
                               transition duration-200">
                        Add Article
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
