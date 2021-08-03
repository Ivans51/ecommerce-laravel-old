<li class="flex items-center space-x-2">
  <label for="dark-theme">Dark theme</label>
  <input id="dark-theme"
         type="checkbox"
         checked="checked"
         class="toggle toggle-sm bg-gray-400 dark:bg-gray-900"
         onclick="onChangeTheme()">
</li>

@push('scripts')
  <script>
    isDarkTheme()

    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
