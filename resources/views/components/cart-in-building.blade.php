<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div id="cards" class="flex flex-wrap gap-15"></div>
    
</body>
<script> 
    const cartProterty = [
        { name: "Total Buildings", number: "24", lastText: "3 added this quarter" },
        { name: "Occupied Units",     number: "12", lastText: "92% occupancy rate" },
        { name: "Monthly Revenue",  number: "$2.8M", lastText: "5.2% vs last month" },
    ];

    const container = document.getElementById("cards");

        cartProterty.forEach(prop => {
        container.innerHTML += `
            <div class="block w-[350px] rounded-[6px] bg-white shadow-md hover:translate-y-[-4px] hover:shadow-2xl duration-200 cursor-default font-bold">
            <hr>
            <hr class="border-gray-200">
            <h3 class="text-gray-500 px-5 pt-5 pb-1 text-[15px] font-medium">${prop.name}</h3>
            <h2 class="text-black px-5 text-[32px] font-bold">${prop.number}</h2>
            <h3 class="text-gray-400 px-5 pt-1 pb-5 text-[14px] font-normal">${prop.lastText}</h3>
            <hr class="w-12 ml-5 border-t-2 border-blue-500 mb-3">
            </div>
        `;
        });
</script>
</html>