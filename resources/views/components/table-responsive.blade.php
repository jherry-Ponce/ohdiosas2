<div class="flex flex-wrap pt-3  overflow-x-scroll md:overflow-hidden">
    <div class="flex justify-center font-sans w-auto md:w-full">
        <div class="w-full">
            <div class="bg-white shadow-inner rounded my-4 ">
                {{$slot}}
            </div>
        </div>
    </div>
</div>
<style>
    @media (min-width: 1350px) {
    .md\:table-celll {
        display: table-cell;
    }
}
</style> 