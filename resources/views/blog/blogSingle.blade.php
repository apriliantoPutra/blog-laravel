<x-layout>
    <x-slot:judul>{{ $judul }}</x-slot:judul>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <a href="/blog" class="font-medium text-sm text-blue-600 hover:underline">&laquo; Back to all
                        Blog</a>
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="/blog?user={{ $blog->user->username }}"
                                    class="text-xl font-bold text-gray-900 dark:text-white hover:underline">{{ $blog->user->name }}</a>
                                <div class="flex text-base text-gray-500  ">
                                    <a href="/blog?category={{ $blog->category->slug }}"
                                        class="dark:text-gray-400 hover:underline mr-4">{{ $blog->category->name }}</a>
                                    <p class="text-gray-700 ">{{ $blog->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $blog->judul_blog }}</h1>
                </header>
                <p>{!! $blog->isi_blog !!}</p>

            </article>
        </div>
    </main>
</x-layout>
