<input type="checkbox" id="my-modal-{{ $id }}" class="modal-toggle">
<div class="modal">
  <div class="modal-box dark:bg-gray-900" style="min-height: auto">
    <div class="relative text-center mb-8">
      <h2 class="font-bold text-2xl">Are you sure delete this item?</h2>
      <label class="absolute right-0 top-1 cursor-pointer" for="my-modal-{{ $id }}">
        <img src="{{ asset('img/images/close.png') }}" alt="close ico">
      </label>
    </div>

    <form class="flex justify-between space-x-4" method="post" action="{{ $route }}">
      @csrf
      @method('DELETE')

      <button for="my-modal-2" class="btn-custom w-full block text-center mt-8 mb-2">
        Yes
      </button>

      <label for="my-modal-{{ $id }}" class="btn-custom-danger w-full block text-center mt-8 mb-2">
        No
      </label>
    </form>
  </div>
</div>
