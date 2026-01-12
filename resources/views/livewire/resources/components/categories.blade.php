<div class="row text-center">
    @foreach($categories as $category)
        <div class="col">
            <button type="button" class="category-circle bg-{{ $category['color'] }} btn btn-outline-light"
                    wire:click="selectCategory('{{ $category['title'] }}')">
                <i class="bi bi-{{ $category['icon'] }}"></i>
            </button>
            <p>{{ ucfirst($category['title']) }}</p>
        </div>
    @endforeach
</div>
