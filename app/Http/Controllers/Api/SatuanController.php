<?php

namespace App\Http\Controllers\Api;

use Throwable;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\DB;
use App\Satuan;
use App\Http\Resources\SatuanResource;
use App\Http\Resources\SatuanResourceCollection;

class SatuanController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $textFields = [
            'nama'
        ];
        $textFieldMaps = [
            'nama' => 'nama'
        ];
        $textFilter = $request->only($textFields);

        $query = DB::table('satuan');
        foreach ($textFilter as $key => $value) {
            $query->where($textFieldMaps[$key], 'like', "%$value%");
        }

        $data = $request->input('all') ? $query->get() : $query->paginate();

        return new SatuanResourceCollection($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = [
            'nama' => $request->input('nama')
        ];
        try {
            $query = Satuan::create($input);

            return new SatuanResource($query);

        } catch (Throwable $th) {
            return $this->errorBadRequest();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return new SatuanResource(Satuan::findOrFail($id));
        } catch (Throwable $th) {
            return $this->errorNotFound();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = [
            'nama' => $request->input('nama')
        ];
        try {
            $query = Satuan::findOrFail($id);
            $query->update($input);

            return new SatuanResource($query);
        } catch (Throwable $th) {
            return $this->errorBadRequest();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        try {
            if (Satuan::destroy($id)) {
                return $this->noContent();
            }

            return $this->errorNotFound();

        } catch (Throwable $th) {
            return $this->errorBadRequest();
        }

    }
}
