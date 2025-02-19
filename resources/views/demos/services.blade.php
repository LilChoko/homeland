@include('header')

<h2>Services</h2>

<ul>
    @foreach ($services as $s)
        <li>{{ $s->name }} ({{ $s->description }})</li>
    @endforeach
</ul>

@include('footer')
