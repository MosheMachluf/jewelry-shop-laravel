<div class="ui breadcrumb">
    @foreach ($breadcrumbs as $key => $val)
    <a class="section" href="{{ url($val) }}">{{ $key }}</a>
    <i class="left angle icon divider"></i>
    @endforeach
    <div class="active section">{{ $current }}</div>
</div>
