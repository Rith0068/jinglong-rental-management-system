<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $property->name }}</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-50">
<div>
    {{-- Sidebar --}}
    <div><x-side-bar /></div>

    <div class="ml-60 p-8">

        {{-- Back button --}}
        <a href="{{ route('building.index') }}"
            class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-900 mb-6 transition">
            <i class="fa-solid fa-arrow-left text-xs"></i>
            Back to buildings
        </a>

        <div class="grid grid-cols-3 gap-6">

            {{-- LEFT: Images + Info --}}
            <div class="col-span-2 space-y-5">

                {{-- Main Image --}}
                <div class="rounded-xl overflow-hidden border border-gray-200 bg-white">
                    @if($property->images->first())
                        <img src="{{ asset('storage/' . $property->images->first()->image) }}"
                             alt="{{ $property->name }}"
                             class="w-full h-[340px] object-cover">
                    @else
                        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&h=400&fit=crop"
                             alt="default"
                             class="w-full h-[340px] object-cover">
                    @endif
                </div>

                {{-- Extra images if more than 1 --}}
                @if($property->images->count() > 1)
                <div class="grid grid-cols-4 gap-3">
                    @foreach($property->images->skip(1) as $img)
                    <div class="rounded-lg overflow-hidden border border-gray-200 cursor-pointer hover:opacity-80 transition"
                         onclick="changeMain('{{ asset('storage/' . $img->image) }}')">
                        <img src="{{ asset('storage/' . $img->image) }}"
                             alt="building" class="w-full h-[70px] object-cover">
                    </div>
                    @endforeach
                </div>
                @endif

                {{-- Description --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6">
                    <h3 class="text-base font-medium text-gray-900 mb-3">Description</h3>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        {{ $property->description ?? 'No description available.' }}
                    </p>
                </div>

            </div>

            {{-- RIGHT: Details Card --}}
            <div class="space-y-4">

                {{-- Main Info --}}
                <div class="bg-white rounded-xl border border-gray-200 p-6 space-y-4">

                    {{-- Name + Badge --}}
                    <div>
                        <span class="text-xs bg-gray-100 text-gray-500 px-3 py-1 rounded-full">
                            Building
                        </span>
                        <h1 class="text-xl font-bold text-gray-900 mt-2">{{ $property->name }}</h1>
                        <p class="text-sm text-gray-400 mt-1 flex items-center gap-1">
                            <i class="fa-solid fa-location-dot text-xs"></i>
                            {{ $property->address }}
                        </p>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Price --}}
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-1">Price</p>
                        <p class="text-2xl font-bold text-gray-900">
                            ${{ number_format($property->price, 2) }}
                        </p>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Stats --}}
                    <div class="grid grid-cols-2 gap-3">
                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                            <p class="text-lg font-bold text-gray-900">
                                {{ $property->images->first()->number_of_building ?? 'N/A' }}
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">Total Units</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-3 text-center">
                            <p class="text-lg font-bold text-gray-900">
                                {{ $property->images->count() }}
                            </p>
                            <p class="text-xs text-gray-400 mt-0.5">Photos</p>
                        </div>
                    </div>

                    <hr class="border-gray-100">

                    {{-- Date --}}
                    <div class="flex items-center gap-2 text-xs text-gray-400">
                        <i class="fa-regular fa-calendar"></i>
                        Added {{ $property->created_at->format('d M Y') }}
                    </div>

                </div>

                {{-- Action Buttons --}}
                <button onclick="confirmDelete({{ $property->id }})"
                    class="w-full flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-medium text-red-500 border border-red-200 rounded-xl hover:bg-red-50 transition">
                    <i class="fa-regular fa-trash-can text-xs"></i>
                    Delete building
                </button>

            </div>
        </div>
    </div>
</div>

{{-- Delete Confirm Modal --}}
<div id="deleteModal"
    class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4">
    <div class="bg-white rounded-2xl p-6 w-full max-w-sm shadow-xl">
        <div class="text-center">
            <div class="w-12 h-12 bg-red-50 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fa-regular fa-trash-can text-red-400 text-lg"></i>
            </div>
            <h3 class="text-base font-medium text-gray-900 mb-1">Delete building?</h3>
            <p class="text-sm text-gray-400 mb-6">This action cannot be undone.</p>
        </div>
        <form id="deleteForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="flex gap-3">
                <button type="button" onclick="closeDelete()"
                    class="flex-1 px-4 py-2 text-sm text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                    Cancel
                </button>
                <button type="submit"
                    class="flex-1 px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-600 transition">
                    Delete
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Switch main image when clicking thumbnail
    function changeMain(src) {
        document.querySelector('.col-span-2 img').src = src;
    }

    // Delete modal
    function confirmDelete(id) {
        document.getElementById('deleteForm').action = `/buildings/${id}`;
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDelete() {
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Close on backdrop click
    document.getElementById('deleteModal').addEventListener('click', function(e) {
        if (e.target === this) closeDelete();
    });

    // Close on ESC
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeDelete();
    });
</script>

</body>
</html>