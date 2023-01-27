<x-app-layout>
    <h1
        class="mb-6 text-white text-4xl font-bold text-center bg-gradient-to-r bg-clip-text text-transparent 
                        from-purple-100 via-purple-500 to-purple-900
                        animate-text animate-text">
        Encrypt and share!</h1>
    <form action="{{ route('secrets.store') }}" method="POST">
        @csrf
        <div class="shadow">
            <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                <div>
                    <div class="mt-1">
                        <textarea id="text" name="text" rows="10"
                            class="mt-1 block w-full border-gray-300 shadow-sm focus:border-purple-300 focus:ring-purple-300 sm:text-sm"
                            placeholder="Write your text here!"></textarea>
                    </div>
                </div>
            </div>
            <div class="dark:bg-gray-900 py-6 text-right">
                <button type="submit"
                    class="inline-flex justify-center border border-transparent bg-purple-600 py-3 px-8 text-sm font-bold text-white shadow-sm hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">Share</button>
            </div>
        </div>
    </form>

    @if (Session::has('signedUrl'))
        <span class="text-white">{{ Session::get('signedUrl') }}</span>
    @endif
</x-app-layout>
