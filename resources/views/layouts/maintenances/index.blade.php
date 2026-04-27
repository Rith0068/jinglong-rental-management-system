<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maintenance Management</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <div class="flex">
        <x-side-bar />
        <div class="ml-60 p-8 w-full">
                <div class="flex justify-between">
                     <h2 class="text-2xl font-bold">Maintenance & Repairs</h2>
                </div>
                <x-maintenances />

                <div class="border rounded-xl w-full mt-5 p-5">
                        <div class="flex justify-between">   
                            <div class="text-xl font-bold">
                                <i class="fa-solid fa-wrench"></i>  Recent Maintenance Requests
                            </div>
                            <span class="font-bold "><a href="">View all</a></span>
                        </div>
                        <x-maintenance />
                         <div class="flex justify-between border mt-3 p-3 rounded-xl">
                            <div class="w-[60%] flex gap-5">
                                <div class="border p-2 rounded-lg">
                                    <i class="fa-solid fa-bolt"></i>
                                </div>
                                <span>Electrical issue — D-401<br> <p class="text-sm text-gray-500"> Rachel Wong · Apr 01, 2026 </p></span>
                            </div>
                            
                            <div class=" mt-3 text-yellow-500 ">
                                In progress
                            </div>
                        </div>
                </div>

                
        </div>
    </div>
</body>
</html>