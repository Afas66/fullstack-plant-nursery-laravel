<x-app-layout>
    {{-- Optional: You can define a header that will appear in the layout's header section --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Plant Details
        </h2>
    </x-slot>

    {{-- All of your existing page content goes here --}}
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-6xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Plant Image -->
                <div class="space-y-4">
                    <div class="aspect-square bg-gray-100 rounded-lg overflow-hidden">
                        @if($plant->image)
                            <img src="{{ asset('storage/' . $plant->image) }}"
                                 alt="{{ $plant->name }}"
                                 class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">
                                <svg class="w-24 h-24" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Plant Details -->
                <div class="space-y-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ $plant->name }}</h1>
                        <p class="text-2xl font-semibold text-green-600 mt-2">${{ number_format($plant->price, 2) }}</p>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Description</h3>
                            <p class="text-gray-600 mt-1">{{ $plant->description }}</p>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-medium text-gray-900">Category</h4>
                                <p class="text-gray-600">{{ $plant->category->name ?? 'N/A' }}</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Difficulty</h4>
                                <p class="text-gray-600 capitalize">{{ $plant->difficulty_level }}</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Size</h4>
                                <p class="text-gray-600 capitalize">{{ $plant->size }}</p>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900">Stock</h4>
                                <p class="text-gray-600">{{ $plant->stock_quantity }} available</p>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-medium text-gray-900">Light Requirements</h4>
                            <p class="text-gray-600">{{ $plant->light_requirements }}</p>
                        </div>

                        <div>
                            <h4 class="font-medium text-gray-900">Water Frequency</h4>
                            <p class="text-gray-600">{{ $plant->water_frequency }}</p>
                        </div>

                        @if($plant->care_instructions)
                        <div>
                            <h4 class="font-medium text-gray-900">Care Instructions</h4>
                            <p class="text-gray-600">{{ $plant->care_instructions }}</p>
                        </div>
                        @endif
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="pt-4">
                        @if($plant->stock_quantity > 0)
                            <button class="w-full bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition duration-200">
                                Add to Cart
                            </button>
                        @else
                            <button class="w-full bg-gray-400 text-white py-3 px-6 rounded-lg font-semibold cursor-not-allowed" disabled>
                                Out of Stock
                            </button>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Related Plants -->
            @if($relatedPlants->count() > 0)
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-gray-900 mb-8">Related Plants</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedPlants as $relatedPlant)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="aspect-square bg-gray-100">
                            @if($relatedPlant->image)
                                <img src="{{ asset('storage/' . $relatedPlant->image) }}"
                                     alt="{{ $relatedPlant->name }}"
                                     class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900">{{ $relatedPlant->name }}</h3>
                            <p class="text-green-600 font-medium">${{ number_format($relatedPlant->price, 2) }}</p>
                            <a href="{{ route('plants.show', $relatedPlant->slug) }}"
                               class="inline-block mt-2 text-green-600 hover:text-green-700 font-medium">
                                View Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-app-layout>
