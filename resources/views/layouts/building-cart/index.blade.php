<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
<div class="flex flex-wrap gap-[30px]" id="propertyList">
    @foreach($properties as $property)
    <div class="property-card w-[270px] border rounded-[5px] shadow mt-5 h-auto"
        data-name="{{ strtolower($property->name) }}"
        data-address="{{ strtolower($property->address) }}"
        data-price="{{ $property->price }}">

        <img src="{{ $property->images->first()->image ?? 'https://images.unsplash.com/photo-1486325212027-8081e485255e?w=400&h=300&fit=crop' }}"
            alt="building" class="w-full h-[160px] object-cover rounded-t">

        <div class="p-4">
            <h2 class="text-[18px] font-bold">{{ $property->name }}</h2>
            <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ substr($property->description, 0, 100) ?? '...' }}</p>

            <div class="flex justify-between mt-3">
                <div>
                    <p class="font-bold">${{ $property->price }}</p>
                    <p class="text-gray-400 text-xs">Price</p>
                </div>
                <div>
                    <p class="font-bold">{{ $property->images->first()->number_of_building ?? 'N/A' }}</p>
                    <p class="text-gray-400 text-xs">Property</p>
                </div>
            </div>

            {{-- View + Edit buttons --}}
            <div class="flex gap-2 mt-3">
                <a href="{{ route('building.show', $property->id) }}"
                    class="flex-1 text-center px-4 py-2 bg-blue-500 text-white rounded text-sm hover:bg-blue-600 transition">
                    <i class="fa-solid fa-eye mr-1"></i> View
                </a>
                <a href="{{ route('building.edit', $property->id) }}"
                    class="flex-1 text-center px-4 py-2 bg-yellow-400 text-white rounded text-sm hover:bg-yellow-500 transition">
                    <i class="fa-solid fa-pen-to-square mr-1"></i> Edit
                </a>
            </div>

            {{-- Delete button (full width below) --}}
            <form action="{{ route('building.destroy', $property->id) }}" method="POST" class="mt-2">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="w-full px-4 py-2 bg-red-500 text-white rounded text-sm hover:bg-red-600 transition">
                    <i class="fa-solid fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach

    {{-- No results message --}}
    <div id="noResults" class="hidden w-full text-center py-16 text-gray-400">
        <p class="text-lg">No buildings found</p>
        <p class="text-sm mt-1">Try a different search</p>
    </div>
</div>
</body>
</html>