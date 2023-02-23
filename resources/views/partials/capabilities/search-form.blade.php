<div class="capabilities-search row mt-3 mb-2 gx-3">
    <div class="col-sm-12 col-lg-8">
        <form action="/services" method="post">
            <div class="input-group">
                <input type="text" name="kw" class="form-control" id="inputKeyword" placeholder="Search by Name or Keyword" aria-label="Search by Name or Keyword">
                <div class="input-group-append">
                    <button class="btn btn-primary btn-search-keyword" type="button">
                        <i class="fa-solid fa-magnifying-glass keyword-search-icon"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-12 col-lg-4">
        <style>
            .services .services-filter a { font-size: 22px; line-height: 1.2; font-weight: 600; padding: 16px 20px 10px; }
        </style>
        <div class="services-filter">
            <ul>
                <li><a class="capabilities-collapse" style="display: none;" href="#">View All As Tiles <i class="fa-solid fa-th-large"></i></a></li>
                <li><a class="capabilities-expand-all" href="#">View All As List <i class="fa-solid fa-list-ul"></i></a></li>
            </ul>
        </div>
    </div>
</div>
