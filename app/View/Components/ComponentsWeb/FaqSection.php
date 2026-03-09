<?php

namespace App\View\Components\ComponentsWeb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FaqSection extends Component
{
    //variables
    public $categoryName;
    public $faqs=[];

     public function __construct($categoryName)
    {
        $this->categoryName = $categoryName;
        $this->setFaqs();
    }

    private function setFaqs(){

        //  questions & answers de Fabricantes
        $fabricantes= [
            [
                'question'=> '¿Cuál es el Mínimo de Compra?(MOQ)',
                'answer' => 'Para precios de fábrica, el mínimo suele ser de <strong>12 a 36 pares</strong> por corrida completa.'
            ],
            [
                'question'=>'Los Fabricantes permiten la compra de modelos o tallas mixtas en un mismo pedido, y qué es una "Corrida Completa"?',
                'answer' => 'Generalmente, <strong>No.</strong> La condición principal para comprar a un fabricante es adquirir la <strong>Corrida Completa.</strong> Este término significa que usted debe comprar <strong>todos los números consecutivos</strong> de un mismo modelo y color, tal como salen de la línea de producción (ej. 2, 3, 4, 5, y 6, o 5, 6, 7 y 8). Comprar por corrida permite al productor maximizar su eficiencia y es la razón principal por la que puede ofrecer el precio más bajo, ya que evita el "desconchado" de inventario.
                Si su negocio requiere una alta variedad de tallas y modelos mixtos, le recomendamos visitar nuestro Directorio de Mayoristas, quienes sí ofrecen esa flexibilidad a un precio ligeramente superior.'
            ],
            [
                'question'=>'¿Qué políticas de pago y producción maneja la Venta Directa de Fábrica?',
                'answer' => 'Los términos de pago son más rigurosos. Dado que se trata de <strong>producción bajo pedido y precios de costo</strong>, la mayoría de los fabricantes de Guanajuato solicitan un anticipo de entre el 50% y el 70% para iniciar la producción, con el saldo liquidado antes del envío. Los tiempos de entrega pueden variar entre 2 y 6 semanas, dependiendo del volumen y la disponibilidad de material.'
            ],
            [
                'question'=>'¿Ofrecen los Fabricantes garantía de calidad o por defectos de manufactura?',
                'answer' => 'Sí, la <strong>garantía de un fabricante cubre únicamente defectos de fabricación </strong>(suela despegada, costuras rotas) por un período limitado (7 a 15 días tras la recepción). Es fundamental revisar la mercancía al recibirla y reportar cualquier incidencia con evidencia fotográfica. <strong>La garantía no aplica para cambios de modelo, talla o color una vez que el pedido ha sido surtido</strong>.'
            ],
            [
                'question'=> ' ¿Es posible solicitar la Fabricación de un modelo o marca propia (Maquila)?',
                'answer' => 'Sí, muchos de los fabricantes de calzado listados ofrecen el <strong>servicio de Maquila (Fabricación de marca blanca).</strong> Este servicio exige el volumen de compra más alto de todos, ya que el fabricante debe incurrir en costos de moldes, hormas y patrones nuevos. Los pedidos de maquila tenian volúmenes mínimos que superaban los 100 pares por modelo. Sin embargo esto ha cambiado en los últimos años y te sugerimos contactar al fabricante y solicitar la compra mínima para este tipo de negociación.'
            ]
        ];

        //  questions & answers de Mayoristas
        $mayoristas = [
            [
                'question' => '¿Cuál es la cantidad mínima de compra (MOQ) para precios de mayoreo?',
                'answer' => 'A diferencia de las fábricas, los <strong>mayoristas de calzado</strong> ofrecen un mínimo mucho más bajo, generalmente desde <strong>3 a 6 pares</strong>. Esto permite que pequeños negocios o emprendedores comiencen con una inversión mínima.'
            ],
            [
                'question' => '¿Puedo mezclar modelos, tallas o colores en mi pedido (Surtido)?',
                'answer' => '<strong>Sí.</strong> Esta es la mayor ventaja de un distribuidor mayorista. Permiten el <strong>surtido de modelos y tallas mixtas</strong> en el mismo pedido, lo que te ayuda a tener variedad en tu tienda sin necesidad de comprar corridas completas de un solo estilo.'
            ],
            [
                'question' => '¿Es mucha la diferencia de precio entre un Mayorista y una Fábrica?',
                'answer' => 'El precio es marginalmente superior al de fábrica, pero se compensa con la <strong>reducción de riesgo de inventario</strong>. Al no estar obligado a comprar volúmenes altos de un solo modelo, tu capital circula más rápido y evitas mercancía estancada.'
            ],
            [
                'question' => '¿Qué métodos de pago y facilidades ofrecen los distribuidores?',
                'answer' => 'Los mayoristas suelen ser más flexibles, aceptando <strong>transferencias, tarjetas de crédito y sistemas de apartado</strong>. Esto facilita la operación para negocios nuevos que requieren asegurar mercancía con un flujo de efectivo moderado.'
            ],
            [
                'question' => '¿Cuánto tiempo tarda el envío de un pedido de mayoreo?',
                'answer' => 'La entrega es casi inmediata. Al ser productos de <strong>entrega inmediata (stock listo)</strong>, el tiempo de despacho suele ser de <strong>24 a 72 horas</strong>. Es la opción ideal si necesitas resurtir tu zapatería rápidamente ante una tendencia de moda.'
            ]
        ];

        //  questions & answers de Minoristas
        $minoristas= [
            [
                'question'=> '¿Cuál es el Mínimo de Compra?(MOQ)',
                'answer' => 'Para precios de fábrica, el mínimo suele ser de <strong>12 a 36 pares</strong> por corrida completa.'
            ],
            [
                'question'=>'Los Fabricantes permiten la compra de modelos o tallas mixtas en un mismo pedido, y qué es una "Corrida Completa"?',
                'answer' => 'Generalmente, <strong>No.</strong> La condición principal para comprar a un fabricante es adquirir la <strong>Corrida Completa.</strong> Este término significa que usted debe comprar <strong>todos los números consecutivos</strong> de un mismo modelo y color, tal como salen de la línea de producción (ej. 2, 3, 4, 5, y 6, o 5, 6, 7 y 8). Comprar por corrida permite al productor maximizar su eficiencia y es la razón principal por la que puede ofrecer el precio más bajo, ya que evita el "desconchado" de inventario.
                Si su negocio requiere una alta variedad de tallas y modelos mixtos, le recomendamos visitar nuestro Directorio de Mayoristas, quienes sí ofrecen esa flexibilidad a un precio ligeramente superior.'
            ],
            [
                'question'=>'¿Qué políticas de pago y producción maneja la Venta Directa de Fábrica?',
                'answer' => 'Los términos de pago son más rigurosos. Dado que se trata de <strong>producción bajo pedido y precios de costo</strong>, la mayoría de los fabricantes de Guanajuato solicitan un anticipo de entre el 50% y el 70% para iniciar la producción, con el saldo liquidado antes del envío. Los tiempos de entrega pueden variar entre 2 y 6 semanas, dependiendo del volumen y la disponibilidad de material.'
            ],
            [
                'question'=>'¿Ofrecen los Fabricantes garantía de calidad o por defectos de manufactura?',
                'answer' => 'Sí, la <strong>garantía de un fabricante cubre únicamente defectos de fabricación </strong>(suela despegada, costuras rotas) por un período limitado (7 a 15 días tras la recepción). Es fundamental revisar la mercancía al recibirla y reportar cualquier incidencia con evidencia fotográfica. <strong>La garantía no aplica para cambios de modelo, talla o color una vez que el pedido ha sido surtido</strong>.'
            ],
            [
                'question'=> ' ¿Es posible solicitar la Fabricación de un modelo o marca propia (Maquila)?',
                'answer' => 'Sí, muchos de los fabricantes de calzado listados ofrecen el <strong>servicio de Maquila (Fabricación de marca blanca).</strong> Este servicio exige el volumen de compra más alto de todos, ya que el fabricante debe incurrir en costos de moldes, hormas y patrones nuevos. Los pedidos de maquila tenian volúmenes mínimos que superaban los 100 pares por modelo. Sin embargo esto ha cambiado en los últimos años y te sugerimos contactar al fabricante y solicitar la compra mínima para este tipo de negociación.'
            ]
        ];

        //Seleccion
        $this->faqs = match($this->categoryName){
            'fabricantes' => $fabricantes,
            'mayoristas' => $mayoristas,
            'minoristas' => $minoristas,
            default =>[],
        };

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.components-web.faq-section');
    }
}
