<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-r from-white via-blue-400 to-blue-600">
    
    
    <div class=" flex flex-col sm:justify-center self-center     md:grid-cols-2   h-full sm:rounded-lg  overflow-hidden  md:grid   {{-- items-center  --}}">

        
            <figure class="md:w-full  mt-4 md:px-20 md:py-20 md:bg-red-100  md:shadow-md hidden md:block">
              <a href="/">
                {{-- DE Aqui sale el logo psara todo --}}
               {{--  <img class="shadow-xl rounded-sm" src="" alt="logo"> --}}
                <iframe class="shadow-xl rounded-sm" src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fdianaorozcograo%2Fphotos%2Fa.224898151664290%2F885168632303902%2F&show_text=true&width=500" width="500" height="534" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
             </a>
            </figure>
     
        <div class="w-full px-10 py-10 overflow-hidden mt-6 md:col-span-1 md:mt-4 md:px-20 md:py-28 bg-white shadow-md ">
            {{ $logo }} 
            {{ $slot }}
        </div>
    </div > 


    {{-- mobil --}}
    {{-- <div class="flex flex-col sm:justify-center items-center pt-6 sm:pt-0 w-full h-full md:hidden">

    
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

    </div> --}}
</div>
