<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jing Long Sidebar</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 min-h-screen">

<aside id="sidebar" class="fixed top-0 left-0 h-screen bg-white border-r border-gray-200 flex flex-col py-5 overflow-hidden transition-all duration-300 z-50 w-60">

    <!-- Header -->
    <div class="flex items-center gap-3 px-4 pb-4 border-b border-gray-200">
        <button
            onclick="toggleSidebar()"
            class="flex-shrink-0 p-1.5 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors">
            <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <line x1="3" y1="6" x2="21" y2="6"/>
                <line x1="3" y1="12" x2="21" y2="12"/>
                <line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
        </button>
        <span id="brand" class="font-bold text-[32px] text-gray-900 whitespace-nowrap transition-opacity duration-200">
            Jing Long
        </span> 
    </div>

    <!-- Nav -->
    <nav class="flex-1 flex flex-col gap-4 px-2 py-3">

        <a href="/dasboard" onclick="setActive(this)"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[18px] font-medium text-blue-700 bg-blue-50 transition-colors whitespace-nowrap">
            <span class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/>
                    <rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/>
                </svg>
            </span>
            <span class="nav-label transition-opacity duration-200">Dashboard</span>
        </a>

        <a href="/building" onclick="setActive(this)"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[18px] font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors whitespace-nowrap">
            <span class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                    <polyline points="9 22 9 12 15 12 15 22"/>
                </svg>
            </span>
            <span class="nav-label transition-opacity duration-200">Property</span>
        </a>

        <a href="/payment" onclick="setActive(this)"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[18px] font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors whitespace-nowrap">
            <span class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <rect x="1" y="4" width="22" height="16" rx="2"/>
                    <line x1="1" y1="10" x2="23" y2="10"/>
                </svg>
            </span>
            <span class="nav-label transition-opacity duration-200">Rent Payments</span>
        </a>

        <a href="/tenant" onclick="setActive(this)"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[18px] font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors whitespace-nowrap">
            <span class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                    <polyline points="14 2 14 8 20 8"/>
                    <line x1="8" y1="13" x2="16" y2="13"/>
                    <line x1="8" y1="17" x2="16" y2="17"/>
                </svg>
            </span>
            <span class="nav-label transition-opacity duration-200">Tenants</span>
        </a>

        <a href="/maintenances" onclick="setActive(this)"
            class="nav-item flex items-center gap-3 px-3 py-2.5 rounded-lg text-[18px] font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900 transition-colors whitespace-nowrap">
            <span class="flex-shrink-0 w-5 h-5 flex items-center justify-center">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/>
                </svg>
            </span>
            <span class="nav-label transition-opacity duration-200">Maintenance</span>
        </a>

    </nav>

    <!-- Footer -->
    <div class="flex items-center gap-3 px-4 pt-3 border-t border-gray-200 overflow-hidden">
        <div class="flex-shrink-0 w-9 h-9 rounded-full bg-blue-100 text-blue-700 flex items-center justify-center text-xs font-semibold">
            KS
        </div>
        <div id="user-info" class="overflow-hidden transition-opacity duration-200">
            <p class="text-sm font-semibold text-gray-900 whitespace-nowrap">Koem Sothearith</p>
            <p class="text-xs text-gray-500">Admin</p>
        </div>
    </div>

</aside>

<script>
    let collapsed = false;

    function toggleSidebar() {
        collapsed = !collapsed;
        const sidebar = document.getElementById('sidebar');
        const brand = document.getElementById('brand');
        const userInfo = document.getElementById('user-info');
        const labels = document.querySelectorAll('.nav-label');

        if (collapsed) {
            sidebar.classList.replace('w-60', 'w-18');
            brand.classList.add('opacity-0', 'pointer-events-none');
            userInfo.classList.add('opacity-0', 'pointer-events-none');
            labels.forEach(l => l.classList.add('opacity-0', 'pointer-events-none'));
        } else {
            sidebar.classList.replace('w-18', 'w-60');
            brand.classList.remove('opacity-0', 'pointer-events-none');
            userInfo.classList.remove('opacity-0', 'pointer-events-none');
            labels.forEach(l => l.classList.remove('opacity-0', 'pointer-events-none'));
        }
    }

    function setActive(el) {
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('text-blue-700', 'bg-blue-50');
            item.classList.add('text-gray-500', 'hover:bg-gray-100', 'hover:text-gray-900');
        });
        el.classList.add('text-blue-700', 'bg-blue-50');
        el.classList.remove('text-gray-500', 'hover:bg-gray-100', 'hover:text-gray-900');
    }
</script>

</body>
</html>