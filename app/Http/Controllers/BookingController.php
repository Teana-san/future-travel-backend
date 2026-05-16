<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::with('tour')->orderBy('created_at', 'desc')->get();

        return response()->json($bookings);
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:20',
            'adultos' => 'required|integer|min:1|max:2',
            'ninos' => 'required|integer|min:0|max:1',
            'status' => 'required|string|max:20',
            'precio_total' => 'required|numeric',
            'tipo_cama' => 'nullable|string|max:50',
            'cama_extra' => 'nullable|boolean',
            'nombre2' => 'nullable|string|max:255',
            'apellido2' => 'nullable|string|max:255',
        ]);

        $booking = Booking::create($validated);

        return response()->json([
            'message' => 'Reserva creada con éxito',
            'booking' => $booking
        ], 201);
    }

    public function show($id)
    {
        return Booking::with('tour')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {

        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9|max:20',
            'adultos' => 'required|integer|min:1|max:2',
            'ninos' => 'required|integer|min:0|max:1',
            'status' => 'required|string|max:20',
            'precio_total' => 'required|numeric',
            'tipo_cama' => 'nullable|string|max:50',
            'cama_extra' => 'nullable|boolean',
            'nombre2' => 'required_if:adultos,2|nullable|string|max:255',
            'apellido2' => 'required_if:adultos,2|nullable|string|max:255',
        ]);

        $data = $validated;

        $booking->update($data);

        return response()->json([
            'message' => "Booking actualizado con exito",
            'booking' => $booking
        ], 200);
    }
}
