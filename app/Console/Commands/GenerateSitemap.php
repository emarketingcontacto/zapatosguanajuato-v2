<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Business;
use App\Models\Subcategory;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generar el sitemap dinámico de Zapatos Guanajuato';


    public function handle()
    {
        $genders=['mujer', 'hombre' , 'ninos' , 'ninas', 'unisex'];
        $sitemap = Sitemap::create();
        $subcategories = Subcategory::all();

        // 1. PÁGINAS ESTÁTICAS Y DIRECTORIOS PRINCIPALES
        // La Home y las tres categorías principales
        $sitemap->add(Url::create('/')->setPriority(1.0)->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS))
                ->add(Url::create(route('factories.index'))->setPriority(0.9))
                ->add(Url::create(route('wholesalers.index'))->setPriority(0.9))
                ->add(Url::create(route('retailers.index'))->setPriority(0.9));

        // 2. NEGOCIOS INDIVIDUALES (Dinámico por categoría)
        // Traemos los negocios con su categoría para que sea más rápido (eager loading)
        Business::with('category')->get()->each(function (Business $business) use ($sitemap) {

            // Determinamos la ruta basada en el SLUG de la categoría (más seguro que IDs)
            $routeName = 'retailers.show'; // Valor por defecto

            if ($business->category) {
                if ($business->category->slug === 'fabricantes') {
                    $routeName = 'factories.show';
                } elseif ($business->category->slug === 'mayoristas') {
                    $routeName = 'wholesalers.show';
                } elseif ($business->category->slug === 'minoristas') {
                    $routeName = 'retailers.show';
                }
            }

            $sitemap->add(
                Url::create(route($routeName, $business->slug))
                    ->setPriority(0.8)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        });

        // 3. URLs DE GÉNEROS POR CATEGORÍA PRINCIPAL (Nivel 1 de filtros)
        foreach (['factories', 'wholesalers', 'retailers'] as $group) {
            foreach ($genders as $gender) {
                $sitemap->add(
                    Url::create(route("$group.gender", $gender))
                        ->setPriority(0.7)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                );
            }
        }

        // 4. URLs DE TIPOS (Subcategorías) ANIDADO POR GÉNERO
        foreach (['factories', 'wholesalers', 'retailers'] as $group) {
            foreach ($genders as $gender) {
                foreach ($subcategories as $sub) {
                    $sitemap->add(
                        Url::create(route("$group.type", [
                            'genero' => $gender, // Parámetro 1
                            'tipo' => $sub->slug // Parámetro 2
                        ]))
                        ->setPriority(0.6)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    );
                }
            }
        }

        // 5. GUARDAR EL ARCHIVO EN PUBLIC
        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generado con éxito en public/sitemap.xml');
    }
}
