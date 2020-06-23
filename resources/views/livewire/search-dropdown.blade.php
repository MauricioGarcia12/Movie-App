<div>
    <div class="relative mt-2 md:mt-0">
        <input wire:model.debounce.500ms='search' type="text" class="bg-gray-800 text-sm rounded-full w-64 px-4 py-1 pl-6 focus:outline-none focus:shadow-outline" placeholder="Search Movie">
        <div class="absolute top-0">
            <svg class="fill-current text-grey-400 w-4 mt-2 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><path d="M21 21l-4.35-4.35"/></svg> 
        </div>
    </div>
    <!--Creating dropdown when searching-->
    <!--If the search has more than 2 chars show the dropdown-->
    @if (strlen($search)>2)
    <div class="absolute bg-gray-800 text-sm rounded w-64 mt-4">
        <!--If exists the results show the info--->
        @if ($searchResults->count()>0)
            <ul>
                <!--Using the variables from the liveware file-->
                @foreach ($searchResults as $result)
                    <li class="border-b border-gray-700">
                    <a href="{{route('movies.show',$result['id'])}}" 
                    class="block hover:bg-gray-700 px-3 py-3 flex items-center">
                    
                    <!--If the movie has a poster shows it if not a placeholder image-->
                    @if($result['poster_path'])
                        <img class="w-8" src="https://image.tmdb.org/t/p/w92/{{$result['poster_path']}}" alt="poster">
                    @else 
                        <img src="https://via.placeholder.com/50x75" alt="poster" class="w-8">
                    @endif
                        <span class="ml-5 ">{{$result['title']}}</span>
                    </a>
                    </li> 
                @endforeach
            </ul>
        @else
            <div class="px-3 py-3">No results for {{ $search }}</div>
        @endif
    </div>
    @endif
</div>
