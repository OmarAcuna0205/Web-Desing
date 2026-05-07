<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    
    {{-- Directiva para que funcionen las rutas en Vue (Ziggy) --}}
    @routes 
    
    {{-- Cargamos los estilos y el script principal de Vue --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @inertiaHead
</head>
<body class="bg-slate-950 font-sans antialiased text-white">
    @inertia
</body>
</html>