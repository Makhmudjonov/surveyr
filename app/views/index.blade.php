<!DOCTYPE html>
<html lang="uz">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ _env('APP_NAME', 'Mening Leaf MVC Dasturim') }}</title>
    <link rel="shortcut icon" href="https://leafphp.dev/logo-circle.png" type="image/x-icon">

    {{-- assets() jamoat/assets papkasiga yo'naltiradi --}}
    <link rel="stylesheet" href="{{ assets('css/styles.css') }}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700;display=swap">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<body class="flex center-all h-screen">
    <div class="container">
        <div class="mt-3">
            <div class="flex center-start">
                <img src="https://www.leafphp.dev/logo-circle.png" alt="">
                <h4 style="font-size: 22px;">Leaf <span class="green">3</span> ga xush kelibsiz</h4>
            </div>
            <div class="flex card mt-3">
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="book-outline"></ion-icon>
                    <div class="ml-1">
                        <h4>
                            Leaf MVC Hujjatlari
                        </h4>
                        <p class="mt-1">
                            Leaf MVC boshlovchilar va tajribali foydalanuvchilar uchun toza va qulay hujjatlarga ega.
                        </p>
                        <a href="https://mvc.leafphp.dev/" target="_blank" rel="noopener">
                            Leaf MVC Hujjatlari
                        </a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <div class="ml-1">
                        <h4>
                            Leaf Hujjatlari
                        </h4>
                        <p class="mt-1">
                            Skeleton asosan Leaf bilan qurilgan bo'lgani uchun, avval Leaf hujjatlarini o'rganish tavsiya etiladi.
                        </p>
                        <a href="https://leafphp.dev" target="_blank" rel="noopener">
                            Leaf Hujjatlari
                        </a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="logo-twitter"></ion-icon>
                    <div class="ml-1">
                        <h4>Twitter</h4>
                        <p class="mt-1">
                            Leaf PHP ning eng so'nggi yangiliklari, darsliklari va maslahatlari bilan tanishing.
                        </p>
                        <a href="https://twitter.com/leafphp" target="_blank" rel="noopener">@leafphp</a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="logo-youtube"></ion-icon>
                    <div class="ml-1">
                        <h4>YouTube</h4>
                        <p class="mt-1">
                            Bizning YouTube kanalimizda Leaf, modullar, frameworklar va boshqa loyihalar haqida videolar joylashtirilgan.
                        </p>
                        <a href="https://www.youtube.com/channel/UCllE-GsYy10RkxBUK0HIffw" target="_blank"
                            rel="noopener">Leaf YouTube Kanali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
