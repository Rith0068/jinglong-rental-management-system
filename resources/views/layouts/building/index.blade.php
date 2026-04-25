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
                class="flex items-center gap-2 bg-gray-900 text-white px-5 py-2 mt-3 rounded-lg text-sm font-medium hover:bg-gray-700 transition active:scale-95">
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

            <form action="{{ route('building.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 font-bold text-black">
                @csrf

                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="e.g. Sunrise Tower"
                        class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition">
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" placeholder="e.g. 12 Main St"
                        class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Price</label>
                        <input type="text" name="price" value="{{ old('price') }}" placeholder="0.00"
                            class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition">
                    </div>
                    <div>
                        <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Units</label>
                        <input type="number" name="number_of_building" value="{{ old('number_of_building') }}" placeholder="0"
                            class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Description</label>
                    <textarea name="description" rows="3" placeholder="Describe the building…"
                        class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition resize-y">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-xs font-medium text-gray-500 uppercase tracking-wide mb-1.5">Image</label>
                    <input type="file" name="image" accept="image/*" onchange="previewImage(event)"
                        class="w-full px-3.5 py-2.5 text-sm bg-gray-50 border border-gray-200 rounded-lg cursor-pointer">
                    <p class="text-xs text-gray-400 mt-1">JPG, PNG, WEBP — max 2MB</p>
                    
                    <img id="imgPreview" src="" alt=""
                        class="hidden mt-3 w-full h-36 object-cover rounded-lg border border-gray-200">
                </div>

                <div class="flex justify-end gap-3 pt-3 border-t border-gray-100">
                    <button type="button" onclick="closeModal()"
                        class="px-5 py-2 text-sm font-medium text-gray-600 border border-gray-200 rounded-lg hover:bg-gray-50 transition">
                        Cancel
                    </button>
                    <button type="submit"
                        class="px-6 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-700 active:scale-95 transition">
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

    // បិទ modal នៅពេលចុចក្រៅ
    function handleBackdrop(e) {
        if (e.target === document.getElementById('buildingModal')) {
            closeModal();
        }
    }

    // បិទ modal នៅពេលចុច ESC
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') closeModal();
    });

    // Preview image មុន submit
    function previewImage(e) {
        const file = e.target.files[0];
        const preview = document.getElementById('imgPreview');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        }
    }
</script>
</body>
</html>