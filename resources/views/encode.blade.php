<!-- resources/views/encode.blade.php -->

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif
<form method="POST" action="{{ route('save') }}">
    @csrf
    @method('POST')
    <label for="serial_number">Serial Number:</label>
    <input type="text" name="serial_number" id="serial_number">

    <label for="manufacturing_date">Manufacturing Date:</label>
    <input type="date" name="manufacturing_date" id="manufacturing_date">

    <button type="submit">Save</button>
</form>
