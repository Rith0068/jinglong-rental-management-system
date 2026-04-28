<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenant page</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <div class="flex">
        <x-side-bar />
        <div class="ml-60 p-8 w-full">
            <div class="flex justify-between">
                     <h2 class="text-2xl font-bold">Tenant Management</h2>
            </div>
            <div class="flex justify-between mt-10 ">
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>Sandra Lee</h2>
                            <span>A-101 · Standard</span>
                            <p>012-345-678 | Move-in: Jan 2024</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-green-100 text-green-700 font-semibold border border-green-400">
                                <i class="fa-solid fa-check"></i> Paid 168$
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>Mark Davis</h2>
                            <span> B-203 · Deluxe</span>
                            <p>095-678-901 | Move-in: Mar 2023</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-red-100 text-red-700 font-semibold border border-red-400">
                                ! Overdue $180
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>Lisa Chen</h2>
                            <span>A-305 · Standard</span>
                            <p> 078-234-567 | Move-in: Feb 2024</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-green-100 text-green-700 font-semibold border border-green-400">
                                <i class="fa-solid fa-check"></i> Paid 168$
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex justify-between mt-5 ">
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>Peter Kim</h2>
                            <span>C-102 · VIP Suite</span>
                            <p> 011-456-789 | Move-in: May 2024</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-yellow-100 text-yellow-700 font-semibold border border-yellow-400">
                                ~ Due Next Month $380
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>Rachel Wong</h2>
                            <span> D-401 · Standard</span>
                            <p>089-321-654 | Move-in: Aug 2024</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-green-100 text-green-700 font-semibold border border-green-400">
                                <i class="fa-solid fa-check"></i> Paid 168$
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border w-[500px] p-4 rounded-xl">
                    <div class="flex gap-5 text-sm">
                        <div class="border rounded-xl h-[50px] p-2 text-2xl">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div class="">
                            <h2>James Park</h2>
                            <span>B-105 · Standard</span>
                            <p>016-789-012 | Move-in: Oct 2023</p>
                            <div class="mt-2 inline-block px-3 h-[22px] rounded-full bg-red-100 text-red-700 font-semibold border border-red-400">
                                ! Overdue $180
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>