<?php

namespace App\Http\Controllers;

use App\Models\Inbound;
use App\Models\Wharehouse;
use Illuminate\Http\Request;

class InboundController extends Controller
{

    // set index page view
    public function index()
    {
        $wharehouse = Wharehouse::all();
        return view('inbound.index', compact('wharehouse'));
    }

    public function total()
    {

        $total = Inbound::with('wharehouse')->sum('volume');
        return response()->json($total);
    }

    // handle fetch all eamployees ajax request
    public function all()
    {

        // <td><img src="/storage/images/' . $emp->image . '" width="50" class="img-thumbnail rounded-circle"></td>
        $emps = Inbound::with('wharehouse')->get();
        $output = '';
        $p = 1 ;
        if ($emps->count() > 0) {
            $output .= '<table class="table table-bordered table-md">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Inbound</th>
                <th>Tanggal Masuk Inbound</th>
                <th>Jenis Barang Inbound</th>
                <th>Volume Barang Inbound</th>
                <th>Keterangan Inbound</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>';
            foreach ($emps as $emp) {
                $output .= '<tr>
                <td>' . $p++ . '</td>
                <td>' . $emp->wharehouse->nama . '</td>
                <td>' . $emp->tanggal . '</td>
                <td>' . $emp->jenis_barang . '</td>
                <td>' . $emp->volume . ' KG</td>
                <td>' . $emp->keterangan . '</td>
                <td>
                  <a href="#" id="' . $emp->id . '" class="text-success mx-1 editIcon" data-toggle="modal" data-target="#editTUModal"><i class="ion-edit h4" data-pack="default" data-tags="on, off"></i></a>
                  <a href="#" id="' . $emp->id . '" class="text-danger mx-1 deleteIcon"><i class="ion-trash-a h4" data-pack="default" data-tags="on, off"></i></a>
                </td>
              </tr>';
            }
            $output .= '</tbody></table>';
            echo $output;
        } else {
            echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
        }
    }

    // handle insert a new Tu ajax request
    public function store(Request $request)
    {
        // $file = $request->file('image');
        // $fileName = time() . '.' . $file->getClientOriginalExtension();
        // $file->storeAs('public/images', $fileName);

        $empData = [
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jenis_barang' => $request->jenis_barang,
            'volume' => $request->volume,
            'keterangan' => $request->keterangan
        ];
        Inbound::create($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle edit an Tu ajax request
    public function edit(Request $request)
    {
        $id = $request->id;
        $emp = Inbound::with('wharehouse')->Find($id);
        return response()->json($emp);
    }

    // handle update an Tu ajax request
    public function update(Request $request)
    {
        // $fileName = '';
        $emp = Inbound::with('wharehouse')->Find($request->id);
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $fileName = time() . '.' . $file->getClientOriginalExtension();
        //     $file->storeAs('public/images', $fileName);
        //     if ($emp->image) {
        //         Storage::delete('public/images/' . $emp->image);
        //     }
        // } else {
        //     $fileName = $request->emp_image;
        // }

        $empData = [
            'nama' => $request->nama,
            'tanggal' => $request->tanggal,
            'jenis_barang' => $request->jenis_barang,
            'volume' => $request->volume,
            'keterangan' => $request->keterangan
        ];

        $emp->update($empData);
        return response()->json([
            'status' => 200,
        ]);
    }

    // handle delete an Tu ajax request
    public function delete(Request $request)
    {
        $id = $request->id;
        $emp = Inbound::find($id);
        Inbound::destroy($id);
    }
}
