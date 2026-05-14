<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\TourDate;

class TourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1. Берем все туры из базы
        // 2. Сразу подгружаем их дни (Eager Loading), чтобы не делать 100 запросов (tourDays - это функция из модели Tour)
        $tours = Tour::with(['tourDays', 'includedServices'])->get();

        // 3. Возвращаем их. Laravel сам превратит это в JSON!
        return response()->json($tours);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo'           => 'required|string|max:64',
            'pais'             => 'required|string|max:64',
            'inicio_fin'       => 'required|string|max:64',
            'ciudades_texto'   => 'required|string|max:100',
            'ciudades_list'    => 'required|string',
            'texto'            => 'required|string',
            'excursion_titulo' => 'required|string|max:100',
            'duracion'         => 'required|integer',
            'status'           => 'required|string|max:64',
            'cantidad'         => 'integer',

            'imagen_principal'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_section1'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_incluido'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_no_incluido' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $validated;

        $imageFields = ['imagen_principal', 'imagen_section1', 'imagen_incluido', 'imagen_no_incluido'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $path = $request->file($field)->store('tours', 'public');
                $data[$field] = $path;
            }
        }

        $data['ciudades_list'] = json_decode($request->ciudades_list, true);
        $tour = Tour::create($data);

        $allServiceIds = \App\Models\IncludedService::pluck('id')->toArray();
        if (!empty($allServiceIds)) {
            $tour->includedServices()->attach($allServiceIds);
        }

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
        $tour->tourDates()->createMany($fechasGenericas);

        // В. Создаем базовый "День 1", чтобы страница тура не была пустой
        $tour->tourDays()->create([
            'titulo' => 'Día 1',
            'dia_label' => 'Llegada y Bienvenida',
            'descripcion' => json_encode(['Registro en el hotel', 'Tiempo libre para descansar']),
            'imagen' => $tour->imagen_principal // используем главную картинку тура для этого дня
        ]);

        return response()->json($tour, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Tour::with(['tourDays', 'tourDates', 'includedServices'])->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tour $tour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        // Валидация (почти как в store, но поля могут быть необязательными)
        $validated = $request->validate([
            'titulo'           => 'sometimes|required|string|max:64',
            'pais'             => 'sometimes|required|string|max:64',
            'inicio_fin'       => 'sometimes|required|string|max:64',
            'ciudades_texto'   => 'sometimes|required|string|max:100',
            'ciudades_list'    => 'sometimes|required|string',
            'texto'            => 'sometimes|required|string',
            'excursion_titulo' => 'sometimes|required|string|max:100',
            'duracion'         => 'sometimes|required|integer',
            'status'           => 'sometimes|required|string|max:64',
            'cantidad'         => 'sometimes|integer',

            // Картинки всегда nullable, чтобы не затирать старые
            'imagen_principal'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_section1'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_incluido'    => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'imagen_no_incluido' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $validated;

        // Обработка картинок
        $imageFields = ['imagen_principal', 'imagen_section1', 'imagen_incluido', 'imagen_no_incluido'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                // Сохраняем новую картинку
                $path = $request->file($field)->store('tours', 'public');
                $data[$field] = $path;

                // (Опционально) Здесь можно добавить удаление старого файла через Storage::delete()
            } else {
                // Если файл не прислан, удаляем его из массива $data, 
                // чтобы не перезаписать путь на null
                unset($data[$field]);
            }
        }

        // Декодируем города, если они присланы
        if ($request->has('ciudades_list')) {
            $data['ciudades_list'] = json_decode($request->ciudades_list, true);
        }

        // Обновляем модель
        $tour->update($data);

        return response()->json([
            'message' => 'Tour actualizado con éxito',
            'tour' => $tour
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tour = Tour::find($id);

        if ($tour) {
            $tour->delete();
            return response()->json(['message' => 'Tour eliminado']);
        }
        return response()->json(['message' => 'No encontrado'], 404);
    }



    public function allDates()
    {
        // Загружаем все даты вместе с данными о туре, к которому они относятся
        $dates = TourDate::with('tour')->get();
        return response()->json($dates);
    }
}
