<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tour;
use App\Models\IncludedService;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // 1. Создаем один универсальный набор дат
        $fechasGenericas = [
            ['mes' => 'marzo', 'label' => '01-03-2026 - 04-03-2026', 'value' => 'marzo1', 'precio' => 300],
            ['mes' => 'marzo', 'label' => '09-03-2026 - 12-03-2026', 'value' => 'marzo2', 'precio' => 350],
            ['mes' => 'marzo', 'label' => '16-03-2026 - 19-03-2026', 'value' => 'marzo3', 'precio' => 400],
            ['mes' => 'junio', 'label' => '01-06-2026 - 04-06-2026', 'value' => 'junio1', 'precio' => 450],
            ['mes' => 'junio', 'label' => '09-06-2026 - 12-06-2026', 'value' => 'junio2', 'precio' => 500],
            ['mes' => 'junio', 'label' => '16-06-2026 - 19-06-2026', 'value' => 'junio3', 'precio' => 550],
            ['mes' => 'septiembre', 'label' => '01-09-2026 - 04-09-2026', 'value' => 'septiembre1', 'precio' => 500],
            ['mes' => 'septiembre', 'label' => '09-09-2026 - 12-09-2026', 'value' => 'septiembre2', 'precio' => 450],
            ['mes' => 'septiembre', 'label' => '16-09-2026 - 19-09-2026', 'value' => 'septiembre3', 'precio' => 400],
        ];


        $excurcion = IncludedService::create([
            'icon' => 'excurcion',
            'title' => 'Programa de excursiones',
            'description' => ["Excursiones según el programa del tour", "Visita a los principales lugares de interés", "Excursiones a pie con guía"]
        ]);

        $transporte = IncludedService::create([
            'icon' => 'transporte',
            'title' => 'Transporte',
            'description' => ["Todos los traslados por la ruta de la excursión", "Cómodo autobús turístico", "Traslados entre ciudades y hoteles"]
        ]);

        $alojamiento = IncludedService::create([
            'icon' => 'alojamiento',
            'title' => 'Alojamiento',
            'description' => ['Alojamiento en hotel durante todo el periodo de la excursión.']
        ]);

        $alimentacion = IncludedService::create([
            'icon' => 'alimentacion',
            'title' => 'Alimentación',
            'description' => ["Desayunos diarios en el hotel", "Cenas incluidas en el programa del tour", "Bebidas no estan incluidas"]
        ]);

        $acompaniamiento = IncludedService::create([
            'icon' => 'acompaniamiento',
            'title' => 'Acompañamiento',
            'description' => ["Guía profesional / acompañante", "Acompañamiento durante la excursión por la ruta"]
        ]);

        $adiccional = IncludedService::create([
            'icon' => 'adiccional',
            'title' => 'Adicionalmente',
            'description' => ["Entradas a los museos (si están indicadas en el programa)", "Asistencia las 24 horas durante la excursión"]
        ]);


        $tours = [
            [
                'info' => [
                    'titulo' => "Andalucía: tesoros del sur",
                    'pais' => "spain",
                    'inicio_fin' => "SEVILLA",
                    'ciudades_texto' => "Sevilla - Jerez - Cádiz - Sevilla",
                    'ciudades_list' => ["Sevilla", "Jerez", "Cádiz"],
                    'excursion_titulo' => "¡Tradiciones del Sur!",
                    'texto' => "Descubra el alma de Andalucía en una ruta que funde el embrujo de Sevilla, la tradición bodeguera de Jerez y la luz infinita de Cádiz, la ciudad más antigua de Occidente.",
                    'duracion' => 3,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/sevilla.avif", // Просто имя файла для начала
                    'imagen_section1' => "tours/jerez.avif",
                    'imagen_incluido' => "tours/sevilla1.avif",
                    'imagen_no_incluido' => "tours/andalu.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Sevilla",
                        'descripcion' => [
                            "Llegada a Sevilla y registro en el hotel.",
                            "Visita panorámica por el centro histórico: Catedral de Sevilla y la famosa Giralda.",
                            "Paseo por el encantador barrio de Santa Cruz: calles estrechas, patios andaluces y plazas acogedoras.",
                            "Visita al Real Alcázar de Sevilla, impresionante palacio de estilo mudéjar.",
                            "Por la noche: espectáculo de flamenco y cena con platos típicos andaluces (tapas, gazpacho, jamón ibérico).",
                        ],
                        'imagen' => "tours/sevilla1.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Jerez - Cádiz",
                        'descripcion' => [
                            "Traslado a Jerez de la Frontera (aprox. 1 hora).",
                            "Visita a una bodega tradicional con degustación del famoso vino de Jerez.",
                            "Continuación hacia Cádiz (aprox. 40 minutos).",
                            "Recorrido por el casco antiguo: Catedral de Cádiz y paseo marítimo con vistas al Atlántico.",
                            "Regreso a Sevilla por la noche (aprox. 1,5 horas)."
                        ],
                        'imagen' => "tours/jerez.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Regreso a Sevilla",
                        'descripcion' => [
                            "Desayuno en el hotel.",
                            "Visita a la emblemática Plaza de España y paseo por el Parque de María Luisa.",
                            "Posibilidad de realizar un paseo en barco por el río Guadalquivir.",
                            "Tiempo libre para compras y visitas opcionales."
                        ],
                        'imagen' => "tours/andalu.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Anillo del Norte",
                    'pais' => "spain",
                    'inicio_fin' => "BILBAO",
                    'ciudades_texto' => "Bilbao - San Sebastián - Vitoria - Bilbao",
                    'ciudades_list' => ["Bilbao", "San Sebastián", "Vitoria"],
                    'excursion_titulo' => "¡Descubra el ambiente único del País Vasco!",
                    'texto' => "Esta ruta circular une tres joyas de la región: la moderna Bilbao, la capital gastronómica San Sebastián y la histórica Vitoria.",
                    'duracion' => 4,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/bilbao.avif",
                    'imagen_section1' => "tours/san-sebastian1.avif",
                    'imagen_incluido' => "tours/san-sebastian2.avif",
                    'imagen_no_incluido' => "tours/vitoria3.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Bilbao",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Paseo por el casco antiguo (Casco Viejo): callejuelas estrechas, catedral de Santiago.",
                            "Por la noche, visita al Museo Guggenheim, símbolo del Bilbao contemporáneo.",
                            "Cena en bares tradicionales vascos con pinchos."
                        ],
                        'imagen' => "tours/bilbao5.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — San-Sebastián",
                        'descripcion' => [
                            "Traslado a San Sebastián (aproximadamente 1,5 horas).",
                            "Casco antiguo (Parte Vieja): degustación de tapas y marisco.",
                            "Subida al monte Iqueldo: vistas panorámicas de la ciudad y la bahía.",
                            "Por la noche: ruta gastronómica por los mejores bares y restaurantes."
                        ],
                        'imagen' => "tours/san-sebastian1.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Vitoria",
                        'descripcion' => [
                            "Traslado a Vitoria (aproximadamente 1,5 horas).",
                            "Visita al centro medieval: plaza de Virgen Blanca, calles con edificios góticos.",
                            "Visita a la catedral de Santa María, uno de los principales templos del País Vasco.",
                            "Por la noche, paseo por las acogedoras callejuelas y cena en un restaurante local."
                        ],
                        'imagen' => "tours/vitoria1.avif"
                    ],
                    [
                        'titulo' => "Día 4",
                        'dia_label' => "Día 4 - Regreso a Bilbao",
                        'descripcion' => [
                            "Regreso a Bilbao (aproximadamente 1 hora).",
                            "Tiempo libre para ir de compras y pasear.",
                            "Posibilidad de visitar el mercado de la Ribera, el mercado cubierto más grande de Europa.",
                            "Fin del tour, traslado al aeropuerto o noche adicional en la ciudad."
                        ],
                        'imagen' => "tours/bilbao1.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Dos corazones de España",
                    'pais' => "spain",
                    'inicio_fin' => "BARCELONA",
                    'ciudades_texto' => "Barcelona - Madrid - Barcelona",
                    'ciudades_list' => ["Barcelona", "Madrid"],
                    'excursion_titulo' => "¡Contrastes de Metrópolis!",
                    'texto' => "Un viaje vibrante entre los dos pilares de España: la elegancia imperial y el ritmo incansable de Madrid frente al genio modernista y la brisa mediterránea de Barcelona.",
                    'duracion' => 3,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/barcelona.avif",
                    'imagen_section1' => "tours/madrid.avif",
                    'imagen_incluido' => "tours/madrid1.avif",
                    'imagen_no_incluido' => "tours/barcelona1.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Madrid",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Visita a la emblemática Sagrada Familia, obra maestra de Antoni Gaudí.",
                            "Paseo por Las Ramblas y el Barrio Gótico.",
                            "Tiempo libre en el puerto o en la playa de la Barceloneta y cena con cocina catalana."
                        ],
                        'imagen' => "tours/madrid2.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Barcelona",
                        'descripcion' => [
                            "Traslado en tren de alta velocidad a Madrid (aprox. 2,5 - 3 horas).",
                            "Recorrido por el centro histórico: Puerta del Sol y Plaza Mayor.",
                            "Visita al Palacio Real de Madrid.",
                            "Paseo por el Parque del Retiro y tiempo libre para disfrutar de la gastronomía local."
                        ],
                        'imagen' => "tours/barcelona1.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Regreso a Madrid",
                        'descripcion' => [
                            "Regreso a Barcelona en tren de alta velocidad.",
                            "Visita al Parque Güell con vistas panorámicas de la ciudad.",
                            "Paseo por el elegante Paseo de Gracia.",
                            "Tiempo libre para compras o visitas opcionales."
                        ],
                        'imagen' => "tours/madrid1.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "La ruta de los incas",
                    'pais' => "peru",
                    'inicio_fin' => "CUZCO",
                    'ciudades_texto' => "Cuzco - Valle Sagrado - Machu Picchu - Cuzco",
                    'ciudades_list' => ["Cuzco", "Valle Sagrado", "Machu Picchu"],
                    'excursion_titulo' => "¡Misterios de los Andes!",
                    'texto' => "Siga las huellas de una civilización perdida a través de las cumbres de los Andes, desde los muros sagrados de Cuzco hasta la majestuosidad mística de Machu Picchu.",
                    'duracion' => 4,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/machu.avif",
                    'imagen_section1' => "tours/cuzco.avif",
                    'imagen_incluido' => "tours/sagrado.avif",
                    'imagen_no_incluido' => "tours/pichu.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Cuzco",
                        'descripcion' => [
                            "Llegada a Cusco (3.400 m sobre el nivel del mar) y traslado al hotel.",
                            "Tiempo libre para aclimatación y descanso.",
                            "Visita al centro histórico: Plaza de Armas de Cusco y Catedral del Cusco.",
                            "Recorrido por el Templo del Sol (Qorikancha), antiguo santuario inca."
                        ],
                        'imagen' => "tours/cuzco.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Valle Sagrado",
                        'descripcion' => [
                            "Excursión al Valle Sagrado de los Incas.",
                            "Visita al complejo arqueológico de Pisac y su mercado tradicional.",
                            "Almuerzo en restaurante local con cocina andina.",
                            "Recorrido por la fortaleza de Ollantaytambo.",
                            "Traslado en tren hacia Aguas Calientes."
                        ],
                        'imagen' => "tours/sagrado.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Machu Picchu",
                        'descripcion' => [
                            "Ascenso temprano hacia Machu Picchu, una de las Nuevas Siete Maravillas del Mundo.",
                            "Visita guiada por la ciudadela: templos, terrazas agrícolas y miradores panorámicos.",
                            "Tiempo libre para explorar y tomar fotografías.",
                            "Regreso en tren a Cusco por la tarde."
                        ],
                        'imagen' => "tours/pichu.avif"
                    ],
                    [
                        'titulo' => "Día 4",
                        'dia_label' => "Día 4 - Regreso a Cuzco",
                        'descripcion' => [
                            "Mañana libre para pasear por el barrio de San Blas o realizar compras de artesanía local.",
                            "Posibilidad de visitar el sitio arqueológico de Sacsayhuamán."
                        ],
                        'imagen' => "tours/sagrado.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "El desierto y el océano",
                    'pais' => "peru",
                    'inicio_fin' => "LIMA",
                    'ciudades_texto' => "Lima - Paracas - Huacachina - Lima",
                    'ciudades_list' => ["Lima", "Paracas", "Huacachina"],
                    'excursion_titulo' => "¡Naturaleza Salvaje!",
                    'texto' => "Contraste puro entre la inmensidad de las dunas de Ica y la fauna salvaje de las Islas Ballestas, terminando en la sofisticada gastronomía de Lima frente al mar.",
                    'duracion' => 4,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/parakas.avif",
                    'imagen_section1' => "tours/lima.avif",
                    'imagen_incluido' => "tours/huacachina.avif",
                    'imagen_no_incluido' => "tours/lima1.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Lima",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Visita al centro histórico: Plaza Mayor de Lima y Catedral de Lima.",
                            "Paseo por el barrio de Miraflores y el malecón con vistas al océano Pacífico.",
                            "Cena en restaurante local con degustación de ceviche y pisco sour."
                        ],
                        'imagen' => "tours/lima.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Paracas",
                        'descripcion' => [
                            "Traslado a Paracas (aprox. 3-4 horas).",
                            "Excursión en lancha a las Islas Ballestas, conocidas como las “Galápagos peruanas”",
                            "Observación de fauna marina: leones marinos, pingüinos de Humboldt y aves exóticas.",
                            "Visita a la Reserva Nacional de Paracas con paisajes desérticos junto al mar."
                        ],
                        'imagen' => "tours/parakas.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 — Huacachina",
                        'descripcion' => [
                            "Traslado al oasis de Huacachina (aprox. 1 hora).",
                            "Paseo por la laguna natural rodeada de altas dunas.",
                            "Excursión en buggy por el desierto y práctica de sandboarding.",
                            "Atardecer en las dunas con vistas panorámicas del oasis."
                        ],
                        'imagen' => "tours/huacachina.avif"
                    ],
                    [
                        'titulo' => "Día 4",
                        'dia_label' => "Día 4 - Regreso a Lima",
                        'descripcion' => [
                            "Mañana libre para descansar o realizar actividades opcionales.",
                            "Traslado de regreso a Lima (aprox. 4-5 horas).",
                            "Tiempo libre para compras de recuerdos o visita opcional a Barranco."
                        ],
                        'imagen' => "tours/lima1.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Lago Titicaca",
                    'pais' => "peru",
                    'inicio_fin' => "PUNO",
                    'ciudades_texto' => "Puno - Uros - Taquile - Puno",
                    'ciudades_list' => ["Puno", "Uros", "Taquile"],
                    'excursion_titulo' => "¡Cuna de Civilizaciones!",
                    'texto' => "Sumérjase en la espiritualidad del lago navegable más alto del mundo, explorando las legendarias islas flotantes de los Uros y la cultura ancestral de Taquile, donde el tiempo parece haberse detenido entre el azul del cielo и del agua.",
                    'duracion' => 3,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/titicaca.avif",
                    'imagen_section1' => "tours/puno.avif",
                    'imagen_incluido' => "tours/uros.avif",
                    'imagen_no_incluido' => "tours/taquile.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Puno",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Paseo por el centro histórico y visita a la Plaza de Armas de Puno.",
                            "Visita a la Catedral de Puno, ejemplo del barroco andino.",
                            "Subida al mirador de Cerro Huajsapata para disfrutar de vistas panorámicas del lago al atardecer."
                        ],
                        'imagen' => "tours/puno.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Islas Uros y Taquile",
                        'descripcion' => [
                            "Excursión en barco por el Lago Titicaca, el lago navegable más alto del mundo.",
                            "Visita a las islas flotantes de Uros, construidas con totora.",
                            "Continuación hacia la isla de Taquile, conocida por su tradición textil.",
                            "Almuerzo típico en la isla y encuentro con la comunidad local."
                        ],
                        'imagen' => "tours/uros.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Regreso a Puno",
                        'descripcion' => [
                            "Regreso a Puno por la tarde.",
                            "Mañana libre para pasear por el mercado artesanal.",
                            "Posibilidad de realizar una excursión opcional a las chullpas de Sillustani.",
                            "Tiempo libre para descansar o disfrutar de la gastronomía local."
                        ],
                        'imagen' => "tours/taquile.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Anillo de Oro",
                    'pais' => "russia",
                    'inicio_fin' => "MOSCÚ",
                    'ciudades_texto' => "Moscú - Vladimir - Súzdal - Moscú",
                    'ciudades_list' => ["Moscú", "Vladimir", "Súzdal"],
                    'excursion_titulo' => "¡Viaje a la Rusia medieval!",
                    'texto' => "Sumérjase en la atmósfera de antiguas ciudades, donde las cúpulas doradas brillan sobre paisajes tranquilos y monasterios centenarios conservan el espíritu de la vieja Rusia. Vladimir y Súzdal le invitan a descubrir las raíces históricas y las tradiciones auténticas del país.",
                    'duracion' => 3,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/moscow4.avif",
                    'imagen_section1' => "tours/vladimir.avif",
                    'imagen_incluido' => "tours/suzdal1.avif",
                    'imagen_no_incluido' => "tours/suzdal.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Vladímir",
                        'descripcion' => [
                            "Salida desde Moscú hacia Vladímir.",
                            "Visita a la Catedral de la Asunción de Vladímir.",
                            "Paseo por el centro histórico y la Puerta Dorada.",
                            "Cena con platos tradicionales rusos.",
                        ],
                        'imagen' => "tours/vladimir.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Súzdal",
                        'descripcion' => [
                            "Traslado a Súzdal.",
                            "Visita al Kremlin de Súzdal.",
                            "Recorrido por el Museo de Arquitectura de Madera.",
                            "Paseo por monasterios y paisajes rurales típicos.",
                        ],
                        'imagen' => "tours/suzdal.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Regreso a Moscú",
                        'descripcion' => [
                            "Mañana libre para disfrutar del ambiente tradicional.",
                            "Regreso a Moscú.",
                            "Tiempo libre en la ciudad.",
                        ],
                        'imagen' => "tours/moscow4.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Capitales imperiales",
                    'pais' => "russia",
                    'inicio_fin' => "MOSCÚ",
                    'ciudades_texto' => "Moscú - San Petersburgo - Moscú",
                    'ciudades_list' => ["Moscú", "San Petersburgo"],
                    'excursion_titulo' => "¡Donde late el corazón de Rusia!",
                    'texto' => "Descubra la grandeza de dos capitales legendarias: la poderosa Moscú y la majestuosa San Petersburgo. Desde las murallas del Kremlin hasta los palacios a orillas del Nevá, este viaje revela la historia imperial, el arte incomparable y el alma cultural de Rusia.",
                    'duracion' => 4,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/moscow2.avif",
                    'imagen_section1' => "tours/moscow1.avif",
                    'imagen_incluido' => "tours/moscow.avif",
                    'imagen_no_incluido' => "tours/piter1.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Moscú",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Visita a la Plaza Roja y la Catedral de San Basilio.",
                            "Recorrido por el Kremlin de Moscú y sus catedrales históricas.",
                            "Paseo por el parque Zaryadye con vistas al río Moscova.",
                            "Tarde libre en la calle Arbat y cena con cocina rusa tradicional."
                        ],
                        'imagen' => "tours/moscow3.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Moscú",
                        'descripcion' => [
                            "Visita a la Galería Tretiakov.",
                            "Recorrido por algunas estaciones del Metro de Moscú, famosas por su arquitectura monumental.",
                            "Paseo por el Parque Gorki.",
                            "Tren de alta velocidad nocturno hacia San Petersburgo."
                        ],
                        'imagen' => "tours/moscow1.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - San Petersburgo",
                        'descripcion' => [
                            "Visita al Museo del Hermitage, uno de los más importantes del mundo.",
                            "Paseo por la avenida Nevsky Prospekt.",
                            "Visita a la Catedral de San Isaac.",
                            "Paseo en barco por los canales de la ciudad."
                        ],
                        'imagen' => "tours/piter.avif"
                    ],
                    [
                        'titulo' => "Día 4",
                        'dia_label' => "Día 4 - San Petersburgo - Moscú",
                        'descripcion' => [
                            "Excursión al palacio de Peterhof.",
                            "Tiempo libre para compras y paseos.",
                            "Regreso en tren a Moscú."
                        ],
                        'imagen' => "tours/piter1.avif"
                    ]
                ]
            ],
            [
                'info' => [
                    'titulo' => "Tesoros del Volga",
                    'pais' => "russia",
                    'inicio_fin' => "KAZÁN",
                    'ciudades_texto' => "Kazán - Sviyazhsk - Kazán",
                    'ciudades_list' => ["Kazán", "Sviyazhsk"],
                    'excursion_titulo' => "¡Encuentro de culturas en el corazón del Volga!",
                    'texto' => "Explore Kazán, donde Oriente y Occidente se entrelazan en una armonía única. Mezquitas y catedrales, fortalezas y leyendas tártaras crean un mosaico cultural fascinante a orillas del gran río Volga.",
                    'duracion' => 3,
                    'cantidad' => 20,
                    'status' => 'activo',
                    'imagen_principal' => "tours/kazan.avif",
                    'imagen_section1' => "tours/volga.avif",
                    'imagen_incluido' => "tours/kazan2.avif",
                    'imagen_no_incluido' => "tours/kazan1.avif"
                ],
                'days' => [
                    [
                        'titulo' => "Día 1",
                        'dia_label' => "Día 1 — Kazán",
                        'descripcion' => [
                            "Llegada y registro en el hotel.",
                            "Recorrido por el Kremlin de Kazán, Patrimonio de la Humanidad.",
                            "Visita a la mezquita Kul Sharif.",
                            "Paseo por la calle peatonal Bauman.",
                        ],
                        'imagen' => "tours/kazan2.avif"
                    ],
                    [
                        'titulo' => "Día 2",
                        'dia_label' => "Día 2 — Sviyazhsk",
                        'descripcion' => [
                            "Excursión a la isla histórica de Sviyazhsk.",
                            "Visita a monasterios ortodoxos y murales antiguos.",
                            "Paseo por el malecón con vistas al río Volga.",
                            "Regreso a Kazán.",
                        ],
                        'imagen' => "tours/volga.avif"
                    ],
                    [
                        'titulo' => "Día 3",
                        'dia_label' => "Día 3 - Regreso a Kazán",
                        'descripcion' => [
                            "Visita al Templo de Todas las Religiones (exterior).",
                            "Tiempo libre para degustar cocina tártara tradicional.",
                            "Paseo por el lago Kaban.",
                        ],
                        'imagen' => "tours/kazan.avif"
                    ]
                ]
            ]
        ];

        foreach ($tours as $tourData) {
            // 1. Создаем основной тур
            $tour = Tour::create($tourData['info']);

            // 2. Привязываем даты (как и было)
            $tour->tourDates()->createMany($fechasGenericas);

            // 3. Привязываем дни (как и было)
            $tour->tourDays()->createMany($tourData['days']);

            // 4. КРИТИЧЕСКИЙ ШАГ: Привязываем услуги к этому туру
            // Здесь мы передаем ID всех созданных ранее сервисов
            $tour->includedServices()->attach([
                $excurcion->id,
                $transporte->id,
                $alojamiento->id,
                $alimentacion->id,
                $acompaniamiento->id,
                $adiccional->id,
            ]);
        }
    }
}
