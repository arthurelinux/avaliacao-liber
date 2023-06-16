<?php

namespace App\Http\Controllers;

use App\Models\Emails;
use Illuminate\Http\Request;

class EmailsController extends Controller
{
    /**
     * @OA\Get(
     *      path="/emails",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *      ),
     *     @OA\PathItem (
     *     ),
     * )
     */
    public function index()
    {
        //
        $cadastros = Emails::all();
        return $cadastros;
    }

    public function search(Request $request)
    {
        $query = $request->input('busca');

        $cadastros= Emails::where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('telefone', 'LIKE', "%$query%")
            ->get();

        return response()->json( $cadastros);
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
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'telefone' => 'required',
        ]);

        $cadastro = new Emails();
        $cadastro->name = $request->name;
        $cadastro->email = $request->email;
        $cadastro->telefone = $request->telefone;
        $cadastro->save();

        return response()->json(['message' => 'Cadastro realizado com sucesso'], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
