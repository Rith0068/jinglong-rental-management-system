<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment Dashboard</title>
  <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <style>
    body { background-color: #f3f4f6; color: #111827; }
  </style>
</head>
<div>
    <div>
        <x-side-bar />
    </div>
    <div class="ml-70 pt-5 mr-9">
          <!-- Page Title -->
  <div class="mb-6 pl-2">
    <h2 class="text-2xl font-bold text-gray-800">PAYMENT PAGE</h2>
    <p class="text-sm text-gray-400 mt-1">dashboard → payment</p>
  </div>

  <!-- Stat Cards -->
  <div class="grid grid-cols-3 gap-4 mb-6">
    <div class="bg-white rounded-xl p-5 border border-gray-200 ">
      <div class="text-2xl mb-2">✅</div>
      <div class="text-3xl font-bold text-gray-800">$3,960</div>
      <div class="text-sm text-gray-400 mt-1">Collected <span class="text-green-500 font-medium">This Month</span></div>
    </div>
    <div class="bg-white rounded-xl p-5 border border-gray-200">
      <div class="text-2xl mb-2">⏳</div>
      <div class="text-3xl font-bold text-gray-800">$430</div>
      <div class="text-sm text-gray-400 mt-1">Outstanding</div>
    </div>
    <div class="bg-white rounded-xl p-5 border border-gray-200">
      <div class="text-2xl mb-2">📅</div>
      <div class="text-3xl font-bold text-gray-800">5</div>
      <div class="text-sm text-gray-400 mt-1">Overdue Tenants</div>
    </div>
  </div>

  <!-- Payment History Table -->
  <div class="bg-white rounded-xl p-5 border border-gray-200">

    <!-- Header -->
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-base font-semibold text-gray-800">Payment History</h2>
      <div class="flex gap-2">
        <select class="text-gray-700 text-sm rounded-lg px-3 py-1.5 border border-gray-300 outline-none bg-white">
          <option>April 2025</option>
          <option>March 2025</option>
          <option>February 2025</option>
        </select>
        <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-1.5 rounded-lg transition">
          Export
        </button>
      </div>
    </div>

    <!-- Table -->
    <table class="w-full text-sm">
      <thead>
        <tr class="text-xs uppercase text-gray-400 border-b border-gray-100">
          <th class="text-left pb-3 px-2">Tenant</th>
          <th class="text-left pb-3 px-2">Room</th>
          <th class="text-left pb-3 px-2">Amount</th>
          <th class="text-left pb-3 px-2">Paid On</th>
          <th class="text-left pb-3 px-2">Method</th>
          <th class="text-left pb-3 px-2">Status</th>
          <th class="pb-3 px-2"></th>
        </tr>
      </thead>
      <tbody id="tableBody"></tbody>
    </table>
  </div>

  <script>
    const tenants = [
      { name: "Sandra Lee",  room: "A-101", amount: "$180", paid: "Apr 01, 2025", method: "Bank Transfer", status: "paid" },
      { name: "Mark Davis",  room: "B-203", amount: "$250", paid: "—",            method: "—",             status: "overdue" },
      { name: "Lisa Chen",   room: "A-305", amount: "$180", paid: "Apr 02, 2025", method: "Cash",          status: "paid" },
      { name: "James Park",  room: "B-105", amount: "$180", paid: "—",            method: "—",             status: "overdue" },
      { name: "Rachel Wong", room: "D-401", amount: "$180", paid: "Apr 03, 2025", method: "Online",        status: "paid" },
    ];

    function initials(name) {
      return name.split(' ').map(w => w[0]).join('');
    }

    const tbody = document.getElementById('tableBody');

    tenants.forEach(t => {
      const isPaid = t.status === 'paid';
      const row = document.createElement('tr');
      row.style.borderBottom = '1px solid #f3f4f6';
      row.innerHTML = `
        <td class="py-3 px-2">
          <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-semibold shrink-0"
                 style="background:#ede9fe; color:#7c3aed">
              ${initials(t.name)}
            </div>
            <span class="text-gray-800 font-medium">${t.name}</span>
          </div>
        </td>
        <td class="py-3 px-2 text-gray-400">${t.room}</td>
        <td class="py-3 px-2 text-gray-800 font-medium">${t.amount}</td>
        <td class="py-3 px-2 text-gray-400">${t.paid}</td>
        <td class="py-3 px-2 text-gray-400">${t.method}</td>
        <td class="py-3 px-2">
          <span class="px-3 py-1 rounded-full text-xs font-semibold"
                style="${isPaid
                  ? 'background:#dcfce7; color:#16a34a'
                  : 'background:#fee2e2; color:#dc2626'}">
            ${isPaid ? '✓ Paid' : '! Overdue'}
          </span>
        </td>
        <td class="py-3 px-2">
          <button class="text-xs px-3 py-1 rounded-lg transition text-gray-500"
                  style="border:1px solid #e5e7eb; background:white"
                  onmouseover="this.style.background='#f9fafb'"
                  onmouseout="this.style.background='white'">
            ${isPaid ? 'Invoice' : 'Send Reminder'}
          </button>
        </td>
      `;
      tbody.appendChild(row);
    });
  </script>

    </div>
</div>

</html>