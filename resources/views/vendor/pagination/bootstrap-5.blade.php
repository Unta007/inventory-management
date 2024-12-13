<nav>
    <div class="d-flex justify-content-center pagination-page">
        <select id="pageSelect" class="form-select" aria-label="Page selection">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <option value="{{ $url }}" {{ $page == $paginator->currentPage() ? 'selected' : '' }}>
                            Page {{ $page }}
                        </option>
                    @endforeach
                @endif
            @endforeach
        </select>
    </div>
</nav>

<script>
    document.getElementById('pageSelect').addEventListener('change', function() {
        const selectedUrl = this.value;
        if (selectedUrl) {
            window.location.href = selectedUrl + '&per_page=' + {{ request('per_page', 5) }};
        }
    });
</script>
