<?php
    namespace App\Traits;

    use App\Models\Business;
    use App\Models\Category;
    use App\Models\Subcategory;

    trait HasFilters{
        public function getGenderData($categorySlug, $genero){
            // 1. Obtenemos la categoría (fabricantes, mayoristas, etc.)
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            // 2. Negocios de esta categoría que tienen modelos de este género
            $businesses = Business::where('category_id', $category->id)
                ->whereHas('shoeModels', function($q) use ($genero){
                    $q->where('gender', $genero);
                })
                ->with('category')
                ->get();
            // 3. Tipos (botas, tenis, etc.) disponibles para este género
            $availableTypes = Subcategory::whereHas('shoeModels', function($q) use ($genero){
                $q->where('gender', $genero);
            })->get();

            return [
                'category' => $category,
                'businesses' => $businesses,
                'availableTypes' => $availableTypes,
                'genderName' => ucfirst($genero),
                'genderSlug' => $genero,
            ];
        }

        public function getTypeData($categorySlug, $genero, $tipoSlug){
            // 1. Obtenemos categoría y subcategoría (tipo)
            $category = Category::where('slug', $categorySlug)->firstOrFail();
            $subcategory = Subcategory::where('slug', $tipoSlug)->firstOrFail();
            // 2. Negocios que coinciden con categoría, género Y tipo
            $businesses = Business::where('category_id', $category->id)
                ->whereHas('shoeModels', function($query) use ($genero, $subcategory){
                    $query->where('gender', $genero)
                        ->where('subcategory_id', $subcategory->id);
                })
                    ->with(['category'])
                    ->get();
            // 3. Tipos disponibles para el menú (solo por género)
            $availableTypes = Subcategory::whereHas('shoeModels', function($q) use ($genero) {
                $q->where('gender', $genero);
            })->get();

            return [
                'category' => $category,
                'subcategory' => $subcategory,
                'businesses' => $businesses,
                'availableTypes' => $availableTypes,
                'genderName' => ucfirst($genero),
                'genderSlug' => $genero,
            ];
        }
    }
?>
