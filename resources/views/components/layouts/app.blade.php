<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head')
</head>

<body class="min-h-screen bg-white antialiased">
    <div class="bg-background flex min-h-svh flex-col items-center justify-center gap-6 p-6 md:p-10">
        <div class="flex w-full max-w-2xl flex-row gap-2">
            <a class="h-full flex w-1/4 items-center hover:text-primary" href="/">
                <img alt="NAPSA Logo" loading="lazy" width="150" height="150" decoding="async" data-nimg="1"
                    class="" style="color:transparent"
                    src="https://icare.napsa.co.zm/media/logos/napsa-main-logo.svg"><span class="flex flex-col">
                    <h5 class="font-bold">NATIONAL PENSION</h5>
                    <h5 class="font-bold">SCHEME AUTHORITY</h5>
                </span>
            </a>

            <div class="flex flex-col flex-1 gap-6">
                <livewire:registration-wizard />
            </div>
        </div>
    </div>
</body>

</html>
