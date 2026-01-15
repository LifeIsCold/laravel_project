<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">

        <h2 class="text-2xl font-bold mb-5">Article List</h2>

        <table class="w-full border border-gray-300">
            <thead class="bg-gray-300">
                <tr>
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Body</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Created</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <td class="border px-4 py-2">{{ $article->id }}</td>
                        <td class="border px-4 py-2">{{ $article->title }}</td>
                        <td class="border px-4 py-2 ">
                            {{ Str::limit($article->body, 100) }}
                        </td>
                        <td class="border px-4 py-2">{{ $article->category_id }}</td>
                        <td class="border px-4 py-2">{{ $article->created_at }}</td>
                        <td class="border px-4 py-2 text-center">
                            <form
                                action="/articles/{{ $article->id }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this article?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 text-black px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
