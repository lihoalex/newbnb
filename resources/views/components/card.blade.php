<div class="card">

    @if($property->propertiesMedia->count() > 0)
        @foreach($property->propertiesMedia as $media)
        <img class="card-img-top" style="max-width: 1000px; max-height: 800px;" src="{{ asset($media->path) }}" alt="Photo">
        @endforeach
    @endif

    <div class="card-body">
        <p class="card-title">{{$property->address->contry}}, {{$property->address->city}}, {{$property->address->street}} {{$property->address->number}}, apartment {{$property->address->apartment}}</p>
        <p class="card-text">User: {{$property->user->name}}</p>
        <p class="card-text">Email: {{$property->user->email}}</p>
        <p class="card-text">Sqft: {{$property->square_ft}}</p>
        <p class="card-text">Bathrooms: {{$property->bathrooms_count}}</p>
        <p class="card-text">Bedrooms: {{$property->bedrooms_count}}</p>
        <p class="card-text">Daily rate: {{$property->rental_rate}}</p>
    </div>
</div>
