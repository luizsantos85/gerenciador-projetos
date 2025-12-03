@if ($errors->any())
<div class="alert flex justify-center items-center p-2 bg-red-500 text-white border-2 border-red-500 rounded-sm transition-opacity duration-500">
    <ul class="flex flex-col mt-1">
        @foreach($errors->all() as $error)
        <li class="text-sm text-center">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div
    class="alert flex justify-between items-center p-2 bg-green-500 text-white border-2 border-green-500 rounded-sm transition-opacity duration-500">
    <span class="text-sm">{{ session('success') }}</span>
</div>
@endif

@if (session('error'))
<div
    class="alert flex justify-between items-center p-2 bg-red-500 text-white border-2 border-red-500 rounded-sm transition-opacity duration-500">
    <span class="text-sm">{{ session('error') }}</span>
</div>
@endif

@push('scripts')
<script>
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.opacity = '0';
            setTimeout(() => {
                alert.remove();
            }, 500);
        });
    }, 5000);
</script>
@endpush
