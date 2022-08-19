<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add property') }}
        </h2>
    </x-slot>

    <div class="py-6" style="max-width: 700px; margin: auto">
        <form method="POST" enctype="multipart/form-data" action="{{ route('store_property') }}">
            @csrf

            <!-- Zipcode -->
            <div>
                <x-label for="zipcode" :value="__('Zipcode')" />
                <x-input id="zipcode" class="block mt-1 w-full" type="text" name="zipcode" :value="old('zipcode')" required autofocus />
            </div>

            <!-- Country -->
            <div>
                <x-label for="country" :value="__('Country')" />
                <x-input id="country" class="block mt-1 w-full" type="text" name="country" :value="old('country')" required />
            </div>

            <!-- City -->
            <div>
                <x-label for="city" :value="__('City')" />
                <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required />
            </div>

            <!-- Street -->
            <div>
                <x-label for="street" :value="__('Street')" />
                <x-input id="street" class="block mt-1 w-full" type="text" name="street" :value="old('street')" required />
            </div>

            <!-- Number -->
            <div>
                <x-label for="number" :value="__('Number')" />
                <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
            </div>

            <!-- Apartments -->
            <div>
                <x-label for="apartment" :value="__('Apartments')" />
                <x-input id="apartment" class="block mt-1 w-full" type="text" name="apartment" :value="old('apartment')" required />
            </div>

            <!-- Bathrooms -->
            <div>
                <x-label for="bathrooms" :value="__('Bathrooms')" />
                <x-input id="bathrooms" class="block mt-1 w-full" type="text" name="bathrooms" :value="old('bathrooms')" required />
            </div>

            <!-- Bedrooms -->
            <div>
                <x-label for="bedrooms" :value="__('Bedrooms')" />
                <x-input id="bedrooms" class="block mt-1 w-full" type="text" name="bedrooms" :value="old('bedrooms')" required />
            </div>

            <!-- Square ft -->
            <div>
                <x-label for="sqft" :value="__('Square ft')" />
                <x-input id="sqft" class="block mt-1 w-full" type="text" name="sqft" :value="old('sqft')" required />
            </div>

            <!-- Rental Rate -->
            <div>
                <x-label for="price" :value="__('Rental Rate')" />
                <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" />
            </div>

            <!-- House type -->
            <div>
                <x-label for="house_type" :value="__('House type')" />
                <select id="house_type" class="block mt-1 w-full" name="house_type" required>
                    <option selected>Choose type</option>
                    <option value="1">single family house</option>
                    <option value="2">haunted house</option>
                    <option value="3">apartment</option>
                    <option value="4">wood shed</option>
                    <option value="5">tent</option>
                    <option value="6">open air</option>
                </select>
            </div>

            <!-- Auto pricing -->
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="auto_calculate" name="auto_calculate" value="1" {{ old('is_featured') ? 'checked="checked"' : '' }}>
                <label class="form-check-label" for="auto_calculate">Auto pricing</label>
            </div>

            <!-- Photo -->
            <div class="form-group">
                <x-label for="file" :value="__('Photo')" />
                <input type="file" id="file" name="file">
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Submit') }}
                </x-button>
            </div>
        </form>
    </div>
</x-app-layout>
