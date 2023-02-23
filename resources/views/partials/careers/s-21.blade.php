<div class="container-fluid section-21 pb-7 pt-8">
  <div class="container">
    {{-- Row --}}
    <div class="row mb-7">
      <div class="col mb-3">
        <div class="px-0 px-lg-5 mb-5">
          @include('components.component-text-block', [
            'heading' => 'HIRING NEW ASSOCIATES FAQ'
          ])
        </div>
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                What criteria do you look for in hiring new associates?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                We are proud of our track-record for advancing associates and helping them meet their career goals. We invite attorneys to become members of our firm based on a number of factors, including development of our core competencies, substantive legal skills, professional skills and client service. We continue supporting attorneys with a similar suite of professional development efforts throughout their careers. For example, we host a two-year program for new members to provide in-depth knowledge and skills about firm management and legal industry development so they can best help further the mission of the firm and to become productive firm leaders. Members also have access to individual coaching, leadership development programs and advanced professional skills trainings.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                What is the starting salary for new associates?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Accordion Body Text
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Does Bass, Berry & Sims pay for bar admission expenses?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Accordion Body Text
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="px-0 px-lg-5 mb-5">
          @include('components.component-text-block', [
            'heading' => 'PROFESSIONAL DEVELOPMENT',
            'content'  => 'The professional development program at Bass, Berry & Sims is designed to advance the substantive knowledge, professional skills and client service for all attorneys. Our approach is development-oriented, and we aim to help attorneys at all levels to advance through empowerment and tailored resources.'
          ])
        </div>
        <div class="accordion mt-5" id="accordionExampleTwo">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                Core Competencies
              </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExampleTwo">
              <div class="accordion-body">
                Accordion Body Text
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                Integration
              </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExampleTwo">
              <div class="accordion-body">
                Accordion Body Text
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                Mentoring
              </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExampleTwo">
              <div class="accordion-body">
                Accordion Body Text
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
