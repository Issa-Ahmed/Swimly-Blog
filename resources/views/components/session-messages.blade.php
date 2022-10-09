<div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
    @if(session('message'))
    <p class="w-1/3 bg-green-400 py-1 rounded-lg text-white font-bold px-4">{{session('message')}}</p>
    @endif
</div>