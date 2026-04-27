<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Building</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<div class="flex">
    <div>
        <x-side-bar />
    </div>
    <div class="ml-80">
        <div class="max-w-2xl mx-auto px-4">

    {{-- Header --}}
    <div class="mb-6">
        <a href="{{ route('building.index') }}"
           class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-gray-800 transition mb-3">
            Back to Buildings
        </a>
        <h1 class="text-2xl font-bold text-gray-800">
            Edit Building
        </h1>
        <p class="text-gray-400 text-sm mt-1">
            Editing: <span class="font-semibold text-gray-600">{{ $property->name }}</span>
        </p>
    </div>

    {{-- Card --}}
    <div class="bg-white rounded-2xl shadow-md overflow-hidden">

        {{-- Image Preview Banner --}}
        <div class="relative h-48 bg-gray-200">
            <img id="imagePreview"
                 src="{{ $property->images->first()->image ?? 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&h=400&fit=crop' }}"
                 alt="Preview"
                 class="w-full h-full object-cover">
        </div>

        {{-- Form --}}
        <form action="{{ route('building.update', $property->id) }}" method="POST" class="p-6 space-y-5">
            @csrf
            @method('PUT')

            {{-- Success --}}
            @if(session('success'))
                <div class="flex items-center gap-2 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg text-sm">
                    <i class="fa-solid fa-circle-check"></i> {{ session('success') }}
                </div>
            @endif

            {{-- Name --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                     Name
                </label>
                <input type="text" name="name"
                       value="{{ old('name', $property->name) }}"
                       placeholder="e.g. Sunrise Tower"
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                              focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition
                              @error('name') border-red-400 bg-red-50 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Address --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                     Address
                </label>
                <input type="text" name="address"
                       value="{{ old('address', $property->address) }}"
                       placeholder="e.g. 123 Main Street, Phnom Penh"
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                              focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition
                              @error('address') border-red-400 bg-red-50 @enderror">
                @error('address')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Price + Number of Buildings --}}
            <div class="grid grid-cols-2 gap-4">

                {{-- Price --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        Price
                    </label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">$</span>
                        <input type="text" name="price"
                               value="{{ old('price', $property->price) }}"
                               placeholder="0.00"
                               class="w-full pl-7 pr-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                                      focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition
                                      @error('price') border-red-400 bg-red-50 @enderror">
                    </div>
                    @error('price')
                        <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                {{-- Number of Buildings --}}
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        No. of Buildings
                    </label>
                    <input type="number" name="number_of_building" min="1"
                           value="{{ old('number_of_building', $property->images->first()->number_of_building ?? '') }}"
                           placeholder="e.g. 3"
                           class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                                  focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition">
                </div>

            </div>

            {{-- Description --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                     Description
                </label>
                <textarea name="description" rows="4"
                          placeholder="Describe the building..."
                          class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                                 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition resize-none
                                 @error('description') border-red-400 bg-red-50 @enderror">{{ old('description', $property->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
            </div>

            {{-- Image URL --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">
                     Image URL
                </label>
                <input type="text" name="image" id="imageInput"
                       value="{{ old('image', $property->images->first()->image ?? '') }}"
                       placeholder="https://example.com/image.jpg"
                       class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl text-sm text-gray-700
                              focus:outline-none focus:ring-2 focus:ring-blue-400 focus:bg-white transition
                              @error('image') border-red-400 bg-red-50 @enderror">
                @error('image')
                    <p class="text-red-500 text-xs mt-1 flex items-center gap-1">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $message }}
                    </p>
                @enderror
                <p class="text-gray-400 text-xs mt-1">
                    <i class="fa-solid fa-circle-info mr-1"></i> Paste a URL to update the preview above
                </p>
            </div>

            <hr class="border-gray-100">

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="submit"
                        class="flex-1 flex items-center justify-center gap-2 px-6 py-2.5
                               bg-yellow-400 hover:bg-yellow-500 text-white font-semibold
                               rounded-xl text-sm shadow-sm hover:shadow-md transition">
                    <i class="fa-solid fa-floppy-disk"></i> Save Changes
                </button>
                <a href="{{ route('building.index') }}"
                   class="flex-1 flex items-center justify-center gap-2 px-6 py-2.5
                          bg-gray-100 hover:bg-gray-200 text-gray-600 font-semibold
                          rounded-xl text-sm transition">
                    <i class="fa-solid fa-xmark"></i> Cancel
                </a>
            </div>

        </form>
    </div>

    <p class="text-center text-gray-400 text-xs mt-4">
        Changes are saved immediately after submission
    </p>

</div>

{{-- Live image preview --}}
<script>
    const input = document.getElementById('imageInput');
    const preview = document.getElementById('imagePreview');
    const fallback = 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=800&h=400&fit=crop';

    input.addEventListener('input', function () {
        const url = this.value.trim();
        preview.src = url || fallback;
        preview.onerror = () => preview.src = fallback;
    });
</script>

    </div>
</div>
<body class="">

</body>
</html>