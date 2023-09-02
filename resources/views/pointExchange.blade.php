@extends('layout.app')

@section('content')
    <h2>Presents</h2>

    <div class="pointExchangeWrapper">
        @foreach($presents as $present)
            <div class="pointExchangeCard">
                <div class="pointExchangeImage">
                    <img src="{{ asset('storage/' . $present->presentImage) }}" class="card-img" alt="{{ $present->presentName }}">
                </div>
                <div class="pointExchangeBody">
                    <h5 class="card-title pointExchangeName">{{ $present->presentName }}</h5>
                    <p class="card-text pointExchangePoint">{{ $present->presentPoints }} Points</p>
                </div>
            </div>
        @endforeach
    </div>

    {{ $presents->links() }}

    <script>
        // Variable to keep track of the current items per page
        var currentItemsPerPage = window.innerWidth <= 768 ? 10 : 30;

        // Function to set the number of items per page based on screen width
        function setPaginationSize() {
            var newItemsPerPage = window.innerWidth <= 768 ? 10 : 30;

            // Only redirect if the items per page has changed
            if (newItemsPerPage !== currentItemsPerPage) {
                currentItemsPerPage = newItemsPerPage;
                // Redirect to the same route with the desired number of items per page
                window.location.href = "{{ route('pointExchangeView') }}?items=" + currentItemsPerPage;
            }
        }

        // Call the function when the page loads
        setPaginationSize();

        // Listen for window resize events and adjust pagination size accordingly
        window.addEventListener('resize', setPaginationSize);
    </script>
@endsection
