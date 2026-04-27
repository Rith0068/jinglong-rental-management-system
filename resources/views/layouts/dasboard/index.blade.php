<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
    <div class="flex">
            <x-side-bar/>
            
            <div class="ml-60 p-8 w-full">
                <div class="flex justify-between">
                     <h2 class="text-2xl font-bold">Overview Dashboard</h2>
                </div>
                <x-dasboard/>
                <div class="flex justify-between mt-5 rounded-xl">
                    <div class="border w-[49%] p-5 font-bold rounded-xl">
                        <h2 class="text-xl"> <i class="fa-regular fa-house"></i> Room Status — Real-time</h2>
                        <x-room />
                    </div>
                    <div class="w-[49%] border rounded-xl p-5 font-bold">
                        <h2 class="text-xl"> <i class="fa-regular fa-money-bill-1"></i> Monthly Rent Revenue</h2>
                        @php
                            $max = 5000;
                        @endphp

                        @foreach ($revenues as $item)
                            <div class="flex item-center mb-4 mt-5">
                                <span class="w-10 text-sm text-gray-500">
                                    {{ $item['month'] }}
                                </span>
                                <div class="flex-1 mx-3 h-2 bg-gray-700 rounded-full overflow-hidden mt-2">
                                    @if($item['amount'])
                                        <div 
                                            class="h-2 rounded-full {{ $item['amount'] > 4000 ? 'bg-green-400' : 'bg-yellow-400' }}"
                                            style="width: {{ ($item['amount'] / 5000) * 100 }}%">
                                        </div>
                                    @endif
                                </div>

                                <span class="w-16 text-right text-sm">
                                    {{ $item['amount'] ? '$'.number_format($item['amount']) : '—' }}
                                </span>
                            </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class=" flex justify-between mt-5">
                    <div class="border rounded-xl w-[49%] p-5">
                        <div class="flex justify-between">   
                            <div class="text-xl font-bold">
                                <i class="fa-solid fa-users"></i>   Recent Tenants
                            </div>
                            <span class="font-bold "><a href="/tenant">View all</a></span>
                        </div>
                        <div class="flex gap-20 mt-3">
                            <span class="font-bold">Name</span>
                            <span class="ml-53 font-bold">Room</span>
                            <span class="font-bold">Status</span>
                        </div>
                        <x-tenant />
                    </div>
                    <div class="border rounded-xl w-[49%] p-5">
                        <div class="flex justify-between">   
                            <div class="text-xl font-bold">
                                <i class="fa-solid fa-wrench"></i>  Recent Maintenance Requests
                            </div>
                            <span class="font-bold "><a href="/maintenances">View all</a></span>
                        </div>
                        <x-maintenance />
                    </div>
                    
                </div>
            </div>
    </div> 
    
    
</body>
</html>