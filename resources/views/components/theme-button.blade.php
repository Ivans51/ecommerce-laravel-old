<li>
  <div class="pretty p-switch p-fill" onclick="onChangeTheme()">
    <input type="checkbox" />
    <div class="state">
      <label>Dark theme</label>
    </div>
  </div>
</li>

@push('styles')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">
@endpush

@push('scripts')
  <script>
    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
