<x-app-layout>
    <div class="w-4/6 m-auto mt-6 bg-white shadow-md rounded-lg p-6 space-y-2">
        <h1 class="text-4xl font-bold text-center text-blue-500 mb-4">Article List</h1>
        <ul class="list-disc list-inside">
            <?php foreach($articles as $article): ?>
            <li class="text-gray-800 font-medium hover:text-blue-500 transition-colors">
                <?php echo $article['title']; ?>
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</x-app-layout>
