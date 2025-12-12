<!DOCTYPE html>
<html lang="en">
<head>
   <x-layout.head />
</head>


<!-- page wrapper -->
<body>

    <div class="boxed_wrapper ltr">
        {{-- <x-layout.preloader /> --}}
        <x-layout.header />
        <x-layout.mobile-menu />

        {{ $slot }}


        <x-layout.footer />
    </div>

    <x-layout.scripts />
</body><!-- End of .page_wrapper -->
</html>