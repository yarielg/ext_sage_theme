<style>
    .search-letter {
        text-align: center;
        padding: 3px 0;
    }

    .alpha-active {
        font-family: $font-bold;
        border-radius: 4px;
        background: #199ad6;
        color: #fff !important;
    }
</style>

<div class="professionals-search container-fluid border-bottom border-secondary border-4">
    <div class="container">
        <div class="alpha-search row mb-2 mt-5">
            @php 
                ($alphas = range('A', 'Z'))
            @endphp
            
            @foreach ($alphas as $alpha)
                <a href="#" class="search-letter col btn-link text-secondary">{{ $alpha }}</a>
            @endforeach
        </div>

        <div class="row mb-4">
            <form class="row mt-1 g-3" action="/professionals-results">
                {{-- Keyword --}}
                <div class="col-12">
                    <label for="inputKeyword" class="form-label">Keyword</label>
                    <input type="text" class="form-control" name="kw" id="inputKeyword" value="@if ( isset( $getvars['kw'] ) ){{ $getvars['kw'] }}@endif">
                </div>

                {{-- Filter by Service --}}
                <div class="col-md-4">
                    <label for="inputService" class="form-label">Service or industry</label>
                    <select id="inputService" name="practice" class="form-select">
                        <option value="" selected>Choose...</option>
                        @foreach ( $filter_service_options as $service )
                            <option 
                                value="{{ $service->ID }}" 
                                @if ( isset( $getvars['practice'] ) && $getvars['practice'] == $service->ID )
                                    selected
                                @endif
                            >
                                {{ get_field('service_name', $service->ID) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter by Location --}}
                <div class="col-md-4">
                    <label for="inputLocation" class="form-label">Locations</label>
                    <select id="inputLocation" name="loc" class="form-select">
                        <option value="" selected>Choose...</option>
                        @foreach ( $filter_location_options as $location )
                            <option 
                                value="{{ $location->ID }}"
                                @if ( isset( $getvars['loc'] ) && $getvars['loc'] == $location->ID )
                                    selected
                                @endif
                            >
                                {{ get_the_title($location->ID) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter by School --}}
                <div class="col-md-4">
                    <label for="inputSchool" class="form-label">School</label>
                    <select id="inputSchool" name="edu" class="form-select">
                        <option value="" selected>Choose...</option>
                        @foreach ( $filter_school_options as $school )
                            <option 
                                value="{{ $school->ID }}"
                                @if ( isset( $getvars['edu'] ) && $getvars['edu'] == $school->ID )
                                    selected
                                @endif
                            >
                                {{ get_the_title($school->ID) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="hidden" id="alpha" name="alpha" value="@if ( isset( $getvars['alpha'] ) ) {{ $getvars['alpha'] }} @endif">

                <div class="col-12 d-flex justify-content-between align-items-center pt-2">
                    <button href="/professionals-results" class="btn btn-lg btn-link text-secondary p-0">View All</button>
                    <button type="submit" class="btn btn-lg">Search</button>
                </div>
            </form>

        </div>
    </div>
</div>
