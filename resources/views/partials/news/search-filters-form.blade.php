<div class="news-search container-fluid">
    <div class="container">

        <div class="row mb-4">
            <form class="row mt-1 g-3" method="GET" action="/news-results">
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

                {{-- Filter by Client Type --}}
                <div class="col-md-4">
                    <label for="inputClient" class="form-label">News Type</label>
                    <select id="inputClient" name="news-type" class="form-select">
                        <option value="" selected>Choose...</option>
                        @foreach( $filter_news_type_options as $term ) 
                            <option 
                                value="{{ $term->term_id }}"
                                @if ( isset( $getvars['news-type'] ) && $getvars['news-type'] == $term->term_id )
                                    selected
                                @endif
                            >
                                {{ $term->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Filter by Professional --}}
                <div class="col-md-4">
                    <label for="inputProfessional" class="form-label">Professional</label>
                    <select id="inputProfessional" name="pro" class="form-select">
                        <option value="" selected>Choose...</option>
                        @foreach( $filter_professional_options as $professional ) 
                            <option 
                                value="{{ $professional['id'] }}"
                                @if ( isset( $getvars['pro'] ) && $getvars['pro'] == $professional['id'] )
                                    selected
                                @endif
                            >
                                {{ $professional['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12 d-flex justify-content-between align-items-center pt-2">
                    <a href="/news-results" class="btn btn-lg btn-link text-secondary p-0">View All</a>
                    <button type="submit" class="btn btn-lg">Search</button>
                </div>
            </form>

        </div>
    </div>
</div>
