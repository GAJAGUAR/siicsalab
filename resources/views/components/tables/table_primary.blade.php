@if($slot != '')
  <div class="table-responsive">
    <table class="table table-sm table-striped table-hover" id="table-primary">
      <thead>
      {{ $thead }}
      </thead>

      <tbody>
      {{ $slot }}
      </tbody>
    </table>
  </div>
@endif
