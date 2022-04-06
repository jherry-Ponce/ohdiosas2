 <!DOCTYPE html>
 <html lang="{{ str_replace('_', '-', app()->getLocale())}}">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <title>{{config('app.name', 'Oh! Diosas')}}</title>
{{--    @notifyCss --}}
   <!-- Fonts -->
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        
   <!-- Styles -->
     
      <link rel="stylesheet" href="{{ asset('css/app.css') }}">

      {{-- fontawesome --}}
      <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

      {{-- gliders --}}
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.css" integrity="sha512-YM6sLXVMZqkCspZoZeIPGXrhD9wxlxEF7MzniuvegURqrTGV2xTfqq1v9FJnczH+5OGFl5V78RgHZGaK34ylVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      {{-- flexslider --}}
      <link rel="stylesheet" href="{{asset('vendor/Flexslider/flexslider.css')}}">
     
      @livewireStyles

     
   <!--Scripts -->
   <script src="{{ mix('js/app.js')}}" defer></script>
      {{-- gliders --}}
      <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.7/glider.min.js" integrity="sha512-tHimK/KZS+o34ZpPNOvb/bTHZb6ocWFXCtdGqAlWYUcz+BGHbNbHMKvEHUyFxgJhQcEO87yg5YqaJvyQgAEEtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      {{-- flexslider utiliza jquery pra su funcionamineto asi que es necesario llamar primero al cdn de jquery --}}
      {{-- jquery --}}
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      {{-- flexslider --}}
      <script src="{{asset('vendor/Flexslider/jquery.flexslider-min.js')}}"></script>
  
 </head>

 <body class="font-sans antialiased  ">
   <x-jet-banner />
 {{--  <div class="min-h-screen bg-gray-100"> --}}
    @livewire('navigation')  
       <!-- Page Content -->
       <main class=" min-h-screen relative bg-gray-100">
        {{ $slot }}
  
    </main>
      
    <x-footer />
 {{--  </div>  --}}


 
  @livewireScripts
  
{{--   @notifyJs
  <x:notify-messages /> --}}

{{-- este scrip ayuda a abrir y cerra el menu de categorias --}}
  <script>
    function dropdown() {
        return {
            open: false,
            show() {
                if (this.open) {
                    //cierra el menu
                    this.open = false;
                    document.getElementsByTagName('html')[0].style.overflow = 'auto'
                } else {
                    //abre el menu
                    this.open = true;

                    //cerremos el scroll que aparece cuando se vizualiza el menu categorias
                    //con este codigo apuntamos directamente  a este archivo html y le indicamos que esconda el scrol con el hidden
                    document.getElementsByTagName('html')[0].style.overflow = 'hidden'
                }
            },
            close(){
                this.open=false;
                document.getElementsByTagName('html')[0].style.overflow='auto'
            }
        }
    }

</script>
{{-- lo que se busca hacer es que el codigo javascript de welcome se coloque al final de documento , 
  ya que el codigo java scrip debe ejecutarse una
  vez halla cargado todo lo de html  --}}
  @stack('script')
  @stack('sli')
 
  @stack('modals')

 </body>
 </html>