<x-layout>
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        <p>
            Created at: <strong>{{ $post->created_at }}</strong>
        </p>
        <p>
            {{ $post->body }}
        </p>
    </article>
    <a href="/">Back to Posts</a>
</x-layout>
