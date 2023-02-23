@if ( isset( $total_pages ) && $total_pages > 1 )
    <div class="row pagination">
        <div class="col-auto ms-auto">
            <label for="jumpPage" class="col-form-label">Jump to page</label>
            
            <?php 
            $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1; 
            ?>

            <select id="@if ( isset( $pagination_id ) ){{ $pagination_id }}@else jumpPage @endif" class="form-select">

                @if ( isset( $total_pages ) )
                    @for ( $i = 1; $i <= $total_pages; $i++ )
                        <option @if ( $paged == $i )selected @endif value="{{ $i }}">{{ $i }}</option>
                    @endfor

                @else 
                    <option selected>1</option>
                    <option>...</option>
                @endif

            </select>
        </div>
    </div>
@endif
