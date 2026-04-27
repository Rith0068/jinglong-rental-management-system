<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buildings</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div>
        <div><x-side-bar /></div>

        <div class="ml-60 pt-5 flex justify-between pr-9">
            <x-head-building />

            <button onclick="openModal()"
                class="flex items-center gap-2 bg-blue-500 text-white px-5 py-2 mt-3 rounded-lg text-sm font-bold hover:bg-blue-600 transition active:scale-95">
                <span class="text-lg leading-none">+</span>
                Add more building
            </button>
        </div>

        <div class="ml-60 p-8 pt-5">
            <div class="flex"><x-cart-in-building /></div>
            <div class="flex justify-between"><x-search-and-choose-buttom /></div>
            <div class="flex">@include('layouts.building-cart.index')</div>
        </div>
    </div>

    
    <div id="buildingModal"
        class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center px-4"
        onclick="handleBackdrop(event)">

        <div id="modalBox"
            class="bg-white rounded-2xl shadow-xl w-full max-w-lg p-8 max-h-[90vh] overflow-y-auto">

            <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
                <h2 class="text-base font-medium text-gray-900">Add building</h2>
                <button onclick="closeModal()"
                    class="text-gray-400 hover:text-gray-700 hover:bg-gray-100 rounded-lg px-2 py-1 text-xl leading-none transition">
                    &times;
                </button>
            </div>

            <form action="{{ route('building.store') }}" method="POST" class="space-y-3">
                @csrf

                <div>
                    <label class="text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Sunrise Tower"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. 12 Main St"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    @error('address') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" value="{{ old('price') }}" placeholder="0.00"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    @error('price') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" rows="3" placeholder="Describe the building…"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Units</label>
                    <input type="number" name="number_of_building" value="{{ old('number_of_building') }}" placeholder="0"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    @error('number_of_building') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="text-sm font-medium text-gray-700">Image URL</label>
                    <input type="url" name="image" value="{{ old('image') }}" placeholder="https://example.com/image.jpg"
                        class="w-full mt-1 px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                    @error('image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 text-sm border border-gray-300 rounded-lg hover:bg-gray-50">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm text-white bg-gray-900 rounded-lg hover:bg-gray-700">
                        Submit
                    </button>
                </div>
            </form>

        </div>
    </div>

    @if(session('success'))
    <div id="toast"
        class="fixed bottom-6 right-6 bg-gray-900 text-white text-sm px-5 py-3 rounded-lg shadow-lg z-50 transition">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(() => {
            document.getElementById('toast')?.remove();
        }, 3000);
    </script>
    @endif

<script>
    function openModal() {
        const modal = document.getElementById('buildingModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('buildingModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function handleBackdrop(e) {
        if (e.target === document.getElementById('buildingModal')) {
            closeModal();
        }
    }

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });

</script>
</body>
</html>