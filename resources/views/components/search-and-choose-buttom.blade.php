<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
<div class="flex mt-5 gap-3 items-center">

    {{-- Search Input --}}
    <div class="relative">
        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm">
            &#128269;
        </span>
        <input
            id="searchInput"
            type="search"
            placeholder="Search name, address..."
            class="border border-gray-200 bg-gray-50 pl-9 pr-4 py-2 w-[280px] rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-gray-300 focus:bg-white transition"
            oninput="filterCards()">
    </div>

    {{-- Price Sort --}}
    <select
        id="priceSort"
        onchange="filterCards()"
        class="border border-gray-200 bg-gray-50 px-3 py-2 rounded-lg text-sm text-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-300 transition">
        <option value="">Price: All</option>
        <option value="low">Price: Low to High</option>
        <option value="high">Price: High to Low</option>
    </select>

    {{-- Clear button --}}
    <button
        id="clearBtn"
        onclick="clearSearch()"
        class="hidden text-sm text-gray-400 hover:text-gray-700 border border-gray-200 px-3 py-2 rounded-lg transition">
        Clear
    </button>

    {{-- Result count --}}
    <span id="resultCount" class="text-sm text-gray-400"></span>

</div>
<br>

<script>
function filterCards() {
    const search = document.getElementById('searchInput').value.toLowerCase().trim();
    const sort   = document.getElementById('priceSort').value;
    const cards  = document.querySelectorAll('.property-card');
    const list   = document.getElementById('propertyList');
    const noRes  = document.getElementById('noResults');
    const clear  = document.getElementById('clearBtn');
    const count  = document.getElementById('resultCount');

    // Show/hide clear button
    clear.classList.toggle('hidden', search === '' && sort === '');

    let visible = [];

    cards.forEach(card => {
        const name    = card.dataset.name || '';
        const address = card.dataset.address || '';
        const price   = card.dataset.price || '';

        const matches = name.includes(search) ||
                        address.includes(search) ||
                        price.includes(search);

        if (matches) {
            card.style.display = 'block';
            visible.push(card);
        } else {
            card.style.display = 'none';
        }
    });

    // Sort by price
    if (sort && visible.length > 0) {
        visible.sort((a, b) => {
            const pa = parseFloat(a.dataset.price) || 0;
            const pb = parseFloat(b.dataset.price) || 0;
            return sort === 'low' ? pa - pb : pb - pa;
        });
        visible.forEach(card => list.appendChild(card));
    }

    // Show/hide no results
    if (visible.length === 0) {
        noRes.classList.remove('hidden');
        count.textContent = '';
    } else {
        noRes.classList.add('hidden');
        count.textContent = `${visible.length} building${visible.length > 1 ? 's' : ''} found`;
    }
}

function clearSearch() {
    document.getElementById('searchInput').value = '';
    document.getElementById('priceSort').value = '';
    filterCards();
}
</script>
</body>
</html>