<a href="{{ route('post.show', ['post' => $post['id']]) }}" class="block w-64">
    <div class="col-span-1 rounded-lg p-4 shadow-lg hover:shadow-md">
        <p class="font-bold text-lg mb-2">
            {{ htmlspecialchars($post['title']) }}
        </p>
        <div class="flex justify-between items-end">
            <p class="flex items-center">
                <img class="h-5 w-5 rounded-full mr-1" src="{{ $post['user']['profile_image_url'] }}" alt="{{ htmlspecialchars($post['user']['name']) }}">
                <span class="text-xs text-gray-600">
                    {{ htmlspecialchars($post['user']['name']) }}
                </span>
            </p>

            @auth
                @if($post['user']['id'] === Auth::user()->id)
                <form class="relative"
                    action="{{ route('post.destroy', ['post' => $post['id']]) }}"
                    method="POST">
                    @csrf
                    @method('DELETE')

                    <button
                        aria-label="記事を削除する"
                        class="before:absolute before:-right-1/2 before:-top-12 before:text-sm before:hidden before:rounded-lg before:shadow-lg before:content-['削除'] before:text-white before:whitespace-nowrap before:p-2 before:bg-black before:opacity-60 hover:before:inline-block"
                        type="submit"
                    >
                        <img class="h-6 w-6" src="/img/trash.png">
                    </button>
                </form>
                @endif
            @endauth

        </div>
    </div>
</a>