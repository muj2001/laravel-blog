<x-layout>
    <article>
        <h1>
            {{ $post->title }}
        </h1>
        {!! $post->content !!}
    </article>
    <a href="/">Back to Posts</a>
</x-layout>
