<div
  class="cursor-pointer items-center flex space-x-2 px-2 py-1
          dark:hover:bg-gray-800 hover:bg-gray-100 lg:hover:bg-transparent lg:dark:hover:bg-transparent
          lg:dark:hover:text-primary lg:hover:text-primary">
  <label for="dark-theme" class="cursor-pointer">Dark theme</label>
  <input id="dark-theme"
         type="checkbox"
         checked="checked"
         class="toggle toggle-sm bg-gray-400 dark:bg-gray-900"
         onclick="onChangeTheme()">
</div>

@push('scripts')
  <script>
    isDarkTheme()

    function onChangeTheme() {
      changeTheme()
    }
  </script>
@endpush
