<x-app-layout>
    <div class="min-h-screen bg-gray-50 py-10 mt-8">
        <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">
                Edit Article
            </h2>
              <form action="/articles/update/{{ $article->id }}" method="POST" class="space-y-5">
                  @csrf
                  @method('PUT')
                  <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                          Title
                      </label>
                      <input type="text" name="title" value="{{ $article->title }}"
                          class="w-full rounded-md border-gray-300 px-4 py-2
                              focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                          Body
                      </label>
                      <textarea name="body" rows="4"
                          class="w-full rounded-md border-gray-300 px-4 py-2
                              focus:border-blue-500 focus:ring-blue-500">{{ $article->body }}</textarea>

                  </div>
                  <div>
                      <label class="block text-sm font-medium text-gray-700 mb-1">
                          Category ID
                      </label>
                      <input type="number" name="category_id" value="{{ $article->category_id }}"
                          class="w-full rounded-md border-gray-300 px-4 py-2
                              focus:border-blue-500 focus:ring-blue-500">
                  </div>
                  <button
                      class="w-32 bg-blue-600 text-white font-medium
                              p-2.5 rounded-lg
                              hover:bg-blue-700
                              transition duration-200">
                      Update Article
                  </button>
              </form>
        </div>
    </div>
</x-app-layout>
