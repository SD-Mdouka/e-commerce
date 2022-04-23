<ul class="list-group md-3">
    {{-- <a href="{{ route("categories.index") }}" class="list-group-item font-weight-bold list-group-item-action list-group-item-light">
      <i class="fas fa-th-list"></i>
        Categories
    </a> --}}
    <a href="{{ route("admin.products") }}" class="list-group-item font-weight-bold list-group-item-action list-group-item-light">
        <i class="fas fa-clipboard-list"></i>
        Products
    </a>
    <a href="{{ route("orders.index") }}" class="list-group-item font-weight-bold list-group-item-action list-group-item-light">
        <i class="fas fa-chair"></i>
        Orders
    </a>
    {{-- <a href="{{ route("servants.index") }}" class="list-group-item font-weight-bold list-group-item-action list-group-item-light">
        <i class="fas fa-user-cog"></i>
        Statistiques
    </a> --}}
</ul>
