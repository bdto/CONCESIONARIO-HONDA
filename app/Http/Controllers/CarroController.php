<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CarroRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        // Obtenemos el término de búsqueda desde el request
        $search = $request->query('search');

        // Modificamos la consulta para filtrar por el término de búsqueda
        $query = Carro::query();

        if ($search) {
            $query->where('Marca', 'like', '%' . $search . '%')
                  ->orWhere('Precio', 'like', '%' . $search . '%')
                  ->orWhere('Modelo', 'like', '%' . $search . '%')
                  ->orWhere('Año', 'like', '%' . $search . '%')
                  ->orWhere('Vendedor', 'like', '%' . $search . '%')
                  ->orWhere('Placa', 'like', '%' . $search . '%')
                  ->orWhere('id_proveedor','='.$search);
        }
        $todos = $query->get();
        $this->saveExcel(($todos));
        // Paginamos los resultados
        $carros = $query->paginate();

        return view('carro.index', compact('carros'))
            ->with('i', ($request->input('page', 1) - 1) * $carros->perPage());
    }

    private function saveExcel($datos){
        $dataArray = json_decode(strval($datos), true);


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $headers = array_keys($dataArray[0]);
        $col = 'A';
        foreach ($headers as $header) {
            $sheet->setCellValue($col . '1', $header);
            $col++;
        }

        $row = 2;
        foreach ($dataArray as $dataRow) {
            $col = 'A';
            foreach ($dataRow as $cellData) {
                $sheet->setCellValue($col . $row, $cellData);
                $col++;
            }
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('datos.xlsx');
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $carro = new Carro();


        return view('carro.create', compact('carro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarroRequest $request): RedirectResponse
    {
        Log::info("message");
        $carro = new Carro();
        $carro->Marca = $request->input('Marca');
        $carro->Precio = $request->input('Precio');
        $carro->Modelo = $request->input('Modelo');
        $carro->Año = $request->input('Año');
        $carro->Vendedor = $request->input('Vendedor');
        $carro->Placa = $request->input('Placa');
        $carro->id_proveedor = $request->input('idproveedores');
        // Subir la imagen
        /*if ($request->hasFile('Logo')) {
            $logo = $request->file('Logo');
            $nombreLogo = time() . '_' . $logo->getClientOriginalName();
            $rutaLogo = $request->file('Logo')->storeAs('public/logos', $nombreLogo);
            $carro->Logo = $nombreLogo;
        }*/
        $carro->save();

        return Redirect::route('carros.show', $carro->id)
            ->with('success', 'Carro created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $carro = Carro::find($id);

        return view('carro.show', compact('carro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        Log::info($id);
        $carro = Carro::find($id);

        return view('carro.edit', compact('carro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CarroRequest $request, Carro $carro): RedirectResponse
    {
        $carro->update($request->validated());

        return Redirect::route('carros.index')
            ->with('success', 'Carro updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Carro::find($id)->delete();

        return Redirect::route('carros.index')
            ->with('success', 'Carro deleted successfully');
    }
}
