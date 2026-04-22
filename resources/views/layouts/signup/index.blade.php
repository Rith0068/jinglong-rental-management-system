<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4">
    <script type="module" src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <div class="flex">
        <div class="block m-auto w-[440px] border-black shadow-2xl rounded-lg mt-[100px] h-[620px] bg-white-100">
            <div class="flex">
                <h2 class="pl-[50px] text-[32px] font-bold pt-[30px]">
                    Create an Account 
                </h2>
            </div>
            <div class="flex font-bold text[16px] text-gray-400">
                <p class="pl-[50px]">
                </p>
            </div>
            <form action="" class="pl-[50px]">
                <label>
                    <p class="font-bold font-bold text[16px] mt-[20px]">
                        Name
                    </p>
                    <input type="text" placeholder="fill your name nere" class="border-gray-800 text-gray-500 p-[10px] w-[330px] border-gray-950 font-bold bg-gray-50 rounded-lg hover:text-gray-800 mt-1">
                </label>
                <label>
                    <p  class="font-bold font-bold text[16px] mt-[20px]">
                        Gmail
                    </p>
                    <input type="gmail" placeholder="fill your gmail here" class="border-gray-800 text-gray-500 p-[10px] w-[330px] bg-gray-50 font-bold rounded-lg hover:text-gray-800 mt-1">
                </label>
                <label>
                    <p class="font-bold font-bold text[16px] mt-[20px]">
                        Phone Number
                    </p>
                    <input type="text" placeholder="fill your name nere" class="border-gray-800 text-gray-500 p-[10px] w-[330px] border-gray-950 font-bold bg-gray-50 rounded-lg hover:text-gray-800 mt-1">
                </label>
                 <label>
                    <p class="font-bold font-bold text[16px] mt-[20px]">
                        PassWord
                    </p>
                    <input type="password" id="password" placeholder="fill your password here" class="border-gray-800 text-gray-500 p-[10px] w-[330px] bg-gray-50 font-bold rounded-lg hover:text-gray-800 mt-1">
                </label>
                <div class="flex font-bold text-[14px] text-gray-400 mt-[10px] gap-[10px]">
                    <p class="">show password</p>
                    <input type="checkbox" id="toggleCheckbox" onclick="showPassWord()" class="mr-[10px]">
                </div>
            </form>
            <div class="pl-[50px] flex justify-between pr-[50px]">
                <button class="mt-[20px] bg-blue-400 p-[10px] w-[330px] rounded-lg shadow font-bold text[16px] text-white ">
                    Sign Up 
                </button>

                <script>
                    function showPassWord() {
                    var x = document.getElementById("password");
                    if (x.type === "password") {
                        x.type = "text";
                    } else {
                        x.type = "password";
                    }
                    }
                </script>
            </div>
            <p class="font-bold pl-[50px] text[16px] mt-[20px]">Aleady have account ? <a href="/login" class="text-blue-500">Login</a></p>
        </div>
    </div>
</body>
</html>