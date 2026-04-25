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
    <div class="property-card w-[270px] border rounded-[5px] shadow mt-5"
         data-name="{{ strtolower($property->name) }}"
         data-address="{{ strtolower($property->address) }}"
         data-price="{{ $property->price }}">

        @if($property->images->first())
            <img src="{{ asset('storage/' . $property->images->first()->image) }}"
                 alt="building" class="w-full h-[160px] object-cover rounded-t">
        @else
            <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=400&h=300&fit=crop"
                 alt="default" class="w-full h-[160px] object-cover rounded-t">
        @endif

        <div class="p-4">
            <h2 class="text-[18px] font-bold">{{ $property->name }}</h2>
            <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $property->description }}</p>

            <div class="flex justify-between mt-3">
                <div>
                    <p class="font-bold">{{ $property->price }}$</p>
                    <p class="text-gray-400 text-xs">Price</p>
                </div>
                <div>
                    <p class="font-bold">{{ $property->images->first()->number_of_building ?? 'N/A' }}</p>
                    <p class="text-gray-400 text-xs">Units</p>
                </div>
            </div>

            <a href="{{ route('building.show', $property->id) }}"
               class="block text-center mt-3 px-4 py-2 bg-gray-900 text-white rounded text-sm hover:bg-gray-700 transition">
                View
            </a>
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