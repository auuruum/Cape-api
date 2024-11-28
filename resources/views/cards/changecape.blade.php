@push('styles')
    <style>
        #capePreview {
            width: 384px;
            height: 192px;
            image-rendering: crisp-edges; /* Firefox */
            image-rendering: pixelated; /* Chrome and Safari */
            background: repeating-conic-gradient(#808080 0% 25%, transparent 0% 50%) 50% / 20px 20px;
        }
    </style>
@endpush

@push('footer-scripts')
    <script>
        const capeInput = document.getElementById('cape');

        capeInput.addEventListener('change', function () {
            if (!capeInput.files || !capeInput.files[0]) {
                return;
            }

            const file = capeInput.files[0];

            if (file.name !== undefined && file.name !== '') {
                document.getElementById('capeLabel').innerText = file.name;
            }

            const reader = new FileReader();

            reader.onload = function (e) {
                const preview = document.getElementById('capePreview');
                preview.src = e.currentTarget.result;
                preview.classList.remove('d-none');
            };

            reader.readAsDataURL(capeInput.files[0]);
        });
    </script>
@endpush

<div class="mb-3">
    <label for="cape"></label>       
    @if(Storage::disk('public')->exists('capes/' . auth()->id() . '.png'))
        <img src="{{ route('cape-api.profile.cape.show', ['user' => auth()->user()->id]) }}" alt="{{ trans('cape-api::messages.profile.current') }}" id="capePreview" class="mt-3 img-fluid mx-auto d-block">
    @else
        <img src="" alt="{{ trans('cape-api::messages.profile.current') }}" id="capePreview" class="mt-3 img-fluid mx-auto d-block d-none">
    @endif
</div>  

<form action="{{ route('cape-api.profile.cape.upload') }}" method="POST" enctype="multipart/form-data" class="mb-3">
    @csrf

    <div class="mb-3">
        <div class="custom-file">
            <label class="form-label" for="cape" data-browse="{{ trans('messages.actions.browse') }}" id="capeLabel">
                {{ trans('messages.actions.choose_file') }}
            </label>
            <input type="file" class="form-control @error('cape') is-invalid @enderror" id="cape" name="cape" accept=".png" required>

            @error('cape')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        {{ trans('messages.actions.save') }}
    </button>
</form>

@if(Storage::disk('public')->exists('capes/' . auth()->id() . '.png'))
    <form action="{{ route('cape-api.profile.cape.delete') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">
            {{ trans('messages.actions.remove') }}
        </button>
    </form>
@endif
