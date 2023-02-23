<form class="row mt-1 g-3" action="/alumni/alumni-directory" method="get">
  {{-- Row --}}
  <div class="col-md-4">
    <label for="inputName" class="form-label">Name</label>
    <input type="text" class="form-control" id="inputName" name="inputName">
  </div>
  <div class="col-md-4">
    <label for="inputLocation" class="form-label">Location</label>
    <input type="text" class="form-control" id="inputLocation" name="inputLocation">
  </div>
  <div class="col-md-4">
    <label for="inputCompany" class="form-label">Company</label>
    <input type="text" class="form-control" id="inputCompany" name="inputCompany">
  </div>
  <div class="col-12 d-flex justify-content-between align-items-center pt-3">
    <a href="/alumni/alumni-directory/?view_all=1" class="btn btn-lg btn-link text-secondary p-0">View All</a>
    <button type="submit" class="btn btn-lg btn--search">Search</button>
  </div>
</form>