@if ($errors->any())
<div class="alert alert-danger"style="width:440px">
    <ul>
        @foreach ($errors->all() as $error)
            <li><span class="text-danger">{{ $error }}</span></li>
            
        @endforeach
    </ul>
</div>
@endif
