<x-layouts.layout>
<div class="container">
    <!-- Filter Buttons -->
    <div class="d-flex justify-content-start mb-4">
        <a href="{{ route('tables.index') }}" 
           class="btn {{ request('position') ? 'btn-outline-secondary' : 'btn-primary' }} me-2">
            All Tables
        </a>
        <a href="{{ route('tables.filterByPosition', ['position' => 1]) }}" 
           class="btn {{ request('position') == 1 ? 'btn-primary' : 'btn-outline-secondary' }} me-2">
            Position 1
        </a>
        <a href="{{ route('tables.filterByPosition', ['position' => 2]) }}" 
           class="btn {{ request('position') == 2 ? 'btn-primary' : 'btn-outline-secondary' }} me-2">
            Position 2
        </a>
        <a href="{{ route('tables.filterByPosition', ['position' => 3]) }}" 
           class="btn {{ request('position') == 3 ? 'btn-primary' : 'btn-outline-secondary' }}">
            Position 3
        </a>
    </div>

    <!-- Table Grid Section -->
    <div class="row">
        @foreach($tables as $table)
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <!-- Table Card -->
                <div class="card shadow-sm rounded-3 text-center">
                    <div class="card-body {{ $table->table_status == 'Empty' ? 'bg-light' : 'bg-danger text-white' }}">
                        <h5 class="card-title fw-bold">Table {{ $table->table_number }}</h5>
                        <p class="card-text mb-2">Status: {{ $table->table_status }}</p>
                        <p class="card-text mb-3">Position: {{ $table->table_position }}</p>
                        <p class="card-text mb-3">Capacity: {{ $table->table_capacity }}</p>
                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-center gap-2">
                            <!-- Book Now Button -->
                            @if($table->table_status == 'Empty')
                                <a href="{{ route('orders.index', ['table_id' => $table->id, 'table_name' => $table->table_name]) }}"
                                   class="btn btn-success btn-sm">
                                    Book Now
                                </a>
                            @else
                                <button class="btn btn-secondary btn-sm" disabled>Reserved</button>
                            @endif

                            <!-- Show Button -->
                            <a href="{{ route('tables.show', $table->id) }}" 
                               class="btn btn-primary btn-sm">
                                Show
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('tables.edit', $table->id) }}" 
                               class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('tables.destroy', $table->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this table?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $tables->links() }}
    </div>
</div>
</x-layouts.layout>
