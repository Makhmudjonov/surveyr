<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ _env('APP_NAME', 'My Leaf MVC App') }}</title>
    <link rel="shortcut icon" href="https://leafphp.dev/logo-circle.png" type="image/x-icon">

    {{-- assets() points to the public/assets folder --}}
    <link rel="stylesheet" href="{{ assets('css/styles.css') }}">

    {{--
        You generally want to keep all your css and js in the public folder
        unless you are using a bundler like vite. vite() looks for assets in
        the app/views folder by default. You can uncomment the line below to
        use vite.

        Be sure to run `npm install` and then `npm run dev` or `npm run build` first.
    --}}
    {{-- {{ vite('css/app.css') }} --}}

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
                <h4 style="font-size: 22px;">Welcome to Leaf <span class="green">3</span></h4>
            </div>
            <div class="flex card mt-3">
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="book-outline"></ion-icon>
                    <div class="ml-1">
                        <h4>
                            Barg MVC Hujjatlari
                        </h4>
                        <p class="mt-1">
                            Barg MVC ikkala yangi boshlanuvchilar uchun ham toza va ishlab chiqaruvchilarga qulay bo'lgan hujjatlar bilan birga keladi va
 tajribali foydalanuvchilar.
                        </p>
                        <a href="https://mvc.leafphp.dev/" target="_blank" rel="noopener">
                            Barg mvc dotslari
                        </a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="laptop-outline"></ion-icon>
                    <div class="ml-1">
                        <h4>
                            Barg hujjatlari
                        </h4>
                        <p class="mt-1">
                            Skelet asosan barg bilan qurilgan qaynatgichdir, biz tekshirishni tavsiya etamiz
 Avval barg dotslari.
                        </p>
                        <a href="https://leafphp.dev" target="_blank" rel="noopener">
                            Leaf Docs
                        </a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="logo-twitter"></ion-icon>
                    <div class="ml-1">
                        <h4>Tvitter</h4>
                        <p class="mt-1">
                            Twitter-dagi Nizomlar, yangi modullar, darsliklar haqida so'nggi yangiliklarni olish uchun Twitter-dagi barg php-ga rioya qiling
 va ajoyib maslahatlar.
                        </p>
                        <a href="https://twitter.com/leafphp" target="_blank" rel="noopener">@leafphp</a>
                    </div>
                </div>
                <div class="flex" style="width: calc(50% - 80px); padding: 30px;">
                    <ion-icon name="logo-youtube"></ion-icon>
                    <div class="ml-1">
                        <h4>Youtube</h4>
                        <p class="mt-1">
                            Bizda youtube kanali bor, u erda biz barg va bizning modullarimiz, va boshqa videolarni yuklaymiz
 loyihalar.
                        </p>
                        <a href="https://www.youtube.com/channel/UCllE-GsYy10RkxBUK0HIffw" target="_blank"
                            rel="noopener">Barg youtube kanali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
