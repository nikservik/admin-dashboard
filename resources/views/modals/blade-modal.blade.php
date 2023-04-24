<div class="fixed z-30 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
    <div class="relative inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
      <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
        <button wire:click="close" type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          <!-- Heroicon name: outline/x -->
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="sm:flex sm:items-start">
        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full {{ $iconBgColor }} sm:mx-0 sm:h-10 sm:w-10">
          <!-- Heroicon name: outline/exclamation -->
          {{ $icon }}
        </div>
        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
          <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">{{ $title }}</h3>
          <div class="mt-2">
            <div class="text-sm text-gray-500">
                {{ $slot }}
            </div>
          </div>
        </div>
      </div>
      <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
        <button
            @click="loading = true; $wire.call('confirm')"
            x-data="{ loading: false }"
            @modal-loaded.window="loading = false"
            type="button"
            class="w-full inline-flex items-center justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 {{ $okButtonColor }} text-base font-medium text-white hover:{{ $okButtonColorHover }} disabled:{{ $okButtonColorDisabled }} focus:outline-none sm:ml-3 sm:w-auto sm:text-sm"
            @if(! $this->canBeSaved) disabled @endif
        >
          <span x-show="loading">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -ml-1 mr-2 text-white animate-spin" fill="none" viewBox="0 0 40 40" stroke="currentColor" stroke-width="3">
                <circle class="opacity-30" cx="20" cy="20" r="18"/>
                <path stroke-linecap="round" stroke-linejoin="round" d="M38 20c0-9.94-8.06-18-18-18" />
            </svg>
          </span>
          <span>{{ $okButton }}</span>
        </button>
        <button wire:click="close" type="button" class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:text-gray-500 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">{{ $cancelButton }}</button>
      </div>
    </div>
  </div>
</div>
