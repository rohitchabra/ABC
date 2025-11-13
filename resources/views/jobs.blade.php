<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>
    
    @foreach($jobs as $job)
    <ul>
        <a href="/jobs/{{$job['id']}}"  class="text-blue-500 hover:underline">
            <li><strong>{{$job['title']}}</strong> Pays: {{$job['salary']}} per year <br></li>
        </a>  
    </ul>
    @endforeach
</x-layout>